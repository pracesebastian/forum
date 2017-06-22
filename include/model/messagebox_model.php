<?php

class Messagebox_model extends Model {
	
	public function __construct(){
		parent::__construct();
		$this->check_session();
	}

	function view_message_model($id, $user_id, $nick){
		$sql = $this->con->query("SELECT msg.nick, msg.date, msg.status, msg.message FROM ".DB_PREFIX."_conversation AS conv LEFT JOIN ".DB_PREFIX."_messages AS msg ON conv.id_conversation=msg.conversation_id WHERE msg.conversation_id=$id ORDER BY msg.date");
		$num_rows = $sql->num_rows;

		if($num_rows > 0){
			while($get = $sql->fetch_object()){
				($nick == $get->nick) ? $my = 'my' : $my = '';
				($get->message == '') ? $display = 'hide' : $display = ''; 
					echo '<div class="col-xs-12 msg '.$my.' '.$display.'" title="'.$get->nick.'">'.$get->message.'</div><div class="clearfix"></div>';
			}
			
			return true;
		}
		else {
			echo 'Brak postów z tej konwersacji';
		}
		
	}
	
	function send_message_model($id_conversation, $id_session, $nick, $message){
		$insert = $this->con->query("INSERT INTO ".DB_PREFIX."_messages (nick, id_user, conversation_id ,message) VALUES ('$nick', $id_session, $id_conversation, '$message')");
		redirect("../".$id_conversation);
	}
	
	function show_conersations_model($id_user){
		
		$sql = $this->con->query("SELECT user_id_from, user_id_to, id_conversation FROM ".DB_PREFIX."_conversation WHERE user_id_from=$id_user OR user_id_to=$id_user");
		$num_rows = $sql->num_rows;

		
		for($i=1; $i<=$num_rows; $i++){
			
			$get = $sql->fetch_object();
			
			if($get->user_id_from != $id_user)
				$user = $get->user_id_from;
			else
				$user = $get->user_id_to;
			
			$sqlNick = $this->con->query("SELECT nick FROM ".DB_PREFIX."_users WHERE id_user=$user");
			$getNick = $sqlNick->fetch_object();
			$nick = $getNick->nick;
						
			echo
			'
			<div class="tile">
				<a href="messagebox/'.$get->id_conversation.'">
					<div class="col-xs-12 user">
						<span>'.$nick.'</span>
					</div>
				</a>
				<div class="clearfix"></div>
			</div>
			';
		}
	}
}