function submitForm(){
	fixFields();
}
$(document).ready(function(){
	$(".resultContent").click(function(){
		openDetails($(this).attr("iddb"));
	});
	$('#colorSelector').ColorPicker({
		color: '#0000ff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr,qwe) {
			$(colpkr).fadeOut(500);
			//console.log(colpkr);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			//console.log(hex);
			$('#colorSelector div').css('backgroundColor', '#' + hex);
			$("#colorSelected").val(hex);
		},
		onSubmit: function (hsb,hex,rgb,obj) {
			$(".colorpicker").fadeOut(500);
			//console.log(hsb,hex,rgb,obj);
		}
	});
	$("#colorSelected").keyup(function(){
		colorTemp = $("#colorSelected").val();
		$("#colorSelector div").css("backgroundColor", "#" + colorTemp);
		//$(".divColor").ColorPicker({color:colorTemp});
	});
	$("#btnColorAdd").click(function(){
		cName = $("#colorName").val(),
		cColor = $("#colorSelected").val(),
		cApp = $("#colorAplication").val(),
		cType = $("#colorType").val();
		cLength = $("#optionsColor span").length-1;
		if (cColor.length == "6") {
			$("#optionsColor").append('<span><div class="delColor" onclick="deleteColor(this)">X</div><div class="divColor"><div style="background-color: #'+cColor+';"></div></div>'+cName+'-'+cApp+'-'+cType+'<input type="hidden" name="colorInputName'+cLength+'" value="'+cName+'" /><input type="hidden" name="colorInputColor'+cLength+'" value="'+cColor+'" /><input type="hidden" name="colorInputApp'+cLength+'" value="'+cApp+'" /><input type="hidden" name="colorInputType'+cLength+'" value="'+cType+'" /></span>');
			$("#colorLength").val(cLength+1);
			$("#colorName").val(""),
			$("#colorSelected").val(""),
			$("#colorAplication").val(""),
			$("#colorType").val(""),
			$("#colorSelector div").css("backgroundColor", "#ffffff");
		} else {
			alert("Precisa ser 6 números, contei "+cColor.length);
		}
		//$(".delColor").click(function(){
			
		//});
	});
	$("#btnSerieAdd").click(function(){
		//captura daods
		textTemp = $("#textAreaSerieAdd").val();
		text = textTemp.split(";");
		//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
		l = $("#optionsSerie span").length-2;
		for (i=0;i<text.length;i++){
			if (text[i].length > 0){
				$("#resultSerie").prepend('<span><input type="checkbox" name="rdSerie'+l+'" checked="true" value="s" /><input type="hidden" name="txtSerie'+l+'" value="'+text[i]+'" />'+text[i]+'</span>');
				l++;
			}
		}
		$("#lengthSerie").val(l);
		//captura opcao global
		//valida se tem varios
		//adiciona na lista + opcao selecionada
	});
	$("#btnOptionsAdd").click(function(){
		//dados
		textTemp = $("#textAreaOptionsAdd").val();
		name = $("#txtOptionsName").val();
		idModel = $("#idModel").val();
		text = textTemp.split(";");
		//add db
		$.getJSON('api/index.php?type=addOption&idModel='+idModel+'&name='+name+'&text='+textTemp, function(data) {
			console.log(data[0].response,data[0].insertId)
			if(data[0].response == "true"){
				console.log("ASSASAS");
				//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
				l = $("#optionsOptions span").length-2;
				$("#resultOptions").prepend('<span><input type="checkbox" name="rdOpt'+l+'" checked="true" value="s" /><input type="hidden" name="txtOpt'+l+'" value="'+data[0].insertId+'" /><label title="'+textTemp+'">'+name+'</label></span>');
				l++;
				$("#lengthOptions").val(l);
			} else {
				$("#resultOptions").prepend('<label>'+textTemp+'</label>');
			}
		});
		//add form



		//captura opcao global
		//valida se tem varios
		//adiciona na lista + opcao selecionada
	});
});
function fixFields(){
	//fix all inputs // counters // flags before submit
	return true;
}
function deleteColor(obj) {
	$(obj).parent().remove();
	$("#colorLength").val($("#optionsColor span").length-1);
}
function openDetails(idFeature){
	console.log(idFeature);
}
function filterFields(fieldName,obj){
	//se o campo do mesmo class nao tiver o texto digitado, some
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
$.widget( "custom.catcomplete", $.ui.autocomplete, {
	_renderMenu: function( ul, items ) {
		var that = this,
		currentCategory = "";
		$.each( items, function( index, item ) {
			if ( item.category != currentCategory ) {
				ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
        		currentCategory = item.category;
        	}
        	that._renderItemData( ul, item );
		});
	}
});
$(function() {
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}
	$( "#askInput" ).catcomplete({
		source: "api/index.php?type=askInput",
		delay:0,
		minLength: 1,
		select: function( event, ui ) {
			log( ui.item ?
				"Selected: " + ui.item.id + " aka " + ui.item.value + " category " + ui.item.category:
				"Nothing selected, input was " + this.value );
			//each category will print a diferent result w/ links
			//console.log('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table);
			$.getJSON('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table, function(data) {
				$(".resultContent").remove();
				switch (ui.item.category) {
					case "Manufacturer":
						$.each(data, function(key, val) {
							$(".resultList").append('<a href="formDetails.php?vehicle='+val.manufacturerId+'&search=manufacturer" class="resultContent">'+
									'<li idDB="'+val.featureId+'">'+
										'<div class="rsItems">'+
										'<div class="btnEdit"></div>'+
										'<div class="btnDelete"></div>'+
										'<div class="btnClone"></div>'+
										'<div class="btnActive"></div>'+
										'</div>'+
										'<div class="rsManufacturer">'+val.manufacturerName+'</div>'+
										'<div class="rsAvaliable">Sim</div>'+
									'</li></a>');
							});
						break;
					case "Model":
						$.each(data, function(key, val) {
							$(".resultList").append('<a href="formDetails.php?vehicle='+val.modelId+'&search=model" class="resultContent">'+
								'<li idDB="'+val.featureId+'">'+
									'<div class="rsItems">'+
									'<div class="btnEdit"></div>'+
									'<div class="btnDelete"></div>'+
									'<div class="btnClone"></div>'+
									'<div class="btnActive"></div>'+
									'</div>'+
									'<div class="rsManufacturer">'+val.manufacturerName+'</div>'+
									'<div class="rsModel">'+val.modelName+'</div>'+
									'<div class="rsAvaliable">Sim</div>'+
								'</li></a>');
							});
						break;
					default:
						$.each(data, function(key, val) {
							$(".resultList").append('<a href="formDetails.php?vehicle='+val.featureId+'&search=feature" class="resultContent">'+
								'<li idDB="'+val.featureId+'">'+
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
								'</li></a>');
							});
						break;
					}

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