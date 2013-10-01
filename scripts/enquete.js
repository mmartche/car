function votaEnquete(){
	console.log("start vote");
	//check and update values from survey then insert and anime
	$("#homeEnquete .fieldsEnquete").animate({"width": "0"}, 500,'linear', function() {
		$("#homeEnquete .resultEnquete1 .spanResultEnquete").text("42");
		$("#homeEnquete .resultEnquete1").animate({"width": "42px"}, "fast");
		$("#homeEnquete .resultEnquete2 .spanResultEnquete").text("1");
		$("#homeEnquete .resultEnquete2").animate({"width": "1px"}, "fast");
		$("#homeEnquete .resultEnquete3 .spanResultEnquete").text("121000993");
		$("#homeEnquete .resultEnquete3").animate({"width": "121000993"}, "fast"); 
  	});
	
	//change vote btn properties
	return false;
}
function resetEnquete() {
	$("#homeEnquete .fieldsEnquete").animate({"width": "195px"}, "fast");
	$("#homeEnquete .resultEnquete1 span").text("");
	$("#homeEnquete .resultEnquete1").animate({"width": "0px"}, "fast");
	$("#homeEnquete .resultEnquete2 span").text("");
	$("#homeEnquete .resultEnquete2").animate({"width": "0px"}, "fast");
	$("#homeEnquete .resultEnquete3 span").text("");
	$("#homeEnquete .resultEnquete3").animate({"width": "0px"}, "fast"); 
}