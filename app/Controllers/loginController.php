<?php

namespace App\Controllers;


class loginController extends BaseController
{

	public function index()
	{
		//echo "ENTRE";
		$reservationModel = model('loginModel', true, $db);
		return view('login/login');
	}

	public function signin()
	{
		$model = model('loginModel', true, $db);
		$model->signin();
	}

	public function ver_usuario()
	{
		session_start();
		if (isset($_SESSION['usuario'])) {
			echo "USUARIO: " .  $_SESSION['usuario'];
			echo "<br>";
			echo "TIPO USUARIO: " .  $_SESSION['tipo_usuario'];
		} else {
			echo "NO LOGUEADO";
		}
	}


	public function signout()
	{
		session_start();
		session_destroy();
		echo "SALIR";
		//header('Location: '.base_url().'');
	}
}
