<?php

namespace App\Controllers;

class patrolController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $items['items'] = $patrolModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('patrol/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('patrol/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $patrolModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('patrol/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $data = array(
            'latitude' => $this->request->getPostGet('latitude'),
            'longitude' => $this->request->getPostGet('longitude'),
            'code' => $this->request->getPostGet('code')
        );
        if ($this->request->getPostGet('patrol_id')) {
            $data['patrol_id'] = $this->request->getPostGet('patrol_id');
        }

        $patrolModel->save($data);
        $items['items'] = $patrolModel->findAll();
        return $this->response->redirect(base_url('patrol'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $id = $this->request->getPostGet('id');
        $patrolModel->delete($id);
        $items['items'] = $patrolModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('patrol/list', $items) .
            view('templates/footer');
    }
}