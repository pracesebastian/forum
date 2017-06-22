<?php 
	$conversation = new Messagebox();
?>
<section id="message-box">

	<div class="row topbar">
		<div class="col-xs-12">
			<a href="newmessage" class="btn-d">Utwórz nową wiadomość</a>
		</div>
	</div>
	

	<div class="row">	
		<div class="col-xs-12 col-sm-4 info">
			Lista wiadomości
		</div>
		<div class="col-xs-12 col-sm-8 person">
			Peron
		</div>
	</div>
	
	
	<div class="row">
		
		<div class="col-xs-12 col-sm-4 list">
			<?php 
				$conversation->show_conversation_list();
			?>
		</div>
	
		<div class="col-xs-12 col-sm-8 messages">
		<?php  
			if(isset($url[1])){
				$conversation->conversation($url[1]);
		?>
			<form class="message-form" action="messagebox/send_message/<?php echo $url[1]; ?>" method="POST">
				<div class="col-xs-12 area">
					<textarea class="col-xs-10" placeholder="Wiadomość ..." minlength="3" name="message"></textarea>
					<button class="btn-d">Wyślij</button>
				</div>
			</form>
		<?php } ?>
		</div>
	
		
	</div>
</section>

<script src="include/ckeditor/ckeditor.js"></script>
<script>
	//CKEDITOR.replace( 'message' );
</script>