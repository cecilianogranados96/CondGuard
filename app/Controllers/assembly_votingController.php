<?php

namespace App\Controllers;

class assembly_votingController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $items['items'] = $assembly_votingModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/form') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $assembly_votingModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/form', $item) .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $data = array(
            'description' => $this->request->getPostGet('description'),
            'question' => $this->request->getPostGet('question')
        );
        if ($this->request->getPostGet('assembly_voting_id')) {
            $data['assembly_voting_id'] = $this->request->getPostGet('assembly_voting_id');
        }

        $assembly_votingModel->save($data);
        $items['items'] = $assembly_votingModel->findAll();
        return $this->response->redirect(base_url('assembly_voting'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $id = $this->request->getPostGet('id');
        $assembly_votingModel->delete($id);
        $items['items'] = $assembly_votingModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/list', $items) .
            view('templates/footer');
    }
}