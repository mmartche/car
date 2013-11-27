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
function openDetails(idFeature){
	console.log(idFeature);
}
function filterFields(fieldName,obj){
	//se o campo do mesmo class nao tiver o texto digitado, some
	$(".resultItem").removeClass("hide");
	lengthFields = $("."+fieldName).length;
	for (i=0;i<lengthFields;i++){
		var tempField = $("."+fieldName)[i].innerText;
		if (tempField.toLowerCase().indexOf(obj.value.toLowerCase()) < 0){
			t = $("."+fieldName)[i].parentElement.parentElement;
			console.log(t);
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
						data = '<li class="resultItem" idDB="'+val.idFeature+'">'+
							'<div class="rsItems">';
						if (val.idFeature != "") {
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
						data +=	'<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>'+
							'</div>'+
						'<a href="formDetails.php?vehicle='+val.idItem+'&category='+val.category+'&search=" class="resultContent">'+
							'<div class="rsManufacturer" title="'+val.manufacturerName+'">'+val.manufacturerName+'</div>'+
							'<div class="rsModel" title="'+val.modelName+'">'+val.modelName+'</div>'+
							'<div class="rsVersion" title="'+val.versionName+'">'+val.versionName+'</div>'+
							'<div class="rsYear" title="'+val.yearProduced+'">'+val.yearProduced+'</div>'+
							'<div class="rsYear" title="'+val.yearModel+'">'+val.yearModel+'</div>'+
							'<div class="rsPicture"><img src="'+val.picture+'" /></div>'+
							'<div class="rsSegment"></div>'+
							'<div class="rsGear"></div>'+
							'<div class="rsOil"></div>'+
							'<div class="rsAvaliable">Sim</div>'+
						'</a>'+
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
});