<?

include ("../scripts/conectDB.php");


//$sql_search = "select feature.id as idFeature, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";



switch ($_GET[type]) {
 	case 'askInput':
		echo "[";
		$sql_s_manuf = "select id, name from manufacturer where name like ('%".$_GET[term]."%') limit 10";
		$query_s_manuf = mysql_query($sql_s_manuf) or die ($sql_s_manuf." error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Montadora",
					"table":"manufacturer",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		$sql_search = "select id, name from model where name like ('%".$_GET[term]."%') limit 10";
		$query_search = mysql_query($sql_search) or die (" error #30");
		$l = 0;
		while ($res = mysql_fetch_array($query_search)) {
			if ($l > 0 || $m > 0) { echo ","; }
			echo '{
					"id":"'.$res[id].'",
					"label":"'.$res[name].'",
					"category": "Modelo",
					"table":"model",
					"value":"'.$res[name].'"
				}';
			$l++;
		}
		$sql_v = "select id, name from version where name like ('%".$_GET[term]."%') limit 10";
		$query_v = mysql_query($sql_v) or die (" error #40");
		$v = 0;
		while ($resV = mysql_fetch_array($query_v)) {
			if ($l > 0 || $m > 0 || $v > 0) { echo ","; }
			echo '{
					"id":"'.$resV[id].'",
					"label":"'.$resV[name].'",
					"category": "Versão",
					"table":"version",
					"value":"'.$resV[name].'"
				}';
			$l++;
		}
		echo "]";
	break;

	case 'terms':
		//echo $sql_search;
		if ($_GET[table] != "") { $filterSearch = "AND ".$_GET[table].".id = '".$_GET[idField]."'"; }
		elseif ($_GET[term] != "") { 
		//search all about the term
		}
		echo "[";
		//ALL MANUFACTURES
		if ($_GET[table] == "manufacturer") {
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName FROM manufacturer WHERE id = '".$_GET[idField]."'";
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #70");
			$l = 0;
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[manufacturerId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"idFeature":"'.$res[idFeature].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "manufacturer",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL MODELS
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model") {
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName FROM manufacturer, model WHERE model.idManufacturer = manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #95");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[modelId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"idFeature":"'.$res[idFeature].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "model",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL VERSIONS
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model" || $_GET[table] == "version" || $_GET[table] == "feature") {
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #120");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[versionId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"idFeature":"'.$res[idFeature].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "version",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL ALL
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model" || $_GET[table] == "version" || $_GET[table] == "feature") {
			$sqlTerm = "SELECT feature.id as idFeature, feature.yearProduced, feature.yearModel, feature.engine, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #150");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[idFeature].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"idFeature":"'.$res[idFeature].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "feature",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		echo "]";
		break;

	case 'addOption':
		$sql_addOpt = "insert into `optionsManufacturer` (`id`, `idManufacturer`, `code`, `name`, `options`, `active`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('', '".$_GET[manufacturerId]."', '".$_GET[codopt]."', '".$_GET[name]."', '".$_GET[text]."', '', now(), now(),'')";
		mysql_query($sql_addOpt) or die ('[{"response":"false"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
		break;

	case 'addColor':
		$sql_addColor = "insert into `colorManufacturer` (`idManufacturer`, `name`, `hexa`, `type`, `application`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('".$_GET[manufacturerId]."', '".$_GET[cname]."', '".$_GET[chexa]."', '".$_GET[ctype]."', '".$_GET[capp]."', now(), now(),'')";
		mysql_query($sql_addColor) or die ('[{"response":"false"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
		break;

	case 'removeColor':
		$sql_addColor = "DELETE FROM `colorManufacturer` WHERE `colorManufacturer`.`id` = '".$_GET[idColor]."'";
		mysql_query($sql_addColor) or die ('[{"response":"false"}]');
		echo '[{"response":"true"}]';
		break;
}


$sql_full = "select manufacturer.name as manufacturerName, manufacturer.description as manufacturerDescription, model.name as modelName, model.description as modelDescription, version.name as versionName, version.description as versionDescription, version.idSegment1, feature.id as id, feature.idManufacturer as manufacturerId, feature.idModel modelId, feature.idVersion versionId, feature.yearProduced, feature.yearModel, feature.doors, feature.passagers, feature.motor, feature.feeding, feature.fuel, feature.powerMax, feature.torque, feature.acceleration, feature.speedMax, feature.consumptionCity, feature.consumptionRoad, feature.gear, feature.traction, feature.wheels, feature.frontSuspension, feature.rearSuspension, feature.frontBrake, feature.rearBrake, feature.dimensionLenght, feature.dimensionWidth, feature.dimensionHeight, feature.dimensionSignAxes, feature.weight, feature.trunk, feature.tank, feature.warranty, feature.countryOrigin, feature.dualFrontAirBag, feature.alarm, feature.airConditioning, feature.hotAir, feature.leatherSeat, feature.heightAdjustment, feature.rearSeatSplit, feature.bluetoothSpeakerphone, feature.bonnetSea, feature.onboardComputer, feature.accelerationCounter, feature.rearWindowDefroster, feature.steering, feature.sidesteps, feature.fogLamps, feature.xenonHeadlights, feature.absBrake, feature.integratedGPSPanel, feature.rearWindowWiper, feature.bumper, feature.autopilot, feature.bucketProtector, feature.roofRack, feature.cdplayerWithUSBInput, feature.headlightsHeightAdjustment, feature.rearviewElectric, feature.alloyWheels, feature.rainSensor, feature.parkingSensor, feature.isofix, feature.sunroof, feature.electricLock, feature.electricWindow, feature.rearEletricWindow, feature.steeringWheelAdjustment, feature.active, feature.dateCreate, feature.dateUpdate from feature, manufacturer, model, version where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";



/*

//campo label é obrigatorio aparecer pq é ele que eu mostro na listagem
switch ($_GET[type]) {
 	case 'askInput':
 		# code...
echo '
	[
	{
		"id":"1",
		"label":"1 Great Bittern",
		"category": "Products",
		"value":"Great Bittern"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"2 Black-necked Grebe",
		"category": "Products",
		"value":"Black-necked Grebe"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"3 Black-necked Grebe",
		"category": "Products",
		"value":"Black-necked Grebe2"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"Black-necked Grebe",
		"category": "ask",
		"value":"Black-necked Grebe3"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"4 Black-necked Grebe",
		"category": "ask",
		"value":"Black-necked Grebe4"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"Black-necked Grebe",
		"category": "ask",
		"value":"Black-necked Grebe5"
	},
	{
		"id":"Podiceps nigricollis",
		"label":"Black-necked Grebe",
		"category": "ask",
		"value":"Black-necked Grebe8"
	},
	{
		"id":"Nycticorax nycticorax",
		"label":"Black-crowned Night Heron",
		"category": "",
		"value":"Black-crowned Night Heron"
	},
	{
		"id":"Netta rufina",
		"label":"Red-crested Pochard",
		"category": "",
		"value":"Red-crested Pochard"
	},
	{
		"id":"Circus cyaneus",
		"label":"Hen Harrier",
		"category": "",
		"value":"Hen Harrier"
	},
	{
		"id":"Circus pygargus",
		"label":"Montagus Harrier",
		"category": "",
		"value":"Montagus Harrier"
	}
	]';
		break;
 	
 	case '2':
echo '[
	{
		"id":"1",
		"label":"11121111",
		"value":"112121212"
	},
	{
		"id":"3331333",
		"label":"343333333",
		"value":"4334344444"
	}
	]';
 		break;

 	default:
	 	echo '[
		{
			"id":"'.$_GET[acao].'",
			"label":"'.$_GET[term].'",
			"value":"112121212"
		},
		{
			"id":"3331333",
			"label":"343333333",
			"value":"4334344444"
		}
		]';
 		# code...
 		break;
 }
//$result = "eee";
//echo $result;

*/




























?>