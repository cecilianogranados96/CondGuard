<?php

namespace App\Controllers;

class relative_vehicleController extends BaseController
{
    public function index()
    {
        //Connect / models
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['items'] = $relative_vehicleModel->findAll();
        $items['relations'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative_vehicle/list', $items) .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $relative_vehicleModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative_vehicle/detail', $items) .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        //Connect / models
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $condo_ownerModel->findAll();
        if ($data != null) {
            $items['error'] =  $error;
            $items['item'] = $data;
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative_vehicle/form', $items) .
            view('templates/footer');
    }
    public function edit($error = null, $data = null)
    {

        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $relative_vehicleModel->find($id);
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['error'] =  $error;
        }
        $items['relations'] =  $condo_ownerModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative_vehicle/form', $items) .
            view('templates/footer');
    }

    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Get-fill data
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'vehicle_plate' => $this->request->getPostGet('vehicle_plate'),
            'name' => $this->request->getPostGet('name'),
            'land_number' => $this->request->getPostGet('land_number'),
            'phone' => $this->request->getPostGet('phone'),
            'entry_at' => ($this->request->getPostGet('entry_at')) ? $this->request->getPostGet('entry_at') : date('Y-m-d H:i:s'),
            'out_at' => ($this->request->getPostGet('out_at')) ? $this->request->getPostGet('out_at') : null,
        );

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('relative_vehicle_id')) {
            $data['relative_vehicle_id'] = $this->request->getPostGet('relative_vehicle_id');
            $query = $db->Query("SELECT * FROM `relative_vehicle` WHERE (`vehicle_plate` LIKE '" . $data['vehicle_plate'] . "') AND `relative_vehicle_id` NOT LIKE '" . $data['relative_vehicle_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                return $this->edit('Placa de vehículo  ya registrado.', $data);
            }
        } else {
            $query = $db->Query("SELECT * FROM `relative_vehicle` WHERE (`vehicle_plate` LIKE '" . $data['vehicle_plate'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Placa de vehículo ya registrados.', $data);
            }
        }
        //Save
        $relative_vehicleModel->save($data);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('relative_vehicle_id')) {
                $log['operation'] = 'Edición de ingreso - id: ' . $data['relative_vehicle_id'];
            } else {
                $log['operation'] = 'Creación de ingreso';
            }
            //Save log
            $logModel->save($log);
        }

        //Sweetalert flash params
        session()->setFlashdata("message_icon", "success");
        session()->setFlashdata("message", "Cambios realizados");

        //Redirect
        return $this->response->redirect(base_url('relative_vehicle'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $relative_vehicleModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de ingreso - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('relative_vehicle'));
    }
}