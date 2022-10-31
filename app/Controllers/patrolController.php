<?php

namespace App\Controllers;

class patrolController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $items['items'] = $patrolModel->findAll();
        $items['relations'] =  $officerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('patrol/list', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $patrolModel->find($id);
        $items['relations'] =  $officerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('patrol/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Connect / models
        $officerModel = model('officerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $officerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('patrol/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $officerModel = model('officerModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $patrolModel->find($id);
        $items['relations'] =  $officerModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('patrol/form', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Get-fill data
        $data = array(
            'officer_id' => $this->request->getPostGet('officer_id'),
            'latitude' => $this->request->getPostGet('latitude'),
            'longitude' => $this->request->getPostGet('longitude'),
            'code' => $this->request->getPostGet('code')
        );

        //Query variable
        $query = null;
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('patrol_id')) {
            $data['patrol_id'] = $this->request->getPostGet('patrol_id');
        }
        //Save
        $patrolModel->save($data);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('patrol_id')) {
                $log['operation'] = 'Edición de patrulla - id: ' . $data['patrol_id'];
            } else {
                $log['operation'] = 'Creación de patrulla';
            }
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('patrol'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $patrolModel = model('patrolModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $patrolModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de patrulla - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('patrol'));
    }
}