<?php

class Controller {
		
	function __construct() {
		$this->view = new View();
	}
	
	public function load_model($name){
		$path = 'include/model/'.$name.'_model.php';

			if(file_exists($path))
				require $path;
			else
				echo 'ERROR';
		
		$modelName = $name.'_model';
		$this->model = new $modelName();
	}
	
	function check_image(){
		$author = space_replace($_SESSION['login'][0]);
		
		$file_jpg = 'data/images/avatars/'.$author.'_cs870239dsgdgs1309'.$_SESSION['login'][1].'dsskm32m4g.jpg';
		$file_jpeg = 'data/images/avatars/'.$author.'_cs870239dsgdgs1309'.$_SESSION['login'][1].'dsskm32m4g.jpeg';
		$file_png = 'data/images/avatars/'.$author.'_cs870239dsgdgs1309'.$_SESSION['login'][1].'dsskm32m4g.png';
		$file_gif = 'data/images/avatars/'.$author.'_cs870239dsgdgs1309'.$_SESSION['login'][1].'dsskm32m4g.gif';
		
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
	
	function count_notification(){
		$id = $_SESSION['login'][1];
		
		$this->model = new Model();
		return $this->model->count_notification_model($id);
	}
	
	function show_notification(){
		$id = $_SESSION['login'][1];
		
		$this->model = new Model();
		return $this->model->show_notification_model($id);
	}
	
	function check_session_menu(){
		$this->model = new Model();
		return $this->model->check_session_only_forum();
	}
	
}

