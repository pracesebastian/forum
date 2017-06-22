<?php $image = new Panel(); ?>

<section id="avatar" class="padding">
	<?php if(isset($_GET['errmp']))
			echo '<h3 class="text-center red">Obsługiwane są tylko pliki png, jpeg, jpg i gif</h3><div class="space"></div>';
	?>
<div class="row">
	<div class="col-xs-12 col-sm-6">

		<?php $image->check_image(); ?>
	</div>

	<div class="col-xs-12 col-sm-6">
		<form action="panel/new_avatar" method="POST" enctype="multipart/form-data">
			<label class="btn-d" for="image" class="image">Wybierz nowe zdjęcie</label>
			<input name="image" id="image" type="file" class="hide" required>
			<button class="btn-d">Zapisz</button>
		</form>
	</div>
</div>


</section>

<script type="text/javascript">
var filesize_limit= 2000;
$('#image').bind('change', function() {
	filesize = (this.files[0].size)/1124;
		if (filesize>filesize_limit) {
			alert('Za duża waga pliku - akceptowane są pliki do 2MB!');
			return false;
		}
});
</script>