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
            view('vote/list', $items) .
            view('templates/footer');
    }
    public function new()
    {
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/form') .
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
            view('vote/form', $item) .
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
        $items['items'] = $voteModel->findAll();
        return $this->response->redirect(base_url('vote'));
    }
    public function delete()
    {
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $id = $this->request->getPostGet('id');
        $voteModel->delete($id);
        $items['items'] = $voteModel->findAll();
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/list', $items) .
            view('templates/footer');
    }
}