<?php

class Newmessage extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('messagebox/newmessage');
	}	
	
	public function create_newmessage(){
		$id = $_SESSION['login'][1];
		$nick = $_SESSION['login'][0];
		$to = $_POST['who'];
		$message = $_POST['message'];
		
		$this->model = new Newmessage_model();
		$this->model->create_newmessage_model($id, $to, $message, $nick);
	}
}