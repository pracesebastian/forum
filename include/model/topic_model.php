<?php

class Topic_model extends Model {
	
	public function __construct(){
		parent::__construct();
	}

	function get_message($url, $page){
		$limit = 10;
		
		($page==1) ? $from = ($page*$limit-10) : $from = ($page*$limit-10);
		
		$sql = $this->con->query("SELECT * FROM ".DB_PREFIX."_topic_posts WHERE topic_id=$url ORDER BY date_of_create ASC LIMIT $from , 10");
		$num_rows = $sql->num_rows;
		
		for($i = 1; $i <= $num_rows; $i++){
			$get = $sql->fetch_object();
			
			echo 
			'
			<div class="row row_post border">
				<div class="col-xs-12 topbar">
					<div class="author text-center">
						<a href="profile/us/'.$get->author.'"><strong>'.$get->author.'</strong></a>
					</div>			

					<div class="date">'.date('d-m-Y H:i',strtotime($get->date_of_create)).'</div>					
				</div>
		
				<div class="col-xs-12">				
					<div class="profile">

						<div class="img">';
					// Sprawdza czy zdj istnieje
					$author = space_replace($get->author);
					$this->check_image_topic($author, $get->user_id);
					
					echo '</div>
					</div>
					
					<div class="message">
						'.$get->message.'
					</div>
				</div>
			</div>

			';
		}
	}
	
	function comment($user_id, $topic_id, $message, $author){
		$sql = $this->con->query("INSERT INTO ".DB_PREFIX."_topic_posts (user_id, topic_id, message, author) VALUES ($user_id,$topic_id,'$message','$author')");
		$sql = $this->con->query("SELECT DISTINCT(posts.user_id) AS user_id, user.nick FROM ".DB_PREFIX."_topic_posts AS posts LEFT JOIN ".DB_PREFIX."_users as user ON posts.user_id=user.id_user WHERE topic_id=$topic_id");
		
		
		while($get = $sql->fetch_object()){
			$name = 'Użytkownik '.$author.' dodał nowy post';
			$link = BASE_URL.'topic/'.$topic_id;
			echo $get->nick;
			if($author != $get->nick)
				$insert = $this->con->query("INSERT INTO ".DB_PREFIX."_notification (name, link, user_id, topic_id) VALUES ('$name', '$link', $get->user_id, $topic_id)");
		}
		
		redirect('../topic/'.$topic_id.'');
		return true;
	}
	
	function show_title($url, $name) {
		$sql = $this->con->query("SELECT $name FROM ".DB_PREFIX."_topics WHERE id_topic=$url");
		$get = $sql->fetch_object();

		echo $get->$name;
	}

	function count_pages($url, $page){
		$sql = $this->con->query("SELECT COUNT(*) as total FROM ".DB_PREFIX."_topic_posts WHERE topic_id=$url");
		$get = $sql->fetch_object();
		$total = $get->total;
		
		if($total > 10)
			$total = ($total/10);
		else 
			$total = 0;
		
		$total = round($total);
		$total = ($total+1);
		
		if($total < 8){
			for($i=1; $i<=$total; $i++){
				
				if($page == $i)
					$active = 'class="active"';
				else
					$active = NULL;
				
				
				echo '<li '.$active.'><a href="topic/'.$url.'?page=' . $i . '">' . $i . '</a></li>';
			}	
		}
		else {
			if($page > 2){
				echo '<li '.$active.'><a href="topic/'.$url.'?page=1">1</a></li>';
				echo '<li '.$active.'><a href="javascript:void(0)">...</a></li>';
				echo '<li '.$active.'><a href="topic/'.$url.'?page=' . ($page-1) . '">' . ($page-1) . '</a></li>';
			}
			if($page == 2)
				echo '<li '.$active.'><a href="topic/'.$url.'?page=1">1</a></li>';
			
			for($i=$page; $i<=$page+3; $i++){
				if($i < $total){
					
					if($page == $i)
						$active = 'class="active"';
					else
						$active = NULL;
					
					
					echo '<li '.$active.'><a href="topic/'.$url.'?page=' . $i . '">' . $i . '</a></li>';
				}			
			}
			$difrent = $page+3;
			
			if($page != $total)
				if($difrent < $total-1){
					echo '<li><a href="javascript:void(0)">...</a></li>';
					echo '<li '.$c.'><a href="topic/'.$url.'?page=' . $total . '">' . $total . '</a></li>';
				}
				else
					echo '<li '.$c.'><a href="topic/'.$url.'?page=' . $total . '">' . $total . '</a></li>';
			else
				echo '<li class="active"><a href="topic/'.$url.'?page=' . $total . '">' . $total . '</a></li>';
		}
		
	}
	
	function check_image_topic($name, $id){
		$file_jpg = 'data/images/avatars/'.$name.'_cs870239dsgdgs1309'.$id.'dsskm32m4g.jpg';
		$file_jpeg = 'data/images/avatars/'.$name.'_cs870239dsgdgs1309'.$id.'dsskm32m4g.jpeg';
		$file_png = 'data/images/avatars/'.$name.'_cs870239dsgdgs1309'.$id.'dsskm32m4g.png';
		$file_gif = 'data/images/avatars/'.$name.'_cs870239dsgdgs1309'.$id.'dsskm32m4g.gif';
		
		if(file_exists($file_jpg)){
			echo '<img src="'.$file_jpg.'" class="img-responsive">';
		}
		elseif(file_exists($file_jpeg)){
			echo '<img src="'.$file_jpeg.'" class="img-responsive">';
		}	
		elseif(file_exists($file_png)){
			echo '<img src="'.$file_png.'" class="img-responsive">';
		}		
		elseif(file_exists($file_gif)){
			echo '<img src="'.$file_gif.'" class="img-responsive">';
		}
		else 
			echo '<img src="https://vignette4.wikia.nocookie.net/leagueoflegends/images/1/1e/Teemo_OriginalLoading.jpg/revision/latest?cb=20160518224400" class="img-responsive">';
	}
	
	function insert_view_model($id){
		$sql = $this->con->query("UPDATE ".DB_PREFIX."_topics SET views=views+1 WHERE id_topic=$id");
	}
}