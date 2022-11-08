<?php

namespace App\Controllers;

class administratorController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data
        $items['items'] = $administratorModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/list', $items) .
            view('templates/footer');
    }
    public function profile($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $administratorModel->find($id);
            $items['item']['password'] = '';
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['item']['password'] = '';
            $items['error'] =  $error;
        }
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/profile', $items) .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $item['item'] = $administratorModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/detail', $item) .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        $items['null'] = null;
        //Get-fill data
        if ($data != null) {
            $items['error'] =  $error;
            $items['item'] = $data;
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/form', $items) .
            view('templates/footer');
    }

    public function edit($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $administratorModel->find($id);
            $items['item']['password'] = '';
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['item']['password'] = '';
            $items['error'] =  $error;
        }
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('administrator/form', $items) .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => md5($this->request->getPostGet('password')),
            'phone' => $this->request->getPostGet('phone')
        );

        //Save password only if we are inserting or if user type new one 
        if ($this->request->getPostGet('administrator_id')) {
            if ($this->request->getPostGet('password') == "") {
                unset($data['password']);
            }
        }

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base

        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('administrator_id')) {
            $data['administrator_id'] = $this->request->getPostGet('administrator_id');
            $query = $db->Query("SELECT * FROM `administrator` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "') AND `administrator_id` NOT LIKE '" . $data['administrator_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                if ($this->request->getPostGet('profile')) {
                    return $this->profile('Identificación,teléfono o correo electrónico ya registrado.', $data);
                }
                return $this->edit('Identificación,teléfono o correo electrónico ya registrado.', $data);
            }
        } else {
            $query = $db->Query("SELECT * FROM `administrator` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Identificación,teléfono o correo electrónico ya registrados.', $data);
            }
        }
        //Save
        $administratorModel->save($data);

        //Sweetalert flash params
        session()->setFlashdata("message_icon", "success");
        session()->setFlashdata("message", "Cambios realizados");

        //Redirect
        if ($this->request->getPostGet('profile')) {
            return $this->response->redirect(base_url('administrator/profile?id=' . $data['administrator_id']));
        }
        return $this->response->redirect(base_url('administrator'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $administratorModel = model('administratorModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $administratorModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('administrator'));
    }
}