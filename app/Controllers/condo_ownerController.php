<?php

namespace App\Controllers;

class condo_ownerController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data
        $items['items'] = $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('condo_owner/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function profile($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $condo_ownerModel->find($id);
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
            view('condo_owner/profile', $items) .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $condo_ownerModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('condo_owner/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new($error = null, $data = null)
    {
        //var fix
        $items['null'] =  null;
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
            view('condo_owner/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $condo_ownerModel->find($id);
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
            view('templates/maintenance_begin') .
            view('condo_owner/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Get-fill data
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => md5($this->request->getPostGet('password')),
            'phone' => $this->request->getPostGet('phone'),
            'land_number' => $this->request->getPostGet('land_number'),
            'payment' => '0'
        );
        //Generate and set random unique pin
        $rand_num = time() + rand(1, 1000);
        $data['pin'] = md5($rand_num);

        //Save password only if we are inserting or if user type new one 
        if ($this->request->getPostGet('condo_owner_id')) {
            if ($this->request->getPostGet('password') == "") {
                unset($data['password']);
            }
        }

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('condo_owner_id')) {
            $data['condo_owner_id'] = $this->request->getPostGet('condo_owner_id');
            $query = $db->Query("SELECT * FROM `condo_owner` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "') AND `condo_owner_id` NOT LIKE '" . $data['condo_owner_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                if (session('type') == 'condo_owner') {
                    return $this->profile('Identificación,teléfono o correo electrónico ya registrado.', $data);
                }
                return $this->edit('Identificación,teléfono o correo electrónico ya registrado.', $data);
            }
        } else {
            $query = $db->Query("SELECT * FROM `condo_owner` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "' OR `phone` LIKE '" . $data['phone'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Identificación,teléfono o correo electrónico ya registrados.', $data);
            }
        }
        //Save
        $condo_ownerModel->save($data);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('condo_owner_id')) {
                $log['operation'] = 'Edición de codómino - id: ' . $data['condo_owner_id'];
            } else {
                $log['operation'] = 'Creación de codómino';
            }
            //Save log
            $logModel->save($log);
        }
        //Redirect
        if (session('type') == 'condo_owner') {
            return $this->response->redirect(base_url(''));
        }
        return $this->response->redirect(base_url('condo_owner'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $condo_ownerModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de codómino - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('condo_owner'));
    }
}