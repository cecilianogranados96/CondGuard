<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function list()
    {
        $db        = db_connect('default');
        $UserModel = model('UserModel', true, $db);
        $data['users'] = $UserModel->findAll();
        return
            view('templates/header') .
            view('templates/nav') .
            view('user/list', $data) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/nav') .
            view('user/new') .
            view('templates/footer');
    }
    public function edit()
    {

        $db        = db_connect('default');
        $UserModel = model('UserModel', true, $db);
        $request = \Config\Services::request();
        $id = $request->getPostGet('user_id');
        $user['user'] = $UserModel->find($id);
        return
            view('templates/header') .
            view('templates/nav') .
            view('user/edit', $user) .
            view('templates/footer');
    }
    public function delete()
    {
        $db        = db_connect('default');
        $UserModel = model('UserModel', true, $db);
        $request = \Config\Services::request();
        //$id = $request->getPostGet('user_id');
        $id = $this->request->getPostGet('user_id');
        //$id = $user_id;
        $UserModel->delete($id);
        $data['users'] = $UserModel->findAll();
        return
            view('templates/header') .
            view('templates/nav') .
            view('user/list', $data) .
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
            'payment' => $request->getPostGet('payment'),
            'user_role' => 'Admin',
            'status' => 'Active'
        );
        if ($request->getPostGet('id')) {
            $data['id'] = $request->getPostGet('id');
        }
        $db        = db_connect('default');
        $UserModel = model('UserModel', true, $db);

        $UserModel->save($data);
        var_dump($UserModel->errors());
        $data['users'] = $UserModel->findAll();
        return
            view('templates/header') .
            view('templates/nav') .
            view('user/list', $data) .
            view('templates/footer');
    }
}