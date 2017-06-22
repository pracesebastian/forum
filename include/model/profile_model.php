<?php


class Profile_model extends Model{
			
	function __construct() {
		parent::__construct();	
		$this->check_session();
	}
	

}

?>