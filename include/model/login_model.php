<?php

class Login_model extends Model {
	
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['login']))
			redirect(BASE_URL.'panel');
	}

	function try_login($login, $password){
		$password = md5($password);
		$sql = $this->con->query("SELECT login, password, nick, id_user FROM ".DB_PREFIX."_users WHERE login='$login' AND password='$password'");
		$num_rows = $sql->num_rows;
		
		if($num_rows > 0){
			$get = $sql->fetch_object();
			$nick = $get->nick;
			$id_user = $get->id_user;
			
			if($login == $get->login && $password == $get->password){
				$_SESSION['login'][] = $nick;
				$_SESSION['login'][] = $id_user;
				$update = $this->con->query("UPDATE ".DB_PREFIX."_users SET online=1, last_online=DEFAULT WHERE id_user=$id_user");
				redirect('../');
			}
			else
				redirect('../login');
		}
		else
			redirect('../login');
	}
	
	function logout($user_id) {
		$update = $this->con->query("UPDATE ".DB_PREFIX."_users SET online=0 WHERE id_user=$user_id");
		session_destroy();
		redirect('../forum');
	}
}