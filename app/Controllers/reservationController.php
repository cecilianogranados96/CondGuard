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
    public function common_areas()
    {
        //Connect / models
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data 
        $items['items'] = $common_areaModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/common_areas', $items) .
            view('templates/footer');
    }
    public function request()
    {
        //Connect / models
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $common_areaModel->find($id);
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/request', $items) .
            view('templates/footer');
    }
    public function reserve()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        //Get-fill data
        $data = array(
            'common_area_id' => $this->request->getPostGet('common_area_id'),
            'status' => 'reservado'
        );
        $schedule = $this->request->getPostGet('schedule');
        switch ($schedule) {
            case '1':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 07:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 11:00:00';
                break;
            case '2':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 11:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 15:00:00';
                break;
            case '3':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 15:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 19:00:00';
                break;
        }
        if (session()->get('type') == 'condo_owner') {
            $data['condo_owner_id'] = session()->get('condo_owner_id');
        } else {
            $data['relative_id'] = session()->get('relative_id');
        }
        //Save
        $reservationModel->save($data);
        //Redirect
        return redirect()->to('/reservation/common_areas');
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
            'entry_at' => $this->request->getPostGet('entry_at'),
            'out_at' => $this->request->getPostGet('out_at'),
            'status' => $this->request->getPostGet('status')
        );
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
        }
        if ($this->request->getPostGet('condo_owner_id')) {
            $data['condo_owner_id'] = $this->request->getPostGet('condo_owner_id');
        }
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