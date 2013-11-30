$(document).ready(function(){
	console.log("ready");
	$('.carrosselHome').carousel({
		interval: 5000
	});
	$('.carrosselVideos').carousel({
		interval: 5000
	});
	$(".dropdown-toggle").hover(function(){
		//do
		var nextMenu = "#sub"+$(this).attr("id");
		//var next = $(this).children(".dropdown-menu");
		console.log(nextMenu);
		$(".subMenuLi ul").css("display","none");
		$(nextMenu).css("display","none").slideToggle();
		//$(this+" .dropdown-menu").slideToggle();
	},
	function(){
		//undo
		var nextMenu = "#sub"+$(this).attr("id");
		//console.log($(next));
//		$(nextMenu).slideToggle();
	});
	$(".subMenuLi ul").hover(function(){
		//$(".subMenuLi ul").css("display","block");
	},
	function(){
		$(".subMenuLi ul").css("display","none");
	});
	
	$("#enqueteHome label").click(function() {
		if (!($("#homeEnquete").is(".finalizada"))) {
			$(".enquetes label").removeClass("checked");
			$(this).addClass("checked");
			console.log($(this));
		}
//		var $ok = "#inputStatus"+$(this).children("input").val();
//		console.log($ok.children(".inputStatus"));
/*
		console.log( $("input:checked").val() + " is checked!" );
		var statusCheck = "#inputStatus"+$("input:checked").val();
			ok = statusCheck.join();
		//var statusCheck = "#inputStatus2";
		console.log($(ok));
		//$(".inputStatus").removeClass("checked");
		//$("#inputStatus2").addClass("checked");
*/
	});
});