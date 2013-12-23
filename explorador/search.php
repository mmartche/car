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
	<link rel="stylesheet" type="text/css" href="../styles/explorado.css" />
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

<div class="bannerExplorer" id="bannermenu" class="menu affix" data-spy="affix" data-offset-top="1000">banner</div>

<div class="exploradorTabela" id="exploradorTabela">
        <div class="exploradorTabelaLineCarros">
            <div class="exploradorTabelaGridCarro"><img alt="" title="" src="/classificado/img/exploradorTituloTabelaComparativa.gif"></div>
            <div class="exploradorTabelaGridCarro veiculo0">
                <div class="exploradorTabelaGridCarroOculta"></div>
                <div class="exploradorTabelaCarroFechar"><a href="#989" class="excluirComparacao" id="excluirComparacao0" style="display: inline;">x</a></div>
                <div class="exploradorTabelaCarroNumeracao">1</div>
                <div class="exploradorTabelaCarroImg"><img alt="" title="" src="http://carsale.uol.com.br/images/ofertas/toyotaEtiosCross061213_g.gif"></div>
                <div class="exploradorTabelaCarroModelo">Toyota Etios Cross*</div>
                <div class="exploradorTabelaCarroValor">R$ 45.690</div>
            </div>
            <div class="exploradorTabelaGridCarro veiculo1">
                <div class="exploradorTabelaGridCarroOculta"></div>
                <div class="exploradorTabelaCarroFechar"><a href="#832" class="excluirComparacao" id="excluirComparacao1" style="display: inline;">x</a></div>
                <div class="exploradorTabelaCarroNumeracao">2</div>
                <div class="exploradorTabelaCarroImg"><img alt="" title="" src="http://carsale.uol.com.br/images/ofertas/nissanGrandLivina201411092013_g.gif"></div>
                <div class="exploradorTabelaCarroModelo">Nissan Grand Livina*</div>
                <div class="exploradorTabelaCarroValor">R$ 52.390</div>
            </div>
            <div class="exploradorTabelaGridCarro veiculo2">
                <div class="exploradorTabelaGridCarroOculta"></div>
                <div class="exploradorTabelaCarroFechar"><a href="#218" class="excluirComparacao" id="excluirComparacao2" style="display: inline;">x</a></div>
                <div class="exploradorTabelaCarroNumeracao">3</div>
                <div class="exploradorTabelaCarroImg"><img alt="" title="" src="http://carsale.uol.com.br/images/ofertas/outback2011_g.gif"></div>
                <div class="exploradorTabelaCarroModelo">Subaru Outback*</div>
                <div class="exploradorTabelaCarroValor">R$ 180.000</div>
            </div>
            <div class="exploradorTabelaGridCarro veiculo3">
                <div class="exploradorTabelaGridCarroOculta"></div>
                <div class="exploradorTabelaCarroFechar"><a href="" class="excluirComparacao" id="excluirComparacao3" style="display: none;">x</a></div>
                <div class="exploradorTabelaCarroNumeracao">4</div>
                <div class="exploradorTabelaCarroImg"><img alt="" title="" src="/classificado/img/exploradorGhostTabelaComparativa.gif"></div>
                <div class="exploradorTabelaCarroModelo"></div>
                <div class="exploradorTabelaCarroValor"></div>
            </div>
        </div>

        <div class="exploradorTabelaLineVersao">
            <div class="exploradorTabelaGridVersao">
                <div class="exploradorTabelaVersaoTxt">Escolha outras marcas &gt;&gt;</div>
                <div class="exploradorTabelaVersaoTxt">Escolha outros modelos &gt;&gt;</div>
                <div class="exploradorTabelaVersaoTxt">Escolha outras versões &gt;&gt;</div>
            </div>
            <div class="exploradorTabelaGridVersao veiculo0">

                <select class="exploradorTabelaVersaoSelect selectMontadoras">
                    <option value="">Escolha uma marca</option>
                    
                        <option value="31">Audi</option>
                    
                        <option value="15">BMW            </option>
                    
                        <option value="82">Chana motors</option>
                    
                        <option value="87">CHERY</option>
                    
                        <option value="4">Chevrolet</option>
                    
                        <option value="18">Chrysler</option>
                    
                        <option value="19">Citroen</option>
                    
                        <option value="30">Dodge</option>
                    
                        <option value="1">Fiat</option>
                    
                        <option value="3">Ford</option>
                    
                        <option value="12">Honda</option>
                    
                        <option value="22" selected="selected">Hyundai</option>
                    
                        <option value="90">HyundaiHB20</option>
                    
                        <option value="88">JAC</option>
                    
                        <option value="29">Jeep</option>
                    
                        <option value="9">Kia</option>
                    
                        <option value="23">Land Rover</option>
                    
                        <option value="34">Lexus</option>
                    
                        <option value="89">LIFAN</option>
                    
                        <option value="7">Mercedes-Benz</option>
                    
                        <option value="69">Mini</option>
                    
                        <option value="8" selected="selected">Mitsubishi</option>
                    
                        <option value="10" selected="selected">Nissan</option>
                    
                        <option value="6">Peugeot</option>
                    
                        <option value="5">Renault</option>
                    
                        <option value="42">Smart</option>
                    
                        <option value="24">Subaru</option>
                    
                        <option value="25">Suzuki</option>
                    
                        <option value="11" selected="selected">Toyota</option>
                    
                        <option value="39">Troller</option>
                    
                        <option value="2">Volkswagen</option>
                    
                        <option value="14">Volvo</option>
                    
                </select>

                <select name="linha.id" class="exploradorTabelaVersaoSelect selectLinhas" id="linhasComparacao0">
                    
                <option value="">Escolha um modelo</option><option value="127">Camry</option><option value="129">Corolla</option><option value="989">Etios Cross</option><option value="966">Etios Hatch</option><option value="967">Etios Sedan</option><option value="131">Hilux Cab. Dupla</option><option value="130">Hilux Cab. Simples</option><option value="133">Rav 4</option><option value="938">SW4</option></select>

                <select class="exploradorTabelaVersaoSelect selectVersoes" id="versoesComparacao0">
                    
                <option value="1654">1.5 16V </option></select>
            </div>

            <div class="exploradorTabelaGridVersao veiculo1">

                <select name="montadora.id" class="exploradorTabelaVersaoSelect selectMontadoras">
                    <option value="">Escolha uma marca</option>
                    
                        <option value="31">Audi</option>
                    
                        <option value="15">BMW            </option>
                    
                        <option value="82">Chana motors</option>
                    
                        <option value="87">CHERY</option>
                    
                        <option value="4">Chevrolet</option>
                    
                        <option value="18">Chrysler</option>
                    
                        <option value="19">Citroen</option>
                    
                        <option value="30">Dodge</option>
                    
                        <option value="1">Fiat</option>
                    
                        <option value="3">Ford</option>
                    
                        <option value="12">Honda</option>
                    
                        <option value="22" selected="selected">Hyundai</option>
                    
                        <option value="90">HyundaiHB20</option>
                    
                        <option value="88">JAC</option>
                    
                        <option value="29">Jeep</option>
                    
                        <option value="9">Kia</option>
                    
                        <option value="23">Land Rover</option>
                    
                        <option value="34">Lexus</option>
                    
                        <option value="89">LIFAN</option>
                    
                        <option value="7">Mercedes-Benz</option>
                    
                        <option value="69">Mini</option>
                    
                        <option value="8">Mitsubishi</option>
                    
                        <option value="10" selected="selected">Nissan</option>
                    
                        <option value="6">Peugeot</option>
                    
                        <option value="5">Renault</option>
                    
                        <option value="42">Smart</option>
                    
                        <option value="24">Subaru</option>
                    
                        <option value="25">Suzuki</option>
                    
                        <option value="11">Toyota</option>
                    
                        <option value="39">Troller</option>
                    
                        <option value="2">Volkswagen</option>
                    
                        <option value="14">Volvo</option>
                    
                </select>

                <select name="linha.id" class="exploradorTabelaVersaoSelect selectLinhas" id="linhasComparacao1">
                    
                <option value="">Escolha um modelo</option><option value="62">Frontier</option><option value="832">Grand Livina</option><option value="822">Livina</option><option value="903">Livina X-Gear</option><option value="914">March </option><option value="320">Sentra</option><option value="783">Tiida</option><option value="902">Tiida Sedan</option><option value="919">Versa</option></select>

                <select class="exploradorTabelaVersaoSelect selectVersoes" id="versoesComparacao1">
                    
                <option value="649">1.8 S</option><option value="650">1.8 SL - Aut.</option></select>
            </div>

            <div class="exploradorTabelaGridVersao veiculo2">

                <select name="montadora.id" class="exploradorTabelaVersaoSelect selectMontadoras">
                    <option value="">Escolha uma marca</option>
                    
                        <option value="31">Audi</option>
                    
                        <option value="15">BMW            </option>
                    
                        <option value="82">Chana motors</option>
                    
                        <option value="87">CHERY</option>
                    
                        <option value="4">Chevrolet</option>
                    
                        <option value="18">Chrysler</option>
                    
                        <option value="19">Citroen</option>
                    
                        <option value="30">Dodge</option>
                    
                        <option value="1">Fiat</option>
                    
                        <option value="3">Ford</option>
                    
                        <option value="12">Honda</option>
                    
                        <option value="22">Hyundai</option>
                    
                        <option value="90">HyundaiHB20</option>
                    
                        <option value="88">JAC</option>
                    
                        <option value="29">Jeep</option>
                    
                        <option value="9">Kia</option>
                    
                        <option value="23">Land Rover</option>
                    
                        <option value="34">Lexus</option>
                    
                        <option value="89">LIFAN</option>
                    
                        <option value="7">Mercedes-Benz</option>
                    
                        <option value="69">Mini</option>
                    
                        <option value="8" selected="selected">Mitsubishi</option>
                    
                        <option value="10">Nissan</option>
                    
                        <option value="6">Peugeot</option>
                    
                        <option value="5">Renault</option>
                    
                        <option value="42">Smart</option>
                    
                        <option value="24" selected="selected">Subaru</option>
                    
                        <option value="25">Suzuki</option>
                    
                        <option value="11">Toyota</option>
                    
                        <option value="39">Troller</option>
                    
                        <option value="2">Volkswagen</option>
                    
                        <option value="14">Volvo</option>
                    
                </select>

                <select name="linha.id" class="exploradorTabelaVersaoSelect selectLinhas" id="linhasComparacao2">
                    
                <option value="">Escolha um modelo</option><option value="61">Forester</option><option value="809">Impreza</option><option value="70">Impreza Sedan</option><option value="76">Legacy</option><option value="976">New XV</option><option value="218">Outback</option><option value="810">Tribeca</option></select>

                <select class="exploradorTabelaVersaoSelect selectVersoes" id="versoesComparacao2">
                    
                <option value="786">3.6 Outback</option></select>
            </div>

            <div class="exploradorTabelaGridVersao veiculo3">

                <select name="montadora.id" class="exploradorTabelaVersaoSelect selectMontadoras">
                    <option value="">Escolha uma marca</option>
                    
                        <option value="31">Audi</option>
                    
                        <option value="15">BMW            </option>
                    
                        <option value="82">Chana motors</option>
                    
                        <option value="87">CHERY</option>
                    
                        <option value="4">Chevrolet</option>
                    
                        <option value="18">Chrysler</option>
                    
                        <option value="19">Citroen</option>
                    
                        <option value="30">Dodge</option>
                    
                        <option value="1">Fiat</option>
                    
                        <option value="3">Ford</option>
                    
                        <option value="12">Honda</option>
                    
                        <option value="22">Hyundai</option>
                    
                        <option value="90">HyundaiHB20</option>
                    
                        <option value="88">JAC</option>
                    
                        <option value="29">Jeep</option>
                    
                        <option value="9">Kia</option>
                    
                        <option value="23">Land Rover</option>
                    
                        <option value="34">Lexus</option>
                    
                        <option value="89">LIFAN</option>
                    
                        <option value="7">Mercedes-Benz</option>
                    
                        <option value="69">Mini</option>
                    
                        <option value="8">Mitsubishi</option>
                    
                        <option value="10">Nissan</option>
                    
                        <option value="6">Peugeot</option>
                    
                        <option value="5">Renault</option>
                    
                        <option value="42">Smart</option>
                    
                        <option value="24">Subaru</option>
                    
                        <option value="25">Suzuki</option>
                    
                        <option value="11">Toyota</option>
                    
                        <option value="39">Troller</option>
                    
                        <option value="2">Volkswagen</option>
                    
                        <option value="14">Volvo</option>
                    
                </select>

                <select name="linha.id" disabled="disabled" class="exploradorTabelaVersaoSelect selectLinhas" id="linhasComparacao3">
                    
                <option value="">Escolha um modelo</option></select>

                <select class="exploradorTabelaVersaoSelect selectVersoes" id="versoesComparacao3" disabled="disabled">
                    
                <option value="">Escolha uma versão</option></select>
            </div>

        </div>

        <div class="exploradorTabelaLineOpcionais">
            <div class="exploradorTabelaGridOpcionais">
                <div class="exploradorTabelaOpcionaisTxtBgGray">Airbag duplo frontal</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Ar condicionado</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Banco motorista com reg. de altura</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Desembaçador de vidro traseiro</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Direção hidráulica</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Freios ABS</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Limpador de vidro traseiro</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Para-choque na cor do veículo</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Radio CD player com entrada USB</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Retrovisor elétrico</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Travas elétricas</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Vidros elétricos</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Alarme</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Ar quente</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Banco traseiro bipartido</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Banco de couro</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Computador de bordo</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Bluetooth com viva voz</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Conta-giros</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Farois de milha</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Farois de xenônio</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">GPS integrado ao painel</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Piloto automático</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Regulagem de altura dos farois</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Rodas de liga leve</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Sensor de estacionamento</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Sensor de chuva e/ou crepuscular</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Sistema isofix para cadeira infantil</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Teto solar</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Vidros elétricos traseiros</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Volante com regulagem de altura</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Capota marítima</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Estribos laterais</div>
                <div class="exploradorTabelaOpcionaisTxtBgWhite">Protetor de caçamba</div>
                <div class="exploradorTabelaOpcionaisTxtBgGray">Rack de teto</div>
            </div>
            <div class="exploradorTabelaGridOpcionais veiculo0">
                <div class="exploradorTabelaOpcionaisImgBgGray airBagDuploFrontal"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arCondicionado"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoMotoristaRegulagemAltura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite desembacadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray direcaoHidraulica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite freioAbs"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray limpadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite parachoqueCorVeiculo"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray radioCdPlayerEntradaUsb"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite retrovisorEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray travaEletrica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray alarme"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arQuente"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoTraseiroBipartido"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bancoCouro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray computadorBordo"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bloetoothVivaVoz"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray contaGiros"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite faroisMilha"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray faroisXenon"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite gpsIntegradoPainel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray pilotoAutomatico"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite regulagemAlturaFarois"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rodaLigaLevel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sensorEstacionamento"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray sensorChuva"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sistemaIsofixCadeiraCrianca"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray tetoSolar"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletricoTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray volanteRegulagemAutura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite capotaMaritima"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray estriboxLaterais"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite protetorCacamba"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rackTeto"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
            </div>
            <div class="exploradorTabelaGridOpcionais veiculo1">
                <div class="exploradorTabelaOpcionaisImgBgGray airBagDuploFrontal"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arCondicionado"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoMotoristaRegulagemAltura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite desembacadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray direcaoHidraulica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite freioAbs"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray limpadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite parachoqueCorVeiculo"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray radioCdPlayerEntradaUsb"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite retrovisorEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray travaEletrica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray alarme"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arQuente"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoTraseiroBipartido"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bancoCouro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray computadorBordo"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bloetoothVivaVoz"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray contaGiros"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite faroisMilha"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray faroisXenon"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite gpsIntegradoPainel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray pilotoAutomatico"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite regulagemAlturaFarois"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rodaLigaLevel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sensorEstacionamento"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray sensorChuva"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sistemaIsofixCadeiraCrianca"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray tetoSolar"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletricoTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray volanteRegulagemAutura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite capotaMaritima"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray estriboxLaterais"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite protetorCacamba"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rackTeto"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
            </div>
            <div class="exploradorTabelaGridOpcionais veiculo2">
                <div class="exploradorTabelaOpcionaisImgBgGray airBagDuploFrontal"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arCondicionado"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoMotoristaRegulagemAltura"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite desembacadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray direcaoHidraulica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite freioAbs"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray limpadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite parachoqueCorVeiculo"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray radioCdPlayerEntradaUsb"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite retrovisorEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray travaEletrica"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletrico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray alarme"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite arQuente"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray bancoTraseiroBipartido"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bancoCouro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray computadorBordo"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite bloetoothVivaVoz"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray contaGiros"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite faroisMilha"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray faroisXenon"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite gpsIntegradoPainel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray pilotoAutomatico"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite regulagemAlturaFarois"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rodaLigaLevel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sensorEstacionamento"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray sensorChuva"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite sistemaIsofixCadeiraCrianca"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray tetoSolar"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite vidroEletricoTraseiro"><img src="/classificado/img/exploradorTabelaCheck.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray volanteRegulagemAutura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite capotaMaritima"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray estriboxLaterais"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite protetorCacamba"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray rackTeto"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
            </div>
            <div class="exploradorTabelaGridOpcionais_B veiculo3">
                <div class="exploradorTabelaOpcionaisImgBgGray_B airBagDuploFrontal"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B arCondicionado"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B bancoMotoristaRegulagemAltura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B desembacadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B direcaoHidraulica"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B freioAbs"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B limpadorVidroTraseiro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B parachoqueCorVeiculo"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B radioCdPlayerEntradaUsb"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B retrovisorEletrico"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B travaEletrica"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B vidroEletrico"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B alarme"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B arQuente"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B bancoTraseiroBipartido"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B bancoCouro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B computadorBordo"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B bloetoothVivaVoz"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B contaGiros"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B faroisMilha"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B faroisXenon"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B gpsIntegradoPainel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B pilotoAutomatico"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B regulagemAlturaFarois"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B rodaLigaLevel"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B sensorEstacionamento"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B sensorChuva"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B sistemaIsofixCadeiraCrianca"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B tetoSolar"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B vidroEletricoTraseiro"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B volanteRegulagemAutura"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B capotaMaritima"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B estriboxLaterais"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgWhite_B protetorCacamba"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
                <div class="exploradorTabelaOpcionaisImgBgGray_B rackTeto"><img src="/classificado/img/exploradorTabelaNone.gif"></div>
            </div>
        </div>
        <div class="exploradorTabelaLineBtn">
            <div class="exploradorTabelaGridBase"><img alt="" title="" src="/classificado/img/exploradorBaseTabelaComparativa2.gif"></div>
            <div class="exploradorTabelaGridBase veiculo0">
                <div class="exploradorTabelaBtnFicha"><a href="/classificado/fichatecnica/68139" id="fichaTecnica0" style="display: inline;">Ficha Técnica</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="noticia0" class="noticia" style="display: inline;">Testes e Notícias</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="opiniao0" class="opiniao" style="display: none;">Opinião do Dono</a></div>

            </div>
            <div class="exploradorTabelaGridBase veiculo1">
                <div class="exploradorTabelaBtnFicha"><a href="/classificado/fichatecnica/66762" id="fichaTecnica1" style="display: inline;">Ficha Técnica</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="noticia1" class="noticia" style="display: inline;">Testes e Notícias</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="opiniao1" class="opiniao" style="display: inline;">Opinião do Dono</a></div>
            </div>
            <div class="exploradorTabelaGridBase veiculo2">
                <div class="exploradorTabelaBtnFicha"><a href="/classificado/fichatecnica/66957" id="fichaTecnica2" style="display: inline;">Ficha Técnica</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="noticia2" class="noticia" style="display: inline;">Testes e Notícias</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="opiniao2" class="opiniao" style="display: inline;">Opinião do Dono</a></div>
            </div>
            <div class="exploradorTabelaGridBase veiculo3">
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="fichaTecnica3" style="display: none;">Ficha Técnica</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="noticia3" class="noticia" style="display: none;">Testes e Notícias</a></div>
                <div class="exploradorTabelaBtnFicha"><a href="javascript:void(0);" id="opiniao3" class="opiniao" style="display: none;">Opinião do Dono</a></div>
            </div>
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