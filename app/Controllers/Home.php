<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function Index()
    {

        return
            view('templates/header') .
            view('templates/navbar') .
            view('home') .
            view('templates/footer');
    }
}