<?php

class View {

	function __construct() {
		
	}

	public function render($name)
	{
			require 'include/view/header.php';
				require 'include/view/'.$name.'.php';
			require 'include/view/footer.php';	
					
	}

}