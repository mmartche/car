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
		case 'manufacturer':
			$sql_search = "SELECT id as manufacturerId, name as manufacturerName, description from manufacturer where id = '".$_GET[vehicle]."'";
			break;
		case 'model':
			$sql_search = "SELECT id as manufacturerId, name as manufacturerName, description from manufacturer where id = '".$_GET[vehicle]."'";
			break;
		case 'version':
			$sql_search = "SELECT model.id as modelId, model.name as modelName, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.description from model, manufacturer where model.idManufacturer = manufacturer.id and model.id = '".$_GET[vehicle]."'";
			break;
		case 'feature':
			$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.id = '".$_GET[vehicle]."'";
			break;
	}
} elseif ($_GET[action] == "clone") {
	//$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
	$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie, feature.doors, feature.passagers, feature.engine, feature.feeding, feature.fuel, feature.powerMax, feature.torque, feature.acceleration, feature.speedMax, feature.consumptionCity, feature.consumptionRoad, feature.steering, feature.gear, feature.traction, feature.wheels, feature.frontSuspension, feature.rearSuspension, feature.frontBrake, feature.rearBrake, feature.dimensionLength, feature.dimensionWidth, feature.dimensionHeight, feature.dimensionSignAxes, feature.weight, feature.trunk, feature.tank, feature.warranty, feature.countryOrigin, feature.dualFrontAirBag, feature.alarm, feature.airConditioning, feature.hotAir, feature.leatherSeat, feature.heightAdjustment, feature.rearSeatSplit, feature.bluetoothSpeakerphone, feature.bonnetSea, feature.onboardComputer, feature.accelerationCounter, feature.rearWindowDefroster, feature.electricSteering, feature.hydraulicSteering, feature.sidesteps, feature.fogLamps, feature.xenonHeadlights, feature.absBrake, feature.integratedGPSPanel, feature.rearWindowWiper, feature.bumper, feature.autopilot, feature.bucketProtector, feature.roofRack, feature.cdplayerUSBInput, feature.radio, feature.headlightsHeightAdjustment, feature.rearviewElectric, feature.alloyWheels, feature.rainSensor, feature.parkingSensor, feature.isofix, feature.sunroof, feature.electricLock, feature.electricWindow, feature.rearElectricWindow, feature.steeringWheelAdjustment, feature.picture, feature.price, feature.description, feature.active, feature.dateCreate, feature.dateUpdate, model.idSegment1, model.idSegment2, model.idSegment3 from feature, manufacturer, model, version where  feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
} else {
	switch ($_GET[category]) {
		case 'manufacturer':
			$sql_search = "SELECT id as manufacturerId, name as manufacturerName, description from manufacturer where id = '".$_GET[vehicle]."'";
			break;
		case 'model':
			$sql_search = "SELECT model.id as modelId, model.name as modelName, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.description, model.idSegment1, model.idSegment2, model.idSegment3 from model, manufacturer where model.idManufacturer = manufacturer.id and model.id = '".$_GET[vehicle]."'";
			break;
		case 'version':
			$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, version.description FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.id = '".$_GET[vehicle]."'";
			break;
		case 'feature':
			//$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and feature.id = '".$_GET[vehicle]."'";
			$typeSearch = ($_GET[action] == "viewVersion" ? "feature.idVersion" : "feature.id");
			$sql_search = "SELECT feature.id as featureId, manufacturer.id as manufacturerId, model.id as modelId, version.id as versionId, manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, feature.yearProduced, feature.yearModel, feature.items as itemsSerie, feature.doors, feature.passagers, feature.engine, feature.feeding, feature.fuel, feature.powerMax, feature.torque, feature.acceleration, feature.speedMax, feature.consumptionCity, feature.consumptionRoad, feature.steering, feature.gear, feature.traction, feature.wheels, feature.frontSuspension, feature.rearSuspension, feature.frontBrake, feature.rearBrake, feature.dimensionLength, feature.dimensionWidth, feature.dimensionHeight, feature.dimensionSignAxes, feature.weight, feature.trunk, feature.tank, feature.warranty, feature.countryOrigin, feature.dualFrontAirBag, feature.alarm, feature.airConditioning, feature.hotAir, feature.leatherSeat, feature.heightAdjustment, feature.rearSeatSplit, feature.bluetoothSpeakerphone, feature.bonnetSea, feature.onboardComputer, feature.accelerationCounter, feature.rearWindowDefroster, feature.electricSteering, feature.hydraulicSteering, feature.sidesteps, feature.fogLamps, feature.xenonHeadlights, feature.absBrake, feature.integratedGPSPanel, feature.rearWindowWiper, feature.bumper, feature.autopilot, feature.bucketProtector, feature.roofRack, feature.cdplayerUSBInput, feature.radio, feature.headlightsHeightAdjustment, feature.rearviewElectric, feature.alloyWheels, feature.rainSensor, feature.parkingSensor, feature.isofix, feature.sunroof, feature.electricLock, feature.electricWindow, feature.rearElectricWindow, feature.steeringWheelAdjustment, feature.picture, feature.active, feature.dateCreate, feature.dateUpdate, feature.description, feature.price, model.idSegment1, model.idSegment2, model.idSegment3 from feature, manufacturer, model, version where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id  and ".$typeSearch." = '".$_GET[vehicle]."'";
			break;
	}
}
if ($_GET[category]) {
$query_search = mysql_query($sql_search) or die ("error #73");
	if (mysql_num_rows($query_search) > 0 ) {
		$res = mysql_fetch_array($query_search);
	} else {
		$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, version.description FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id AND version.id = '".$_GET[vehicle]."'";
		$query_searchN = mysql_query($sql_search) or die (" error #79");
		$res = mysql_fetch_array($query_searchN);
	}
}
?>
<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<?
		switch ($_GET[category]) {
			case 'manufacturer':
				echo "<h2><span>Sistema administrativo - Cadastro de Montadoras</span>";
				if ($_GET[action] == "new") {
					?>
					<!--input type="button" value="Incluir" class="btnSave btnButton" /-->
					<?
				} elseif ($_GET[action] == "update") {
					?>
					<!-- <a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Desativar Cadastro</a> -->
					<a href='?category=model&action=new&vehicle=<?=$res[manufacturerId]?>' class='btnButton btnNewForm' id='btnAddItem'>Incluir Modelo para esta Montadora</a>
					<!--input type="button" value="Atualizar" class="btnSave btnButton" /-->
					<?
				}
				echo "</h2>";
				break;
			case 'model':
				echo "<h2><span>Sistema administrativo - Cadastro de Versão</span>";
				if ($_GET[action] == "new") {
					?>
						<!--input type="button" value="Incluir" class="btnSave btnButton" /-->
					<?
				} elseif ($_GET[action] == "update") {
					?>
						<!-- <a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Desativar Cadastro</a> -->
						<a href='?category=version&action=new&vehicle=<?=$res[modelId]?>' class='btnButton btnNewForm' id='btnAddItem'>Incluir Versão para este Modelo</a>
						<!--input type="submit" value="Atualizar" class="btnSave btnButton" /-->
					<?
				}
				echo "</h2>";
				break;
			case 'version':
				echo "<h2><span>Sistema administrativo - Cadastro de Modelo</span>";
				if ($_GET[action] == "new") {
					?>
						<!--input type="submit" value="Incluir" class="btnSave btnButton" /-->
					<?
				} elseif ($_GET[action] == "update") {
					?>
						<!-- <a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Desativar Cadastro</a> -->
						<a href='?category=feature&action=new&vehicle=<?=$res[versionId]?>' class='btnButton btnNewForm' id='btnAddItem'>Incluir Ficha Técnica para esta Versão</a>
						<!--input type="submit" value="Atualizar" class="btnSave btnButton" /-->	
					<?
				}

				echo"</h2>";
				break;
			case 'feature':
				echo "<h2><span>Sistema administrativo - Ficha Técnica de veículos</span>";
				if ($_GET[action] == "new" || $_GET[action] == "clone") {
					?>
					<!--input type="button" value="Incluir" class="btnSave btnButton" /-->
					<?
				} elseif ($_GET[action] == "update") {
					?>
						<!-- <a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Desativar Cadastro</a> -->
						<a href='?category=feature&action=clone&vehicle=<?=$res[featureId]?>' class='btnButton btnNewForm' id='btnAddItem'>Clonar Ficha Técnica</a>
						<!--input type="submit" value="Atualizar" class="btnSave btnButton" /-\-->
					<?
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
			<li><a href="ficha-tecnica.php">Listagem</a></li>
			<?
			switch ($_GET[category]) {
				case 'manufacturer':
					?><li class="active" title="Editar Montadora"><?=$res[manufacturerName]?></li><?
					break;
				case 'model':
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Editar Montadora"><?=$res[manufacturerName]?></a></li>
					<li class="active" title="Editar Modelo"><?=$res[modelName]?></li><?
					break;
				case 'version':
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Editar Montadora"><?=$res[manufacturerName]?></a></li>
					<li><a href="?vehicle=<?=$res[modelId]?>&category=model&action=update" title="Editar Modelo"><?=$res[modelName]?></a></li>
					<li class="active" title="Editar Versão"><?=$res[versionName]?></li><?
					break;
				default:
					?><li><a href="?vehicle=<?=$res[manufacturerId]?>&category=manufacturer&action=update" title="Editar Montadora"><?=$res[manufacturerName]?></a></li>
					<li><a href="?vehicle=<?=$res[modelId]?>&category=model&action=update" title="Editar Modelo"><?=$res[modelName]?></a></li>
					<li><a href="?vehicle=<?=$res[versionId]?>&category=version&action=update" title="Editar Versão"><?=$res[versionName]?></a></li>
					<li class="active" title="Editar Ficha Técnica">Ficha Técnica</li><?
					break;
			}
			?>
		</ol>
		<form action="scripts/updateDBFeature.php" method="post" onsubmit="return checkFields(this)" enctype="multipart/form-data">
		<?
		$actionType = ((mysql_num_rows($query_search) > 0) && ($_GET[action] != "clone") ? "update" : "new");
		//$actionType = $_GET[action];
		?>
		<input type="hidden" class="text" name="action" id="action" value="<?=$actionType?>" placeholder="action" />
		<? if ($_GET[action] == "clone") { $fetId = 0; } else { $fetId = $res[featureId]; } ?>
		<input type="hidden" class="text" name="featureId" id="featureId" value="<?=$fetId?>" placeholder="featureId" />
		<input type="hidden" class="text" name="manufacturerId" id="manufacturerId" value="<?=$res[manufacturerId]?>" placeholder="manufacturerId" />
		<input type="hidden" class="text" name="modelId" id="modelId" value="<?=$res[modelId]?>" placeholder="modelId" />
		<input type="hidden" class="text" name="versionId" id="versionId" value="<?=$res[versionId]?>" placeholder="versionId" />
		<input type="hidden" class="text" name="category" id="category" value="<?=$_GET[category]?>" placeholder="category" />
		<div class="dataContent">
			<div class="dataColLeft">
			<?
			//////// filtros dos inputs
			switch ($_GET[category]) {
				case 'manufacturer':
					?>
					<span><label>Montadora:</label>
						<select  id="manufacturerName">
						    <?
						    $sqlManuf = "SELECT id, name from manufacturer order by name";
						    $queryManuf = mysql_query($sqlManuf);
						    while ($resManuf = mysql_fetch_array($queryManuf)) {
						    	?>
						    	<option value="<?=$resManuf[id]?>" <? if ($resManuf[name] == $res[manufacturerName]) echo "selected=selected"; ?>><?=$resManuf[name]?></option>
						    	<?
						    }
						    ?>
						</select>
					</span><br />
					<span><label>Descrição:</label><textarea name="description" id="txtDescription"><?=$res[description]?></textarea></span>
					<?
					break;
				case 'model':
					?>
					<span><label>Montadora:</label>
						<select  id="manufacturerName">
						    <?
						    $sqlManuf = "SELECT id, name from manufacturer order by name";
						    $queryManuf = mysql_query($sqlManuf);
						    while ($resManuf = mysql_fetch_array($queryManuf)) {
						    	?>
						    	<option value="<?=$resManuf[id]?>" <? if ($resManuf[name] == $res[manufacturerName]) echo "selected=selected"; ?>><?=$resManuf[name]?></option>
						    	<?
						    }
						    ?>
						</select>
					</span><br />
					<span><label>Modelo:</label>
						<select  id="modelName">
							<? if ($res[modelName]) {
								$sqlMod = "SELECT id, name from model where idManufacturer = '".$res[manufacturerId]."' order by name";
							    $queryMod = mysql_query($sqlMod);
							    while ($resMod = mysql_fetch_array($queryMod)) {
						    ?>
						    	<option value="<?=$resMod[id]?>" <? if ($resMod[name] == $res[modelName]) echo "selected=selected"; ?>><?=$resMod[name]?></option>
								<? } 
							} ?>
						</select>
					</span><br />
					<?
					$flagSeg=0;

					$optsArray1 = array(); $optsArray2 = array(); $optsArray3 = array();
					$optsArray1[] = $optsArray2[] = $optsArray3[] = '<option>Segmento</option>';
					$sqlSeg = "SELECT id, name from segment order by name";
				    $querySeg = mysql_query($sqlSeg);
				    while ($resSeg = mysql_fetch_array($querySeg)) {
						// $optsArray1[] = '<option value="'.$resSeg[id].'" >'.$resSeg[id].'</option>';
						// $optList .= '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
						if ($resSeg[id] == $res[idSegment1]) {
							$optsArray1[] = '<option selected="selected" value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray2[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray3[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optSeg1=$flagSeg;
						} elseif ($resSeg[id] == $res[idSegment2]) {
							$optsArray1[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray2[] = '<option selected="selected" value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray3[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optSeg2=$flagSeg;
						} elseif ($resSeg[id] == $res[idSegment3]) {
							$optsArray1[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray2[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray3[] = '<option selected="selected" value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optSeg3=$flagSeg;
						} else {
							$optsArray1[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray2[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
							$optsArray3[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
						}
						$flagSeg++;
					}
					 ?> 
					<span><label>Segmento 1:</label>
						<input type="hidden" name="txtidSegment1" value="<?=$res[idSegment1]?>">
						<select id="idSegment1">
						<?
						// echo $optList;
						
						for ($i=0; $i < count($optsArray1); $i++) { 
							// if ($i == $optSeg1) {
							// 	echo str_replace("<option", "<option checked='checked' ",$optsArray1[$i]);
							// } else {
							// }
								echo $optsArray1[$i];
						}
						
						?>
						</select>
					</span><br />
					<span><label>Segmento 2:</label>
						<input type="hidden" name="txtidSegment2" value="<?=$res[idSegment2]?>">
						<select id="idSegment2">
						<?
						for ($i=0; $i < count($optsArray2); $i++) { 
							echo $optsArray2[$i];
						}
						?>
						</select>
					</span><br />
					<span><label>Segmento 3:</label>
						<input type="hidden" name="txtidSegment3" value="<?=$res[idSegment3]?>">
						<select  id="idSegment3">
						<?
						for ($i=0; $i < count($optsArray3); $i++) { 
							echo $optsArray3[$i];
						}
						?>
						</select>
					</span><br />

					<span><label>Descrição:</label><textarea name="description" id="txtDescription"><?=$res[description]?></textarea></span>
					<?
					break;
				case 'version':
					?>
					<span><label>Montadora:</label>
						<select  id="manufacturerName">
						    <?
						    $sqlManuf = "SELECT id, name from manufacturer order by name";
						    $queryManuf = mysql_query($sqlManuf);
						    while ($resManuf = mysql_fetch_array($queryManuf)) {
						    	?>
						    	<option value="<?=$resManuf[id]?>" <? if ($resManuf[name] == $res[manufacturerName]) echo "selected=selected"; ?>><?=$resManuf[name]?></option>
						    	<?
						    }
						    ?>
						</select>
					</span><br />
					<span><label>Modelo:</label>
						<select  id="modelName">
							<? if ($res[modelName]) {
								$sqlMod = "SELECT id, name from model where idManufacturer = '".$res[manufacturerId]."' order by name";
							    $queryMod = mysql_query($sqlMod);
							    while ($resMod = mysql_fetch_array($queryMod)) {
						    ?>
						    	<option value="<?=$resMod[id]?>" <? if ($resMod[name] == $res[modelName]) echo "selected=selected"; ?>><?=$resMod[name]?></option>
								<? } 
							} ?>
						</select>
					</span><br />
					<span><label>Versão:</label>
						<select  id="versionName">
							<? if ($res[versionName]) { 
								$sqlVer = "SELECT id, name from version where idModel = '".$res[modelId]."' order by name";
							    $queryVer = mysql_query($sqlVer);
							    while ($resVer = mysql_fetch_array($queryVer)) {
								?>
									<option value="<?=$res[versionId]?>" <? if ($resVer[name] == $res[versionName]) echo "selected=selected"; ?> ><?=$res[versionName]?></option>
								<? } 
							} ?>
						</select>
					</span><br />
					<span><label>Ano Inicial:</label><input type="text" name="anoFabIni" value="<?=$resVer[anoFabIni]?>" /></span><br />
					<span><label>Ano Final:</label><input type="text" class="anoFabFim" value="<?=$resVer[anoFabFim]?>" /></span><br />
					<span><label>Descrição:</label><textarea name="description" id="txtDescription"><?=$res[description]?></textarea></span>
					<?
					break;
				case 'feature':
					?>
					<span id="spanManufacturerName">
						<label>Montadora</label>
						<select  id="manufacturerName">
						    <?
						    $sqlManuf = "SELECT id, name from manufacturer order by name";
						    $queryManuf = mysql_query($sqlManuf);
						    while ($resManuf = mysql_fetch_array($queryManuf)) {
						    	?>
						    	<option value="<?=$resManuf[id]?>" <? if ($resManuf[name] == $res[manufacturerName]) echo "selected=selected"; ?>><?=$resManuf[name]?></option>
						    	<?
						    }
						    ?>
						</select>
					</span><br />
					<!--span><label>Montadora:</label><input type="text"  id="manufacturerName" value="<?=$res[manufacturerName]?>" /></span><br /-->
					<span id="spanModelName">
						<label>Modelo:</label>
						<select  id="modelName">
							<? if ($res[modelName]) {
								$sqlMod = "SELECT id, name from model where idManufacturer = '".$res[manufacturerId]."' order by name";
							    $queryMod = mysql_query($sqlMod);
							    while ($resMod = mysql_fetch_array($queryMod)) {
						    ?>
						    	<option value="<?=$resMod[id]?>" <? if ($resMod[name] == $res[modelName]) echo "selected=selected"; ?>><?=$resMod[name]?></option>
								<? } 
							} ?>
						</select>
						<!--input type="text" id="modelName" value="<?=$res[modelName]?>" /-->
					</span><br />
					<span id="spanVersionName">
						<label>Versão:</label>
						<select  id="versionName">
							<? if ($res[versionName]) { 
								$sqlVer = "SELECT id, name from version where idModel = '".$res[modelId]."' order by name";
							    $queryVer = mysql_query($sqlVer);
							    while ($resVer = mysql_fetch_array($queryVer)) {
								?>
									<option value="<?=$res[versionId]?>" <? if ($resMod[name] == $res[versionName]) echo "selected=selected"; ?> ><?=$res[versionName]?></option>
								<? } 
							} ?>
						</select>
						<!--input type="text" id="versionName" value="<?=$res[versionName]?>" /-->
					</span><br />
					<?
					$flagSeg=1;
					$optsArray = array();
					$sqlSeg = "SELECT id, name from segment order by name";
				    $querySeg = mysql_query($sqlSeg);
				    $optsArray[] = '<option>Segmento</option>';
				    while ($resSeg = mysql_fetch_array($querySeg)) {
						$optsArray[] = '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
						// $optList .= '<option value="'.$resSeg[id].'" >'.$resSeg[name].'</option>';
						if ($resSeg[id] == $res[idSegment1]) {
							$optSeg1=$flagSeg;
						}
						if ($resSeg[id] == $res[idSegment2]) {
							$optSeg2=$flagSeg;
						}
						if ($resSeg[id] == $res[idSegment3]) {
							$optSeg3=$flagSeg;
						}
						$flagSeg++;

					} ?> 
					<span><label>Segmento 1:</label>
						<input type="hidden" style="width:30px;" name="txtidSegment1" value="<?=$res[idSegment1]?>">
						<select  id="idSegment1" disabled="disabled">
						<?
						// echo $optList;
						
						for ($i=0; $i < count($optsArray); $i++) { 
							if ($i == $optSeg1) {
								echo str_replace("<option", "<option selected='selected' ",$optsArray[$i]);
							} else {
								echo $optsArray[$i];
							}
						}
						
						?>
						</select>
					</span><br />
					<span><label>Segmento 2:</label>
						<input type="hidden" style="width:30px;" name="txtidSegment2" value="<?=$res[idSegment2]?>">
						<select  id="idSegment2" disabled="disabled">
						<?
						for ($i=0; $i < count($optsArray); $i++) { 
							if ($i == $optSeg2) {
								echo str_replace("<option", "<option selected='selected'",$optsArray[$i]);
							} else {
								echo $optsArray[$i];
							}
						}
						?>
						</select>
					</span><br />
					<span><label>Segmento 3:</label>
						<input type="hidden" style="width:30px;" name="txtidSegment3" value="<?=$res[idSegment3]?>">
						<select  id="idSegment3" disabled="disabled">
						<?
						for ($i=0; $i < count($optsArray); $i++) { 
							if ($i == $optSeg3) {
								echo str_replace("<option", "<option selected='selected'",$optsArray[$i]);
							} else {
								echo $optsArray[$i];
							}
						}
						?>
						</select>
					</span><br />
					<span><label>Ano do Modelo:</label><input type="text" name="yearModel" id="txtYearModel" value="<?=$res[yearModel]?>" /></span><br />
					<span><label>Ano de Fabricação:</label><input type="text" name="yearProduced" id="txtYearProduced" value="<?=$res[yearProduced]?>" /></span><br />
					<span><label>Quantidade de portas:</label><input type="text" name="doors" id="txtDoors" value="<?=$res[doors]?>" /></span><br />
					<span><label>Quantidade de ocupantes:</label><input type="text" name="passagers" id="txtPassagers" value="<?=$res[passagers]?>" /></span><br />
					<span><label>Motor:</label><input type="text" name="engine" id="txtEngine" value="<?=$res[engine]?>" /></span><br />
					<span><label>Alimentação:</label><input type="text" name="feeding" id="txtFeeding"  value="<?=$res[feeding]?>" /></span><br />
					<span><label>Combustível:</label>
						<select  name="fuel" id="txtFuel">
							<option>Combustível</option>
							<option value="F" <? if ($res[fuel] == "F") echo 'selected="selected"'; ?> >Flex</option>
							<option value="G" <? if ($res[fuel] == "G") echo 'selected="selected"'; ?> >Gasolina</option>
							<option value="E" <? if ($res[fuel] == "E") echo 'selected="selected"'; ?> >Etanol</option>
							<option value="D" <? if ($res[fuel] == "D") echo 'selected="selected"'; ?> >Diesel</option>
						</select>
					</span><br />
					<span><label>Potência máxima:</label><input type="text" name="powerMax" id="txtPowerMax" value="<?=$res[powerMax]?>" /></span><br />
					<span><label>Torque:</label><input type="text" name="torque" id="txtTorque" value="<?=$res[torque]?>" /></span><br />
					<span><label>Aceleração:</label><input type="text" name="acceleration" id="txtAcceleration" value="<?=$res[acceleration]?>" /></span><br />
					<span><label>Velocidade máxima (km/h):</label><input type="text" name="speedMax" id="txtSpeedMax" value="<?=$res[speedMax]?>" /></span><br />
					<span><label>Consumo (km/l) na cidade:</label><input type="text" name="consumptionCity" id="txtConsumptionCity" value="<?=$res[consumptionCity]?>" /></span><br />
					<span><label>Consumo (km/l) na estrada:</label><input type="text" name="consumptionRoad" id="txtConsumptionRoad" value="<?=$res[consumptionRoad]?>" /></span><br />
					<span><label>Direção:</label><input type="text" name="steering" id="txtSteering" value="<?=$res[steering]?>" /></span><br />
					<span><label>Câmbio:</label>
					<!-- <select  name="gear" id="txtGear">
							<option>Câmbio</option>
							<option value="F"><?=$res[gear]?></option>
						</select><br /> -->
						<input type="text" name="gear" id="txtGear" value="<?=$res[gear]?>" /></span><br />
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
					<span><label>País de orígem:</label>
						<select  name="countryOrigin" id="countryOrigin">
							<option value="<?=$res[countryOrigin]?>"><?=$res[countryOrigin]?></option>
							<option value="Alemanha">Alemanha</option>
							<option value="Argentina">Argentina</option>
							<option value="Austrália">Austrália</option>
							<option value="Áustria">Áustria</option>
							<option value="Bélgica">Bélgica</option>
							<option value="Brasil">Brasil</option>
							<option value="Canadá">Canadá</option>
							<option value="Coréia do Sul">Coréia do Sul</option>
							<option value="Espanha">Espanha</option>
							<option value="Estados Unidos">Estados Unidos</option>
							<option value="França">França</option>
							<option value="Holanda">Holanda</option>
							<option value="Importado">Importado</option>
							<option value="Importado/Nacional">Importado/Nacional</option>
							<option value="Inglaterra">Inglaterra</option>
							<option value="Itália">Itália</option>
							<option value="Japao">Japão</option>
							<option value="México">México</option>
							<option value="Suécia">Suécia</option>
							<option value="Suiça">Suiça</option>
							<option value="Tailândia">Tailândia</option>
							<option value="Uruguai">Uruguai</option>
						</select>
					</span><br />
					<span><label>Preço:</label><input type="text" name="price" id="txtPrice" value="<?=$res[price]?>" onKeyPress="return(format_price(this,'.','',8,0,event))" /></span><br />
					<span><label>Descrição:</label><textarea name="description" id="txtDescription"><?=$res[description]?></textarea></span>
					<?	
					break;
					/*
				default:
					?>
					<span><label>Montadora:</label><input type="text"  id="manufacturerName" value="<?=$res[manufacturerName]?>" placeholder="Informe a Montadora" /></span><br />
					<span><label>Modelo:</label><input type="text" id="modelName" value="<?=$res[modelName]?>" placeholder="Informe o Modelo" /></span><br />
					<span><label>Versão:</label><input type="text" id="versionName" value="<?=$res[versionName]?>" placeholder="Informe a Versão" /></span><br />
					<span><label>Segmento:</label><input type="text" name="segmentName" id="txtSegmentName" value="<?=$res[segmentName]?>" placeholder="Segmento" /></span><br />
					<span><label>Ano de Produção:</label><input type="text" name="yearModel" id="txtYearModel" value="<?=$res[yearModel]?>" placeholder="Ano do Modelo" /></span><br />
					<span><label>Ano do Modelo:</label><input type="text" name="yearProduced" id="txtYearProduced" value="<?=$res[yearProduced]?>" placeholder="Ano de Produção" /></span><br />
					<span class="hide"><label>Quantidade de portas:</label><input type="text" name="doors" id="txtDoors" value="<?=$res[doors]?>" /></span><br />
					<span class="hide"><label>Quantidade de ocupantes:</label><input type="text" name="passagers" id="txtPassagers" value="<?=$res[passagers]?>" /></span><br />
					<span class="hide"><label>Motor:</label><input type="text" name="engine" id="txtEngine" value="<?=$res[engine]?>" /></span><br />
					<span class="hide"><label>Alimentação:</label><input type="text" name="feeding" id="txtFeeding"  value="<?=$res[feeding]?>" /></span><br />
					<span class="hide"><label>Combustível:</label><input type="text" name="fuel" id="txtFuel" value="<?=$res[fuel]?>" /></span><br />
					<span class="hide"><label>Potência máxima:</label><input type="text" name="powerMax" id="txtPowerMax" value="<?=$res[powerMax]?>" /></span><br />
					<span class="hide"><label>Torque:</label><input type="text" name="torque" id="txtTorque" value="<?=$res[torque]?>" /></span><br />
					<span class="hide"><label>Aceleração:</label><input type="text" name="acceleration" id="txtAcceleration" value="<?=$res[acceleration]?>" /></span><br />
					<span class="hide"><label>Velocidade máxima (km/h):</label><input type="text" name="speedMax" id="txtSpeedMax" value="<?=$res[speedMax]?>" /></span><br />
					<span class="hide"><label>Consumo (km/l) na cidade:</label><input type="text" name="consumptionCity" id="txtConsumptionCity" value="<?=$res[consumptionCity]?>" /></span><br />
					<span class="hide"><label>Consumo (km/l) na estrada:</label><input type="text" name="consumptionRoad" id="txtConsumptionRoad" value="<?=$res[consumptionRoad]?>" /></span><br />
					<span class="hide"><label>Câmbio:</label><input type="text" name="gear" id="txtGear" value="<?=$res[gear]?>" /></span><br />
					<span class="hide"><label>Tração:</label><input type="text" name="traction" id="txtTraction" value="<?=$res[traction]?>" /></span><br />
					<span class="hide"><label>Rodas:</label><input type="text" name="wheels" id="txtWheels" value="<?=$res[wheels]?>" /></span><br />
					<span class="hide"><label>Suspensão dianteira:</label><input type="text" name="frontSuspension" id="txtFrontSuspension" value="<?=$res[frontSuspension]?>" /></span><br />
					<span class="hide"><label>Suspensão traseira:</label><input type="text" name="rearSuspension" id="txtRearSuspension" value="<?=$res[rearSuspension]?>" /></span><br />
					<span class="hide"><label>Freio dianteiro:</label><input type="text" name="frontBrake" id="txtFrontBrake" value="<?=$res[frontBrake]?>" /></span><br />
					<span class="hide"><label>Freio traseiro:</label><input type="text" name="rearBrake" id="txtRearBrake" value="<?=$res[rearBrake]?>" /></span><br />
					<span class="hide"><label>Dimensão (mm):</label></span><br />
					<span class="hide"><label>-Comprimento:</label><input type="text" name="dimensionLength" id="txtDimensionLength" value="<?=$res[dimensionLength]?>" /></span><br />
					<span class="hide"><label>-Largura:</label><input type="text" name="dimensionWidth" id="txtDimensionWidth" value="<?=$res[dimensionWidth]?>" /></span><br />
					<span class="hide"><label>-Altura:</label><input type="text" name="dimensionHeight" id="txtDimensionHeight" value="<?=$res[dimensionHeight]?>" /></span><br />
					<span class="hide"><label>-Entre eixos:</label><input type="text" name="dimensionSignAxes" id="txtDimensionSignAxes" value="<?=$res[dimensionSignAxes]?>" /></span><br />
					<span class="hide"><label>Peso (kg):</label><input type="text" name="weight" id="txtHeight" value="<?=$res[weight]?>" /></span><br />
					<span class="hide"><label>Porta malas (litros):</label><input type="text" name="trunk" id="txtTrunk" value="<?=$res[trunk]?>" /></span><br />
					<span class="hide"><label>Tanque (litros):</label><input type="text" name="tank" id="txtTank" value="<?=$res[tank]?>" /></span><br />
					<span class="hide"><label>Garantia:</label><input type="text" name="warranty" id="txtWarranty" value="<?=$res[warranty]?>" /></span><br />
					<span class="hide"><label>País de orígem:</label><input type="text" name="countryOrigin" id="txtCountryOrigin" value="<?=$res[countryOrigin]?>" /></span><br />
					<span class="hide"><label>Descrição:</label><textarea name="description" id="txtDescription"><?=$res[description]?></textarea></span>
					<?
				break;
				*/
			}
			?>
			</div>
			<div class="dataColRight">
			<?
			if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") {
			?>
				<div class="dataFeatures dataFields">
					<label class="subTitle">ACESSÓRIOS</label>
					<div class="optionsVersions optionsFields">
						<span>
							<input type="checkbox" id="dualFrontAirBag" name="dualFrontAirBag" value="s" <? if (strtolower($res[dualFrontAirBag]) == "s") { echo 'checked="true"'; } ?> />
							<label for="dualFrontAirBag">Airbag duplo frontal</label>
						</span>
						<span>
							<input type="checkbox" id="alarm" name="alarm" value="s" <? if (strtolower($res[alarm]) == "s") { echo 'checked="true"'; } ?> />
							<label for="alarm">Alarme</label>
						</span>
						<span>
							<input type="checkbox" id="airConditioning" name="airConditioning" value="s" <? if (strtolower($res[airConditioning]) == "s") { echo 'checked="true"'; } ?> />
							<label for="airConditioning">Ar condicionado</label>
						</span>
						<span>
							<input type="checkbox" id="hotAir" name="hotAir" value="s" <? if (strtolower($res[hotAir]) == "s") { echo 'checked="true"'; } ?> />
							<label for="hotAir">Ar quente</label>
						</span>
						<span>
							<input type="checkbox" id="leatherSeat" name="leatherSeat" value="s" <? if (strtolower($res[leatherSeat]) == "s") { echo 'checked="true"'; } ?> />
							<label for="leatherSeat">Banco de couro</label>
						</span>
						<span>
							<input type="checkbox" id="heightAdjustment" name="heightAdjustment" value="s" <? if (strtolower($res[heightAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label for="heightAdjustment">Banco do motorista com regulagem de altura</label>
						</span>
						<span>
							<input type="checkbox" id="rearSeatSplit" name="rearSeatSplit" value="s" <? if (strtolower($res[rearSeatSplit]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rearSeatSplit">Banco traseiro bipartido</label>
						</span>
						<span>
							<input type="checkbox" id="bluetoothSpeakerphone" name="bluetoothSpeakerphone" value="s" <? if (strtolower($res[bluetoothSpeakerphone]) == "s") { echo 'checked="true"'; } ?> />
							<label for="bluetoothSpeakerphone">Bluetooth com viva-voz</label>
						</span>
						<span>
							<input type="checkbox" id="bonnetSea" name="bonnetSea" value="s" <? if (strtolower($res[bonnetSea]) == "s") { echo 'checked="true"'; } ?> />
							<label for="bonnetSea">Capota marítima</label>
						</span>
						<span>
							<input type="checkbox" id="onboardComputer" name="onboardComputer" value="s" <? if (strtolower($res[onboardComputer]) == "s") { echo 'checked="true"'; } ?> />
							<label for="onboardComputer">Computador de bordo</label>
						</span>
						<span>
							<input type="checkbox" id="accelerationCounter" name="accelerationCounter" value="s" <? if (strtolower($res[accelerationCounter]) == "s") { echo 'checked="true"'; } ?> />
							<label for="accelerationCounter">Conta giros</label>
						</span>
						<span>
							<input type="checkbox" id="rearWindowDefroster" name="rearWindowDefroster" value="s" <? if (strtolower($res[rearWindowDefroster]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rearWindowDefroster">Desembaçador de vidro traseiro</label>
						</span>
						<span>
							<input type="checkbox" id="electricSteering" name="electricSteering" value="s" <? if (strtolower($res[electricSteering]) == "s") { echo 'checked="true"'; } ?> />
							<label for="electricSteering">Direção elétrica</label>
						</span>
						<span>
							<input type="checkbox" id="hydraulicSteering" name="hydraulicSteering" value="s" <? if (strtolower($res[hydraulicSteering]) == "s") { echo 'checked="true"'; } ?> />
							<label for="hydraulicSteering">Direção hidráulica</label>
						</span>
						<span>
							<input type="checkbox" id="sidesteps" name="sidesteps" value="s" <? if (strtolower($res[sidesteps]) == "s") { echo 'checked="true"'; } ?> />
							<label for="sidesteps">Estribos laterais</label>
						</span>
						<span>
							<input type="checkbox" id="fogLamps" name="fogLamps" value="s" <? if (strtolower($res[fogLamps]) == "s") { echo 'checked="true"'; } ?> />
							<label for="fogLamps">Faróis de neblina/milha</label>
						</span>
						<span>
							<input type="checkbox" id="xenonHeadlights" name="xenonHeadlights" value="s" <? if (strtolower($res[xenonHeadlights]) == "s") { echo 'checked="true"'; } ?> />
							<label for="xenonHeadlights">Faróis xenon</label>
						</span>
						<span>
							<input type="checkbox" id="absBrake" name="absBrake" value="s" <? if (strtolower($res[absBrake]) == "s") { echo 'checked="true"'; } ?> />
							<label for="absBrake">Freios Abs</label>
						</span>
						<span>
							<input type="checkbox" id="integratedGPSPanel" name="integratedGPSPanel" value="s" <? if (strtolower($res[integratedGPSPanel]) == "s") { echo 'checked="true"'; } ?> />
							<label for="integratedGPSPanel">GPS integrado ao painel</label>
						</span>
						<span>
							<input type="checkbox" id="rearWindowWiper" name="rearWindowWiper" value="s" <? if (strtolower($res[rearWindowWiper]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rearWindowWiper">Limpador de vidro traseiro</label>
						</span>
						<span>
							<input type="checkbox" id="bumper" name="bumper" value="s" <? if (strtolower($res[bumper]) == "s") { echo 'checked="true"'; } ?> />
							<label for="bumper">Para choque na cor do veículo</label>
						</span>
						<span>
							<input type="checkbox" id="autopilot" name="autopilot" value="s" <? if (strtolower($res[autopilot]) == "s") { echo 'checked="true"'; } ?> />
							<label for="autopilot">Piloto automático</label>
						</span>
						<span>
							<input type="checkbox" id="bucketProtector" name="bucketProtector" value="s" <? if (strtolower($res[bucketProtector]) == "s") { echo 'checked="true"'; } ?> />
							<label for="bucketProtector">Protetor de caçamba</label>
						</span>
						<span>
							<input type="checkbox" id="roofRack" name="roofRack" value="s" <? if (strtolower($res[roofRack]) == "s") { echo 'checked="true"'; } ?> />
							<label for="roofRack">Rack de teto</label>
						</span>
						<span>
							<input type="checkbox" id="cdplayerUSBInput" name="cdplayerUSBInput" value="s" <? if (strtolower($res[cdplayerUSBInput]) == "s") { echo 'checked="true"'; } ?> />
							<label for="cdplayerUSBInput">Rádio CD player com entrada USB</label>
						</span>
						<span>
							<input type="checkbox" id="radio" name="radio" value="s" <? if (strtolower($res[radio]) == "s") { echo 'checked="true"'; } ?> />
							<label for="radio">Rádio FM</label>
						</span>
						<span>
							<input type="checkbox" id="headlightsHeightAdjustment" name="headlightsHeightAdjustment" value="s" <? if (strtolower($res[headlightsHeightAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label for="headlightsHeightAdjustment">Regulagem de altura dos faróis</label>
						</span>
						<span>
							<input type="checkbox" id="rearviewElectric" name="rearviewElectric" value="s" <? if (strtolower($res[rearviewElectric]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rearviewElectric">Retrovisor elétrico</label>
						</span>
						<span>
							<input type="checkbox" id="alloyWheels" name="alloyWheels" value="s" <? if (strtolower($res[alloyWheels]) == "s") { echo 'checked="true"'; } ?> />
							<label for="alloyWheels">Rodas de liga leve</label>
						</span>
						<span>
							<input type="checkbox" id="rainSensor" name="rainSensor" value="s" <? if (strtolower($res[rainSensor]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rainSensor">Sensor de chuva</label>
						</span>
						<span>
							<input type="checkbox" id="parkingSensor" name="parkingSensor" value="s" <? if (strtolower($res[parkingSensor]) == "s") { echo 'checked="true"'; } ?> />
							<label for="parkingSensor">Sensor de estacionamento</label>
						</span>
						<span>
							<input type="checkbox" id="isofix" name="isofix" value="s" <? if (strtolower($res[isofix]) == "s") { echo 'checked="true"'; } ?> />
							<label for="isofix">Sistema Isofix para cadeira de criança</label>
						</span>
						<span>
							<input type="checkbox" id="sunroof" name="sunroof" value="s" <? if (strtolower($res[sunroof]) == "s") { echo 'checked="true"'; } ?> />
							<label for="sunroof">Teto solar</label>
						</span>
						<span>
							<input type="checkbox" id="electricLock" name="electricLock" value="s" <? if (strtolower($res[electricLock]) == "s") { echo 'checked="true"'; } ?> />
							<label for="electricLock">Trava elétrica</label>
						</span>
						<span>
							<input type="checkbox" id="electricWindow" name="electricWindow" value="s" <? if (strtolower($res[electricWindow]) == "s") { echo 'checked="true"'; } ?> />
							<label for="electricWindow">Vidro elétrico</label>
						</span>
						<span>
							<input type="checkbox" id="rearElectricWindow" name="rearElectricWindow" value="s" <? if (strtolower($res[rearElectricWindow]) == "s") { echo 'checked="true"'; } ?> />
							<label for="rearElectricWindow">Vidro elétrico traseiro</label>
						</span>
						<span>
							<input type="checkbox" id="steeringWheelAdjustment" name="steeringWheelAdjustment" value="s" <? if (strtolower($res[steeringWheelAdjustment]) == "s") { echo 'checked="true"'; } ?> />
							<label for="steeringWheelAdjustment">Volante com regulagem de altura</label>
						</span>
					</div>
				</div>
				<? } ?>
				<?
				if ($_GET[category] != "manufacturer" && $_GET[category] != "model" && $_GET[category] != "version") {
				$iSerie = 0;
				$sqlSerie = "SELECT * from serieFeature where idFeature = '".$res[featureId]."' order by `option` desc, `description` asc";
				$querySerie = mysql_query($sqlSerie) or die (" error #300");
				$lengthSerie = mysql_num_rows($querySerie);
				?>
				<div class="dataSerie dataFields">
					<label class="subTitle">ITENS DE SÉRIE</label>
					<div id="optionsSerie" class="optionsSerie optionsFields">
						<span class="subTitleSerie">Insira novos itens sepando por , (virgula)</span>
						<span class="subTextAreaSerie">
							<textarea name="textAreaSerieAdd" id="textAreaSerieAdd"><? if ($lengthSerie == 0) { echo $res[itemsSerie]; } ?></textarea>
							<input type="button" id="btnSerieAdd" value="Adicionar" />
							<input type="hidden" name="lengthSerie" value="<?=$lengthSerie?>" id="lengthSerie" />
							<!--CHECK HOW MANY FIELDS AFTER SUBMIT AND W/ ADD SCRIPT -->
						</span>
						<!--span class="subBtnRemoveAllSerie"><input type="button" class="btnButton" value="Remover todos os itens de série" id="btnRemoveAllSeries" /></span-->
						<label class="subTitleAllItems">Itens de série referente a esta versao <input type="button" class="btnButton" value="Remover todos os itens de série" id="btnRemoveAllSeries" /></label><br />
						<div id="resultSerie">
						<?
						while ($resSerie = mysql_fetch_array($querySerie)) {
							?>
							<span>
								<input type="checkbox" name="rdSerie<?=$iSerie?>" id="rdSerie<?=$iSerie?>" value="s" <? if ($resSerie[option] == "s") { echo 'checked="checked"'; } ?> />
								<input type="hidden" name="txtSerie<?=$iSerie?>" id="txtSerie<?=$iSerie?>" value="<?=$resSerie[description]?>" />
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
				$sqlOptF = "SELECT optionsVersion.id as optId, optionsVersion.id, optionsManufacturer.name, optionsManufacturer.options, optionsVersion.price, optionsManufacturer.code from optionsVersion, optionsManufacturer where optionsVersion.yearModel = '".$res[yearModel]."' and idVersion = '".$res[versionId]."' and optionsVersion.code = optionsManufacturer.code and optionsManufacturer.idManufacturer = '".$res[manufacturerId]."' order by `code` asc, `name` desc";
				$queryOptF = mysql_query($sqlOptF) or die (" error #800");
				$lengthOptF = mysql_num_rows($queryOptF);
				?>
				<div class="dataOptions dataFields">
					<label class="subTitle">OPCIONAIS</label>
					<div id="optionsOptions" class="optionsOptions optionsFields">
						<span class="spanOptions">insira novos itens sepando a cada linha</span>
						<span class="inputOptions">
							<input type="hidden" name="txtOptionsId" id="txtOptionsId" />
							<input type="hidden" name="txtOptNumCheck" id="txtOptNumCheck" />
							<select  name="txtOptionsName" id="txtOptionsName" placeholder="Nome">
								<option>Opcionais</option>
								<?
								$sqlOptManuf = "SELECT id, name, code from optionsManufacturer where idManufacturer = '".$res[manufacturerId]."' order by code asc";
								$queryOptManuf = mysql_query($sqlOptManuf) or die ("error #812");
								while ($resOptManuf = mysql_fetch_array($queryOptManuf)) {
								?>
								<option value="<?=$resOptManuf[id]?>" ><?=$resOptManuf[name]?></option>
								<?
								}
								?>
							</select>
							<input type="text" name="txtOptionsCode" id="txtOptionsCode" placeholder="Código" disabled="disabled"/>
							<!--input type="text" name="txtOptionsName" id="txtOptionsName" placeholder="Nome" /-->
							<!-- <label for="txtOptionsPrice">R$</label> -->
							<input type="text" name="txtOptionsPrice" id="txtOptionsPrice" placeholder="Valor" onKeyPress="return(format_price(this,'.','',8,0,event))" disabled="disabled" />
							<textarea name="textAreaOptionsAdd" id="textAreaOptionsAdd" placeholder="Opcionais" disabled="disabled"></textarea>
							<input type="button" id="btnOptionsAdd" value="Adicionar Opcionais" />
							<!--CHECK HOW MANY FIELDS  AFTER SUBMIT AND W/ ADD SCRIPT -->
						</span>
						<div id="resultOptions">
						<?
						$lengthOptionsTotal = mysql_num_rows($queryOptF);
						while ($resOptF = mysql_fetch_array($queryOptF)) {
						?>
							<span id="optItem<?=$iOptM?>">
								<div class="updateOpt" onclick="updateOpt(this,'<?=$iOptM?>')" title="<?=$resOptF[options]?>">
									<input class="hide" type="checkbox" id="chOpt<?=$iOptM?>" name="chOpt<?=$iOptM?>" value="s" checked="checked" />
									<input type="hidden" id="txtOptIdFeature" value="<?=$resOptF[optId]?>" />
									<input type="hidden" id="optIdOpt" name="txtOpt<?=$iOptM?>" value="<?=$resOptF[idOption]?>" />
									<input type="hidden" id="optPrice" name="txtOptPrice<?=$iOptM?>" value="<?=$resOptF[price]?>" />
									<input type="hidden" id="optCode" name="txtOptCode<?=$iOptM?>" value="<?=$resOptF[code]?>" />
									<label id="lblOptions" title="<?=$resOptF[options]?>"><?=$resOptF[name]?></label><br />
									<label>R$ <?=$resOptF[price]?></label>
								</div>
								<label for="chOpt<?=$iOptM?>" class="removeOpt" onclick="removeOpt(this,'<?=$iOptM?>')">X</label>
							</span>
							<?
							$iOptM++;
							$filterOpt .= " and id != '".$resOptF[idOption]."'";
						}
						?>
						<? /* DISABLED, USING JS
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
						*/ ?>
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
						$tableColor = "colorManufacturer";
					} else {
						$sqlColor = "SELECT colorVersion.id, colorManufacturer.name, colorManufacturer.code, colorManufacturer.hexa, colorManufacturer.type, colorManufacturer.application, colorVersion.price from colorVersion, colorManufacturer where colorVersion.code = colorManufacturer.code and  idVersion = '".$res[versionId]."' and yearModel = '".$res[yearModel]."'";
						$tableColor = "colorVersion";
					}
					$queryColor = mysql_query($sqlColor) or die (" error #886");
					$lengthColor = mysql_num_rows($queryColor);
					?>
					<div class="dataColor dataFields">
						<label class="subTitle">CORES DISPONÍVEIS</label>
						<div class="optionsColor optionsFields" id="optionsColor">
							<span>
								<div id="colorSelector" class="divColor"><div></div></div>
								<input type="hidden" id="colorId" />
								<input type="text" id="colorSelected" placeholder="Cor em hexa" /><br />
								<input type="text" id="colorCode" placeholder="Código" /><br />
								<input type="text" id="colorName" placeholder="Nome" /><br />
								<select  id="colorType">
									<option value="Sólida" >Sólida</option>
									<option value="Metálica">Metálica</option>
									<option value="Perolizada">Perolizada</option>
								</select><br />
								<!--input type="text" id="colorType" placeholder="Tipo" /-->
								<!--select  id="colorAplication">
									<option value="Interna" >Interna</option>
									<option value="Externa">Externa</option>
								</select><br /-->
								<!--input type="text" id="colorAplication" placeholder="Aplicação" /-->
								<input type="text" id="colorPrice" placeholder="Valor" onKeyPress="return(format_price(this,'.','',8,0,event))" /><br />
								<input type="button" value="Adicionar" id="btnColorAdd" />
								<input type="hidden" id="colorLength" name="colorLength" value="<?=$lengthColor?>" />
							</span>
							<? while ($resColor = mysql_fetch_array($queryColor)) { ?>
							<span  colorId="<?=$resColor[id]?>">
								<div class="delColor" onclick="deleteColor(this,'<?=$resColor[id]?>','<?=$tableColor?>')">X</div>
							<div class="updateColor" onclick="updateColor(this,'<?=$resColor[id]?>','<?=$tableColor?>')">
								<div class="divColor">
									<div style="background-color: #<?=$resColor[hexa]?>;"></div>
								</div>
								<span id="textColor"><?=$resColor[name]." - ".$resColor[type]."<br />".$resColor[code]." => R$ ".$resColor[price]?></span>
								<input type="hidden" id="colorInputId" name="colorInputId<?=$iColor?>" value="<?=$resColor[id]?>" />
								<input type="hidden" id="colorInputName" name="colorInputName<?=$iColor?>" value="<?=$resColor[name]?>" />
								<input type="hidden" id="colorInputColor" name="colorInputColor<?=$iColor?>" value="<?=$resColor[hexa]?>" />
								<input type="hidden" id="colorInputType" name="colorInputType<?=$iColor?>" value="<?=$resColor[type]?>" />
								<input type="hidden" id="colorInputPrice" name="colorInputPrice<?=$iColor?>" value="<?=$resColor[price]?>" />
								<input type="hidden" id="colorInputCode" name="colorInputCode<?=$iColor?>" value="<?=$resColor[code]?>" />
								<input type="hidden" id="colorInputTable" name="colorInputTable<?=$iColor?>" value="<?=$tableColor?>" />
							</div>
							</span>
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
					<label class="subTitle">FOTO</label>
					<div class="optionsPicture optionsFields">
						<label for="txtPicture">Insira a imagem</label>
							<input type="file" name="file" id="txtPicture" placeholder="Imagem" />
							<!--input type="button" value="Adicionar" id="btnPictureAdd" /-->
							<? if ($res[picture] != "") { 
								//if ($res[picture].split("/", string))
								// $bgImgPicture = 'style="background-image:url(\'../carImages/'.$res[picture].'\')"'; 
							} ?>
							<?
							if (file_exists("../carImages/".$res[picture])) {
			                    $picture = "../carImages/".$res[picture];
			                } elseif (file_exists("http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg")) {
			                    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
			                } else {
			                    $picture = "http://carsale.uol.com.br/foto/".$res[picture]."_g.jpg";
			                }
			                ?>
							<textarea class="image-preview" disabled="disabled" <?=$bgImgPicture?>></textarea>
							<input type="button" class="btnRemoveTempImg" onclick="removeTempImg()" value="Remover imagem temporaria" />
							<div class="oldPicture"><span class="subTitleAllItems">Imagem do cadastro atual</span>
								<? if ($_GET[action] == "update") { ?>
								<img src="<?=$picture?>" />
								<? } ?>
							</div>
							<? if ($_GET[action] == "clone") { ?>
							<div class="clonePicture"><span class="subTitleAllItems">Atenção, o sistema não consegue clonar imagens, salve esta imagem e adicione ela novamente</span>
								<img src="<?=$picture?>" />
							</div>
							<? } ?>
						<!--ol class="listPictures" id="listPictures">
							<li><img src="../carImages/<?=$res[picture]?>">
							<img src="<? echo $res[manufacturerName]."-".$res[modelName]."-".$res[versionName]."-".$res[featureId].".jpg"; ?>"></li>
						</ol-->
					</div>
				</div>
				<? } ?>
			</div>
		</div>
		<div class="divSave">
			<? switch ($_GET[action]) {
				case 'update':
					?>
					<input type="button" value="ATUALIZAR" class="btnSave btnButton" onclick="submit()">
					<?
					break;
				case 'new':
					?>
					<input type="button" value="INCLUIR" class="btnSave btnButton" onclick="submit()">
					<?
					break;
				default:
					?>
					<input type="button" value="SALVAR" class="btnSave btnButton" onclick="submit()">
					<?
					break;
			}
			?>
			<? if ($_GET[action] != "new" && $_GET[action] != "clone") { ?>
				<a href='index.php' class='btnButton btnDelForm' id='btnDelForm'>Desativar Cadastro</a>
			<? } ?>
		</div>
		</form>
		<?
		if (($_GET[category] == "manufacturer" || $_GET[category] == "model" || $_GET[category] == "version") && $_GET[action] != "new") {
		?>
		<!--div class="relations">
			<span>Itens relacionados</span>
			<div class="dataRelationsFooter"></div>
			<div class="resultSearch">
				<ul class="resultList">
					<li class="resultHeader">
						<div class="rhItems"></div>
						<div class="rhManufacturer">Montadora</div>
						<div class="rhModel">Modelo</div>
						<div class="rhVersion">Versão</div>
						<div class="rhYearModel">Ano do Modelo</div>
						<div class="rhYearProduced">Ano de Fabricação</div>
						<div class="rhEngine">Motor</div>
						<div class="rhGear">Câmbio</div>
						<div class="rhFuel">Combustível</div>
						<div class="rhSteering">Direção</div>
						<div class="rhSegment">Segmento</div>
					</li>
					<li class="resultFilter">
						<div class="rfItems">Filtros</div>
						<div class="rfManufacturer"><input type="text" id="txtRSManufacturer" onkeyup="filterFields('rsManufacturer',this)" /></div>
						<div class="rfModel"><input type="text" id="txtRSModel" onkeyup="filterFields('rsModel',this)" /></div>
						<div class="rfVersion"><input type="text" id="txtRSVersion" onkeyup="filterFields('rsVersion',this)"  /></div>
						<div class="rfYearModel"><input type="text" id="txtRSYearModel" onkeyup="filterFields('rsYearModel',this)" /></div>
						<div class="rfYearProduced"><input type="text" id="txtRSYearProduced" onkeyup="filterFields('rsYearProduced',this)" /></div>
						<div class="rfEngine"><input type="text" id="txtRSEngine" onkeyup="filterFields('rsEngine',this)" /></div>
						<div class="rfGear"><input type="text" id="txtRSGear" onkeyup="filterFields('rsGear',this)" /></div>
						<div class="rfFuel"><input type="text" id="txtRSFuel" onkeyup="filterFields('rsFuel',this)" /></div>
						<div class="rfSteering"><input type="text" id="txtRSSteering" onkeyup="filterFields('rsSteering',this)" /></div>
						<div class="rfSegment"><input type="text" id="txtRSSegment" onkeyup="filterFields('rsSegment',this)" /></div>
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
						<li class="resultItem <? if ($resRelat[active] == "n") { echo "desactive"; } ?>" idDB="<?=$resRelat[id]?>">
							<div class="rsItems">
								<? if ($res[versionId] != "") { ?>
								<a class="btnClone btnButton" href="formDetails.php?category=feature&action=clone&vehicle=<?=$resRelat[id]?>" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>
								<? } ?>
								<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$resRelat[id]?>,'feature',this)"></div>
							</div>
							<a href="formDetails.php?vehicle=<?=$resRelat[id]?>&category=feature&action=update" class="resRelatultContent">
								<div class="rsManufacturer" title="<?=$resRelat[manufacturerName]?>"><?=$resRelat[manufacturerName]?></div>
								<div class="rsModel" title="<?=$resRelat[modelName]?>"><?=$resRelat[modelName]?></div>
								<div class="rsVersion" title="<?=$resRelat[versionName]?>"><?=$resRelat[versionName]?></div>
								<div class="rsYearModel"><?=$resRelat[yearModel]?></div>
								<div class="rsYearProduced"><?=$resRelat[yearProduced]?></div>
								<div class="rsEngine"><?=$resRelat[engine]?></div>
								<div class="rsGear"><?=$resRelat[gear]?></div>
								<div class="rsFuel"><?=$resRelat[fuel]?></div>
								<div class="rsSteering"><?=$resRelat[steering]?></div>
								<div class="rsSegment"><?=$resRelat[segmentName]?></div>
							</a>
						</li>
					<? }
					?>
					</ul></li>
				</ul>
			</div>
		</div> -->
		<? } ?>
	</div>
<footer></footer>
</div>
</body>
</html>