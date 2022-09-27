<?php

namespace App\Controllers;

class assemblyController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        $items['items'] = $assemblyModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $assemblyModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'place' => $this->request->getPostGet('place')
        );
        if ($this->request->getPostGet('assembly_id')) {
            $data['assembly_id'] = $this->request->getPostGet('assembly_id');
        }

        $assemblyModel->save($data);
        $items['items'] = $assemblyModel->findAll();
        return $this->response->redirect(base_url('assembly'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        $id = $this->request->getPostGet('id');
        $assemblyModel->delete($id);
        $items['items'] = $assemblyModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly/list', $items) .
            view('templates/footer');
    }
}