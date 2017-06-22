<?php

class Topic extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('topic/topic');
	}
	
	function print_post($name, $page){
		$this->model = new Topic_model();
		$this->model->get_message($name, $page);
	}
	
	function add_comment() {
		$user_id = $_SESSION['login'][1];
		$topic_id = $_POST['topic'];
		$message = $_POST['message'];
		$author = $_SESSION['login'][0];
		
		$this->model = new Topic_model();
		$this->model->comment($user_id, $topic_id, $message, $author);
	}
	
	function title($url, $name){
		$this->model = new Topic_model();
		$this->model->show_title($url, $name);
	}	
	
	
	function pagintion($url, $page){
		$this->model = new Topic_model();
		$this->model->count_pages($url, $page);	
	}
	
	function insert_view($id){
		$this->model = new Topic_model();
		$this->model->insert_view_model($id);
	}
}