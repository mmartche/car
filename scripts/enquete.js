function votaEnquete(){
	console.log("start voto");
	var urlVotaEnquete = "./scripts/votaEnquete.php";
	$.getJSON( urlVotaEnquete, {
		idEnq: "1",
		idVoto: "3"
	})
	.done(function( data ) {
//check and update values from survey then insert and anime
		var calcs = parseInt(data.resultadoEnquete.opt1Votos) + parseInt(data.resultadoEnquete.opt2Votos) + parseInt(data.resultadoEnquete.opt3Votos);
		var size1 = parseInt((parseInt(data.resultadoEnquete.opt1Votos) * 100) / calcs);
		var size2 = parseInt((parseInt(data.resultadoEnquete.opt2Votos) * 100) / calcs);
		var size3 = parseInt((parseInt(data.resultadoEnquete.opt3Votos) * 100) / calcs);
		$("#homeEnquete .fieldsEnquete").animate({"width": "0"}, 500,'linear', function() {
			$("#homeEnquete #resultEnquete1 .spanResultEnquete").text(data.resultadoEnquete.opt1Votos);
			$("#homeEnquete #resultEnquete1 .spanResultEnquete").animate({"width": size1+"%"}, "fast");
			$("#homeEnquete #resultEnquete2 .spanResultEnquete").text(data.resultadoEnquete.opt2Votos);
			$("#homeEnquete #resultEnquete2 .spanResultEnquete").animate({"width": size2+"%"}, "fast");
			$("#homeEnquete #resultEnquete3 .spanResultEnquete").text(data.resultadoEnquete.opt3Votos);
			$("#homeEnquete #resultEnquete3 .spanResultEnquete").animate({"width": size3+"%"}, "fast"); 
	  	});
	});
	
	
	//change vote btn properties
	return false;
}
function resetEnquete() {
	$("#homeEnquete .fieldsEnquete").animate({"width": "195px"}, "fast");
	$("#homeEnquete .spanResultEnquete").animate({"width": "0px"}, "fast");
	/*$("#homeEnquete #resultEnquete1 div").text("");
	$("#homeEnquete #resultEnquete2 div").text("");
	$("#homeEnquete #resultEnquete2 .spanResultEnquete").animate({"width": "0px"}, "fast");
	$("#homeEnquete #resultEnquete3 div").text("");
	$("#homeEnquete #resultEnquete3 .spanResultEnquete").animate({"width": "0px"}, "fast"); */
}