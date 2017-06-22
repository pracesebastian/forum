<section id="forum">

	<div class="sidebar border">
		<?php 
			$forum = new Forum();
			$forum->last_threads(); 
		?>
	<div class="clearfix"></div>
	</div>


<div class="line"></div>
<div class="subject">Działy</div>

	<div class="departments padding">	
		<?php 
		$forum->departments();
		?>
	<div class="clearfix"></div>
	</div>

<div class="clearfix"></div>
</section>


<div class="line"></div>
<div class="subject">Stream</d
<div class="clearfix"></div>

<section id="stream" class="padding">
	<div class="container">
		<iframe
			src="http://player.twitch.tv/?channel=dallas&muted=true"
			height="520"
			width="100%"
			frameborder="0"
			scrolling="no"
			allowfullscreen="true">
		</iframe>
	</div>
</section>
