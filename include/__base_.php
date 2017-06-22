<?php

define('DB_PREFIX','forum');
define('BASE_URL','http://website.startmydesign.com/forum/');

class db {

	public static function connect(){

		$server = "";
		$login = "";
		$password = "";
		$db_name = "";
		
		$connect = new mysqli($server, $login, $password, $db_name);
		mysqli_set_charset($connect,"utf8");
		if($connect==FALSE){
			echo 'Problem z polaczeniem bazy danych';
		}
		else
			return $connect;
	}
}

