<?php

namespace App\Controllers;


class loginController extends BaseController
{

	public function index()
	{
		$db        = db_connect('default');
		//echo "ENTRE";
		$reservationModel = model('loginModel', true, $db);
		//Views
		return
			view('templates/header') .
			view('templates/navbar') .
			view('login/login') .
			view('templates/footer');
	}

	public function signin()
	{
		$db        = db_connect('default');
		/*$model = model('loginModel', true, $db);
		$model->signin();*/
		session_start();
		$db = db_connect('default');
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		/*print_r($_POST);
		echo "<br>";
		echo "<br>";*/
		$query = $db->Query("SELECT email FROM condo_owner where email = '" . $email . "' ");
		if ($query->resultID->num_rows != 0) {
			$query = $db->query("SELECT condo_owner_id,password,email FROM condo_owner where password = '" . $pass . "' and email = '" . $email . "' ");
			if ($query->resultID->num_rows != 0) {
				echo "ABRI SESSION condo_owner";
				echo "<br>";
				foreach ($query->getResult('array') as $row) {
					$_SESSION['usuario'] = $row['condo_owner_id'];
					$_SESSION['tipo_usuario'] = 'condo_owner';
				}
				//Redirect
				return $this->response->redirect(base_url());
				//header('Location: ../General/actualizar');
			} else {
				$items['error_message'] = "Inicio de sesión incorrecto para usuario condomino";
				//Views
				return
					view('templates/header') .
					view('templates/navbar') .
					view('login/error', $items) .
					view('templates/footer');
			}
		}

		$query = $db->Query("SELECT email FROM administrator where email = '" . $email . "' ");
		if ($query->resultID->num_rows != 0) {
			$query = $db->query("SELECT administrator_id,password,email FROM administrator where password = '" . $pass . "' and email = '" . $email . "' ");
			if ($query->resultID->num_rows != 0) {
				echo "ABRI SESSION administrator";
				echo "<br>";
				foreach ($query->getResult('array') as $row) {
					$_SESSION['usuario'] = $row['administrator_id'];
					$_SESSION['tipo_usuario'] = 'administrator';
				}
				return $this->response->redirect(base_url());
				//header('Location: ../General/actualizar');
			} else {
				$items['error_message'] = "Inicio de sesión incorrecto para usuario administrador";
				//Views
				return
					view('templates/header') .
					view('templates/navbar') .
					view('login/error', $items) .
					view('templates/footer');
			}
		}

		$query = $db->Query("SELECT email FROM `relative` where email = '" . $email . "' ");
		if ($query->resultID->num_rows != 0) {
			$query = $db->query("SELECT relative_id,password,email FROM relative where password = '" . $pass . "' and email = '" . $email . "' ");
			if ($query->resultID->num_rows != 0) {
				echo "ABRI SESSION relative";
				echo "<br>";
				foreach ($query->getResult('array') as $row) {
					$_SESSION['usuario'] = $row['relative_id'];
					$_SESSION['tipo_usuario'] = 'relative_id';
				}
				return $this->response->redirect(base_url());
				//header('Location: ../General/actualizar');
			} else {
				$items['error_message'] = "Inicio de sesión incorrecto para usuario acreditado";
				//Views
				return
					view('templates/header') .
					view('templates/navbar') .
					view('login/error', $items) .
					view('templates/footer');
			}
		}
		$items['error_message'] = "El correo electróncio digitado no se encuentra registrado";
		//Views
		return
			view('templates/header') .
			view('templates/navbar') .
			view('login/error', $items) .
			view('templates/footer');
		//header('Location: ../../?error_login=1');



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
		//Redirect
		return $this->response->redirect(base_url());
		//header('Location: '.base_url().'');
	}
}