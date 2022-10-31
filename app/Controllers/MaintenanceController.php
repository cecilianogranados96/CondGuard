<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class maintenanceController extends BaseController
{

    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $logModel = model('logModel', true, $db);
        $administratorModel = model('administratorModel', true, $db);
        //Get-fill data
        $items['items'] = $logModel->findAll();
        $items['relations'] =  $administratorModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('maintenance', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
}