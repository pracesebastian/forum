<?php

class Register_model extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	function register($login, $password, $email, $nick) {
		$password = md5($password);
		$check = $this->con->query("SELECT login, email, nick FROM ".DB_PREFIX."_users WHERE login='$login' OR email='$email' OR nick='$nick'");
		echo "SELECT login, email, nick FROM ".DB_PREFIX."_users WHERE login='$login' OR email='$email' OR nick='$nick'";
		$rows = $check->num_rows;
		$ipaddress = $_SERVER['REMOTE_ADDR'];
		if($rows > 0)
			redirect('../register?err');
		else{
			$sql = $this->con->query("INSERT INTO ".DB_PREFIX."_users (login, password, email, nick, ip) VALUES ('$login','$password','$email','$nick', '$ipaddress')");
			$id_user = $this->con->insert_id;
			$sql2 = $this->con->query("INSERT INTO ".DB_PREFIX."_rank (user_id) VALUES ($id_user)");
			redirect('../login');
		}
				
	}		

}

//(isset($_GET['url'])) ? $url = $_GET['url'] : $url = 'forum';
		
	//	$url = explode('/',$url);