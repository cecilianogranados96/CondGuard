<?php

namespace App\Controllers;

class CondoOwnerController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $CondoOwnerModel = model('CondoOwnerModel', true, $db);
        $data['users'] = $CondoOwnerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condoowner/list', $data) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condoowner/new') .
            view('templates/footer');
    }
    public function edit()
    {

        $db        = db_connect('default');
        $CondoOwnerModel = model('CondoOwnerModel', true, $db);
        $request = \Config\Services::request();
        $id = $request->getPostGet('id');
        $user['user'] = $CondoOwnerModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condoowner/edit', $user) .
            view('templates/footer');
    }
    public function delete()
    {
        $db        = db_connect('default');
        $CondoOwnerModel = model('CondoOwnerModel', true, $db);
        $request = \Config\Services::request();
        //$id = $request->getPostGet('user_id');
        $id = $this->request->getPostGet('id');
        //$id = $user_id;
        $CondoOwnerModel->delete($id);
        $data['users'] = $CondoOwnerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condoowner/list', $data) .
            view('templates/footer');
    }
    public function save()
    {
        $request = \Config\Services::request();
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $request->getPostGet('name'),
            'email' => $request->getPostGet('email'),
            'password' => $request->getPostGet('password'),
            'phone' => $request->getPostGet('phone'),
            'land_number' => 'P11',
            'payment' => $request->getPostGet('payment')
        );
        if ($request->getPostGet('condo_owner_id')) {
            $data['condo_owner_id'] = $request->getPostGet('condo_owner_id');
        }
        $db        = db_connect('default');
        $CondoOwnerModel = model('CondoOwnerModel', true, $db);

        $CondoOwnerModel->save($data);
        $data['users'] = $CondoOwnerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('condoowner/list', $data) .
            view('templates/footer');
    }
}