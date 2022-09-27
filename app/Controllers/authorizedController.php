<?php

namespace App\Controllers;

class authorizedController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $items['items'] = $authorizedModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('authorized/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('authorized/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $authorizedModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('authorized/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'name' => $this->request->getPostGet('name'),
            'vehicle_plate' => $this->request->getPostGet('vehicle_plate'),
            'reason' => $this->request->getPostGet('reason'),
            'entry_at' => $this->request->getPostGet('entry_at'),
            'out_at' => $this->request->getPostGet('out_at'),
            'expiration_at' => $this->request->getPostGet('expiration_at')
        );
        if ($this->request->getPostGet('authorized_id')) {
            $data['authorized_id'] = $this->request->getPostGet('authorized_id');
        }

        $authorizedModel->save($data);
        $items['items'] = $authorizedModel->findAll();
        return $this->response->redirect(base_url('authorized'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $id = $this->request->getPostGet('id');
        $authorizedModel->delete($id);
        $items['items'] = $authorizedModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('authorized/list', $items) .
            view('templates/footer');
    }
}