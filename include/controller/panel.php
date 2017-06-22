<?php

class Panel extends Controller{
	
	public $model;
			
	function __construct() {
		parent::__construct();
	}
	
	function load($url){
		$this->view->render($url);
	}
	
	function info(){
		$id = $_SESSION['login'][1];
		$this->model = new Panel_model();
		return $this->model->get_info($id);
	}
			
	function rank(){
		$id = $_SESSION['login'][1];
		echo $this->model->get_rank($id);
	}
					
	function percent(){
		$this->model = new Panel_model();
		$id = $_SESSION['login'][1];
		return $this->model->percent_model($id);
	}
		
	function count_topics(){
		$this->model = new Panel_model();
		$id = $_SESSION['login'][0];
		echo $this->model->count_topics_no($id);
	}
			
	function count_posts(){
		$this->model = new Panel_model();
		$id = $_SESSION['login'][1];
		echo $this->model->count_posts_no($id);
	}
	
	function changed_email(){
		$email = $_POST['email_current'];
		$password = $_POST['password'];
		$email_new = $_POST['email_new'];
		$id = $_SESSION['login'][1];
		
		$this->model = new Panel_model();
		return $this->model->change_email_model($email, $id, $email_new);
	}
	
	function changed_password(){
		$password = $_POST['password'];
		$password_new = $_POST['new_password'];
		$password_conf = $_POST['new_password_conf'];
		$id = $_SESSION['login'][1];
		
		$count_char = strlen($password_new);
		
		if($count_char >= 8){
			
			if($password_new == $password_conf){
				$this->model = new Panel_model();
				return $this->model->change_password_model($password_new, $id);	
			}
			else {
				redirect("../panel/change_password?errn33rds=incor");
			}
		}
		else {
			redirect("../panel/change_password?errn33rds=len");
		}
	}
	
	

	function new_avatar() {
		$nick = $_SESSION['login'][0];
		$id = $_SESSION['login'][1];
		$file = $_FILES['image'];
		
		$this->model = new Panel_model();
		return $this->model->avatar($id, $nick, $file);
	}
	

}