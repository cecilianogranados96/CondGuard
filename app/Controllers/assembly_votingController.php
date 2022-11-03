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
    public function preview()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        //Get-fill data
        $items['items'] = $assembly_votingModel->where('status', 'pending')->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/preview', $items) .
            view('templates/footer');
    }
    public function panel($error = null, $data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        //Get-fill data

        if ($data != null) {
            $items['error'] = $error;
            $items['item'] = $assembly_votingModel->find($data['assembly_voting_id']);
        } else {
            $id = $this->request->getPostGet('id');
            $items['item'] = $assembly_votingModel->find($id);
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('assembly_voting/panel', $items) .
            view('templates/footer');
    }
    public function vote()
    {
        //Connect / models
        $db        = db_connect('default');
        $voteModel = model('voteModel', true, $db);
        $assembly_votingModel = model('assembly_votingModel', true, $db);

        //Get-fill data
        $data = array(
            'assembly_voting_id' => $this->request->getPostGet('assembly_voting_id'),
            'condo_owner_id' => $this->request->getPostGet('condo_owner_id'),
            'answer' => $this->request->getPostGet('answer')
        );

        //Verify secure pin
        $pin_input = md5($this->request->getPostGet('pin'));
        if ($pin_input != session()->get('pin')) {
            return $this->panel('Pin de seguridad incorrecto.', $data);
        }

        //Update values of the voting
        $assembly_voting = $assembly_votingModel->find($this->request->getPostGet('assembly_voting_id'));
        $assembly_voting['total_votes'] = $assembly_voting['total_votes'] + 1;
        ($this->request->getPostGet('answer') == 1) ?  $assembly_voting['up_votes'] = $assembly_voting['up_votes'] + 1 : $assembly_voting['down_votes'] = $assembly_voting['down_votes'] + 1;

        //Save
        $voteModel->save($data);
        $assembly_votingModel->save($assembly_voting);

        //Redirect
        return $this->response->redirect(base_url('assembly_voting/panel?id=' . $this->request->getPostGet('assembly_voting_id')));
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
        $logModel = model('logModel', true, $db);
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
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('assembly_voting_id')) {
                $log['operation'] = 'Edición de votación - id: ' . $data['assembly_voting_id'];
            } else {
                $log['operation'] = 'Creación de votación';
            }
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('assembly_voting'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $assembly_votingModel = model('assembly_votingModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $assembly_votingModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de votación - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('assembly_voting'));
    }
}