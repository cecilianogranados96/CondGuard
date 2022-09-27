<?php

namespace App\Controllers;

class condo_ownerController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['items'] = $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condo_owner/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condo_owner/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $condo_ownerModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condo_owner/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => $this->request->getPostGet('password'),
            'phone' => $this->request->getPostGet('phone'),
            'land_number' => $this->request->getPostGet('land_number'),
        );
        if ($this->request->getPostGet('condo_owner_id')) {
            $data['condo_owner_id'] = $this->request->getPostGet('condo_owner_id');
        }

        $condo_ownerModel->save($data);
        $items['items'] = $condo_ownerModel->findAll();
        return $this->response->redirect(base_url('condo_owner'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $id = $this->request->getPostGet('id');
        $condo_ownerModel->delete($id);
        $items['items'] = $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condo_owner/list', $items) .
            view('templates/footer');
    }
}