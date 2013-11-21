<?

include ("../scripts/conectDB.php");


//$sql_search = "select feature.id as featureId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";



switch ($_GET[type]) {
 	case 'askInput':
		echo "[";
		$sql_s_manuf = "select id, name from manufacturer where name like ('%".$_GET[term]."%')";
		$query_s_manuf = mysql_query($sql_s_manuf) or die ($sql_s_manuf." error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Manufacturer",
					"table":"manufacturer",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		$sql_search = "select id, name from model where name like ('%".$_GET[term]."%')";
		$query_search = mysql_query($sql_search) or die (" error #30");
		$l = 0;
		while ($res = mysql_fetch_array($query_search)) {
			if ($l > 0 || $m > 0) { echo ","; }
			echo '{
					"id":"'.$res[id].'",
					"label":"'.$res[name].'",
					"category": "Model",
					"table":"model",
					"value":"'.$res[name].'"
				}';
			$l++;
		}
		echo "]";
	break;

	case 'terms':
		//echo $sql_search;
		if ($_GET[table] != "") { $filterSearch = "and ".$_GET[table].".id = '".$_GET[idField]."'"; }
		elseif ($_GET[term] != "") { 
		//search all about the term
		 }
		$sql_search = "SELECT feature.id as featureId, feature.yearModel, feature.yearProduced, feature.engine as featureEngine, version.name as versionName, model.name as modelName, manufacturer.name as manufacturerName FROM feature,version,model,manufacturer WHERE feature.idversion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id ".$filterSearch;
		$query_search = mysql_query($sql_search) or die (" error #50");
		echo "[";
		$l = 0;
		while ($res = mysql_fetch_array($query_search)) {
			if($l>0) {echo ",";}
			echo '{
					"id":"'.$res[featureId].'",
					"label":"'.$_GET[term].'",
					"featureId":"'.$res[featureId].'",
					"featureEngine":"'.$res[featureEngine].'",
					"manufacturerId":"'.$res[manufacturerId].'",
					"manufacturerName":"'.$res[manufacturerName].'",
					"modelId":"'.$res[modelId].'",
					"modelName":"'.$res[modelName].'",
					"versionName":"'.$res[versionName].'",
					"yearProduced":"'.$res[yearProduced].'",
					"yearModel":"'.$res[yearModel].'",
					"category": "feature",
					"value":"",
					"name":""
				}';
			$l++;
		}
		echo "]";
		break;

	case 'addOption':
		$sql_addOpt = "insert into `optionsModel` (`id`, `idModel`, `name`, `description`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('', '".$_GET[idModel]."', '".$_GET[name]."', '".$_GET[text]."', '', now(), now(),'')";
		//echo $sql_addOpt;
		mysql_query($sql_addOpt) or die ('[{"response":"false"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
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