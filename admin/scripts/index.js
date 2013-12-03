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
		manufacturerId = $("#manufacturerId").val(),
		cName = $("#colorName").val(),
		cColor = $("#colorSelected").val(),
		cApp = $("#colorAplication").val(),
		cType = $("#colorType").val();
		cLength = $("#optionsColor span").length-1;
		if (cColor.length == "6") {
			$.getJSON('api/index.php?type=addColor&manufacturerId='+manufacturerId+'&chexa='+cColor+'&cname='+cName+'&capp='+cApp+'&ctype='+cType, function(data) {
				//console.log(data[0].response,data[0].insertId);
				if(data[0].response == "true"){
					//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
					$("#optionsColor").append('<span><div class="delColor" onclick="deleteColor(this,"'+data[0].insertId+'")">X</div><div class="divColor"><div style="background-color: #'+cColor+';"></div></div>'+cName+'-'+cApp+'-'+cType+'<input type="hidden" name="colorInputName'+cLength+'" value="'+cName+'" /><input type="hidden" name="colorInputColor'+cLength+'" value="'+cColor+'" /><input type="hidden" name="colorInputApp'+cLength+'" value="'+cApp+'" /><input type="hidden" name="colorInputType'+cLength+'" value="'+cType+'" /></span>');
					$("#colorLength").val(cLength+1);
					$("#colorName").val(""),
					$("#colorSelected").val(""),
					$("#colorAplication").val(""),
					$("#colorType").val(""),
					$("#colorSelector div").css("backgroundColor", "#ffffff");
				} else {
					//$("#resultOptions").prepend('<label>''</label>');
				}
			});
		} else {
			alert("Precisa ser 6 números, contei "+cColor.length);
		}
		//$(".delColor").click(function(){
			
		//});
	});
	$("#btnSerieAdd").click(function(){
		//captura daods
		textTemp = $("#textAreaSerieAdd").val();
		text = textTemp.split(",");
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
		codOpt = $("#txtOptionsCode").val();
		textTemp = $("#textAreaOptionsAdd").val();
		name = $("#txtOptionsName").val();
		manufacturerId = $("#manufacturerId").val();
		text = textTemp.split(";");
		//add db
		$.getJSON('api/index.php?type=addOption&manufacturerId='+manufacturerId+'&codopt='+codOpt+'&name='+name+'&text='+textTemp, function(data) {
			console.log(data[0].response,data[0].insertId);
			if(data[0].response == "true"){
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
	$("#btnPictureAdd").click(function(){
		picUrl = $("#txtPicture").val();
		picName = $("#txtPicName").val();
		$("#listPictures").html('<li><div class="btnDeletePicture"></div><label>'+picName+'</label><img src="'+picUrl+'" /></li>');
	});
	$("#btnDelForm").click(function(){
		//check where we are (category whatever)
		featureId = $("#featureId").val(), yearProduced = $("#txtYearProduced").val(), yearModel = $("#txtYearModel").val(), manufacturerId = $("#manufacturerId").val(), manufacturerName = $("#txtManufacturerName").val(), modelId = $("#modelId").val(), modelName = $("#txtModelName").val(), versionId = $("#versionId").val(), versionName = $("#txtVersionName").val(), category = $("#category").val();
		if (category != ""){
			fieldTemp = "#"+category+"Id";
			idForm = $(fieldTemp).val();
			msg = "Tem certeza que deseja excluir o veículo";
			if (featureId){
				msg+=" Ano: "+yearModel+"/"+yearProduced;
			}
			if (versionId){
				msg+=" Versão:"+versionName;
			}
			if (modelId){
				msg+=" Modelo:"+modelName;
			}
			if (manufacturerId){
				msg+=" Montadora:"+manufacturerName;
			}
			//show confirm  ... then
			var r = confirm(msg);
			if (r == true) {
				if (idForm && category) {
					$.getJSON('api/index.php?type=deleteForm&idField='+idForm+'&table='+category, function(data) {
						if(data[0].response == "true"){
							//go to index
							//console.log("foi");
							return true;
						} else {
							console.log(data[0].error);
							return false;
							//alert error
						}
					});
				}
			} else {
				return false;
			}
		}
	});
});
function fixFields(){
	//fix all inputs // counters // flags before submit
	return true;
}
function deleteColor(obj,idColor) {
	$.getJSON('api/index.php?type=removeColor&idColor='+idColor, function(data) {
		if(data[0].response == "true"){
			//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
			$(obj).parent().remove();
			$("#colorLength").val($("#optionsColor span").length-1);
		} else {

		}
	});
}
function openDetails(featureId){
	console.log(featureId);
}
function filterFields(fieldName,obj){
	//se o campo do mesmo class nao tiver o texto digitado, some
	$(".resultItem").removeClass("hide");
	lengthFields = $("."+fieldName).length;
	for (i=0;i<lengthFields;i++){
		var tempField = $("."+fieldName)[i].innerHTML;
		if (tempField.toLowerCase().indexOf(obj.value.toLowerCase()) < 0){
			t = $("."+fieldName)[i].parentElement.parentElement;
			$(t).addClass("hide");
		}
	}	
}
function checkFields() {
	//valida o que vai ser
	return false;
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
		delay:2,
		minLength: 1,
		select: function( event, ui ) {
			log( ui.item ?
				"Selected: " + ui.item.id + " aka " + ui.item.value + " category " + ui.item.category:
				"Nothing selected, input was " + this.value );
			//each category will print a diferent result w/ links
			console.log('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table);
			$.getJSON('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table, function(data) {
				$(".resultData ul li").remove();
					$.each(data, function(key, val) {
						data = '<li class="resultItem" idDB="'+val.featureId+'">'+
							'<div class="rsItems">';
						/*
						if (val.featureId != "") {
							data +=	'<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>';
						} else if (val.idVersion != "") {
							data +=	'<div class="btnClone btnButton" title="Adicionar um novo registro para esta Versão" alt="Adicionar um novo registro para esta Versão">+</div>';
						} else if (val.idModel != "") {
							data +=	'<div class="btnClone btnButton" title="Adicionar uma nova Versão para este Modelo" alt="Adicionar um novo registro para esta Versão">+</div>';
						} else if (val.idManufacturer != "") {
							data +=	'<div class="btnClone btnButton" title="Adicionar um novo Modelo para esta Montadora" alt="Adicionar um novo Modelo para esta Montadora">+</div>';
						} else {
							data +=	'<div class="btnClone btnButton" title="Adicionar Montadora" alt="Adicionar Montadora">+</div>';
						}
						*/
						if (val.category == "feature") {
						data +=	'<div class="rsPicture"><img src="'+val.picture+'" /></div>';
						}
						data += '</div>'+
						'<a href="formDetails.php?vehicle='+val.idItem+'&category='+val.category+'&search=" class="resultContent">'+
							'<div class="rsManufacturer" title="'+val.manufacturerName+'">'+val.manufacturerName+'</div>';
						if (val.category == "model" || val.category == "version" || val.category == "feature") {
						data += '<div class="rsModel" title="'+val.modelName+'">'+val.modelName+'</div>';
						}
						if (val.category == "feature" || val.category == "version") {
						data += '<div class="rsVersion" title="'+val.versionName+'">'+val.versionName+'</div>';
						}
						if (val.category == "feature") {
						data +='<div class="rsYearModel" title="'+val.yearModel+'">'+val.yearModel+'</div>'+
							'<div class="rsYearProduced" title="'+val.yearProduced+'">'+val.yearProduced+'</div>'+
							'<div class="rsEngine" title="'+val.engine+'">'+val.engine+'</div>'+
							'<div class="rsGear" title="'+val.gear+'">'+val.gear+'</div>'+
							'<div class="rsFuel" title="'+val.fuel+'">'+val.fuel+'</div>'+
							'<div class="rsSteering" title="'+val.steering+'">'+val.steering+'</div>'+
							'<div class="rsSegment" title="'+val.segment1+'">'+val.segment1+'</div>'+
							'<div class="rsSegment" title="'+val.segment2+'">'+val.segment2+'</div>'+
							'<div class="rsSegment" title="'+val.segment3+'">'+val.segment3+'</div>';
						}
						data+='</a>'+
						'</li>';
						$(".resultData ul").append(data);
					});

				$(".resultContent").click(function(){
					openDetails($(this).attr("iddb"));
				});
			});
		},
		open: function() {
			//console.log("open");
		},
		close: function() {
			//console.log("close");
		}
	});

	$( "#txtManufacturerName" ).catcomplete({
		source: "api/index.php?type=askManuf",
		delay:1,
		minLength: 1,
		select: function( event, ui ) {
			//change id
			$("#manufacturerId").val(ui.item.id);
		}
	});
	$( "#txtModelName" ).catcomplete({
		source: "api/index.php?type=askModel",
		delay:1,
		minLength: 1,
		select: function( event, ui ) {
			//change id
			$("#modelId").val(ui.item.id);
		}
	});
	$( "#txtVersionName" ).catcomplete({
		source: "api/index.php?type=askVersion",
		delay:1,
		minLength: 1,
		select: function( event, ui ) {
			//change id
			$("#versionId").val(ui.item.id);
		}
	});

});




























