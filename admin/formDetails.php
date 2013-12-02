<?
include ("scripts/checkPermissions.php");
include("./scripts/conectDB.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!--meta http-equiv="Pragma" content="no-cache"/-->
	<meta name="robots" content="nofollow" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Carsale Administrativo</title>

	<script type="text/javascript" src="scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/colorpicker.js"></script>
	<script type="text/javascript" src="scripts/index.js"></script>
	
	<link rel="stylesheet" href="styles//jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/colorpicker.css" />
	
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/formDetails.css" />

</head>
<body name="formDetails" class="<?=$_GET[action]?>">
<?
if ($_GET[action] == "new") {
	switch ($_GET[category]) {
		case 'model':
			$sql_search = "SELECT id as manufacturerId, name as manufacturerName from manufacturer where id = '".$_GET[vehicle]."'";
			break;
		case 'version':
			$sql_search = "SELECT model.id as modelId, model.name as modelName, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName from model, manufacturer where model.idManufacturer = manufacturer.id and model.id = '".$_GET[vehicle]."'";
			break;
		case 'feature':
			$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.id = '".$_GET[vehicle]."'";
			break;
	}
} elseif ($_GET[action] == "clone") {
	//$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
	$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie, feature.doors, feature.passagers, feature.engine, feature.feeding, feature.fuel, feature.powerMax, feature.torque, feature.acceleration, feature.speedMax, feature.consumptionCity, feature.consumptionRoad, feature.gear, feature.traction, feature.wheels, feature.frontSuspension, feature.rearSuspension, feature.frontBrake, feature.rearBrake, feature.dimensionLength, feature.dimensionWidth, feature.dimensionHeight, feature.dimensionSignAxes, feature.weight, feature.trunk, feature.tank, feature.warranty, feature.countryOrigin, feature.dualFrontAirBag, feature.alarm, feature.airConditioning, feature.hotAir, feature.leatherSeat, feature.heightAdjustment, feature.rearSeatSplit, feature.bluetoothSpeakerphone, feature.bonnetSea, feature.onboardComputer, feature.accelerationCounter, feature.rearWindowDefroster, feature.electricSteering, feature.hydraulicSteering, feature.sidesteps, feature.fogLamps, feature.xenonHeadlights, feature.absBrake, feature.integratedGPSPanel, feature.rearWindowWiper, feature.bumper, feature.autopilot, feature.bucketProtector, feature.roofRack, feature.cdplayerUSBInput, feature.headlightsHeightAdjustment, feature.rearviewElectric, feature.alloyWheels, feature.rainSensor, feature.parkingSensor, feature.isofix, feature.sunroof, feature.electricLock, feature.electricWindow, feature.rearElectricWindow, feature.steeringWheelAdjustment, feature.active, feature.dateCreate, feature.dateUpdate from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
} else {
	switch ($_GET[category]) {
		case 'manufacturer':
			$sql_search = "SELECT id as manufacturerId, name as manufacturerName from manufacturer where id = '".$_GET[vehicle]."'";
			break;
		case 'model':
			$sql_search = "SELECT model.id as modelId, model.name as modelName, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName from model, manufacturer where model.idManufacturer = manufacturer.id and model.id = '".$_GET[vehicle]."'";
			break;
		case 'version':
			$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.id = '".$_GET[vehicle]."'";
			break;
		case 'feature':
			//$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
			$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie, feature.doors, feature.passagers, feature.engine, feature.feeding, feature.fuel, feature.powerMax, feature.torque, feature.acceleration, feature.speedMax, feature.consumptionCity, feature.consumptionRoad, feature.gear, feature.traction, feature.wheels, feature.frontSuspension, feature.rearSuspension, feature.frontBrake, feature.rearBrake, feature.dimensionLength, feature.dimensionWidth, feature.dimensionHeight, feature.dimensionSignAxes, feature.weight, feature.trunk, feature.tank, feature.warranty, feature.countryOrigin, feature.dualFrontAirBag, feature.alarm, feature.airConditioning, feature.hotAir, feature.leatherSeat, feature.heightAdjustment, feature.rearSeatSplit, feature.bluetoothSpeakerphone, feature.bonnetSea, feature.onboardComputer, feature.accelerationCounter, feature.rearWindowDefroster, feature.electricSteering, feature.hydraulicSteering, feature.sidesteps, feature.fogLamps, feature.xenonHeadlights, feature.absBrake, feature.integratedGPSPanel, feature.rearWindowWiper, feature.bumper, feature.autopilot, feature.bucketProtector, feature.roofRack, feature.cdplayerUSBInput, feature.headlightsHeightAdjustment, feature.rearviewElectric, feature.alloyWheels, feature.rainSensor, feature.parkingSensor, feature.isofix, feature.sunroof, feature.electricLock, feature.electricWindow, feature.rearElectricWindow, feature.steeringWheelAdjustment, feature.active, feature.dateCreate, feature.dateUpdate from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
			break;
	}
}
if ($_GET[category]) {
$query_search = mysql_query($sql_search) or die (mysql_error()." error #50");
$res = mysql_fetch_array($query_search);
}
?>
<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<?
		switch ($_GET[category]) {
			case 'manufacturer':
				echo "<h2><span>Sistema administrativo - Cadastro de Montadoras</span>";
				if ($_GET[action] != "new") {	
					echo "<a href='?category=model&action=new&vehicle=".$res[manufacturerId]."' class='btnButton btnNewForm' id='btnAddItem'>Incluir Modelo para esta Montadora</a>";
				}
				echo "</h2>";
				break;
			case 'model':
				echo "<h2><span>Sistema administrativo - Cadastro de Linhas</span>";
				if ($_GET[action] != "new") {
					echo "<a href='?category=version&action=new&vehicle=".$res[modelId]."' class='btnButton btnNewForm' id='btnAddItem'>Incluir Versão para este Modelo</a>";
				}
				echo "</h2>";
				break;
			case 'version':
				echo "<h2><span>Sistema administrativo - Ficha Técnica de veículos / Versão</span>";
				if ($_GET[action] != "new") {
					echo "<a href='?category=feature&action=new&vehicle=".$res[versionId]."' class='btnButton btnNewForm' id='btnAddItem'>Incluir Ficha Técnica para esta Versão</a>";
				}
				echo"</h2>";
				break;
			default:
				echo "<h2><span>Sistema administrativo - Ficha Técnica de veículos</span>";
				if ($_GET[action] != "new") {
					echo "<a href='?category=feature&action=clone&vehicle=".$res[featureId]."' class='btnButton btnNewForm' id='btnAddItem'>Clonar Ficha Técnica</a>";
				}
				echo"</h2>";
				break;
		}
		?>
	</header>
	<div class="formSearch">
		<form action="." method="get" >
			<div class="ui-widget">
				<input id="askInput" class="askInput" name="askInput" placeholder="Digite o que quer encontrar" />
				<input id="askType" class="askType" name="askType" />
			</div>
			<div class="ui-widget result-box">
				Result:
				<div id="log" class="ui-widget-content log-box"></div>
			</div>
			<!--div id="resultSearch" class="resultSearch"></div-->
			<input type="submit" value="Buscar" class="btnButton btnSearch" />
		</form>
	</div>
	<div class="content">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<?
			switch ($_GET[category]) {
				case 'manufacturer':
					?><li class="active" title="Montadora"><?=$res[manufacturerName]?></li><?
					break;
				case 'model':
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Montadora"><?=$res[manufacturerName]?></a></li>
					<li class="active" title="Modelo"><?=$res[modelName]?></li><?
					break;
				case 'version':
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Montadora"><?=$res[manufacturerName]?></a></li>
					<li><a href="?vehicle=<?=$res[modelId]?>&category=model&action=update" title="Modelo"><?=$res[modelName]?></a></li>
					<li class="active" title="Versão"><?=$res[versionName]?></li><?
					break;
				default:
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Montadora"><?=$res[manufacturerName]?></a></li>
					<li><a href="?vehicle=<?=$res[modelId]?>&category=model&action=update" title="Modelo"><?=$res[modelName]?></a></li>
					<li><a href="?vehicle=<?=$res[versionId]?>&category=version&action=update" title="Versão"><?=$res[versionName]?></a></li>
					<li class="active" title="Ficha Técnica">Ficha Técnica</li><?
					break;
			}
			?>
		</ol>
		<form action="scripts/updateDBFeature.php" method="post" onsubmit="checkFields()">
		<input type="text" name="action" id="action" value="<?=$_GET[action]?>" placeholder="action" />
		<? if ($_GET[action] == "clone") { $fetId = 0; } else { $fetId = $res[featureId]; } ?>
		<input type="text" name="featureId" id="featureId" value="<?=$fetId?>" placeholder="featureId" />
		<input type="text" name="manufacturerId" id="manufacturerId" value="<?=$res[manufacturerId]?>" placeholder="manufacturerId" />
		<input type="text" name="modelId" id="modelId" value="<?=$res[modelId]?>" placeholder="modelId" />
		<input type="text" name="versionId" id="versionId" value="<?=$res[versionId]?>" placeholder="versionId" />
		<input type="text" name="category" id="category" value="<?=$_GET[category]?>" placeholder="category" />
		<div class="dataContent">
			<div class="dataColLeft">
			<?
			//////// filtros dos inputs
			switch ($_GET[category]) {
				case 'manufacturer':
					?>
					<span><label>Montadora:</label><input type="text" name="manufaturerName" id="txtManufacturerName" value="<?=$res[manufacturerName]?>" /></span><br />
					<?
					break;
				case 'model':
					?>
					<span><label>Montadora:</label><input type="text" name="manufaturerName" id="txtManufacturerName" value="<?=$res[manufacturerName]?>" /></span><br />
					<span><label>Modelo:</label><input type="text" name="modelName" id="txtModelName" value="<?=$res[modelName]?>" /></span><br />
					<span><label>Segmento:</label><input type="text" name="segmentName" id="txtSegmentName" value="<?=$res[segmentName]?>" /></span><br />
					<?
					break;
				case 'version':
					?>
					<span><label>Montadora:</label><input type="text" name="manufaturerName" id="txtManufacturerName" value="<?=$res[manufacturerName]?>" /></span><br />
					<span><label>Modelo:</label><input type="text" name="modelName" id="txtModelName" value="<?=$res[modelName]?>" /></span><br />
					<span><label>Versão:</label><input type="text" name="versionName" id="txtVersionName" value="<?=$res[versionName]?>" /></span><br />
					<span><label>Segmento:</label><input type="text" name="segmentName" id="txtSegmentName" value="<?=$res[segmentName]?>" /></span><br />
					<?
					break;
				case 'feature':
				?>
				<span><label>Montadora:</label><input type="text" name="manufaturerName" id="txtManufacturerName" value="<?=$res[manufacturerName]?>" /></span><br />
				<span><label>Modelo:</label><input type="text" name="modelName" id="txtModelName" value="<?=$res[modelName]?>" /></span><br />
				<span><label>Versão:</label><input type="text" name="versionName" id="txtVersionName" value="<?=$res[versionName]?>" /></span><br />
				<span><label>Ano de Produção:</label><input type="text" name="yearModel" id="txtYearModel" value="<?=$res[yearModel]?>" /></span><br />
				<span><label>Ano do Modelo:</label><input type="text" name="yearProduced" id="txtYearProduced" value="<?=$res[yearProduced]?>" /></span><br />
				<span><label>Quantidade de portas:</label><input type="text" name="doors" id="txtDoors" value="<?=$res[doors]?>" /></span><br />
				<span><label>Quantidade de ocupantes:</label><input type="text" name="passagers" id="txtPassagers" value="<?=$res[passagers]?>" /></span><br />
				<span><label>Motor:</label><input type="text" name="engine" id="txtEngine" value="<?=$res[engine]?>" /></span><br />
				<span><label>Alimentação:</label><input type="text" name="feeding" id="txtFeeding"  value="<?=$res[feeding]?>" /></span><br />
				<span><label>Combustível:</label><input type="text" name="fuel" id="txtFuel" value="<?=$res[fuel]?>" /></span><br />
				<span><label>Potência máxima:</label><input type="text" name="powerMax" id="txtPowerMax" value="<?=$res[powerMax]?>" /></span><br />
				<span><label>Torque:</label><input type="text" name="torque" id="txtTorque" value="<?=$res[torque]?>" /></span><br />
				<span><label>Aceleração:</label><input type="text" name="acceleration" id="txtAcceleration" value="<?=$res[acceleration]?>" /></span><br />
				<span><label>Velocidade máxima (km/h):</label><input type="text" name="speedMax" id="txtSpeedMax" value="<?=$res[speedMax]?>" /></span><br />
				<span><label>Consumo (km/l) na cidade:</label><input type="text" name="consumptionCity" id="txtConsumptionCity" value="<?=$res[consumptionCity]?>" /></span><br />
				<span><label>Consumo (km/l) na estrada:</label><input type="text" name="consumptionRoad" id="txtConsumptionRoad" value="<?=$res[consumptionRoad]?>" /></span><br />
				<span><label>Câmbio:</label><input type="text" name="gear" id="txtGear" value="<?=$res[gear]?>" /></span><br />
				<span><label>Tração:</label><input type="text" name="traction" id="txtTraction" value="<?=$res[traction]?>" /></span><br />
				<span><label>Rodas:</label><input type="text" name="wheels" id="txtWheels" value="<?=$res[wheels]?>" /></span><br />
				<span><label>Suspensão dianteira:</label><input type="text" name="frontSuspension" id="txtFrontSuspension" value="<?=$res[frontSuspension]?>" /></span><br />
				<span><label>Suspensão traseira:</label><input type="text" name="rearSuspension" id="txtRearSuspension" value="<?=$res[rearSuspension]?>" /></span><br />
				<span><label>Freio dianteiro:</label><input type="text" name="frontBrake" id="txtFrontBrake" value="<?=$res[frontBrake]?>" /></span><br />
				<span><label>Freio traseiro:</label><input type="text" name="rearBrake" id="txtRearBrake" value="<?=$res[rearBrake]?>" /></span><br />
				<span><label>Dimensão (mm):</label></span><br />
				<span><label>-Comprimento:</label><input type="text" name="dimensionLength" id="txtDimensionLength" value="<?=$res[dimensionLength]?>" /></span><br />
				<span><label>-Largura:</label><input type="text" name="dimensionWidth" id="txtDimensionWidth" value="<?=$res[dimensionWidth]?>" /></span><br />
				<span><label>-Altura:</label><input type="text" name="dimensionHeight" id="txtDimensionHeight" value="<?=$res[dimensionHeight]?>" /></span><br />
				<span><label>-Entre eixos:</label><input type="text" name="dimensionSignAxes" id="txtDimensionSignAxes" value="<?=$res[dimensionSignAxes]?>" /></span><br />
				<span><label>Peso (kg):</label><input type="text" name="weight" id="txtHeight" value="<?=$res[weight]?>" /></span><br />
				<span><label>Porta malas (litros):</label><input type="text" name="trunk" id="txtTrunk" value="<?=$res[trunk]?>" /></span><br />
				<span><label>Tanque (litros):</label><input type="text" name="tank" id="txtTank" value="<?=$res[tank]?>" /></span><br />
				<span><label>Garantia:</label><input type="text" name="warranty" id="txtWarranty" value="<?=$res[warranty]?>" /></span><br />
				<span><label>País de orígem:</label><input type="text" name="countryOrigin" id="txtCountryOrigin" value="<?=$res[countryOrigin]?>" /></span><br />
				<?	
					break;
				default:
					?>
					<span><label>Montadora:</label><input type="text" name="manufaturerName" id="txtManufacturerName" value="<?=$res[manufacturerName]?>" placeholder="Informe a Montadora" /></span><br />
					<span><label>Modelo:</label><input type="text" name="modelName" id="txtModelName" value="<?=$res[modelName]?>" placeholder="Informe o Modelo" /></span><br />
					<span><label>Versão:</label><input type="text" name="versionName" id="txtVersionName" value="<?=$res[versionName]?>" placeholder="Informe a Versão" /></span><br />
					<span><label>Segmento:</label><input type="text" name="segmentName" id="txtSegmentName" value="<?=$res[segmentName]?>" placeholder="Segmento" /></span><br />
					<span><label>Ano de Produção:</label><input type="text" name="yearModel" id="txtYearModel" value="<?=$res[yearModel]?>" placeholder="Ano do Modelo" /></span><br />
					<span><label>Ano do Modelo:</label><input type="text" name="yearProduced" id="txtYearProduced" value="<?=$res[yearProduced]?>" placeholder="Ano de Produção" /></span><br />
				
					<?
				break;
			}
			?>
			</div>
			<div class="dataColRight">
			<?
			if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") {
			?>
				<div class="dataFeatures dataFields">
					<label>ACESSÓRIOS</label>
					<div class="optionsFeatures optionsFields">
						<span>
							<input type="checkbox" name="dualFrontAirBag" value="s" <? if ($res[dualFrontAirBag] == "s") { echo 'checked="true"'; } ?> />
							Airbag duplo frontal
						</span>
						<span>
							<input type="checkbox" name="alarm" value="s" <? if ($res[alarm] == "s") { echo 'checked="true"'; } ?> />
							Alarme
						</span>
						<span>
							<input type="checkbox" name="airConditioning" value="s" <? if ($res[airConditioning] == "s") { echo 'checked="true"'; } ?> />
							Ar condicionado</span>
						<span>
							<input type="checkbox" name="hotAir" value="s" <? if ($res[hotAir] == "s") { echo 'checked="true"'; } ?> />
							Ar quente</span>
						<span>
							<input type="checkbox" name="leatherSeat" value="s" <? if ($res[leatherSeat] == "s") { echo 'checked="true"'; } ?> />
							Banco de couro</span>
						<span>
							<input type="checkbox" name="heightAdjustment" value="s" <? if ($res[heightAdjustment] == "s") { echo 'checked="true"'; } ?> />
							Banco do motorista com regulagem de altura</span>
						<span>
							<input type="checkbox" name="rearSeatSplit" value="s" <? if ($res[rearSeatSplit] == "s") { echo 'checked="true"'; } ?> />
							Banco traseiro bipartido</span>
						<span>
							<input type="checkbox" name="bluetoothSpeakerphone" value="s" <? if ($res[bluetoothSpeakerphone] == "s") { echo 'checked="true"'; } ?> />
							Bluetooth com viva-voz</span>
						<span>
							<input type="checkbox" name="bonnetSea" value="s" <? if ($res[bonnetSea] == "s") { echo 'checked="true"'; } ?> />
							Capota marítima</span>
						<span>
							<input type="checkbox" name="onboardComputer" value="s" <? if ($res[onboardComputer] == "s") { echo 'checked="true"'; } ?> />
							Computador de bordo</span>
						<span>
							<input type="checkbox" name="accelerationCounter" value="s" <? if ($res[accelerationCounter] == "s") { echo 'checked="true"'; } ?> />
							Conta giros</span>
						<span>
							<input type="checkbox" name="rearWindowDefroster" value="s" <? if ($res[rearWindowDefroster] == "s") { echo 'checked="true"'; } ?> />
							Desembaçador de vidro traseiro</span>
						<span>
							<input type="checkbox" name="electricSteering" value="s" <? if ($res[electricSteering] == "s") { echo 'checked="true"'; } ?> />
							Direção hidráulica</span>
						<span>
							<input type="checkbox" name="hydraulicSteering" value="s" <? if ($res[hydraulicSteering] == "s") { echo 'checked="true"'; } ?> />
							Direção hidráulica</span>
						<span>
							<input type="checkbox" name="sidesteps" value="s" <? if ($res[sidesteps] == "s") { echo 'checked="true"'; } ?> />
							Estribos laterais</span>
						<span>
							<input type="checkbox" name="fogLamps" value="s" <? if ($res[fogLamps] == "s") { echo 'checked="true"'; } ?> />
							Faróis de neblina/milha</span>
						<span>
							<input type="checkbox" name="xenonHeadlights" value="s" <? if ($res[xenonHeadlights] == "s") { echo 'checked="true"'; } ?> />
							Faróis xenon</span>
						<span>
							<input type="checkbox" name="absBrake" value="s" <? if ($res[absBrake] == "s") { echo 'checked="true"'; } ?> />
							Freios Abs</span>
						<span>
							<input type="checkbox" name="integratedGPSPanel" value="s" <? if ($res[integratedGPSPanel] == "s") { echo 'checked="true"'; } ?> />
							GPS integrado ao painel</span>
						<span>
							<input type="checkbox" name="rearWindowWiper" value="s" <? if ($res[rearWindowWiper] == "s") { echo 'checked="true"'; } ?> />
							Limpador de vidro traseiro</span>
						<span>
							<input type="checkbox" name="bumper" value="s" <? if ($res[bumper] == "s") { echo 'checked="true"'; } ?> />
							Para choque na cor do veículo</span>
						<span>
							<input type="checkbox" name="autopilot" value="s" <? if ($res[autopilot] == "s") { echo 'checked="true"'; } ?> />
							Piloto automático</span>
						<span>
							<input type="checkbox" name="bucketProtector" value="s" <? if ($res[bucketProtector] == "s") { echo 'checked="true"'; } ?> />
							Protetor de caçamba</span>
						<span>
							<input type="checkbox" name="roofRack" value="s" <? if ($res[roofRack] == "s") { echo 'checked="true"'; } ?> />
							Rack de teto</span>
						<span>
							<input type="checkbox" name="cdplayerUSBInput" value="s" <? if ($res[cdplayerUSBInput] == "s") { echo 'checked="true"'; } ?> />
							checkbox cd player com entrada USB</span>
						<span>
							<input type="checkbox" name="headlightsHeightAdjustment" value="s" <? if ($res[headlightsHeightAdjustment] == "s") { echo 'checked="true"'; } ?> />
							Regulagem de altura dos faróis</span>
						<span>
							<input type="checkbox" name="rearviewElectric" value="s" <? if ($res[rearviewElectric] == "s") { echo 'checked="true"'; } ?> />
							Retrovisor elétrico</span>
						<span>
							<input type="checkbox" name="alloyWheels" value="s" <? if ($res[alloyWheels] == "s") { echo 'checked="true"'; } ?> />
							Rodas de liga leve</span>
						<span>
							<input type="checkbox" name="rainSensor" value="s" <? if ($res[rainSensor] == "s") { echo 'checked="true"'; } ?> />
							Sensor de chuva</span>
						<span>
							<input type="checkbox" name="parkingSensor" value="s" <? if ($res[parkingSensor] == "s") { echo 'checked="true"'; } ?> />
							Sensor de estacionamento</span>
						<span>
							<input type="checkbox" name="isofix" value="s" <? if ($res[isofix] == "s") { echo 'checked="true"'; } ?> />
							Sistema Isofix para cadeira de criança</span>
						<span>
							<input type="checkbox" name="sunroof" value="s" <? if ($res[sunroof] == "s") { echo 'checked="true"'; } ?> />
							Teto solar</span>
						<span>
							<input type="checkbox" name="electricLock" value="s" <? if ($res[electricLock] == "s") { echo 'checked="true"'; } ?> />
							Trava elétrica</span>
						<span>
							<input type="checkbox" name="electricWindow" value="s" <? if ($res[electricWindow] == "s") { echo 'checked="true"'; } ?> />
							Vidro elétrico</span>
						<span>
							<input type="checkbox" name="rearElectricWindow" value="s" <? if ($res[rearElectricWindow] == "s") { echo 'checked="true"'; } ?> />
							Vidro elétrico traseiro</span>
						<span>
							<input type="checkbox" name="steeringWheelAdjustment" value="s" <? if ($res[steeringWheelAdjustment] == "s") { echo 'checked="true"'; } ?> />
							Volante com regulagem de altura</span>
					</div>
				</div>
				<? } ?>
				<?
				if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") {
				$iSerie = 0;
				$sqlSerie = "select * from serieFeature where idFeature = '".$res[featureId]."' order by `option` desc, `description` asc";
				$querySerie = mysql_query($sqlSerie) or die (" error #300");
				$lengthSerie = mysql_num_rows($querySerie);
				?>
				<div class="dataSerie dataFields">
					<label>ITENS DE SÉRIE</label>
					<div id="optionsSerie" class="optionsSerie optionsFields">
						<span>insira novos itens sepando por ;</span>
						<span>
							<textarea name="textAreaSerieAdd" id="textAreaSerieAdd" style="width:95%"><?=$res[itemsSerie]?></textarea>
							<input type="button" id="btnSerieAdd" value="+" />
							<input type="hidden" name="lengthSerie" value="<?=$lengthSerie?>" id="lengthSerie" />
							<!--CHECK HOW MANY FIELDS AFTER SUBMIT AND W/ ADD SCRIPT -->
						</span>
						<label>Itens de série referente a esta versao</label><br />
						<div id="resultSerie">
						<?
						while ($resSerie = mysql_fetch_array($querySerie)) {
							?>
							<span>
								<input type="checkbox" name="rdSerie<?=$iSerie?>" value="s" <? if ($resSerie[option] == "s") { echo 'checked="checked"'; } ?> />
								<input type="hidden" name="txtSerie<?=$iSerie?>" value="<?=$resSerie[description]?>" />
							<?=$resSerie[description]?></span>
							<?
							$iSerie++;
						}
						?>
						</div>
					</div>
				</div>
				<? } ?>
				<?
				if ($_GET[category] != "model" && $_GET[category] != "version"){
				$iOptM=0;
				$sqlOptF = "select optionsFeature.idOption, optionsManufacturer.name, optionsManufacturer.options from optionsFeature, optionsManufacturer where idFeature = '".$res[featureId]."' and idOption = optionsManufacturer.id order by `name` desc";
				$queryOptF = mysql_query($sqlOptF) or die (" error #320");
				$lengthOptF = mysql_num_rows($queryOptF);
				?>
				<div class="dataOptions dataFields">
					<label>OPCIONAIS</label>
					<div id="optionsOptions" class="optionsOptions optionsFields">
						<span>insira novos itens sepando a cada linha</span>
						<span>
							<input type="text" name="txtOptionsCode" id="txtOptionsCode" placeholder="Código do opcional" />
							<input type="text" name="txtOptionsName" id="txtOptionsName" placeholder="Nome do opcional" />
							<textarea name="textAreaOptionsAdd" id="textAreaOptionsAdd" placeholder="Opcionais" style="width:95%"></textarea>
							<input type="button" id="btnOptionsAdd" value="+" />
							<!--CHECK HOW MANY FIELDS  AFTER SUBMIT AND W/ ADD SCRIPT -->
						</span>
						<div id="resultOptions">
						<?
						while ($resOptF = mysql_fetch_array($queryOptF)) {
						?>
							<span>
								<input type="checkbox" name="chOpt<?=$iOptM?>" value="s" checked="checked" />
								<input type="hidden" name="txtOpt<?=$iOptM?>" value="<?=$resOptF[idOption]?>" />
								<label title="<?=$resOptF[options]?>"><?=$resOptF[name]?></label>
							</span>
							<?
							$iOptM++;
							$filterOpt .= " and id != '".$resOptF[idOption]."'";
						}
						?>
						<label>Opcionais referente a Montadora '<?=$res[manufacturerName]?>'</label><br />
						<?
					$sqlOptM = "SELECT * from optionsManufacturer where idManufacturer = '".$res[manufacturerId]."' ".$filterOpt." order by `name` asc";
					$queryOptM = mysql_query($sqlOptM) or die (" error #420");
					$lengthOptM = mysql_num_rows($queryOptM);
					$lengthOptionsTotal = $lengthOptF+$lengthOptM;
						while ($resOptM = mysql_fetch_array($queryOptM)) {
						//try remove duplicity
						?>
							<span>
								<input type="checkbox" name="chOpt<?=$iOptM?>" value="s" />
								<input type="hidden" name="txtOpt<?=$iOptM?>" value="<?=$resOptM[id]?>" />
								<label title="<?=$resOptM[options]?>"><?=$resOptM[name]?></label>
							</span>
							<?
							$iOptM++;
						}
						?>
						</div>
						<input type="hidden" name="lengthOptions" value="<?=$lengthOptionsTotal?>" id="lengthOptions" />
					</div>
				</div>
				<? } ?>
				<?
				if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") { 
					if ($_GET[category] != "model"){
					$iColor = 0;
					if ($_GET[category] == "manufacturer") {
						$sqlColor = "SELECT * from colorManufacturer WHERE idManufacturer = '".$res[manufacturerId]."'";
					} else {
						$sqlColor = "SELECT * from colorModel where idModel = '".$res[modelId]."'";
					}
					$queryColor = mysql_query($sqlColor) or die (" error #450");
					$lengthColor = mysql_num_rows($queryColor);
					?>
					<div class="dataColor dataFields">
						<label>CORES DISPONÍVEIS</label>
						<div class="optionsColor optionsFields" id="optionsColor">
							<span>
								<div id="colorSelector" class="divColor"><div></div></div>
								<input type="text" id="colorSelected" placeholder="cor em hexa" />
								<input type="text" id="colorName" placeholder="nome" />
								<input type="text" id="colorType" placeholder="tipo" />
								<input type="text" id="colorAplication" placeholder="aplicação" />
								<input type="button" value="+" id="btnColorAdd" />
								<input type="hidden" id="colorLength" name="colorLength" value="<?=$lengthColor?>" />
							</span>
							<? while ($resColor = mysql_fetch_array($queryColor)) { ?>
							<span><div class="delColor" onclick="deleteColor(this,'<?=$resColor[id]?>')">X</div><div class="divColor"><div style="background-color: #<?=$resColor[hexa]?>;"></div></div><?=$resColor[name]." - ".$resColor[type]." - ".$resColor[application]?>
							<input type="hidden" name="colorInputName<?=$iColor?>" value="<?=$resColor[name]?>" />
							<input type="hidden" name="colorInputColor<?=$iColor?>" value="<?=$resColor[hexa]?>" />
							<input type="hidden" name="colorInputApp<?=$iColor?>" value="<?=$resColor[application]?>" />
							<input type="hidden" name="colorInputType<?=$iColor?>" value="<?=$resColor[type]?>" /></span>
							<?
							$iColor++;
							}
							?>
						</div>
					</div>
					<? } 
				} ?>
				<? if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") { ?>
				<div class="dataPicture dataFields">
					<label>FOTO</label>
					<div class="optionsPicture optionsFields">
						<label for="txtPicName">Nome da imagem</label><input type="text" name="txtPicName" id="txtPicName" placeholder="Nome da imagem" /><br />
						<label for="txtPicture">Insira a url da imagem <i>ex.: "http://google.com.br/imagemdocarro.jpg"</i></label><input type="text" name="txtPicture" id="txtPicture" placeholder="url da imagem" />
						<input type="button" value="Adicionar" id="btnPictureAdd" />
						<ol class="listPictures" id="listPictures"></ol>
					</div>
				</div>
				<? } ?>
			</div>
		</div>
		<div class="divSave">
			<input type="submit" value="SALVAR" class="btnSave">
			<? if ($_GET[action] != "new" && $_GET[action] != "clone") { ?>
			<a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Excluir Cadastro</a>
			<? } ?>
		</div>
		</form>
		<?
		if ($_GET[category] == "manufacturer" || $_GET[category] == "model" || $_GET[category] == "version") {
		?>
		<div class="relations">
			<span>Itens relacionados</span>
			<div class="dataRelationsFooter"></div>
			<div class="resultSearch">
				<ul class="resultList">
					<li class="resultHeader">
						<div class="rsItems"></div>
						<div class="rsManufacturer">Montadora</div>
						<div class="rsModel">Modelo</div>
						<div class="rsVersion">Versão</div>
						<div class="rsYear">Ano Fabricação</div>
						<div class="rsYear">Ano Modelo</div>
						<div class="rsPicture">Foto</div>
						<div class="rsSegment">Segmento</div>
						<div class="rsGear">Câmbio</div>
						<div class="rsOil">Combustível</div>
						<div class="rsAvaliable">Disponível</div>
					</li>
					<li class="resultFilter">
						<div class="rfItems">Filtros</div>
						<div class="rfManufacturer"><input type="text" id="txtRSManufacturer" onkeyup="filterFields('rsManufacturer',this)" /></div>
						<div class="rfModel"><input type="text" id="txtRSModel" onkeyup="filterFields('rsModel',this)" /></div>
						<div class="rfVersion"><input type="text" id="txtRSVersion" onkeyup="filterFields('rsVersion',this)"  /></div>
						<div class="rfYear"><input type="text" id="txtRSYear" onkeyup="filterFields('rsYear',this)" /></div>
						<div class="rfOptions"><input type="text" id="txtRSOptions" onkeyup="filterFields('rsOptions',this)" /></div>
						<div class="rfPicture"><input type="text" id="txtRSPicture" /></div>
						<div class="rfSegment"><input type="text" id="txtRSSegment" onkeyup="filterFields('rsSegment',this)" /></div>
						<div class="rfGear"><input type="text" id="txtRSGear" onkeyup="filterFields('rsGear',this)" /></div>
						<div class="rfOil"><input type="text" id="txtRSOil" onkeyup="filterFields('rsOil',this)" /></div>
						<div class="rfAvaliable"><input type="text" id="txtRSAvaliable" /></div>
					</li>
					<li class="resultData"><ul>
					<?
					switch ($_GET[category]) {
						case 'manufacturer':
							$sql_relat = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name AS modelName FROM manufacturer, model WHERE model.idManufacturer = manufacturer.id AND model.idManufacturer = '".$res[manufacturerId]."'";
							$sqlField = "modelId";
							$categoryRelat = "model";
						break;
						case 'model':
							$sql_relat = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.idModel = '".$res[modelId]."'";
							$sqlField = "versionId";
							$categoryRelat = "version";
							break;
						case 'version':
							$sql_relat = "SELECT feature.id as featureId, feature.yearProduced, feature.yearModel, feature.engine, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id AND feature.idVersion = '".$res[versionId]."'";
							$sqlField = "featureId";
							$categoryRelat = "feature";
							break;
					}
						$query_relat = mysql_query($sql_relat) or die (mysql_error()."error #495");
						while ($resRelat = mysql_fetch_array($query_relat)) {
						?>
						<li class="resultItem" idDB="<?=$res[$sqlField]?>">
							<div class="rsItems">
								<div class="btnClone btnButton" title="Adicionar um novo registro para esta Versão" alt="Adicionar um novo registro para esta Versão">+</div>';
								<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
								<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
							</div>
							<a href="formDetails.php?vehicle=<?=$resRelat[$sqlField]?>&category=<?=$categoryRelat?>&action=update" class="resultContent">
								<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$resRelat[manufacturerName]?></div>
								<div class="rsModel" title="<?=$res[modelName]?>"><?=$resRelat[modelName]?></div>
								<div class="rsVersion" title="<?=$res[versionName]?>"><?=$resRelat[versionName]?></div>
								<div class="rsYear" title="<?=$res[yearProduced]?>"><?=$resRelat[yearProduced]?></div>
								<div class="rsYear" title="<?=$res[yearModel]?>"><?=$resRelat[yearModel]?></div>
							</a>
						</li>
					<? }
					?>
					</ul></li>
				</ul>
			</div>
		</div>
		<? } ?>
	</div>
<footer>Copyright</footer>
</div>
</body>
</html>