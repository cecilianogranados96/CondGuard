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
    public function detail()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        $items['item'] = $relativeModel->find($id);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
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
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
        if ($data != null) {
            $items['error'] =  $error;
            $items['item'] = $data;
        }
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
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        //Se carga el formulario con los datos de la base de datos si no existen datos del formulario activo
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $relativeModel->find($id);
        } else {
            //En caso contrario se cargan con los datos que el usuario ingreso en el formulario activo
            $items['item'] = $data;
        }
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Relaciones
        $items['relations'] =  $condo_ownerModel->findAll();
        if ($error != null) {
            $items['error'] =  $error;
        }
        //Activar modo editar en el formulario
        $items['edit_enabled'] = true;
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
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $data = array(
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => md5($this->request->getPostGet('password')),
            'phone' => $this->request->getPostGet('phone')
        );

        //Variable para consultas
        $query = null;
        //Validar si se va editar o crear y consultar  campos repetidos correspondientes en registros 
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
            //Se consulta si existen dichos campos en la base de datos en diferentes registros y en redirecciona al usuario al formulario de edicion con el correspondiente error 
            $query = $db->Query("SELECT * FROM `relative` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "') AND `relative_id` NOT LIKE '" . $data['relative_id'] . "'");
            if ($query->resultID->num_rows != 0) {
                return $this->edit('Identificación o correo electrónico ya utilizados por otro usuario.', $data);
            }
        } else {
            //En caso contrario solo se consulta por la existencia de los campos y en redirecciona al usuario al formulario de creacion con el correspondiente error 
            $query = $db->Query("SELECT * FROM `relative` WHERE (`identity` LIKE '" . $data['identity'] . "' OR `email` LIKE '" . $data['email'] . "')");
            if ($query->resultID->num_rows != 0) {
                return $this->new('Identificación o correo electrónico ya utilizados por otro usuario.', $data);
            }
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