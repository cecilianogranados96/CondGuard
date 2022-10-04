<?php

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{


	public function signin()
	{
		session_start();
		$db = db_connect('default');
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		print_r($_POST);
		echo "<br>";
		echo "<br>";
		$query = $db->Query("SELECT email FROM condo_owner where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			echo "EMAIL NO EXITE condo_owner";
			echo "<br>";
		}

		$query = $db->Query("SELECT email FROM administrator where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			echo "EMAIL NO EXITE administrator";
			echo "<br>";
		}

		$query = $db->Query("SELECT email FROM relative where email = '" . $email . "' ");
		if ($query->resultID->num_rows == 0) {
			echo "EMAIL NO EXITE relative";
			echo "<br>";
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
			//header('Location: ../General/actualizar');
		} else {
			echo "INCORRECTO de condo_owner";
			echo "<br>";
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
			echo "INCORRECTO de administrator";
			echo "<br>";
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
			echo "INCORRECTO de relative";
			echo "<br>";
		}



		//ERROR GENERAL NO INGRESA
		//header('Location: ../../?error_login=2'); 				

	}
}
