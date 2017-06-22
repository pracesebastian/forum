<section id="change">
	<?php if(isset($_GET['errn33rds'])) {
		if($_GET['errn33rds'] == 'len')
			$text = 'Wpisane hasło jest za krótkie';
		elseif($_GET['errn33rds'] == 'incor')
			$text = 'Hasła nie są zgodne';
	}
	?>
	
	
		<div class="col-xs-12">
			<h3 class="text-center red"><?php echo $text; ?></h3>
		</div>
	
	
	<form action="panel/changed_password" method="POST">
		<input placeholder="Twoje hasło" class="input-style col-xs-12" name="password" type="password">
		<input placeholder="Nowe hasło" class="input-style col-xs-12" name="new_password" type="password" >
		<input placeholder="Powtórz nowe hasło" class="input-style col-xs-12" name="new_password_conf" type="password" >
		<button class="btn-d" >Zmień</button>
	</form>
</section>


