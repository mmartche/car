$(document).ready(function(){
	$(".resultContent").click(function(){
		openDetails($(this).attr("iddb"));
	});
});
function openDetails(idFeature){
	console.log(idFeature);
}
function filterFields(fieldName,obj){
	//se o campo do mesmo class nao tiver o texto digitado, some
	//console.log(fieldName,obj.value);
	$(".resultContent").removeClass("hide");
	lengthFields = $("."+fieldName).length;
	for (i=0;i<lengthFields;i++){
		var tempField = $("."+fieldName)[i].innerText;
		if (tempField.indexOf(obj.value) < 0){
			t = $("."+fieldName)[i].parentElement;
			$(t).addClass("hide");
		}
	}	
}
$(function() {
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}
	$( "#askInput" ).autocomplete({
		source: "api/index.php?type=askInput",
		minLength: 1,
		select: function( event, ui ) {
			//console.log(ui.item.value+ui.item.id+this.value);
			//console.log(ui);
			log( ui.item ?
				"Selected: " + ui.item.id + " aka " + ui.item.value :
				"Nothing selected, input was " + this.value );
			//console.log('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table);
			$.getJSON('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table, function(data) {
				var items = "";
				$(".resultContent").remove();
				$.each(data, function(key, val) {
					//<tr><td id="' + key + '" class="askImg">'+key+'+'+val.value+'</td></tr>');
					items = '<li class="resultContent" idDB="'+val.featureId+'">'+
									'<div class="rsItems">'+
									'<div class="btnEdit"></div>'+
									'<div class="btnDelete"></div>'+
									'<div class="btnClone"></div>'+
									'<div class="btnActive"></div>'+
									'</div>'+
									'<div class="rsManufacturer">'+val.manufacturerName+'</div>'+
									'<div class="rsModel">'+val.modelName+'</div>'+
									'<div class="rsVersion">'+val.versionName+'</div>'+
									'<div class="rsYear">'+val.yearProduced+'</div>'+
									'<div class="rsYear">'+val.yearModel+'</div>'+
									'<div class="rsPicture"></div>'+
									'<div class="rsSegment"></div>'+
									'<div class="rsGear"></div>'+
									'<div class="rsOil"></div>'+
									'<div class="rsAvaliable">Sim</div>'+
								'</li>';
					$(".resultList").append(items);
				});

				$(".resultContent").click(function(){
					openDetails($(this).attr("iddb"));
				});
			});
		},
		open: function() {
		//$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			//console.log("open");
		},
		close: function() {
		//$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			//console.log("close");
		}
	});
});