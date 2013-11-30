$(document).ready (function(){
	$("#btnEnqueteVotar").click(function(){
		if (!($("#homeEnquete").is(".finalizada"))) {
			$(".modalCaptcha").css("display","block");
		}
	});
	$(".enqClose").click(function(){
		$(".modalCaptcha").css("display","none");
	});
});
function votaEnquete(){
	console.log("start voto");
	$(".modalCaptcha").css("display","none");
	var urlVotaEnquete = "./scripts/votaEnquete.php";
	$.getJSON( urlVotaEnquete, {
		idEnq: "1",
		idVoto: "3",
		key: ""
	})
	.done(function( data ) {
		if (data.resultadoAcao == "true"){
//check and update values from survey then insert and anime
			var calcs = parseInt(data.resultadoEnquete.opt1Votos) + parseInt(data.resultadoEnquete.opt2Votos) + parseInt(data.resultadoEnquete.opt3Votos);
			var size1 = parseInt((parseInt(data.resultadoEnquete.opt1Votos) * 100) / calcs);
			var size2 = parseInt((parseInt(data.resultadoEnquete.opt2Votos) * 100) / calcs);
			var size3 = parseInt((parseInt(data.resultadoEnquete.opt3Votos) * 100) / calcs);
			$(".inputStatus").css("display","none");
			console.log(parseInt(data.resultadoEnquete.opt1Votos),".",parseInt(data.resultadoEnquete.opt2Votos),".",parseInt(data.resultadoEnquete.opt3Votos), ",", calcs,":",size1,":",size2,":",size3);
			$("#homeEnquete .fieldsEnquete").animate({"width": "0"}, 500,'linear', function() {
				$("#homeEnquete .spanResultEnquete").animate({"width": "200px"}, "fast");
				$("#homeEnquete #resultEnquete1 .resultText").text(data.resultadoEnquete.opt1Votos);
				$("#homeEnquete #resultEnquete1 .progress-bar").animate({"width": size1+"%"}, "fast");
				$("#homeEnquete #resultEnquete2 .resultText").text(data.resultadoEnquete.opt2Votos);
				$("#homeEnquete #resultEnquete2 .progress-bar").animate({"width": size2+"%"}, "fast");
				$("#homeEnquete #resultEnquete3 .resultText").text(data.resultadoEnquete.opt3Votos);
				$("#homeEnquete #resultEnquete3 .progress-bar").animate({"width": size3+"%"}, "fast");
				$(".inputStatus").css("display","block");
				$("#homeEnquete .inputStatus").css("left","0");
				$("#btnEnqueteVotar").val("Obrigado por participar");
				$("#homeEnquete").addClass("finalizada");
		  	});
		} else if (data.resultadoAcao == "false") {
			console.log("alert error");
		}
	});
	//change vote btn properties
	return false;
}
function resetEnquete() {
	$("#homeEnquete .fieldsEnquete").animate({"width": "235px"}, "fast");
	$("#homeEnquete .spanResultEnquete").animate({"width": "0px"}, "fast");
	/*$("#homeEnquete #resultEnquete1 div").text("");
	$("#homeEnquete #resultEnquete2 div").text("");
	$("#homeEnquete #resultEnquete2 .spanResultEnquete").animate({"width": "0px"}, "fast");
	$("#homeEnquete #resultEnquete3 div").text("");
	$("#homeEnquete #resultEnquete3 .spanResultEnquete").animate({"width": "0px"}, "fast"); */
}