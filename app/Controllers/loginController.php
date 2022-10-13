<?php

namespace App\Controllers;


class loginController extends BaseController
{

	public function index()
	{
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
		$email = $this->request->getPostGet('email');
		$password = md5($this->request->getPostGet('password'));

		$administratorModel = model('administratorModel', true, $db);
		if ($data = $administratorModel->where('email', $email)->first()) {
			if ($data['password'] == $password) {
				$data['isLoggedIn'] = true;
				$data['type'] = "administrator";
				session()->set($data);
				return redirect()->to('/');
			} else {
				$this->seterror("Inicio de sesión incorrecto para usuario administrador.");
				return redirect()->to('/login');
			}
		}

		$relativeModel = model('relativeModel', true, $db);
		if ($data = $relativeModel->where('email', $email)->first()) {
			if ($data['password'] == $password) {
				$data['isLoggedIn'] = true;
				$data['type'] = "relative";
				session()->set($data);
				return redirect()->to('/');
			} else {
				$this->seterror("Inicio de sesión incorrecto para usuario acreditado.");
				return redirect()->to('/login');
			}
		}

		$condo_ownerModel = model('condo_ownerModel', true, $db);
		if ($data = $condo_ownerModel->where('email', $email)->first()) {
			if ($data['password'] == $password) {
				$data['isLoggedIn'] = true;
				$data['type'] = "condo_owner";
				session()->set($data);
				return redirect()->to('/');
			} else {
				$this->seterror("Inicio de sesión incorrecto para usuario condomino.");
				return redirect()->to('/login');
			}
		}
		$this->seterror("El correo electróncio digitado no se encuentra registrado.");
		return redirect()->to('/login');
	}

	private function seterror($error = null)
	{
		$data['error'] = $error;
		session()->setFlashdata($data);
	}



	public function signout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
}