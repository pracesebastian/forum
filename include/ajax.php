<?php 
require '__base_.php';
require 'model.php';


class Ajax extends Model {
	
	function __construct(){
		parent::__construct();
	}
	
	function reset_view($id){
		$this->con->query("UPDATE ".DB_PREFIX."_notification SET showed=1 WHERE user_id=$id");

	}
}

$id = $_POST['id'];

$ajax = new Ajax();
$ajax->reset_view($id);

?>