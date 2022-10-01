<?php

namespace App\Controllers;

class authorizedController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $items['items'] = $authorizedModel->findAll();
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('authorized/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $items['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('authorized/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $authorizedModel->find($id);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $item['relations'] =  $condo_ownerModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('authorized/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $data = array(
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
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
        return $this->response->redirect(base_url('authorized'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $authorizedModel = model('authorizedModel', true, $db);
        $id = $this->request->getPostGet('id');
        $authorizedModel->delete($id);
        return $this->response->redirect(base_url('authorized'));
    }
}