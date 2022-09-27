<?php

namespace App\Controllers;

class officerController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        $items['items'] = $officerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('officer/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('officer/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $officerModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('officer/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'phone' => $this->request->getPostGet('phone')
        );
        if ($this->request->getPostGet('officer_id')) {
            $data['officer_id'] = $this->request->getPostGet('officer_id');
        }

        $officerModel->save($data);
        $items['items'] = $officerModel->findAll();
        return $this->response->redirect(base_url('officer'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $officerModel = model('officerModel', true, $db);
        $id = $this->request->getPostGet('id');
        $officerModel->delete($id);
        $items['items'] = $officerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('officer/list', $items) .
            view('templates/footer');
    }
}