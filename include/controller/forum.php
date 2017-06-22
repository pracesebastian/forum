<?php

class Forum extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('forum/forum');
	}
	
	public function departments(){
		$this->model = new Forum_model();
		$this->model->dd();
	}	
	
	public function last_threads(){
		$this->model = new Forum_model();
		$this->model->last_posts();
	}
}