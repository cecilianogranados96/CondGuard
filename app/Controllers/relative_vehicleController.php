<?php

namespace App\Controllers;

class relative_vehicleController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $items['items'] = $relative_vehicleModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/form') .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $relative_vehicleModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative_vehicle/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $data = array(
            'vehicle_plate' => $this->request->getPostGet('vehicle_plate'),
            'description' => $this->request->getPostGet('description')
        );
        if ($this->request->getPostGet('relative_vehicle_id')) {
            $data['relative_vehicle_id'] = $this->request->getPostGet('relative_vehicle_id');
        }

        $relative_vehicleModel->save($data);
        return $this->response->redirect(base_url('relative_vehicle'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $id = $this->request->getPostGet('id');
        $relative_vehicleModel->delete($id);
        return $this->response->redirect(base_url('relative_vehicle'));
    }
}