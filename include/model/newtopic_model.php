<?php

class Newtopic_model extends Model {
	
	public function __construct(){
		parent::__construct();
		$this->check_session();
	}

	function show_option(){
		$sql = $this->con->query("SELECT id_department, title FROM ".DB_PREFIX."_departments WHERE admin_only=0");
		
		while($get = $sql->fetch_object()){
			echo '<option value='.$get->id_department.'>'.$get->title.'</option>';
		}
	}

	function new_topic($department, $title, $author_name, $message, $user_id){
		$insert = $this->con->query('INSERT INTO '.DB_PREFIX.'_topics (department_id, title, author) VALUES ('.$department.', "<span>'.$title.'</span>", "'.$author_name.'")');
			$last_id = $this->con->insert_id;
		$insert2 = $this->con->query("INSERT INTO ".DB_PREFIX."_topic_posts (message, user_id, topic_id, author) VALUES ('$message', $user_id, $last_id, '$author_name')");
		
		redirect('../forum');
	}
	
}