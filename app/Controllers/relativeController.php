<?php

namespace App\Controllers;

class relativeController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data
        $items['items'] = $relativeModel->findAll();
        $items['relations'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $relativeModel->find($id);
        $items['relations'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        //Connect / models
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $condo_ownerModel->findAll();
        if ($data != null) {
            $items['error'] =  $error;
            $items['item'] = $data;
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $relativeModel->find($id);
            $items['item']['password'] = '';
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['item']['password'] = '';
            $items['error'] =  $error;
        }
        $items['relations'] =  $condo_ownerModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('relative/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data
        $data = array(
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => md5($this->request->getPostGet('password')),
            'phone' => $this->request->getPostGet('phone')
        );

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
            $query = $db->Query("SELECT * FROM `relative` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "') AND `relative_id` NOT LIKE '" . $data['relative_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                return $this->edit('Identificación,teléfono y correo electrónico ya registrado.', $data);
            }
        } else {
            $query = $db->Query("SELECT * FROM `relative` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Identificación,teléfono y correo electrónico ya registrados.', $data);
            }
        }
        //Save
        $relativeModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('relative'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $relativeModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('relative'));
    }
}