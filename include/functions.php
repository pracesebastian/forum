<?php

function reload($time) {
	header("Refresh:".$time);
}

function redirect($name){
	header("Location:".$name);
}

function alert($name){
	echo
	'
	<script>
		alert("'.$name.'");
	</script>
	';
}

function space_replace($str){
	$str = str_replace(' ', '_', $str);
	return $str;
}
?>