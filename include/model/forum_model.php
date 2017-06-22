<?php

class Forum_model extends Model {
	
	public function __construct(){
		parent::__construct();
		//echo 'FORUM MODEL';
	}
	
	public function dd(){
		$sql = $this->con->query("SELECT id_department, icon, title FROM ".DB_PREFIX."_departments ORDER BY position");
		while($get = $sql->fetch_object()){
			echo 
			'
			<a href="threads/'.$get->id_department.'">
				<div class="col-xs-12 tile">
					<div class="icon"><i class="fa fa-'.$get->icon.'" aria-hidden="true"></i></div>
					<div class="title">'.$get->title.'</div>
					
					
					<span>Liczba postów: '.$this->count_topics($get->id_department).'</span><br>
					<span>Ostatni post: <strong class="red">'.$this->last_author($get->id_department).'</strong></span>
				</div>
			</a>
			';
		}
	}
	
	function count_topics($id){
		$sql = $this->con->query("SELECT COUNT(*) AS post_no FROM ".DB_PREFIX."_topics WHERE department_id=$id AND banned=0");
		$get = $sql->fetch_object();
		return $get->post_no;
	}
		
	function last_author($id){
		$sql = $this->con->query("SELECT author FROM ".DB_PREFIX."_topics WHERE department_id=$id AND banned=0 ORDER BY date_of_create DESC");
		$get = $sql->fetch_object();
		return $get->author;
	}
	
	function last_posts(){
		$sql = $this->con->query("SELECT * FROM ".DB_PREFIX."_topics WHERE banned=0 ORDER BY date_of_create DESC LIMIT 20");
		while($get = $sql->fetch_object()){
			echo 
			'
			<div class="col-xs-12 last_post">
				<a href="topic/'.$get->id_topic.'">
					<div class="box1">
						<div class="date">'.$get->date_of_create.'</div>
						<div class="author">'.$get->author.'</div>
					</div>
					<div class="box2">
						<div class="title">'.substr($get->title, 0, 80).'</div>
					</div>
				</a>
			</div>
			';
		}		
	}
}