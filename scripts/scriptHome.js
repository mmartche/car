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
		//console.log(nextMenu);
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
	// console.log($(".tablepress td"));
	loadNews('#ultnotGeral','http://noticias.carsale.uol.com.br/?feed=json');
	loadNews('#ultnotAvaliacoes','http://noticias.carsale.uol.com.br/categorias/classicos/?feed=json');

	// var aeee = $.ajax( {
	// 	url:"http://noticias.carsale.uol.com.br/?feed=json&callbackName=jsonp",
	// 	crossDomain:true,
	// 	jsonp: false, 
	// 	jsonpCallback: "callbackName"
	// } )
	// .done(function() {
	//     console.log( "success" );
	// })
	// .fail(function() {
	//     console.log( "error" );
	// })
	// .always(function() {
	//     console.log( "complete" );
 //  	});
});
function loadNews(local,category){
	//JSONP
	// $.getJSON("http://noticias.carsale.uol.com.br/?feed=json&jsonp=Array", function(data){
 //               console.debug(data[0].title);   // print title of first item to firebug console
	//        });
	//check if lugar existe
	//ler json
	var o = $(local);
	if (o.length > 0) {
		$.getJSON(category, function(data) {
			c=0;
			$.each(data, function(key, val) {
				if (c < 6){
					c++;
					console.log("lendo últimas noticias"+local);
					markupTemp = '<div class="chamadaMiddle">'+
						'<a href="'+val.permalink+'" title="'+val.title+'">'+
							'<div class="foto"> '+val.thumbnail+'</div>'+
							'<span class="span">'+val.title+'</span>'+
							'<p class="ultnotData">'+val.date+'</p>'+
						'</a>'+
					'</div>';
					$(local).append(markupTemp);
				}
			});
		});
	}
	//printa
	//viva
}
function checkImage(address){
	$.get(address)
    .done(function() { 
        // Do something now you know the image exists.
        return true;
    }).fail(function() { 
        // Image doesn't exist - do something else.
        return false;
    });
}





























