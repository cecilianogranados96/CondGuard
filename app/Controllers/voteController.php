<?php

namespace App\Controllers;

class voteController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['items'] = $voteModel->findAll();
        $items['relations'] =  $assembly_votingModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/list', $items) .
            view('templates/footer');
    }
    public function detail()
    {

        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $voteModel->find($id);
        $items['relations'] =  $assembly_votingModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/detail', $items) .
            view('templates/footer');
    }
    public function new()
    {
        //Connect / models
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $assembly_votingModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/form', $items) .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $voteModel->find($id);
        $items['relations'] =  $assembly_votingModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('vote/form', $items) .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Get-fill data

        $data = array(
            'assembly_voting_id' => $this->request->getPostGet('assembly_voting_id'),
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'answer' => $this->request->getPostGet('answer')
        );
        //Update values of the voting
        if ($this->request->getPostGet('vote_id')) {
            $assembly_voting = $assembly_votingModel->find($this->request->getPostGet('assembly_voting_id'));
            $vote = $voteModel->find($this->request->getPostGet('vote_id'));
            if ($vote['answer'] != $this->request->getPostGet('answer')) {
                if ($this->request->getPostGet('answer') == 1) {
                    $assembly_voting['up_votes'] = $assembly_voting['up_votes'] + 1;
                    $assembly_voting['down_votes'] = $assembly_voting['down_votes'] - 1;
                } else {
                    $assembly_voting['down_votes'] = $assembly_voting['down_votes'] + 1;
                    $assembly_voting['up_votes'] = $assembly_voting['up_votes'] - 1;
                }
            }
        } else {
            $assembly_voting = $assembly_votingModel->find($this->request->getPostGet('assembly_voting_id'));
            $assembly_voting['total_votes'] = $assembly_voting['total_votes'] + 1;
            ($this->request->getPostGet('answer') == 1) ?  $assembly_voting['up_votes'] = $assembly_voting['up_votes'] + 1 : $assembly_voting['down_votes'] = $assembly_voting['down_votes'] + 1;
        }

        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('vote_id')) {
            $data['vote_id'] = $this->request->getPostGet('vote_id');
        }
        //Save
        $voteModel->save($data);
        $assembly_votingModel->save($assembly_voting);

        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('vote_id')) {
                $log['operation'] = 'Edición de voto - id: ' . $data['vote_id'];
            } else {
                $log['operation'] = 'Creación de voto';
            }
            //Save log
            $logModel->save($log);
        }

        //Sweetalert flash params
        session()->setFlashdata("message_icon", "success");
        session()->setFlashdata("message", "Cambios realizados");

        //Redirect
        return $this->response->redirect(base_url('vote'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $voteModel->delete($id);

        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de voto - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('vote'));
    }
}