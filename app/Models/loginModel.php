<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Controller;

class loginModel extends Model
{


	public function signin()
	{
		session_start();
		$db = db_connect('default');
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		/*print_r($_POST);
		echo "<br>";
		echo "<br>";*/
		$query = $db->Query("SELECT email FROM condo_owner where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			$items['error_message'] = "El correo electróncio digitado no se encuentra registrado";
			//Views
			return
				view('templates/header') .
				view('templates/navbar') .
				view('home') .
				view('templates/footer');
		}

		$query = $db->Query("SELECT email FROM administrator where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			$items['error_message'] = "El correo electróncio digitado no se encuentra registrado";
			//Views
			return
				view('templates/header') .
				view('templates/navbar') .
				view('login/error', $items) .
				view('templates/footer');
		}

		$query = $db->Query("SELECT email FROM relative where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			$items['error_message'] = "El correo electróncio digitado no se encuentra registrado";
			//Views
			return
				view('templates/header') .
				view('templates/navbar') .
				view('login/error', $items) .
				view('templates/footer');
			//header('Location: ../../?error_login=1');
		}


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

		$query = $db->query("SELECT administrator_id,password,email FROM administrator where password = '" . $pass . "' and email = '" . $email . "' ");
		if ($query->resultID->num_rows != 0) {
			echo "ABRI SESSION administrator";
			echo "<br>";
			foreach ($query->getResult('array') as $row) {
				$_SESSION['usuario'] = $row['administrator_id'];
				$_SESSION['tipo_usuario'] = 'administrator';
			}
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

		$query = $db->query("SELECT relative_id,password,email FROM relative where password = '" . $pass . "' and email = '" . $email . "' ");
		if ($query->resultID->num_rows != 0) {
			echo "ABRI SESSION relative";
			echo "<br>";
			foreach ($query->getResult('array') as $row) {
				$_SESSION['usuario'] = $row['relative_id'];
				$_SESSION['tipo_usuario'] = 'relative_id';
			}
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



		//ERROR GENERAL NO INGRESA
		//header('Location: ../../?error_login=2'); 				

	}
}