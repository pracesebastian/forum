<?php

class Login extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('login/login');
	}
	
	function zaloguj() {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$this->model = new Login_model();
		$this->model->try_login($login, $password);
	}
	
	function logout(){
		$user_id = $_SESSION['login'][1];
		$this->model = new Login_model();
		$this->model->logout($user_id);
	}
}