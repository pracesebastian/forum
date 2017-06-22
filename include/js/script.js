//var count = $(".platform").length;
var count = 3;

function shw(arg){
	$("#platform_"+arg).click(function(){
		$("#prof_"+arg).show();	
	});	
}


$(".profile-bg").click(function(){
    $(".profile-bg").hide().fadeOut(500);
});




function reset_view(id) {
	$.ajax({
		type: "POST",
		url: "include/ajax.php",
		processdata: false,
		data: "reset_view=true&id="+id,
		success: function(data) {
			//window.location.reload();
			//alert("DZIALA");
			$(".notifications").fadeOut(1000);
		}
	});
}


function load_profile(id) {
	$.ajax({
		type: "POST",
		url: "include/platform-profile.php",
		processdata: false,
		data: "load_profile=true&id="+id,
		success: function(data) {
			//window.location.reload();
			$('#profile-bg').load('include/platform-profile.php');
			//alert("DZIALA"+id+" "+id2+" "+id3);
		}
	});
}
	
