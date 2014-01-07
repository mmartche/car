$(document).ready (function(){
	$(".inputExpForm").click(function(){
		$(this).parent().toggleClass("filterChecked");
		//toggle class to checked
		//check if have some input checked to show search button
	});


});

function addFilter (obj,idModel) {
	var qntSerie=34, qntMotor=5, qntGeral=4, qntDesempenho=4, qntDimensao=4;
	//ve qntos items ja estao no resultado
	//search info
	$.getJSON('../admin/api/index.php?type=askExplorer&idModel='+idModel, function(data) {
		//console.log(data[0].response,data[0].insertId);
		if(data[0].response == "true"){
			$(".exploradorTabelaLineCarros").append('<div class="exploradorTabelaGridCarro veiculo3">'+
                '<div class="exploradorTabelaGridCarroOculta"></div>'+
                '<div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao3" style="display: none;">x</a></div>'+
                '<div class="exploradorTabelaCarroNumeracao">4</div>'+
                '<div class="exploradorTabelaCarroImg"><img alt="" title="" src=""></div>'+
                '<div class="exploradorTabelaCarroModelo"></div>'+
                '<div class="exploradorTabelaCarroValor"></div>'+
            '</div>');
			$("#resultFilter").append('<div class="column">'+
            	'<ul class="descItems">'+
	            	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">-</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem yes">X</li>'+
                	'<li class="liFilterItem no">X</li>'+
                	'<li class="liFilterItem">X</li>'+
            	'</ul>'+
            	'<div class="headerTitle"></div>'+
		        '<ul class="titleItems">'+
		        	'<li>Motor</li>'+
		        	'<li>Alimentacao</li>'+
		        	'<li>Combustivel</li>'+
		        	'<li>Potencia</li>'+
	        	'</ul>'+
            '</div>');
			$(".exploradorTabelaLineBtn").append('<div class="exploradorTabelaGridBase veiculo0">'+
                '<div class="exploradorTabelaBtnFicha"><a href="/classificado/fichatecnica/68139" id="fichaTecnica0" style="display: inline;">Ficha Técnica</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="noticia0" class="noticia" style="display: inline;">Testes e Notícias</a></div>'+
                '<div class="exploradorTabelaBtnFicha"><a id="opiniao0" class="opiniao">Opinião do Dono</a></div>'+
            '</div>');
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




























