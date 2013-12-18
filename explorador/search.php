<?
session_start();
$_SESSION["tokenTime"] = time();
include ("../scripts/conectDB.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/50192_124345857613786_740480673_q.jpg" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--meta name="google-site-verification" content="htc5j0tj4c1Fsee2bSoUs42QzGEcsSiviny-uUICt6Y" />
	<meta property="fb:admins" content="100000868647048" />
	<meta property="fb:page_id" content="124345857613786" />
	<meta name="msvalidate.01" content="270B7706358DDE8D5FA26B2B7522BC42" /-->
	
	<!--meta http-equiv="Pragma" content="no-cache"/-->
	<meta name="robots" content="index, follow" />
	<meta name="description" content="Carsale,o maior e mais completo site de compra e venda direta de veículos na internet, com garantia de fábrica e entrega pela concessionária,Carros novos, Classificados, Notícias Automotivas, Testes e Opinião do Dono" />
	<meta name="keywords" content="Carsale notícias,Opinião do dono,Opiniao do dono,Classificados,Carros novos,carros okm,Anúncio,Testes / Comparativos,Avaliação de carros,Oferta de carros,Venda de carros" />
	<title>Carsale</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Search The" />
	<script type="text/javascript" src="../scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="../scripts/scriptHome.js"></script>

	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../styles/home.css" />
	<link rel="stylesheet" type="text/css" href="../styles/explorador.css" />

</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>

<div id="uolBar"></div>
<header>
	<?
	include ("../includes/logoBanner.php");
	include ("../includes/menu.php");
	include ("../includes/socialBar.php");
	?>
	
</header>
<div class="content">
	<div class="columnMiddle">
		<div class="contentMiddle">
			<h2 class="expTitle"><b>Explorador Carsale</b><span>Encontre o carro perfeito para você</span></h2>
			
<div id="formularioSegmentos" class="formExplorer">
	<div class="exploradorTitulo">Preencha um ou mais campos:</div>
	<div class="exploradorBgInterno">
	    <form action="/classificado/explorador/buscar" name="explorador" id="formBusca" method="post" >
	        <div class="exploradorGridFiltros">
	            <div class="exploradorGridFiltrosColunaB">
	                <div class="exploradorGridFiltrosColunaBTitulo">Qual tipo de carro você quer ?</div>
	                <div class="exploradorGridFiltrosGridImg">
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_entrada" name="filtroVersaoVeiculo.segmentos[].id" value="3">
	                        <a id="entrada" class="labelSegmento" href=""><img id="imgentrada" src="/classificado/img/btnFiltroCategoriaEntrada.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_hatch" name="filtroVersaoVeiculo.segmentos[].id" value="1">
	                        <a id="hatch" class="labelSegmento" href=""><img id="imghatch" src="/classificado/img/btnFiltroCategoriaHatch.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_seda" name="filtroVersaoVeiculo.segmentos[].id" value="2">
	                        <a id="seda" class="labelSegmento" href=""><img id="imgseda" src="/classificado/img/btnFiltroCategoriaSeda.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_minivan" name="filtroVersaoVeiculo.segmentos[].id" value="6">
	                        <a id="minivan" class="labelSegmento" href=""><img id="imgminivan" src="/classificado/img/btnFiltroCategoriaMinivan.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_perua" name="filtroVersaoVeiculo.segmentos[].id" value="7">
	                        <a id="perua" class="labelSegmento" href=""><img id="imgperua" src="/classificado/img/btnFiltroCategoriaPerua.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_picape" name="filtroVersaoVeiculo.segmentos[].id" value="8">
	                        <a id="picape" class="labelSegmento" href=""><img id="imgpicape" src="/classificado/img/btnFiltroCategoriaPicape.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_suv" name="filtroVersaoVeiculo.segmentos[].id" value="10">
	                        <a id="suv" class="labelSegmento" href=""><img id="imgsuv" src="/classificado/img/btnFiltroCategoriaSuv.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_coupe" name="filtroVersaoVeiculo.segmentos[].id" value="4">
	                        <a id="coupe" class="labelSegmento" href=""><img id="imgcoupe" src="/classificado/img/btnFiltroCategoriaAventureiro.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_esportivo" name="filtroVersaoVeiculo.segmentos[].id" value="5">
	                        <a id="esportivo" class="labelSegmento" href=""><img id="imgesportivo" src="/classificado/img/btnFiltroCategoriaEsportivo.gif"></a>
	                    </div>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="segmento" id="check_utilitario" name="filtroVersaoVeiculo.segmentos[].id" value="9">
	                        <a id="utilitario" class="labelSegmento" href=""><img id="imgutilitario" src="/classificado/img/btnFiltroCategoriaUtilitario.gif"></a>
	                    </div>
	                </div>
	                <div class="exploradorGridFiltrosBtnBuscar">
	                    <input type="submit" value="dd" id="submitButton">
	                    <a class="buscar" href="" onclick="$('#submitButton').click();"><img border="0" alt="Buscar" title="Buscar" name="exploradorBtnBuscar" src="/classificado/img/exploradorBtnBuscar.gif"></a>
	                </div>
	            </div>

	            <div class="exploradorGridFiltrosColunaA" >
	                <div class="exploradorGridFiltrosColunaATitulo">Quanto você pretende gastar ?</div>
	                <div class="exploradorGridFiltrosInputText">
	                    <div class="exploradorGridFiltrosInputTextLine">
	                        <div class="exploradorGridFiltrosInputTextTxt"><label for="valorInicial">De:</label></div>
	                        <fieldset class="exploradorGridFiltroInput">
	                            <input type="text" class="exploradorGridFiltroInputBox numeric numericFormated" id="valorInicial">
	                            <input type="hidden" name="filtroVersaoVeiculo.valorInicial" id="valorInicialHidden">
	                        </fieldset>
	                    </div>
	                    <div class="exploradorGridFiltrosInputTextLine">
	                        <div class="exploradorGridFiltrosInputTextTxt"><label for="valorFinal">Até:</label></div>
	                        <fieldset class="exploradorGridFiltroInput">
	                            <input type="text" class="exploradorGridFiltroInputBox numeric numericFormated" id="valorFinal">
	                            <input type="hidden" name="filtroVersaoVeiculo.valorFinal" id="valorFinalHidden">
	                        </fieldset>
	                    </div>
	                </div>
	                <div class="exploradorGridFiltrosColunaATitulo">Quais opcionais não podem faltar ?</div>
	                <div class="exploradorGridFiltrosChecks">
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.arCondicionado" id="arCondicionado"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="arCondicionado">Ar Condicionado</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.automatico" id="automatico"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="automatico">Câmbio automático</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.direcaoHidraulica" id="direcaoHidraulica"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="direcaoHidraulica">Direção Hidráulica</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.freioAbs" id="freioAbs"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="freioAbs">Freios ABS</label></div>
	                    </div>
	                </div>
	                <div class="exploradorGridFiltrosChecks">
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.airBagDuploFrontal" id="airBag"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="airBag">Airbag Duplo Frontal</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.radioCdPlayerEntradaUsb" id="radioUsb"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="radioUsb">Rádio CD com USB</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.travaEletrica" id="travaEletrica"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="travaEletrica">Travas Elétricas</label></div>
	                    </div>
	                    <div class="exploradorGridFiltrosChecksLine">
	                        <div class="exploradorGridFiltrosCheckBox"><input type="checkbox" class="opcionais" name="filtroVersaoVeiculo.vidroEletrico" id="vidroEletrico"></div>
	                        <div class="exploradorGridFiltrosCheckTxt"><label for="vidroEletrico">Vidros Elétricos</label></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </form>
	</div>
</div>



		</div>
	</div>
</div>
<?
include ("../includes/footer.php");
?>
















<script type="text/javascript">
var uolJsHost = (("https:" == document.location.protocol) ? "https://ssl.carsale.com.br/js/carsale.js" : "http://me.jsuol.com/omtr/carsale.js");
document.write(unescape("%3Cscript language='JavaScript' src='" + uolJsHost + "' type='text/javascript' %3E%3C/script%3E"));
</script>
<script type="text/javascript"><!--
uol_sc.channel="Carros-parceiros-carsale";
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=uol_sc.t();if(s_code)document.write(s_code)//--></script>
<!-- End SiteCatalyst code version: H.20.2. -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10478324-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 </script>


</body>
</html>