<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class maintenanceController extends BaseController
{
    public function index()
    {
        return $this->response->redirect(site_url('relative'));
    } 
}