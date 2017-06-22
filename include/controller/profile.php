<?php

class Profile extends Controller{
	
	public $model;
			
	function __construct() {
		parent::__construct();
	}
	
	function load(){
		$this->view->render('error');
	}
	
	function us($arg){
		$this->view->render('profile/profile');
	}
	
}