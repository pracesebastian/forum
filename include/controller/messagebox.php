<?php

class Messagebox extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('messagebox/messagebox');
	}
	
	public function conversation($id){
		$id_session = $_SESSION['login'][1];
		$nick = $_SESSION['login'][0];
		
		$this->model = new Messagebox_model();
		return $this->model->view_message_model($id, $id_session, $nick);		
	}
	
	function send_message($id_conv){
		$id_session = $_SESSION['login'][1];
		$nick = $_SESSION['login'][0];
		$message = $_POST['message'];
		$id_conv = $id_conv;
		
		$this->model = new Messagebox_model();
		return $this->model->send_message_model($id_conv, $id_session, $nick, $message);	
	}
	
	function show_conversation_list(){
		$id_session = $_SESSION['login'][1];
		
		$this->model = new Messagebox_model();
		return $this->model->show_conersations_model($id_session);	
	}

}