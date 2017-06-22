

<section id="newtopic">
<?php $newtopic = new Newtopic(); ?>
<h2>Dodaj nowy wątek</h2>

<form action="newtopic/add_new_topic" method="POST">

	<div class="col-xs-12 space-l">
		<strong>Dział:</strong> 
		<select name="department">
			<?php $newtopic->option(); ?>
		</select>
	</div>
	
	<div class="clearfix"></div>
	<div class="col-xs-12 space-l">
		<input class="subject" placeholder="Temat" maxlength="100" minlength="15" name="title" required>
	</div>
	
	<div class="clearfix"></div>
	<div class="col-xs-12 space-l">
		<textarea name="editor1" required minlength="25"></textarea>
	</div>
	
	<div class="col-xs-12">
		<button type="submit" class="btn-d">Dodaj</button>
	</div>
</form>

<div class="clearfix"></div>


</section>

<script src="include/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
</script>