<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class maintenanceController extends BaseController
{
    public function __construct()
    {
        session_start();
    }
    public function index()
    {
        return $this->response->redirect(site_url('relative'));
    }
}