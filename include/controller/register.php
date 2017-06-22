<?php

class Register extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('register/register');
	}
	
	function create_account(){
		$login = $_POST['login'];
		$password = $_POST['password'];
		$passwordconf = $_POST['passwordconf'];
		$nick = $_POST['nick'];
		$email = $_POST['email'];
		
		if($passwordconf == $password){
			$this->model = new Register_model();
			$this->model->register($login, $password, $email, $nick);
		}
		else{
			redirect('../register?err3');
		}
	}
}