<?php

namespace App\Controllers;

class reservationController extends BaseController
{
    public function index()
    {
        //Connect / models
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['items'] = $reservationModel->findAll();
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('reservation/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $reservationModel->find($id);
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('reservation/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Connect / models
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('reservation/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $reservationModel->find($id);
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('reservation/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        //Get-fill data
        $data = array(
            'common_area_id' => $this->request->getPostGet('common_area_id'),
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'relative_id' => $this->request->getPostGet('relative_id'),
            'entry_at' => $this->request->getPostGet('entry_at'),
            'out_at' => $this->request->getPostGet('out_at'),
            'status' => $this->request->getPostGet('status')
        );

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('reservation_id')) {
            $data['reservation_id'] = $this->request->getPostGet('reservation_id');
        }
        //Save
        $reservationModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('reservation'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $reservationModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('reservation'));
    }
}