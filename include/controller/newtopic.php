<?php

class Newtopic extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('newtopic/newtopic');
	}
	
	public function option(){
		$this->model = new Newtopic_model();
		$this->model->show_option();
	}
	
	function add_new_topic(){
		$department = $_POST['department'];
		$title = $_POST['title'];
		$author_name = $_SESSION['login'][0];
		$message = $_POST['editor1'];
		$user_id = $_SESSION['login'][1];
		
		$this->model = new Newtopic_model();
		$this->model->new_topic($department, $title, $author_name, $message, $user_id);
	}
}