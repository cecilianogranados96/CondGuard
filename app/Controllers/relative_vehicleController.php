<?php

namespace App\Controllers;

class relative_vehicleController extends BaseController
{
    public function index()
    {
        //Connect / models
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['items'] = $relative_vehicleModel->findAll();
        $items['relations'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail() 
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $relative_vehicleModel->find($id);
        $items['relations'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        //Connect / models
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $relativeModel->findAll();
        if ($data != null) {
            $items['error'] =  $error;
            $items['item'] = $data;
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit($error = null, $data = null)
    {

        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $relative_vehicleModel->find($id);
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['error'] =  $error;
        }
        $items['relations'] =  $relativeModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }

    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        //Get-fill data
        $data = array(
            'relative_id' => $this->request->getPostGet('relative_id'),
            'vehicle_plate' => $this->request->getPostGet('vehicle_plate'),
            'description' => $this->request->getPostGet('description')
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
        //Redirect
        return $this->response->redirect(base_url('relative_vehicle'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $relative_vehicleModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('relative_vehicle'));
    }
}