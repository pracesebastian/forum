<?php

class Model {
	
	public $con;
	
	function __construct() {
		//echo 'This is Model MAIN';
		$this->con = db::connect();
	}
	
	function count_notification_model($id){
		$sql = $this->con->query("SELECT COUNT(*) as view FROM ".DB_PREFIX."_notification WHERE user_id=$id AND showed=0");
		$get = $sql->fetch_object();

		if($get->view > 0)
			return '<div class="notifications">'.$get->view.'</div>';
		else
			return '';
	}
	
	function show_notification_model($id){
		$sql = $this->con->query("SELECT name, topic_id, date FROM ".DB_PREFIX."_notification WHERE user_id=$id ORDER BY date DESC");
		
		while($get = $sql->fetch_object()){
			echo '<li><a href="topic/'.$get->topic_id.'"><span class="date">'.$get->date.'</span>'.$get->name.'</a></li>';
		}
	}
		
	public function check_session(){
		if(!isset($_SESSION['login']))
			redirect(BASE_URL.'login');
		else {
			$id = $_SESSION['login'][1];
			$nick = $_SESSION['login'][0];
			
			$sql = $this->con->query("SELECT nick FROM ".DB_PREFIX."_users WHERE id_user=$id");
			$num_rows = $sql->num_rows;
			
				if($num_rows != 0){
					$get = $sql->fetch_object();
					if($get->nick != $nick){
						session_destroy();
						redirect(BASE_URL.'login');
					}
				}
				else{
					session_destroy();
					redirect(BASE_URL.'login');
				}
		}
	}
	
	function check_session_only_forum(){
		if(isset($_SESSION['login'])){
			$id = $_SESSION['login'][1];
			$nick = $_SESSION['login'][0];
			
			$sql = $this->con->query("SELECT nick FROM ".DB_PREFIX."_users WHERE id_user=$id");
			$num_rows = $sql->num_rows;
			
				if($num_rows != 0){
					$get = $sql->fetch_object();
					if($get->nick != $nick){
						session_destroy();
						redirect(BASE_URL.'login');
					}
				}
				else{
					session_destroy();
					redirect(BASE_URL.'login');
				}
		}
	}

}