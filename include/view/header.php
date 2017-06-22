<?php
(isset($_GET['url'])) ? $url = $_GET['url'] : $url = 'forum';
$url = explode('/',$url);
$controller = new Controller();
?>
<html>
<head>
	<base href="http://website.startmydesign.com/forum/">
	<title>Forum</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="include/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="include/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="include/css/style.css">
	
	<!-- JavaScript -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="include/bootstrap/js/bootstrap.min.js"></script>
	
<head>
<body>

	<div class="dark-layer"></div>
	<section id="header">

		<div class="nav-panel">
			<nav class="navbar navbar-default" role="navigation">
				<div class="box">
					<ul class="nav navbar-nav">
					<?php if(isset($_SESSION['login'])){ 
						$controller->check_session_menu();
					?>
						<li><a href="panel"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['login'][0]; ?></a></li>
						<li><?php echo $controller->count_notification(); ?><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="reset_view(<?php echo $_SESSION['login'][1]; ?>)" ><i class="fa fa-globe" aria-hidden="true"></i> Powiadomienia</a>
							<ul class="dropdown-menu dropdown" role="menu">
								<?php echo $controller->show_notification(); ?>
							</ul>
                    </li>
						<li><a href="newtopic"><i class="fa fa-comment" aria-hidden="true"></i> Dodaj wątek</a></li>
						<li><a href="login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Wyloguj</a></li>
						
						

						
					<?php }else{ ?>
						<li><a href="login"><i class="fa fa-user" aria-hidden="true"></i> Zaloguj</a></li>
						<li><a href="register"><i class="fa fa-user-plus" aria-hidden="true"></i> Zarejestruj się</a></li>
					<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
		
		
		<div class="header-down">
			<div class="container-fluid">
				<div class="row">
					<div class="image">
						<a href="<?php echo BASE_URL;?>"><img src="https://upload.wikimedia.org/wikipedia/en/7/77/League_of_Legends_logo.png" class="img-responsive"></a>
					</div>
				</div>
			</div>
		</div>

	<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class=""><a href="<?php echo BASE_URL;?>"><i class="fa fa-home" aria-hidden="true"></i> Strona główna</a></li>
				</ul>
			</div>
	</nav>
	
	</section>
	
		
				<div class="content padding">

		