<?php

namespace App\Controllers;

class administratorController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        $items['items'] = $administratorModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('administrator/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('administrator/form') .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $administratorModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('administrator/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => $this->request->getPostGet('password'),
            'phone' => $this->request->getPostGet('phone')
        );
        if ($this->request->getPostGet('administrator_id')) {
            $data['administrator_id'] = $this->request->getPostGet('administrator_id');
        }
        $administratorModel->save($data);
        return $this->response->redirect(base_url('administrator'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        $id = $this->request->getPostGet('id');
        $administratorModel->delete($id);
        return $this->response->redirect(base_url('administrator'));
    }
}