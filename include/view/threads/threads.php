<section id="threads">

<div class="col-xs-12 border info">
	<div class="long">Temat/Autor</div>
	<div class="short">Odpowiedzi</div>
	<div class="short">Wyświetlenia</div>
	<div class="date">Ostatnia odpowiedź</div>
</div>	
<?php

$threads = new Threads();
$threads->threads_list($url[1]);
?>



</section>