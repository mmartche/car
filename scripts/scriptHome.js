$(document).ready(function(){
	console.log("ready");
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
	
	$("#enqueteHome").click(function() {
		console.log( $("input:checked").val() + " is checked!" );
		var statusCheck = "#inputStatus"+$("input:checked").val();
			ok = statusCheck.join();
		//var statusCheck = "#inputStatus2";
		console.log($(ok));
		//$(".inputStatus").removeClass("checked");
		$(statusCheck).addCLass("checked");
		//$("#inputStatus2").addClass("checked");
	});
});