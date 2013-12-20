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
	<script type="text/javascript" src="../scripts/explorer.js"></script>

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
	    <form action="" name="formExplorer" id="formExplorer" method="post" >
	        <div class="exploradorGridFiltros">
	            <div class="exploradorGridFiltrosColunaB">
	                <div class="exploradorGridFiltrosColunaBTitulo">Qual tipo de carro você quer ?</div>
	                <div class="exploradorGridFiltrosGridImg">
	                <?
	                $sqlThumb = "SELECT id, name FROM segment order by name";
	                $queryThumb = mysql_query($sqlThumb) or die ("error #65");
	                while ($resThumb = mysql_fetch_array($queryThumb)) {
	                ?>
	                    <div class="exploradorGridFiltrosImg">
	                        <input type="checkbox" class="inputExpForm" id="chkExpForm<?=$resThumb[id]?>" name="segmentos[].id" value="<?=$resThumb[id]?>">
	                        <label for="chkExpForm<?=$resThumb[id]?>"><img class="thumbExpForm" src="./images/explorer/thumb/<?=$resThumb[id]?>.png" alt="<?=$resThumb[name]?>" title="<?=$resThumb[name]?>" /></a>
	                    </div>
	                <? } ?>
	                </div>
	                <div class="exploradorGridFiltrosBtnBuscar">
	                    <input type="submit" value="Buscar" id="btnSearch" name="btnSearch" />
	                </div>
	            </div>

	            <div class="exploradorGridFiltrosColunaA" >
	                <div class="exploradorGridFiltrosColunaATitulo">Quanto você pretende gastar ?</div>
	                <div class="exploradorGridFiltrosInputText">
	                    <div class="exploradorGridFiltrosInputTextLine">
                        	<label for="priceIni">De:</label>
                            <input type="text" name="priceIni" id="priceIni">
                        </div>
	                    <div class="exploradorGridFiltrosInputTextLine">
	                        <label for="priceFinal">Até:</label>
                            <input type="text" name="priceFinal" id="priceFinal">
	                    </div>
	                </div>
	                <div class="exploradorGridFiltrosColunaATitulo">Quais opcionais não podem faltar ?</div>
	                <ul class="exploradorGridFiltrosChecks">
						<li>
							<input type="checkbox" class="chkFormExp" name="dualFrontAirBag" value="s" <? if (strtolower($res[dualFrontAirBag]) == "s") { echo 'checked="true"'; } ?> />
							<label>Airbag duplo frontal</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="alarm" value="s" <? if (strtolower($res[alarm]) == "s") { echo 'checked="true"'; } ?> />
							<label>Alarme</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="airConditioning" value="s" <? if (strtolower($res[airConditioning]) == "s") { echo 'checked="true"'; } ?> />
							<label>Ar condicionado</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="hotAir" value="s" <? if (strtolower($res[hotAir]) == "s") { echo 'checked="true"'; } ?> />
							<label>Ar quente</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="leatherSeat" value="s" <? if (strtolower($res[leatherSeat]) == "s") { echo 'checked="true"'; } ?> />
							<label>Banco de couro</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="heightAdjustment" value="s" <? if (strtolower($res[heightAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label>Banco do motorista com regulagem de altura</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rearSeatSplit" value="s" <? if (strtolower($res[rearSeatSplit]) == "s") { echo 'checked="true"'; } ?> />
							<label>Banco traseiro bipartido</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="bluetoothSpeakerphone" value="s" <? if (strtolower($res[bluetoothSpeakerphone]) == "s") { echo 'checked="true"'; } ?> />
							<label>Bluetooth com viva-voz</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="bonnetSea" value="s" <? if (strtolower($res[bonnetSea]) == "s") { echo 'checked="true"'; } ?> />
							<label>Capota marítima</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="onboardComputer" value="s" <? if (strtolower($res[onboardComputer]) == "s") { echo 'checked="true"'; } ?> />
							<label>Computador de bordo</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="accelerationCounter" value="s" <? if (strtolower($res[accelerationCounter]) == "s") { echo 'checked="true"'; } ?> />
							<label>Conta giros</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rearWindowDefroster" value="s" <? if (strtolower($res[rearWindowDefroster]) == "s") { echo 'checked="true"'; } ?> />
							<label>Desembaçador de vidro traseiro</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="electricSteering" value="s" <? if (strtolower($res[electricSteering]) == "s") { echo 'checked="true"'; } ?> />
							<label>Direção elétrica</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="hydraulicSteering" value="s" <? if (strtolower($res[hydraulicSteering]) == "s") { echo 'checked="true"'; } ?> />
							<label>Direção hidráulica</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="sidesteps" value="s" <? if (strtolower($res[sidesteps]) == "s") { echo 'checked="true"'; } ?> />
							<label>Estribos laterais</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="fogLamps" value="s" <? if (strtolower($res[fogLamps]) == "s") { echo 'checked="true"'; } ?> />
							<label>Faróis de neblina/milha</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="xenonHeadlights" value="s" <? if (strtolower($res[xenonHeadlights]) == "s") { echo 'checked="true"'; } ?> />
							<label>Faróis xenon</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="absBrake" value="s" <? if (strtolower($res[absBrake]) == "s") { echo 'checked="true"'; } ?> />
							<label>Freios Abs</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="integratedGPdlel" value="s" <? if (strtolower($res[integratedGPdlel]) == "s") { echo 'checked="true"'; } ?> />
							<label>GPS integrado ao painel</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rearWindowWiper" value="s" <? if (strtolower($res[rearWindowWiper]) == "s") { echo 'checked="true"'; } ?> />
							<label>Limpador de vidro traseiro</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="bumper" value="s" <? if (strtolower($res[bumper]) == "s") { echo 'checked="true"'; } ?> />
							<label>Para choque na cor do veículo</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="autopilot" value="s" <? if (strtolower($res[autopilot]) == "s") { echo 'checked="true"'; } ?> />
							<label>Piloto automático</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="bucketProtector" value="s" <? if (strtolower($res[bucketProtector]) == "s") { echo 'checked="true"'; } ?> />
							<label>Protetor de caçamba</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="roofRack" value="s" <? if (strtolower($res[roofRack]) == "s") { echo 'checked="true"'; } ?> />
							<label>Rack de teto</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="cdplayerUSBInput" value="s" <? if (strtolower($res[cdplayerUSBInput]) == "s") { echo 'checked="true"'; } ?> />
							<label>Cd player com entrada USB</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="headlightsHeightAdjustment" value="s" <? if (strtolower($res[headlightsHeightAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label>Regulagem de altura dos faróis</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rearviewElectric" value="s" <? if (strtolower($res[rearviewElectric]) == "s") { echo 'checked="true"'; } ?> />
							<label>Retrovisor elétrico</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="alloyWheels" value="s" <? if (strtolower($res[alloyWheels]) == "s") { echo 'checked="true"'; } ?> />
							<label>Rodas de liga leve</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rainSensor" value="s" <? if (strtolower($res[rainSensor]) == "s") { echo 'checked="true"'; } ?> />
							<label>Sensor de chuva</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="parkingSensor" value="s" <? if (strtolower($res[parkingSensor]) == "s") { echo 'checked="true"'; } ?> />
							<label>Sensor de estacionamento</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="isofix" value="s" <? if (strtolower($res[isofix]) == "s") { echo 'checked="true"'; } ?> />
							<label>Sistema Isofix para cadeira de criança</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="sunroof" value="s" <? if (strtolower($res[sunroof]) == "s") { echo 'checked="true"'; } ?> />
							<label>Teto solar</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="electricLock" value="s" <? if (strtolower($res[electricLock]) == "s") { echo 'checked="true"'; } ?> />
							<label>Trava elétrica</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="electricWindow" value="s" <? if (strtolower($res[electricWindow]) == "s") { echo 'checked="true"'; } ?> />
							<label>Vidro elétrico</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="rearElectricWindow" value="s" <? if (strtolower($res[rearElectricWindow]) == "s") { echo 'checked="true"'; } ?> />
							<label>Vidro elétrico traseiro</label></li>
						<li>
							<input type="checkbox" class="chkFormExp" name="steeringWheelAdjustment" value="s" <? if (strtolower($res[steeringWheelAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label>Volante com regulagem de altura</label></li>
	                </ul>
	            </div>
	        </div>
	    </form>
	</div>
</div>
<!--FIM DO FORM FILTER -->
<? if ($_POST[btnSearch] == "Buscar") { ?>
<!-- FORM SELECT UR CAR -->
<div class="sContent">
	<div class="exploradorTitulo">Clique nos carros para compará-los:</div>
	<ul class="ulCarList">
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem">
			<img src="" class="imgCarSelect" />
		</li>
		<li class="liCarItem btnMore">
			<div id="btnSearchMore" class="btnSearchMore">Buscar mais</div>
		</li>
	</ul>

</div>
<!--END FORM SELECT UR CAR -->
<? } ?>

<div class="bannerExplorer">banner</div>

<div class="featureExplorer">
	<div class="rowTitle">
        <div class="exploradorTabelaGridCarro"><img alt="" title="" src="/classificado/img/exploradorTituloTabelaComparativa.gif"></div>
        <div class="exploradorTabelaGridCarro veiculo0">
            <div class="exploradorTabelaGridCarroOculta"></div>
            <div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao0">x</a></div>
            <div class="exploradorTabelaCarroNumeracao">1</div>
            <div class="exploradorTabelaCarroImg"><img alt="" title="" src="/classificado/img/exploradorGhostTabelaComparativa.gif"></div>
            <div class="exploradorTabelaCarroModelo"></div>
            <div class="exploradorTabelaCarroValor"></div>
        </div>
        <div class="exploradorTabelaGridCarro veiculo1">
            <div class="exploradorTabelaGridCarroOculta"></div>
            <div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao1">x</a></div>
            <div class="exploradorTabelaCarroNumeracao">2</div>
            <div class="exploradorTabelaCarroImg"><img alt="" title="" src="/classificado/img/exploradorGhostTabelaComparativa.gif"></div>
            <div class="exploradorTabelaCarroModelo"></div>
            <div class="exploradorTabelaCarroValor"></div>
        </div>
        <div class="exploradorTabelaGridCarro veiculo2">
            <div class="exploradorTabelaGridCarroOculta"></div>
            <div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao2">x</a></div>
            <div class="exploradorTabelaCarroNumeracao">3</div>
            <div class="exploradorTabelaCarroImg"><img alt="" title="" src="/classificado/img/exploradorGhostTabelaComparativa.gif"></div>
            <div class="exploradorTabelaCarroModelo"></div>
            <div class="exploradorTabelaCarroValor"></div>
        </div>
        <div class="exploradorTabelaGridCarro veiculo3">
            <div class="exploradorTabelaGridCarroOculta"></div>
            <div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao3">x</a></div>
            <div class="exploradorTabelaCarroNumeracao">4</div>
            <div class="exploradorTabelaCarroImg"><img alt="" title="" src="/classificado/img/exploradorGhostTabelaComparativa.gif"></div>
            <div class="exploradorTabelaCarroModelo"></div>
            <div class="exploradorTabelaCarroValor"></div>
        </div>
	</div>
	<div class="colItemCar">
		
		
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