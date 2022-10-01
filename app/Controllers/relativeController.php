<?php

namespace App\Controllers;

class relativeController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $items['items'] = $relativeModel->findAll();
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $relativeModel->find($id);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $item['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $data = array(
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => $this->request->getPostGet('password'),
            'phone' => $this->request->getPostGet('phone')
        );
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
        }
        $relativeModel->save($data);
        return $this->response->redirect(base_url('relative'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        $relativeModel->delete($id);
        return $this->response->redirect(base_url('relative'));
    }
}