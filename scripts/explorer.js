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
    $(".exploradorTabelaGridBase")[number].remove();
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
    idVersion = $(obj).val();
    var carsLength = $(".column").length;
    ///console.log($(obj),'../admin/api/index.php?type=askExplorer&idModel='+idModel+'&idVersion='+idVersion);
    $.getJSON('../admin/api/index.php?type=askExplorer&idModel='+idModel+'&idVersion='+idVersion, function(data) {
    if (carsLength < 6) {
        // console.log('888888',data[0].response);
        if(data[0].response == "true"){
            //count cars showed
            if ($(obj).attr("id") == "optVersion") { carsLength--; }
            var divTitleCar = '<div class="exploradorTabelaGridCarro veiculo'+carsLength+'">'+
                '<div class="exploradorTabelaGridCarroOculta"></div>'+
                '<div class="excluirComparacao" id="excluirComparacao'+carsLength+'" onclick="excluirComparacao(this)" >x</div>'+
                '<div class="exploradorTabelaCarroNumeracao">'+carsLength+'</div>'+
                '<div class="exploradorTabelaCarroImg"><img alt="'+data[0].modelName+'" title="'+data[0].modelName+'" src="http://carsale.uol.com.br/foto/'+data[0].picture+'_p.jpg"></div>'+
                '<div class="exploradorTabelaCarroModelo">'+data[0].modelName+'</div>'+
                '<div class="exploradorTabelaCarroValor">R$ '+data[0].price+'</div>'+
                '<div class="exploradorOptVersion"><select id="optVersion" onchange="addFilter(this,\''+data[0].modelId+'\',\''+data[0].versionId+'\')"><option value="0">'+data[0].versionName+'</option>';
                if (data[0].sameModel.length > 1 && data[0].sameModel) {
                    $.each( data[0].sameModel, function( index, item ) {
                        divTitleCar += '<option value='+item.id+'>'+item.name+'</option>';
                    });
                }
                divTitleCar += '</select></div>'+
            '</div>';
            
            divResultCar = '<div class="column"><div class="headerTitle"></div>'+
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
                    '<li>'+data[0].countryOrigin+'</li>'+
                    '<li>'+data[0].warranty+'</li>'+
                '</ul>';
            divResultCar += '<div class="headerTitle"></div><ul class="descItems">';
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
            divResultCar += checkItem(data[0].radio);
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
                '<ul class="descItems">';

            if (data[0].options) {
                $.each( data[0].options, function( index, item ) {
                    divResultCar += '<li class="liFilterItem optList"><b>'+item.name+'</b><br>'+item.items+'<br>R$ '+item.price+'</li>';
                });
            }
            divResultCar += '</ul></div>';

            var divFooterCar = '<div class="exploradorTabelaGridBase veiculo">'+
                '<div class="exploradorTabelaBtnFicha"><a data-toggle="modal" data-target="#modalFeatureItem'+data[0].featureId+'" id="fichaTecnica'+data[0].featureId+'" style="display: inline;">Ficha Técnica</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="noticia" class="noticia" style="display: inline;">Testes e Notícias</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="opiniao" class="opiniao">Opinião do Dono</a></div>'+
            '</div>';


            modalTemp = '<div class="modal fade" id="modalFeatureItem'+data[0].featureId+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
                  '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                      '<div class="modal-header">'+
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                        '<h4 class="modal-title" id="myModalLabel">'+data[0].modelName+' - '+data[0].versionName+'</h4>'+
                      '</div>'+
                      '<div class="modal-body">'+
                        '<div class="dealerFichaTecnicaBgInterno">'+
                            '<div class="dealerFichaTecnicaTitulo">Ficha Técnica</div>'+
                            '<div class="dealerFichaTecnicaImg"><img src="http://carsale.uol.com.br/foto/'+data[0].picture+'_g.jpg"></div>'+
                            '<div class="dealerFichaTecnicaTxtCarro"></div>'+
                            '<div class="dealerFichaTecnicaTxtLegenda">Foto meramente ilustrativa</div>'+
                            '<div class="dealerFichaTecnicaTituloDesc">Itens de série inclusos</div>'+
                            '<div class="descriptionItem">';
                            if (data[0].serieItems ) {
                                $.each( data[0].serieItems, function( index, item ) {
                                    modalTemp += '<div class="descItemSerie">'+item.description+'</div>';
                                });
                            } else {
                                modalTemp += '<div class="descItemSerie">Nenhum item encontrado</div>';
                            }
                modalTemp += '</div>'+

                            '<div class="dealerFichaTecnicaTituloDesc">Opcionais</div>'+
                            '<div class="descriptionItem">';
                            if (data[0].options ) {
                                $.each( data[0].options, function( index, item ) {
                                    modalTemp += '<div class="descItemSerie"><b>'+item.name+'</b><br />'+item.items+'<br />R$ '+item.price+'</div>';
                                });
                            } else {
                                modalTemp += '<div class="descItemSerie">Nenhum item encontrado</div>';
                            }
                modalTemp += '</div>'+

                            '<div class="dealerFichaTecnicaTituloDesc">Cores disponíveis</div>'+
                            '<div class="descriptionItem">';
                            if (data[0].colors ) {
                                $.each( data[0].colors, function( index, item ) {
                                    modalTemp += '<div class="descItemSerie">'+item.hexa+'</div>';
                                });
                            } else {
                                modalTemp += '<div class="descItemSerie">Nenhum item encontrado</div>';
                            }
                modalTemp += '</div>'+

                            '</div>'+
                        '</div>'+
                      '<div class="modal-footer">'+
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar  </button>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>';

            if ($(obj).attr("id") == "optVersion") {
                tableNum = $(obj).parentsUntil("#exploradorTabelaGridCarro").children(".exploradorTabelaCarroNumeracao").text();
//                console.log(tableNum);
                $(".exploradorTabelaGridCarro")[tableNum].remove();
                $(".column")[tableNum].remove();
                $(".exploradorTabelaGridBase")[tableNum].remove();
            }
            if (carsLength < 5) {
                $(".exploradorTabelaLineCarros").append(divTitleCar);
                $("#resultFilter").append(divResultCar);
                $(".exploradorTabelaLineBtn").append(divFooterCar);
                $("#modalFeature").append(modalTemp);
            }

                counterExp = 1;
                $.each($(".exploradorTabelaCarroNumeracao") , function( index, item ) {
                    //$(".exploradorTabelaGridCarro").addClass('veiculo'+tableNum).remove();
                    $(item).text(counterExp);
                    counterExp++;
                });
        } else {
            console.log(data[0].reason);
        }
        /*
    		$("#optVersion").change(function(){
                console.log($(this).val());
            });*/
    }
	});
	//add to result
	// add class no filtro
}
function toggleClass(obj,name,attr){
	$(obj).toggleClass(name);
}




























