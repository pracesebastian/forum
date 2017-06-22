<section id="register">
<h2>Rejestracja</h2>
<?php 
	if(isset($_GET['err']))
		echo '<h4 class="text-center red">Podany login, e-mail lub hasło już istnieje</h4>';
	if(isset($_GET['err3']))
		echo '<h4 class="text-center red">Hasła nie są zgodne</h4>';
?>
	<form action="register/create_account" class="radius" method="POST">
		<input class="col-xs-12 input-style radius" placeholder="Login*" name="login" required>
		<input class="col-xs-12 input-style radius" placeholder="Hasło*" type="password" name="password" required minlength="8">
		<input class="col-xs-12 input-style radius" placeholder="Powtórz hasło*" type="password" name="passwordconf" required minlength="8">
		<input class="col-xs-12 input-style radius" placeholder="Adres e-mail*" name="email" type="email" required>
		<input class="col-xs-12 input-style radius" placeholder="Nick*" name="nick" required>
		<button type="submit" class="btn-d radius">Zarejestruj</button>
	</form>
	
	<div class="clearfix"></div>
	<div class="info">
		* Pola wymagane
	</div>
</section>
