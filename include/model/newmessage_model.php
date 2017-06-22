<?php

class Newmessage_model extends Model {
	
	public function __construct(){
		parent::__construct();
		$this->check_session();
	}
	
	function create_newmessage_model($session_id, $who, $message, $nick){
		
		$sql = $this->con->query("SELECT id_user FROM ".DB_PREFIX."_users WHERE nick='$who' ");
		$num_rows = $sql->num_rows;
		
		if($num_rows > 0){
			$get = $sql->fetch_object();
			$user_id_to = $get->id_user;
			
			$sql_check = $this->con->query("SELECT user_id_from, user_id_to, id_conversation FROM ".DB_PREFIX."_conversation WHERE user_id_to=$user_id_to AND user_id_from=$session_id OR user_id_to=$session_id AND user_id_from=$user_id_to");
			$num_rows = $sql_check->num_rows;
			
			if($num_rows == 0){
				$insert = $this->con->query("INSERT INTO ".DB_PREFIX."_conversation (user_id_from, user_id_to) VALUES ($session_id, $user_id_to)");
					$last = $this->con->insert_id;
				$insert2 = $this->con->query("INSERT INTO ".DB_PREFIX."_messages (conversation_id, id_user, nick, message) VALUES ($last, $session_id, '$nick', '$message')");
				redirect("../messagebox/".$last);
				return true;
			}
			else {
				$get = $sql_check->fetch_object();
				$conversation_id = $get->id_conversation;
				$insert2 = $this->con->query("INSERT INTO ".DB_PREFIX."_messages (conversation_id, id_user, nick, message) VALUES ($conversation_id, $session_id, '$nick', '$message')");
				redirect("../messagebox/".$conversation_id);
				return true;
				
			}
			
		}
		else{
			redirect("../newmessage?err=235");
			return false;
		}
	}

}