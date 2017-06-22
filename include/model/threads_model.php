<?php

class Threads_model extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	function generate_threads($name) {
		$sql = $this->con->query("SELECT title, id_topic, author, date_of_create, views FROM ".DB_PREFIX."_topics WHERE department_id=$name AND banned=0 ORDER BY date_of_create DESC LIMIT 20");

		while($get = $sql->fetch_object()){
			echo 
			'
				<a href="topic/'.$get->id_topic.'">
					<div class="col-xs-12 topic">
						<div class="long">
							<div class="title">'.$get->title.'</div>
							<div class="author"><strong>'.$get->author.'</strong></div>
						</div>
												
						<div class="replies short">
							'.$this->count_replies($get->id_topic).'
						</div>	
												
						<div class="views short">
							'.$get->views.'
						</div>	
						
						<div class="short last_data">
							<div class="date">'.$this->last_date_post($get->id_topic)['date_of_create'].'</div>
							<div class="author"><strong>'.$this->last_date_post($get->id_topic)['author'].'</div>
						</div>';
					/*	
						<div class="date short">
							'.date('d-m-Y H:i:s', strtotime($get->date_of_create)).'
						</div>	
					*/
echo'
					</div>
				</a>
			';
		}
	}
		
	function count_replies($id){
		$sql = $this->con->query("SELECT COUNT(topic_id) AS replies FROM ".DB_PREFIX."_topic_posts WHERE topic_id=$id AND banned=0");
		$get = $sql->fetch_object();
		
		return $get->replies;
	}
		
	function last_date_post($id){
		$sql = $this->con->query("SELECT date_of_create, author FROM ".DB_PREFIX."_topic_posts WHERE topic_id=$id AND banned=0 ORDER BY date_of_create DESC");
		$get = $sql->fetch_object();
		
		$posts = array('date_of_create' => $get->date_of_create, 'author' => $get->author);
		
		return $posts;
	}

}
