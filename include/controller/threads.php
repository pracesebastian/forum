<?php

class Threads extends Controller{
			
	function __construct() {
		parent::__construct();	
	}
	
	function load(){
		$this->view->render('threads/threads');
	}
	
	function threads_list($name){
		$this->model = new Threads_model();
		$this->model->generate_threads($name);
	}
}