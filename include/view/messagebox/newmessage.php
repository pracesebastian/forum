<section id="newmessage">
	<div class="container">
		<div class="row">
		<?php if(isset($_GET['err']))
				echo '<h3 class="text-center red">Podany nick nie istnieje</h3>';
		?>
			
			<form action="newmessage/create_newmessage" method="POST">
				<input class="input-style col-xs-12" name="who" placeholder="Do kogo">
					<div class="clearfix"></div>
					<div class="space"></div>
				<textarea class="col-xs-12" id="message" name="message"></textarea>
					<div class="space"></div>
				<button type="submit" class="btn-d">Wyślij</button>
			</form>
		</div>
	</div>
</section>

<script src="include/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'message' );
</script>