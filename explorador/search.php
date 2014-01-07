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
<?
// print_r(count($_POST[segments]));
$_POST[segments] = (count($_POST[segments]) ==0 ) ? array() : $_POST[segments];
$_POST[filterSerie] = (count($_POST[filterSerie]) ==0 ) ? array() : $_POST[filterSerie];
?>
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
	                    <div class="exploradorGridFiltrosImg <? if (in_array($resThumb[id], $_POST[segments])) { echo 'filterChecked'; } ?> ">
	                        <input type="checkbox" class="inputExpForm" id="chkExpForm<?=$resThumb[id]?>" name="segments[]" value="<?=$resThumb[id]?>" <? if (in_array($resThumb[id], $_POST[segments])) { echo ' checked="checked" '; } ?> />
	                        <label for="chkExpForm<?=$resThumb[id]?>" class="thumbExpForm thumbF<?=$resThumb[id]?>" alt="<?=$resThumb[name]?>" title="<?=$resThumb[name]?>" /><?=$resThumb[name]?></label>
	                    </div>
	                <? } ?>
	                </div>
	                
	            </div>

	            <div class="exploradorGridFiltrosColunaA" >
	                <div class="exploradorGridFiltrosColunaATitulo">Quanto você pretende gastar ?</div>
	                <div class="exploradorGridFiltrosInputText">     
	                    <div class="exploradorGridFiltrosInputTextLine">
                        	<label for="priceIni">De:</label>
                            <input type="text" name="priceIni" id="priceIni" value="<?=$_POST[priceIni]?>" />
                        </div>
	                    <div class="exploradorGridFiltrosInputTextLine">
	                        <label for="priceFinal">Até:</label>
                            <input type="text" name="priceFinal" id="priceFinal" value="<?=$_POST[priceFinal]?>" />
	                    </div>
	                </div>
	                <div class="exploradorGridFiltrosColunaATitulo" onclick="toggleClass('.exploradorGridFiltrosChecks','check')">Quais opcionais não podem faltar ?</div>
	            </div>
	        </div>
	        <ul class="exploradorGridFiltrosChecks check" >
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="dualFrontAirBag" <? if (in_array("dualFrontAirBag",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> /><label>Airbag duplo frontal</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="alarm" <? if (in_array("alarm",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> /> 
					<label>Alarme</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="airConditioning" <? if (in_array("airConditioning",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Ar condicionado</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="hotAir" <? if (in_array("hotAir",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Ar quente</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="leatherSeat" <? if (in_array("leatherSeat",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Banco de couro</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="heightAdjustment" <? if (in_array("heightAdjustment",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Banco do motorista com regulagem de altura</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rearSeatSplit" <? if (in_array("rearSeatSplit",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Banco traseiro bipartido</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="bluetoothSpeakerphone" <? if (in_array("bluetoothSpeakerphone",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Bluetooth com viva-voz</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="bonnetSea" <? if (in_array("bonnetSea",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Capota marítima</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="onboardComputer" <? if (in_array("onboardComputer",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Computador de bordo</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="accelerationCounter" <? if (in_array("accelerationCounter",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Conta giros</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rearWindowDefroster" <? if (in_array("rearWindowDefroster",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Desembaçador de vidro traseiro</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="electricSteering" <? if (in_array("electricSteering",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Direção elétrica</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="hydraulicSteering" <? if (in_array("hydraulicSteering",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Direção hidráulica</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="sidesteps" <? if (in_array("sidesteps",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Estribos laterais</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="fogLamps" <? if (in_array("fogLamps",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Faróis de neblina/milha</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="xenonHeadlights" <? if (in_array("xenonHeadlights",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Faróis xenon</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="absBrake" <? if (in_array("absBrake",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Freios Abs</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="integratedGPdlel" <? if (in_array("integratedGPdlel",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>GPS integrado ao painel</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rearWindowWiper" <? if (in_array("rearWindowWiper",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Limpador de vidro traseiro</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="bumper" <? if (in_array("bumper",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Para choque na cor do veículo</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="autopilot" <? if (in_array("autopilot",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Piloto automático</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="bucketProtector" <? if (in_array("bucketProtector",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Protetor de caçamba</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="roofRack" <? if (in_array("roofRack",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Rack de teto</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="cdplayerUSBInput" <? if (in_array("cdplayerUSBInput",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Cd player com entrada USB</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="headlightsHeightAdjustment" <? if (in_array("headlightsHeightAdjustment",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Regulagem de altura dos faróis</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rearviewElectric" <? if (in_array("rearviewElectric",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Retrovisor elétrico</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="alloyWheels" <? if (in_array("alloyWheels",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Rodas de liga leve</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rainSensor" <? if (in_array("rainSensor",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Sensor de chuva</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="parkingSensor" <? if (in_array("parkingSensor",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Sensor de estacionamento</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="isofix" <? if (in_array("isofix",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Sistema Isofix para cadeira de criança</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="sunroof" <? if (in_array("sunroof",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Teto solar</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="electricLock" <? if (in_array("electricLock",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Trava elétrica</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="electricWindow" <? if (in_array("electricWindow",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Vidro elétrico</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="rearElectricWindow" <? if (in_array("rearElectricWindow",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Vidro elétrico traseiro</label></li>
				<li>
					<input type="checkbox" class="chkFormExp" name="filterSerie[]" value="steeringWheelAdjustment" <? if (in_array("steeringWheelAdjustment",$_POST[filterSerie])) { echo 'checked="checked"'; } ?> />
					<label>Volante com regulagem de altura</label></li>
	        </ul>
	        <div class="exploradorGridFiltrosBtnBuscar">
                <input type="submit" value="Buscar" class="btnExploradorFilter" id="btnSearch" name="btnSearch" />
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
		<?
		// $x = ($myvalue == 99) ? "x is 99": "x is not 99";
		for ($i=0; $i < count($_POST[segments]); $i++) {
			$filterSeg .= ($i > 0 ? " or " : "(");
			$filterSeg .= " (model.idSegment1 = '".$_POST[segments][$i]."' or model.idSegment2 = '".$_POST[segments][$i]."' or model.idSegment3 = '".$_POST[segments][$i]."') ";
			$and = " and ";
		}
		$filterSeg .= ($filterSeg != "" ? ")" : ""); 
		if ($_POST[filterPriceIni]) {
			$filterPriceIni = " and feature.price > '".$_POST[filterPriceIni]."' ";
			$and = " and ";
		}
		if ($_POST[filterPriceFinal]) {
			$filterPriceFinal = " and feature.price < '".$_POST[filterPriceFinal]."' ";
			$and = " and ";
		}
		for ($i=0; $i < count($_POST[filterSerie]); $i++) {
			$filterItems .= ($i > 0 ? " and " : " and (");
			$filterItems .= " feature.".$_POST[filterSerie][$i]." = 's' ";
			$and = " and ";
		}
		$filterItems .= ($filterItems != "" ? ")" : ""); 
		$sqlFilter = "SELECT feature.id as featureId, model.id as modelId, feature.picture, model.name as modelName, version.name as versionName, model.idSegment1, model.idSegment2, model.idSegment3 FROM feature, model, version WHERE feature.idVersion = version.id and version.idModel = model.id".$and.$filterSeg.$filterPriceIni.$filterPriceFinal.$filterItems." group by model.id order by model.name ";
		// echo $sqlFilter;
		$queryFilter = mysql_query($sqlFilter) or die ("error #240");
		while ($resFilter = mysql_fetch_array($queryFilter)) { ?>
			<li class="liCarItem" onclick="addFilter(this,<?=$resFilter[modelId]?>)">
			<?
			if (file_exists("http://carsale.uol.com.br/foto/".$resFilter[picture]."_p.jpg")) {
				$picture = "http://carsale.uol.com.br/foto/".$resFilter[picture]."_p.jpg";
			} elseif (file_exists("../carImages/".$resFilter[picture])) {
				$picture = "../carImages/".$resFilter[picture];
			} elseif (file_exists("../carImagesMegaOferta/".$resFilter[picture])) {
				$picture = "../carImages/".$resFilter[picture];
			} else {
				$picture = "http://carsale.uol.com.br/foto/".$resFilter[picture]."_p.jpg";
			}
			?>
				<img src="<?=$picture?>" class="imgCarSelect" />
				<label><?=$resFilter[modelName]?> - <?=$resFilter[versionName]?></label>
			</li>
		<?
		}
		?>


<!-- 		<li class="liCarItem btnMore">
			<div id="btnSearchMore" class="btnSearchMore">Buscar mais</div>
		</li> -->
	</ul>

</div>
<!--END FORM SELECT UR CAR -->
<? } ?>

<!-- <div class="bannerExplorer" id="bannermenu" class="menu affix" data-spy="affix" data-offset-top="100" data-offset-bottom="2500">banner</div> -->
<div class="bannerExplorer" id="bannermenu">banner</div>

<div class="exploradorTabela" id="exploradorTabela">
         <div class="exploradorTabelaLineCarros">
            <div class="exploradorTabelaGridCarro"><img alt="" title="" src="http://carsale.uol.com.br/classificado/img/exploradorTituloTabelaComparativa.gif"></div>
            
        </div>
        <div class="resultFilter" id="resultFilter">
        	<div class="column">
		        <ul class="titleItems">
                	<li class="liFilterItem">Airbag duplo frontal</li>
                	<li class="liFilterItem">Ar condicionado</li>
                	<li class="liFilterItem">Banco motorista com reg. de altura</li>
                	<li class="liFilterItem">Desembaçador de vidro traseiro</li>
                	<li class="liFilterItem">Direção hidráulica</li>
                	<li class="liFilterItem">Freios ABS</li>
                	<li class="liFilterItem">Limpador de vidro traseiro</li>
                	<li class="liFilterItem">Para-choque na cor do veículo</li>
                	<li class="liFilterItem">Radio CD player com entrada USB</li>
                	<li class="liFilterItem">Retrovisor elétrico</li>
                	<li class="liFilterItem">Travas elétricas</li>
                	<li class="liFilterItem">Vidros elétricos</li>
                	<li class="liFilterItem">Alarme</li>
                	<li class="liFilterItem">Ar quente</li>
                	<li class="liFilterItem">Banco traseiro bipartido</li>
                	<li class="liFilterItem">Banco de couro</li>
                	<li class="liFilterItem">Computador de bordo</li>
                	<li class="liFilterItem">Bluetooth com viva voz</li>
                	<li class="liFilterItem">Conta-giros</li>
                	<li class="liFilterItem">Farois de milha</li>
                	<li class="liFilterItem">Farois de xenônio</li>
                	<li class="liFilterItem">GPS integrado ao painel</li>
                	<li class="liFilterItem">Piloto automático</li>
                	<li class="liFilterItem">Regulagem de altura dos farois</li>
                	<li class="liFilterItem">Rodas de liga leve</li>
                	<li class="liFilterItem">Sensor de estacionamento</li>
                	<li class="liFilterItem">Sensor de chuva e/ou crepuscular</li>
                	<li class="liFilterItem">Sistema isofix para cadeira infantil</li>
                	<li class="liFilterItem">Teto solar</li>
                	<li class="liFilterItem">Vidros elétricos traseiros</li>
                	<li class="liFilterItem">Volante com regulagem de altura</li>
                	<li class="liFilterItem">Capota marítima</li>
                	<li class="liFilterItem">Estribos laterais</li>
                	<li class="liFilterItem">Protetor de caçamba</li>
                	<li class="liFilterItem">Rack de teto</li>
		        </ul>
		        <div class="headerTitle">Motor</div>
		        <ul class="titleItems">
		        	<li>Motor</li>
		        	<li>Alimentacao</li>
		        	<li>Combustivel</li>
		        	<li>Potencia</li>
	        	</ul>
            </div>            
        </div>

        <!-- <div class="exploradorTabelaLineVersao">
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

        </div> -->

        <div class="exploradorTabelaLineBtn">
            <div class="exploradorTabelaGridBase"><img alt="" title="" src="http://carsale.uol.com.br/classificado/img/exploradorBaseTabelaComparativa2.gif"></div>
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