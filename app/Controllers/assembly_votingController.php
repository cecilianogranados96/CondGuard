<?php

namespace App\Controllers;

class assembly_votingController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data
        $items['items'] = $assembly_votingModel->findAll();
        $items['relations'] =  $assemblyModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly_voting/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $assembly_votingModel->find($id);
        $items['relations'] =  $assemblyModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly_voting/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Connect / models
        $db        = db_connect('default');
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $assemblyModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly_voting/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $assemblyModel = model('assemblyModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $assembly_votingModel->find($id);
        $items['relations'] =  $assemblyModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('assembly_voting/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        //Get-fill data
        $data = array(
            'assembly_id' => $this->request->getPostGet('assembly_id'),
            'description' => $this->request->getPostGet('description'),
            'question' => $this->request->getPostGet('question'),
            'up_votes' => $this->request->getPostGet('up_votes'),
            'down_votes' => $this->request->getPostGet('down_votes'),
            'total_votes' => $this->request->getPostGet('total_votes'),
            'status' => $this->request->getPostGet('status')
        );
        //Validate to edit or create
        if ($this->request->getPostGet('assembly_voting_id')) {
            $data['assembly_voting_id'] = $this->request->getPostGet('assembly_voting_id');
        }
        //Save
        $assembly_votingModel->save($data);
        //Redirect
        return $this->response->redirect(base_url('assembly_voting'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $assembly_votingModel->delete($id);
        //Redirect
        return $this->response->redirect(base_url('assembly_voting'));
    }
}