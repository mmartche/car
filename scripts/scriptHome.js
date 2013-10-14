$(document).ready(function(){
	console.log("ready");
	$(".dropdown-toggle").hover(function(){
		//do
		var nextMenu = "#sub"+$(this).attr("id");
		//var next = $(this).children(".dropdown-menu");
		console.log(nextMenu);
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
});