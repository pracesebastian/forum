<?php
require_once 'include/phpthumb/ThumbLib.inc.php';

class Panel_model extends Model{
			
	function __construct() {
		parent::__construct();	
		$this->check_session();
	}

	function get_info($id){
		$sql = $this->con->query("SELECT email, date_of_create, permission FROM ".DB_PREFIX."_users WHERE id_user=$id");
		$get = $sql->fetch_object();

		if($get->permission){
			switch($get->permission){
				case 0:
					$result = 'standardowe';
					break;
				case 1:
					$result = 'Premium';
					break;
				case 2:
					$result = 'Vip';
					break;
				case 3:
					$result = 'Moderatora';
					break;
				case 4:
					$result = 'Administratora';
					break;
			}
		}
		
		$array = array($get->email, $get->date_of_create, $result);
		
		return $array;
	}
	
	function count_topics_no($id){
		$sql = $this->con->query("SELECT COUNT(*) AS total FROM ".DB_PREFIX."_topics WHERE author='$id'");
		$get = $sql->fetch_object();
			
		return $get->total;
	}
	
	function count_posts_no($id){
		$sql = $this->con->query("SELECT COUNT(*) AS total FROM ".DB_PREFIX."_topic_posts WHERE user_id=$id");
		$get = $sql->fetch_object();
			
		return $get->total;
	}

	function percent_model($id){
		$sql = $this->con->query("SELECT points FROM ".DB_PREFIX."_rank WHERE user_id=$id");
		$get = $sql->fetch_object();
		
		$points = $get->points;	
		
		
		if($points <= 99){
			$max = 99;
			$current_rank = '<img src="data/images/rank/1.png">';
			$next_rank = '<img src="data/images/rank/2.png">';
		}
		elseif($points >= 100 && $points <= $max = 299){
			$current_rank = '<img src="data/images/rank/2.png">';
			$next_rank = '<img src="data/images/rank/3.png">';
		}
		elseif($points >= 300 && $points <= $max = 599){
			$current_rank = '<img src="data/images/rank/3.png">';
			$next_rank = '<img src="data/images/rank/4.png">';
		}
		elseif($points >= 600 && $points <= $max = 899){
			$current_rank = '<img src="data/images/rank/4.png">';
			$next_rank = '<img src="data/images/rank/5.png">';
		}
		elseif($points >= 900 && $points <= $max = 1199){
			$current_rank = '<img src="data/images/rank/5.png">';
			$next_rank = '<img src="data/images/rank/6.png">';
		}
		elseif($points <= 1200){
			$current_rank = '<img src="data/images/rank/6.png">';
			$next_rank = $points;
			$max = 1200;
		}
			
			
		$percent = ($points*100)/$max;
		$percent = round($percent, 2);
		
		$array = array(1 => '<div class="perc-status" style="width: '.$percent.'%"></div>', 2 => $current_rank, 3 => $next_rank, 4 => $percent);
		
		
		return $array;
	}
	
	function change_email_model($email, $id, $email_new){
		$sql = $this->con->query("SELECT email FROM ".DB_PREFIX."_users WHERE id_user=$id");
		$get = $sql->fetch_object();
		
		if($get->email == $email){
			$update = $this->con->query("UPDATE ".DB_PREFIX."_users SET email='$email_new' WHERE id_user=$id");
			redirect("../panel");
		}
		else{
			redirect("../panel");
			return false;
		}
	}
	
	function change_password_model($password, $id){
		$password = md5($password);
			$update = $this->con->query("UPDATE ".DB_PREFIX."_users SET password='$password' WHERE id_user=$id");
			redirect("../panel");
			return true;
	}
	
	function avatar($id, $nick, $file){
		$dd = $file['name'];
		$dd = explode('.', $dd);
		$extension = $dd[1];
		
		if($extension != ('jpg' || 'png' || 'gif' || 'jpeg')){
			redirect('../panel/avatar?errmp');
			return false;
		}
		
		$dir = 'data/images/avatars/';
		$tmp = $file['tmp_name'];
		$nick = space_replace($nick);		
		
		$name = $nick.'_cs870239dsgdgs1309'.$id.'dsskm32m4g.'.$extension;	
		
		$upload = $dir.basename($name);
		$done = move_uploaded_file($tmp, $upload);
		
		$location = getimagesize($upload);	
		$width = $location[0];
		$height = $location[1];
		
			$thumb = PhpThumbFactory::create($upload);
			$thumb->adaptiveResize(650, 860);
			$thumb->save($upload);
		redirect('../panel');
		
	}

}