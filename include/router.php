<?php

function urlfc($str){
	$str = str_replace('-','_',$str);
	return $str;
}

class Router {
	
	
	
	function __construct(){
		(isset($_GET['url'])) ? $url = $_GET['url'] : $url = 'forum';
		
		$url = explode('/',$url);
		//print_r ($url);
		
		$file = 'include/controller/' . $url[0] . '.php';
		if(file_exists($file)){
			require $file;
			$controller = new $url[0];
			$controller->load_model($url[0]);
		}
		else
			$this->error();
		
		// calling methods
		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} 
		else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					if($url[0]=='threads')
						$controller->load('threads/threads');
					elseif($url[0]=='topic')
						$controller->load('topic/topic');
					elseif($url[0]=='messagebox')
						$controller->load('messagebox/messagebox');
					elseif($url[0]=='panel')
						$controller->load('panel/'.$url[1]);
					else
						$this->error();
				}
			}
			else{
				if($url[0]=='panel'){
					$controller->load($url[0].'/'.$url[0]);
				}
				else
					$controller->load();
			}
		}

		
	}

	function error() {
		require 'include/view/error.php';
		return false;
	}
}