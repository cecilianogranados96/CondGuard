<?php

namespace App\Controllers;

class AdministratorController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $AdministratorModel = model('AdministratorModel', true, $db);
        $items['items'] = $AdministratorModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/new') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $AdministratorModel = model('AdministratorModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $AdministratorModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/edit', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $AdministratorModel = model('AdministratorModel', true, $db);
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

        $AdministratorModel->save($data);
        $items['items'] = $AdministratorModel->findAll();
        return $this->response->redirect(base_url('administrator'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $AdministratorModel = model('AdministratorModel', true, $db);
        $id = $this->request->getPostGet('id');
        $AdministratorModel->delete($id);
        $items['items'] = $AdministratorModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/list', $items) .
            view('templates/footer');
    }
}