<?php 
$panel = new Panel();
$array = $panel->percent();
$info = $panel->info();


?>

<section id="panel">
	<div class="container-fluid">
	
		<div class="rank">
			<div class="current-rank"><?php echo $array[2]; ?></div>
			<div class="next-rank"><?php echo $array[3]; ?></div>
		</div>
			<div class="col-xs-12 row-ranga">
				<span><?php echo $array[4]; ?> %</span>
				<div class="limit">
					<?php echo $array[1]; ?>
				</div>
			</div>
		<div class="clearfix"></div>
	
		<div class="row">
			<div class="col-xs-12 col-sm-6">

			<!-- User -->
				<div class="photo">
					<?php $panel->check_image(); ?>
				</div>
			<div class="clearfix"></div>
				<div class="info">
					<div class="info-detail">Nick: <span><?php echo $_SESSION['login'][0]; ?></span></div>
					<div class="info-detail">Adres E-mail: <span><?php echo $info[0]; ?></span></div>
					<div class="info-detail">Data rejestracji: <span><?php echo $info[1]; ?></span></div>
					<br>
					<div class="info-detail">Posiadasz konto: <span><?php echo $info[2]; ?></span></div>
					<div class="info-detail">Liczba założonych tematów: <span><?php $panel->count_topics();?></span></div>
					<div class="info-detail">Liczba dodanych postów: <span><?php $panel->count_posts();?></span></div>
					
				</div>
			</div>
		
		
		
			<div class="col-xs-12 col-sm-6 option_row">
			
				<a href="panel/change_email">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Zmień adres e-mail
						</div>
					</div>
				</a>
				
				<a href="panel/change_password">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-key" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Zmień hasło
						</div>
					</div>
				</a>
													
				<a href="panel/avatar">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-picture-o" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Zmień swój avatar
						</div>
					</div>
				</a>	
				
				<a href="panel/new_ticket">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Utwórz zgłoszenie<br>do administracji
						</div>
					</div>
				</a>				
					
				<a href="messagebox">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-envelope-open" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Wiadomości
						</div>
					</div>
				</a>				
									
				<a href="panel/details">
					<div class="tile">
						<div class="icon">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</div>
						
						<div class="title">
							Dodatkowe dane
						</div>
					</div>
				</a>				
			
				
			</div>
		</div>
	</div>
</section>
