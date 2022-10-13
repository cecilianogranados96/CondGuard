<?php

namespace App\Controllers;

class common_areaController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data
        $items['items'] = $common_areaModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $item['item'] = $common_areaModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/detail', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Var fix
        $items['null'] = null;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $common_areaModel->find($id);
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'address' => $this->request->getPostGet('address'),
            'condo_capacity' => $this->request->getPostGet('condo_capacity'),
            'people_capacity' => $this->request->getPostGet('people_capacity'),
            'status' => $this->request->getPostGet('status')
        );
        //Validate to edit or create
        if ($this->request->getPostGet('common_area_id')) {
            $data['common_area_id'] = $this->request->getPostGet('common_area_id');
        }
        //Save
        $common_areaModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('common_area'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $common_areaModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('common_area'));
    }
}