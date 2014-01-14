$(document).ready (function(){
	$(".inputExpForm").click(function(){
		$(this).parent().toggleClass("filterChecked");
		//toggle class to checked
		//check if have some input checked to show search button
	});


});

function checkItem (input){
    if (input.toLowerCase() == "s"){
        return '<li class="liFilterItem yes">X</li>';
    } else {
        return '<li class="liFilterItem no">-</li>';
    }
}
function excluirComparacao(obj){
    $(obj).parent(".exploradorTabelaGridCarro").remove();
    number = $(obj).parent().children(".exploradorTabelaCarroNumeracao").text();
    $(".column")[number].remove();
    qnt = $(".exploradorTabelaCarroNumeracao").length;
    for (i = 0; i < qnt; i++) {
        console.log(i,$(".exploradorTabelaCarroNumeracao")[i]);
        $(".exploradorTabelaCarroNumeracao")[i].innerText = i+1;
    };
}

function addFilter (obj,idModel) {
	var qntSerie=34, qntMotor=5, qntGeral=4, qntDesempenho=4, qntDimensao=4;
	//ve qntos items ja estao no resultado
	//search info
    console.log('../admin/api/index.php?type=askExplorer&idModel='+idModel);
	$.getJSON('../admin/api/index.php?type=askExplorer&idModel='+idModel, function(data) {
		console.log('888888',data[0].response);
		if(data[0].response == "true"){
            //count cars showed
            var carsLength = $(".column").length;
            var divTitleCar = '<div class="exploradorTabelaGridCarro veiculo'+carsLength+'">'+
                '<div class="exploradorTabelaGridCarroOculta"></div>'+
                '<div class="excluirComparacao" id="excluirComparacao'+carsLength+'" onclick="excluirComparacao(this)" >x</div>'+
                '<div class="exploradorTabelaCarroNumeracao">'+carsLength+'</div>'+
                '<div class="exploradorTabelaCarroImg"><img alt="'+data[0].modelName+'" title="'+data[0].modelName+'" src="http://carsale.uol.com.br/foto/'+data[0].picture+'_p.jpg"></div>'+
                '<div class="exploradorTabelaCarroModelo">'+data[0].modelName+' - '+data[0].versionName+'</div>'+
                '<div class="exploradorTabelaCarroValor">R$ '+data[0].price+'</div>'+
            '</div>';
            $(".exploradorTabelaLineCarros").append(divTitleCar);

            divResultCar = '<div class="column">'+'<ul class="descItems">';
            divResultCar += checkItem(data[0].dualFrontAirBag);
            divResultCar += checkItem(data[0].electricSteering);
            divResultCar += checkItem(data[0].hydraulicSteering);
            divResultCar += checkItem(data[0].airConditioning);
            divResultCar += checkItem(data[0].leatherSeat);
            divResultCar += checkItem(data[0].alarm);
            divResultCar += checkItem(data[0].autoGear);
            divResultCar += checkItem(data[0].absBrake);
            divResultCar += checkItem(data[0].traction4x4);
            divResultCar += checkItem(data[0].hotAir);
            divResultCar += checkItem(data[0].heightAdjustment);
            divResultCar += checkItem(data[0].rearSeatSplit);
            divResultCar += checkItem(data[0].bluetoothSpeakerphone);
            divResultCar += checkItem(data[0].bonnetSea);
            divResultCar += checkItem(data[0].onboardComputer);
            divResultCar += checkItem(data[0].accelerationCounter);
            divResultCar += checkItem(data[0].rearWindowDefroster);
            divResultCar += checkItem(data[0].sidesteps);
            divResultCar += checkItem(data[0].fogLamps);
            divResultCar += checkItem(data[0].xenonHeadlights);
            divResultCar += checkItem(data[0].integratedGPSPanel);
            divResultCar += checkItem(data[0].rearWindowWiper);
            divResultCar += checkItem(data[0].bumper);
            divResultCar += checkItem(data[0].autopilot);
            divResultCar += checkItem(data[0].bucketProtector);
            divResultCar += checkItem(data[0].roofRack);
            divResultCar += checkItem(data[0].cdplayerUSBInput);
            divResultCar += checkItem(data[0].headlightsHeightAdjustment);
            divResultCar += checkItem(data[0].rearviewElectric);
            divResultCar += checkItem(data[0].alloyWheels);
            divResultCar += checkItem(data[0].rainSensor);
            divResultCar += checkItem(data[0].parkingSensor);
            divResultCar += checkItem(data[0].isofix);
            divResultCar += checkItem(data[0].sunroof);
            divResultCar += checkItem(data[0].electricLock);
            divResultCar += checkItem(data[0].electricWindow);
            divResultCar += checkItem(data[0].rearElectricWindow);
            divResultCar += checkItem(data[0].steeringWheelAdjustment);
            divResultCar += '</ul>'+
            	'<div class="headerTitle"></div>'+
		        '<ul class="descItems">'+
		        	'<li>'+data[0].engine+'</li>'+
		        	'<li>'+data[0].feeding+'</li>'+
                    '<li>'+data[0].fuel+'</li>'+
                    '<li>'+data[0].powerMax+'</li>'+
		        	'<li>'+data[0].torque+'</li>'+
	        	'</ul>'+
                '<div class="headerTitle"></div>'+
                '<ul class="descItems">'+
                    '<li>'+data[0].acceleration+'</li>'+
                    '<li>'+data[0].speedMax+'</li>'+
                    '<li>'+data[0].consumptionCity+'</li>'+
                    '<li>'+data[0].consumptionRoad+'</li>'+
                '</ul>'+
                '<div class="headerTitle"></div>'+
                '<ul class="descItems">'+
                    '<li>'+data[0].dimensionLength+'</li>'+
                    '<li>'+data[0].dimensionHeight+'</li>'+
                    '<li>'+data[0].dimensionWidth+'</li>'+
                    '<li>'+data[0].dimensionSignAxes+'</li>'+
                '</ul>'+
                '<div class="headerTitle"></div>'+
                '<ul class="descItems">'+
                    '<li>'+data[0].yearModel+'</li>'+
                    '<li>'+data[0].yearProduced+'</li>'+
                    '<li>'+data[0].doors+'</li>'+
                    '<li>'+data[0].passagers+'</li>'+
                '</ul>'+
            '</div>';
            $("#resultFilter").append(divResultCar);

            var divFooterCar = '<div class="exploradorTabelaGridBase veiculo0">'+
                '<div class="exploradorTabelaBtnFicha"><a href="/classificado/fichatecnica/68139" id="fichaTecnica0" style="display: inline;">Ficha Técnica</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="noticia0" class="noticia" style="display: inline;">Testes e Notícias</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="opiniao0" class="opiniao">Opinião do Dono</a></div>'+
            '</div>';
			//$(".exploradorTabelaLineBtn").append(divFooterCar);
		} else {
			console.log(data[0].reason);
		}
	});
	//add to result
	// add class no filtro
}
function toggleClass(obj,name,attr){
	$(obj).toggleClass(name);
}




























