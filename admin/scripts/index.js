//global vars
var manufacturerIdGlobal, modelIdGlobal, versionIdGlobal, featureIdGlobal;


function submitForm(){
	fixFields();
}
$(document).ready(function(){
	
	$("#txtPicture").change(function(e){
        if(typeof FileReader == "undefined") return true;
        var elem = $(this);
        var files = e.target.files;
 
        for (var i = 0, f; f = files[i]; i++) {
            if (f.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        var image = e.target.result;
                        previewDiv = $('.image-preview', elem.parent());
                        bg_width = previewDiv.width();
                        bg_height = previewDiv.height();
                        previewDiv.css({
                            "background-image":"url("+image+")"
                        });
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
	});
	manufacturerIdGlobal = $("#manufacturerId").val();
	$(".btnNewForm").click(
	function() {
		$(".newChoice").show();
	});
	$(".newChoice").hover(function() {
		//do nothing
	},function(){
		$(this).hide();
	});

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
		if ($("#featureId").val().length > 0) { 
			cTable = "modelColor"; 
			manufacturerId = $("#featureId").val();
		} else { 
			cTable = "colorManufacturer"; 
			manufacturerId = $("#manufacturerId").val();
		}
		cName = $("#colorName").val(),
		cColor = $("#colorSelected").val(),
		cApp = $("#colorAplication").val(),
		cType = $("#colorType").val();
		cLength = $("#optionsColor span").length-1;
		if (cColor.length == "6") {
			$.getJSON('api/index.php?type=addColor&manufacturerId='+manufacturerId+'&chexa='+cColor+'&cname='+cName+'&capp='+cApp+'&ctype='+cType+'&table='+cTable, function(data) {
				//console.log(data[0].response,data[0].insertId);
				if(data[0].response == "true"){
					//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
					$("#optionsColor").append('<span><div class="delColor" onclick="deleteColor(this,\''+data[0].insertId+'\',\''+cTable+'\')">X</div><div class="divColor"><div style="background-color: #'+cColor+';"></div></div>'+cName+' - '+cApp+' - '+cType+'<input type="hidden" name="colorInputName'+cLength+'" value="'+cName+'" /><input type="hidden" name="colorInputColor'+cLength+'" value="'+cColor+'" /><input type="hidden" name="colorInputApp'+cLength+'" value="'+cApp+'" /><input type="hidden" name="colorInputType'+cLength+'" value="'+cType+'" /></span>');
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
		var flag=false;
		textTemp = $("#textAreaSerieAdd").val();
		text = textTemp.split(",");
		optionTemp = $('input[name=rdOptionsAdd]:checked').val();
		$("#resultSerie input:hidden")
		l = $("#optionsSerie span").length-2;
		for (i=0;i<text.length;i++){
			if (text[i].trim().length > 0){
				if ($("#lengthSerie").val() > 0){
					for (v=1;v<$("#lengthSerie").val();v++){
						if ($("#resultSerie #txtSerie"+v).val()) {
							if ($("#resultSerie #txtSerie"+v).val().length > 0 && text[i].length > 0 && $("#resultSerie #txtSerie"+v).val().toLowerCase() === text[i].toLowerCase()) {
								flag=true;
								alert("O item de nome: '"+text[i]+"' já existe nesta listagem e foi selecionado.");
								document.getElementById("rdSerie"+v).checked = true;
								break;
							}
						}
					}
				}
				if (flag==false){
					$("#resultSerie").prepend('<span><input type="checkbox" name="rdSerie'+l+'" id="rdSerie'+l+'" checked="true" value="s" /><input type="hidden" name="txtSerie'+l+'" id="txtSerie'+l+'" value="'+text[i].trim()+'" />'+text[i].trim()+'</span>');
					flag=false;
				} else {
					flag=false;
				}
				l++;
			}
		}
		$("#lengthSerie").val(l);
		$("#textAreaSerieAdd").val("");
		//captura opcao global
		//valida se tem varios
		//adiciona na lista + opcao selecionada
	});
	$("#btnRemoveAllSeries").click(function(){
		$("#lengthSerie").val("0");
		$("#resultSerie span").remove();
	});
	$("#btnOptionsAdd").click(function(){
		//dados
		optId = $("#txtOptionsId").val();
		codOpt = $("#txtOptionsCode").val();
		textTemp = $("#textAreaOptionsAdd").val();
		//name = $("#txtOptionsName").val();
		name = $("#txtOptionsName").parent().find("input.custom-combobox-input").val();
		price = $("#txtOptionsPrice").val();
		manufacturerId = $("#manufacturerId").val();
		text = textTemp.split(";");
		yesOpt=false;
		console.log(optId,codOpt ,textTemp,name ,price,manufacturerId,text,yesOpt);
		//add db
		if (optId != "") {
			console.log('asdsda&field=name&text='+name);
			/*$.getJSON('api/index.php?type=checkSearch&idItem='+optId+'&table=optionsManufacturer&field=name&text='+name, function(data) {
				if (data[0].response == "true"){
					yesOpt = true;
					newId = optId;
				} else {
					console.log('api/index.php?type=addOption&manufacturerId='+manufacturerId+'&codopt='+codOpt+'&name='+name+'&text='+textTemp+'&price='+price);
					$.getJSON('api/index.php?type=addOption&manufacturerId='+manufacturerId+'&codopt='+codOpt+'&name='+name+'&text='+textTemp+'&price='+price, function(data) {
						if(data[0].response == "true"){
							yesOpt=true;
							newId = data[0].insertId;
						}
					});
				}
				if (yesOpt == true) {
					*/
					l = $("#optionsOptions span").length-2;
					$("#resultOptions").prepend('<span>'+
							'<input type="checkbox" name="rdOpt'+l+'" checked="true" value="s" />'+
							'<input type="hidden" name="txtOpt'+l+'" value="'+optId+'" />'+
							'<label title="'+textTemp+'">'+name+'</label>'+
							'</span>');
					l++;
					$("#lengthOptions").val(l);
				//}
				$("#txtOptionsId").val("");
				$("#txtOptionsCode").val("");
				$("#textAreaOptionsAdd").val("");
				$("#txtOptionsName").val("");
				$("#txtOptionsPrice").val("");
			//});
		} else {
			console.log('api/index.php?type=addOption&manufacturerId='+manufacturerId+'&codopt='+codOpt+'&name='+name+'&text='+textTemp+'&price='+price);
			$.getJSON('api/index.php?type=addOption&manufacturerId='+manufacturerId+'&codopt='+codOpt+'&name='+name+'&text='+textTemp+'&price='+price, function(data) {
				if(data[0].response == "true"){
					yesOpt=true;
					newId = data[0].insertId;
				}
				if (yesOpt == true) {
					l = $("#optionsOptions span").length-2;
					$("#resultOptions").prepend('<span>'+
							'<input type="checkbox" name="rdOpt'+l+'" checked="true" value="s" />'+
							'<input type="hidden" name="txtOpt'+l+'" value="'+newId+'" />'+
							'<label title="'+textTemp+'">'+name+'</label>'+
							'</span>');
					l++;
					$("#lengthOptions").val(l);
				}
				$("#txtOptionsId").val("");
				$("#txtOptionsCode").val("");
				$("#textAreaOptionsAdd").val("");
				$("#txtOptionsName").val("");
				$("#txtOptionsPrice").val("");
			});
		}
		
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
		featureId = $("#featureId").val(), yearProduced = $("#txtYearProduced").val(), yearModel = $("#txtYearModel").val(), manufacturerId = $("#manufacturerId").val(), manufacturerName = $("#manufacturerName").val(), modelId = $("#modelId").val(), modelName = $("#modelName").val(), versionId = $("#versionId").val(), versionName = $("#versionName").val(), category = $("#category").val();
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
function deleteColor(obj,idColor,table) {
	console.log(obj,idColor,table);
	$.getJSON('api/index.php?type=removeColor&table='+table+'&idColor='+idColor, function(data) {
		if(data[0].response == "true"){
			//optionTemp = $('input[name=rdOptionsAdd]:checked').val();
			$(obj).parent().remove();
			$("#colorLength").val($("#optionsColor span").length-1);
		} else {
			console.log(data[0].reason);
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
function activeItem (item,table,obj) {
	$.getJSON('api/index.php?type=activeItem&idItem='+item+'&category='+table, function(data) {
		if(data[0].response == "true"){
			if (data[0].responseMsg == "active") {
				$(obj).parents("li.resultItem").removeClass("desactive");
			} else if (data[0].responseMsg == "desactive") {
				$(obj).parents("li.resultItem").addClass("desactive");
			}
		} else {
			console.log("Item não desativado"+data[0].errorMsg);
		}
	});
}
function checkSearch(id,text,field,table) {
	console.log("checking...",id,text,field,table);
	console.log('api/index.php?type=checkSearch&idItem='+id+'&table='+table+'&field='+field+'&text='+text);
	$.getJSON('api/index.php?type=checkSearch&idItem='+id+'&table='+table+'&field='+field+'&text='+text, function(data) {
		console.log(data[0].response);
		if(data[0].response == "true"){
			//console.log("true");
			return true;
		} else {
			//console.log("fala");
			return false;
		}
	});
}
//onKeyPress="return(formata_valor(this,'.',',',8,2,event))";
function format_price(fld, milSep, decSep, qtint, qtdec, e){
	// fld = campo receptor da digita
	// milsep = caracter para separar de milhar: "." ou ","
	// decsep = caracter para separar decimal: "," ou "."
	// qtint = quantidade de caracteres inteiros
	// qtdec = quantidade de caracteres decimais
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '-0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	if (whichCode == 13)
		return true;  // Enter
	key = String.fromCharCode(whichCode);  // Get key value from key code
	if (strCheck.indexOf(key) == -1)
		return false;  // Not a valid key
	len = fld.value.length;
	for(i = 0; i < len; i++)
		if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep))
			break;
	aux = '';
	for(; i < len; i++)
		if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
	aux += key;
	len = aux.length;
	
	if (len > (qtint + qtdec)) 
		return true; // digitou o m ximo de caracteres permitido

	if (len <= qtdec)
	{  // monta caracteres decimais
		fld.value = '0' + decSep;
		for (j = (qtdec - len - 1); j >= 0; j--)
  			fld.value = fld.value + '0';
		fld.value = fld.value + aux;
	}	
	else   // está digitando a parte inteira
	{  
		aux2 = '';
	  	for (j = 0, i = len - (qtdec + 1) ; i >= 0; i--)
		{
    		if (j == 3) // checa separação de milhares
			{  
      			aux2 += milSep;
      			j = 0;
   			}
    		aux2 += aux.charAt(i);
    		j++;
  		}
	  	fld.value = '';
  		len2 = aux2.length;  // só a parte inteira
  		for (i = len2 - 1; i >= 0; i--)
  			fld.value += aux2.charAt(i);
  		fld.value += decSep + aux.substr((len - qtdec), len);
  	}
	return false;
}
//  End -->

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
$.widget( "custom.combobox", {
  _create: function() {
    this.wrapper = $( "<span>" )
      .addClass( "custom-combobox" )
      .insertAfter( this.element );

    this.element.hide();
    this._createAutocomplete();
    this._createShowAllButton();
  },

  _createAutocomplete: function() {
    var selected = this.element.children( ":selected" ),
      value = selected.val() ? selected.text() : "",
      nameInput = (selected.context.id);
    this.input = $( "<input>" )
      .attr("name",nameInput)
      .appendTo( this.wrapper )
      .val( value )
      .attr( "title", "" )
      .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
      .autocomplete({
        delay: 0,
        minLength: 0,
        source: $.proxy( this, "_source" )
      })
      .tooltip({
        tooltipClass: "ui-state-highlight"
      });
    this._on( this.input, {
      autocompleteselect: function( event, ui ) {
      	//TODO: change next input value
      	
        ui.item.option.selected = true;
        this._trigger( "select", event, {
          item: ui.item.option
        });
        switch ($(ui.item.option.parentElement).attr("id")) {
      		case "manufacturerName":
	      		var optTemp;
	  			$.getJSON('api/index.php?type=askModel&mainId='+ui.item.option.value, function(data) {
					$.each(data, function(key, val) {
						optTemp += '<option value="'+val.id+'" >'+val.label+'</option>';
					});
					$("#modelName option").remove();
					$("#modelName").append(optTemp);
					$("#modelName").parent().find("input").val("");
					$("#modelId").val("");

					$("#versionName option").remove();
					$("#versionName").append(optTemp);
					$("#versionName").parent().find("input").val("");
					$("#versionId").val("");
				});
				$("#manufacturerId").val(ui.item.option.value);
	      		break;
      		case "modelName":
      			var optTemp;
	  			$.getJSON('api/index.php?type=askVersion&mainId='+ui.item.option.value, function(data) {
					$.each(data, function(key, val) {
						optTemp += '<option value="'+val.id+'" >'+val.label+'</option>';
					});
					$("#versionName option").remove();
					$("#versionName").append(optTemp);
					$("#versionName").parent().find("input").val("");
				});
				$("#modelId").val(ui.item.option.value);
	      		break;
      		case "versionName":
      			//change modelName
      			$("#versionId").val(ui.item.option.value);
	      		break;
			case "txtOptionsName":
				var optTemp;
				console.log('api/index.php?type=askOptionValue&optId='+ui.item.option.value);
	  			$.getJSON('api/index.php?type=askOptionValue&optId='+ui.item.option.value, function(data) {
					$.each(data, function(key, val) {
						$("#txtOptionsCode").val(val.code);
						$("#txtOptionsCode").attr("disabled",true);
						$("#txtOptionsPrice").val(val.price);
						$("#txtOptionsPrice").attr("disabled",true);
						$("#textAreaOptionsAdd").text(val.optValue);
						$("#textAreaOptionsAdd").attr("disabled",true);
					});
				});
				$("#txtOptionsId").val(ui.item.option.value);
	    		break;
      	}
      },
      autocompletechange: "_removeIfInvalid",
      focus: "_focus"
    });
  },

  _createShowAllButton: function() {
    var input = this.input,
      wasOpen = false;

    $( "<a>" )
      .attr( "tabIndex", -1 )
      .attr( "title", "Mostrar todas as opções" )
      .tooltip()
      .appendTo( this.wrapper )
      .button({
        icons: {
          primary: "ui-icon-triangle-1-s"
        },
        text: false
      })
      .removeClass( "ui-corner-all" )
      .addClass( "custom-combobox-toggle ui-corner-right" )
      .mousedown(function() {
        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
      })
      .click(function() {
        input.focus();

        // Close if already visible
        if ( wasOpen ) {
          return;
        }

        // Pass empty string as value to search for, displaying all results
        input.autocomplete( "search", "" );
      });
  },

  _source: function( request, response ) {
    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
    response( this.element.children( "option" ).map(function() {
      var text = $( this ).text();
      if ( this.value && ( !request.term || matcher.test(text) ) )
        return {
          label: text,
          value: text,
          option: this
        };
    }) );
  },

  _removeIfInvalid: function( event, ui ) {
  	//TODO: apagar o campo id se o que for digitado nao bater
    //return;

    ////////////////--------IF OPTION DONT MATCH, CLEAR THE FIELD ---------///////////////
    ////////////---------- BEGIN CLEAR INVALID FIELD
    
    // Selected an item, nothing to do
    if ( ui.item ) {
    	//$(ui.item.option.parentElement).attr("name")
    	//console.log(ui.item.option.value,$(ui.item.option.parentElement).attr("name"));
      return;
    }
    // Search for a match (case-insensitive)
    var value = this.input.val(),
      valueLowerCase = value.toLowerCase(),
      valid = false;
    this.element.children( "option" ).each(function() {
      if ( $( this ).text().toLowerCase() === valueLowerCase ) {
        this.selected = valid = true;
        return false;
      }
    });

    // Found a match, nothing to do
    if ( valid ) {
      return;
    }

	switch ($(this.element)[0].name) {
    	case "manufacturerName":
    		$("#manufacturerId").val("");
    		$("#modelId").val("");
    		$("#versionId").val("");
	    	break;
    	case "modelName":
    		$("#modelId").val("");
    		$("#versionId").val("");
    		break;
		case "versionName":
			$("#versionId").val("");
			break;
		case "txtOptionsName":
			$("#txtOptionsId").val("");
			$("#textAreaOptionsAdd").attr("disabled",false);
			$("#txtOptionsCode").attr("disabled",false);
			$("#txtOptionsPrice").attr("disabled",false);
			break;
    }
    /*
    // Remove invalid value
    this.input
      .val( "" )
      .attr( "title", value + " nenhum item encontrado" )
      .tooltip( "open" );
    this.element.val( "" );
    this._delay(function() {
      this.input.tooltip( "close" ).attr( "title", "" );
    }, 2500 );
    this.input.data( "ui-autocomplete" ).term = "";
    */
    //////////////---------- END CLEAR INVALID FIELD
  },
  _focus: function( event, ui ) {
	/*
  	console.log(event,ui);
		$("#textAreaOptionsAdd").val(ui.item.optValue);
		$("#txtOptionsId").val(ui.item.id);
		$("#txtOptionsPrice").val(ui.item.price);
		$("#txtOptionsCode").val(ui.item.code);
*/
	},

  _destroy: function() {
    this.wrapper.remove();
    this.element.show();
  }
});
$(function() {
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	}
	$( "#askInput" ).catcomplete({
		source: "api/index.php?type=askInput",
		delay:5,
		minLength: 0,
		select: function( event, ui ) {
			log( ui.item ?
				"Selected: " + ui.item.id + " aka " + ui.item.value + " category " + ui.item.category:
				"Nothing selected, input was " + this.value );
			//each category will print a diferent result w/ links
			console.log('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table);
			$.getJSON('api/index.php?type=terms&term='+ui.item.value+'&idField='+ui.item.id+'&table='+ui.item.table, function(data) {
				$(".resultData ul li").remove();
					$.each(data, function(key, val) {
						if (val.active == "n") {
							data = '<li class="resultItem desactive" idDB="'+val.featureId+'">';
						} else {
							data = '<li class="resultItem " idDB="'+val.featureId+'">';
						}
						data += '<div class="rsItems">';
						switch (val.category) {
							case "manufacturer":
								data += '<a class="btnClone btnButton" href="formDetails.php?category=model&action=new&vehicle='+val.idItem+'" title="Incluir Modelo para esta Montadora" alt="Incluir Modelo para esta Montadora">Novo modelo</a>';
								data += '<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem('+val.idItem+',\'manufacturer\',this)"></div>';
							break;
							case "model":
								data += '<a class="btnClone btnButton" href="formDetails.php?category=version&action=new&vehicle='+val.idItem+'" title="Incluir Versão para este Modelo" alt="Incluir Versão para este Modelo">Nova versão</a>';
								data += '<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem('+val.idItem+',\'model\',this)"></div>';
							break;
							case "version":
								data += '<a class="btnClone btnButton" href="formDetails.php?category=feature&action=new&vehicle='+val.idItem+'" title="Incluir Ficha Técnica para esta Versão" alt="Incluir Ficha Técnica para esta Versão">Nova Ficha</a>';
								data += '<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem('+val.idItem+',\'version\',this)"></div>';
							break;
							case "feature":
								data += '<a class="btnClone btnButton" href="formDetails.php?category=feature&action=clone&vehicle='+val.idItem+'" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>';
								data += '<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem('+val.idItem+',\'feature\',this)"></div>';
							break;
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
		open: function(event,ui) {
			console.log("open");
		},
		close: function() {
			//console.log("close");
		}
	});

	$( "#manufacturerName" ).catcomplete({
		source: "api/index.php?type=askManuf",
		delay:1,
		minLength: 0,
		autoFocus: true,
		select: function( event, ui ) {
			//change id
			$("#manufacturerId").val(ui.item.id);
			manufacturerIdGlobal = ui.item.id;
		}
	});
	$("#modelName").focusin(function() {
		$( "#modelName" ).catcomplete({
			source: "api/index.php?type=askModel&mainId="+$("#manufacturerId").val(),
			delay:1,
			minLength: 0,
			select: function( event, ui ) {
				//change id
				$("#modelId").val(ui.item.id);
			}
		});
	});
	$("#versionName").focusin(function() {
		$( "#versionName" ).catcomplete({
			source: "api/index.php?type=askVersion&mainId="+$("#modelId").val(),
			delay:1,
			minLength: 0,
			select: function( event, ui ) {
				//change id
				$("#versionId").val(ui.item.id);
			}
		});
	});
	$( "#colorType" ).catcomplete({
		source: "json/colorAplication.json",
		delay:1,
		minLength: 0,
		select: function( event, ui ) {
			//change id
			//$("#versionId").val(ui.item.id);
		}
	});
	$("#txtOptionsName").focusin(function(){

		$( "#txtOptionsName" ).catcomplete({
			source: "api/index.php?type=askOption&manufacturerId="+$("#manufacturerId").val(),
			delay:1,
			minLength: 0,
			select: function( event, ui ) {
				//change id
				//$("#versionId").val(ui.item.id);
			},
			focus: function( event, ui ) {
				$("#textAreaOptionsAdd").val(ui.item.optValue);
				$("#txtOptionsId").val(ui.item.id);
				$("#txtOptionsPrice").val(ui.item.price);
				$("#txtOptionsCode").val(ui.item.code);
			}
		});
	});
	$( "#manufacturerName" ).combobox();
	$( "#modelName" ).combobox();
	$( "#versionName" ).combobox();
	$( "#txtSegmentName" ).combobox();
	$( "#txtFuel" ).combobox();
	$( "#txtOptionsName" ).combobox();
	$( "#colorAplication" ).combobox();
	$( "#colorType" ).combobox();
	
//	codOpt = $("#txtOptionsCode").val();
//		name = $("#txtOptionsName").val();
//		manufacturerId = $("#manufacturerId").val();
});


























