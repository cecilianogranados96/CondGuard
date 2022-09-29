<?php

namespace App\Controllers;

class relativeController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $items['items'] = $relativeModel->findAll();
        $items['test'] = $relativeModel->find(6);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $relativeModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'email' => $this->request->getPostGet('email'),
            'password' => $this->request->getPostGet('password'),
            'phone' => $this->request->getPostGet('phone')
        );
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
        }

        $relativeModel->save($data);
        $items['items'] = $relativeModel->findAll();
        return $this->response->redirect(base_url('relative'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        $relativeModel->delete($id);
        $items['items'] = $relativeModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('relative/list', $items) .
            view('templates/footer');
    }
}