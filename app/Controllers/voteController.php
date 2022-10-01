<?php

namespace App\Controllers;

class voteController extends BaseController
{
    public function index()
    {
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $items['items'] = $voteModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('vote/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('vote/form') .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $id = $this->request->getPostGet('id');
        $item['item'] = $voteModel->find($id);
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('vote/form', $item) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $data = array(
            'answer' => $this->request->getPostGet('answer')
        );
        if ($this->request->getPostGet('vote_id')) {
            $data['vote_id'] = $this->request->getPostGet('vote_id');
        }

        $voteModel->save($data);
        return $this->response->redirect(base_url('vote'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $id = $this->request->getPostGet('id');
        $voteModel->delete($id);
        return $this->response->redirect(base_url('vote'));
    }
}