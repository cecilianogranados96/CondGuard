<?php

namespace App\Controllers;

class officerController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $items['items'] = $officerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('officer/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $officerModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('officer/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        //Var fix 
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
            view('templates/maintenance_begin') .
            view('officer/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $officerModel->find($id);
            $items['error'] =  $error;
        } else {
            $items['item'] = $data;
            $items['error'] =  $error;
        }
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('officer/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'phone' => $this->request->getPostGet('phone')
        );

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('officer_id')) {
            $data['officer_id'] = $this->request->getPostGet('officer_id');
            $query = $db->Query("SELECT * FROM `officer` WHERE (`identity` LIKE '" . $data['identity'] . "'  OR `phone` LIKE '" . $data['phone'] . "') AND `officer_id` NOT LIKE '" . $data['officer_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                return $this->edit('Identificación o teléfono  ya registrado.', $data);
            }
        } else {
            $query = $db->Query("SELECT * FROM `officer` WHERE (`identity` LIKE '" . $data['identity'] . "'  OR `phone` LIKE '" . $data['phone'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Identificación o teléfono  ya registrados.', $data);
            }
        }
        //Save
        $officerModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('officer'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $officerModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('officer'));
    }
}