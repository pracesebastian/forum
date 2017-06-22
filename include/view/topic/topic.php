<?php
$topic = new Topic();
(isset($_GET['page'])) ? $page = $_GET['page'] : $page = 1;

$topic->insert_view($url[1]);
?>

<section id="topic">
	

	<div class="subject">
		Data dodania: <?php $topic->title($url[1], 'date_of_create'); ?>
		<h3><?php $topic->title($url[1], 'title'); ?></h3>
	</div>
	
	
	
	<?php
	// Generowanie postów
	$topic->print_post($url[1], $page);

	// Dodawanie posta, jeśli osoba jest zalogowana
	if(isset($_SESSION['login'])){ ?>
	<form method="POST" action="topic/add_comment"class="col-xs-12 comments">
		<textarea name="message"></textarea>
		<button type="submit" name="topic" value="<?php echo $url[1]; ?>" class="btn-d">Dodaj post</button>
	</form>
	<?php } else { ?>
	<a href="login" class="col-xs-12 col-sm-4 col-sm-push-4 text-center btn-d">Zaloguj się, aby dodać post</a>
	<?php } ?>
	<div class="clearfix"></div>
	
	
	<ul class="pagination">
		<?php
		// Paginacja
			$topic->pagintion($url[1], $page);
		?>
	</ul>
</section>



<script src="include/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'message' );
</script>