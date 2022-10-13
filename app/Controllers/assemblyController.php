<?php

namespace App\Controllers;

class assemblyController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data
        $items['items'] = $assemblyModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $assemblyModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Var fix
        $items['null'] = null;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $assemblyModel->find($id);
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'place' => $this->request->getPostGet('place')
        );
        //Validate to edit or create
        if ($this->request->getPostGet('assembly_id')) {
            $data['assembly_id'] = $this->request->getPostGet('assembly_id');
        }
        //Save
        $assemblyModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('assembly'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $assemblyModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('assembly'));
    }
}