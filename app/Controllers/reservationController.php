<?php

namespace App\Controllers;

class reservationController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $items['items'] = $reservationModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $reservationModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $data = array(
            'entry_at' => $this->request->getPostGet('entry_at'),
            'out_at' => $this->request->getPostGet('out_at')
        );
        if ($this->request->getPostGet('reservation_id')) {
            $data['reservation_id'] = $this->request->getPostGet('reservation_id');
        }

        $reservationModel->save($data);
        $items['items'] = $reservationModel->findAll();
        return $this->response->redirect(base_url('reservation'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $id = $this->request->getPostGet('id');
        $reservationModel->delete($id);
        $items['items'] = $reservationModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/list', $items) .
            view('templates/footer');
    }
}