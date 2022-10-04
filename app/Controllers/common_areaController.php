<?php

namespace App\Controllers;

class common_areaController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $items['items'] = $common_areaModel->findAll();
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
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $common_areaModel->find($id);
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
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/form') .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $common_areaModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('common_area/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'address' => $this->request->getPostGet('address'),
            'condo_capacity' => $this->request->getPostGet('condo_capacity'),
            'people_capacity' => $this->request->getPostGet('people_capacity'),
            'status' => $this->request->getPostGet('status')
        );
        if ($this->request->getPostGet('common_area_id')) {
            $data['common_area_id'] = $this->request->getPostGet('common_area_id');
        }

        $common_areaModel->save($data);
        return $this->response->redirect(base_url('common_area'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $id = $this->request->getPostGet('id');
        $common_areaModel->delete($id);
        return $this->response->redirect(base_url('common_area'));
    }
}