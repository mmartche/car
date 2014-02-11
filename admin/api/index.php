<?

include ("../scripts/conectDB.php");


//$sql_search = "select feature.id as featureId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";

switch ($_GET[type]) {
 	case 'askInput':
		echo "[";
		$sql_s_manuf = "select id, name, active from ft_manufacturer where name like ('%".$_GET[term]."%')";
		$query_s_manuf = mysql_query($sql_s_manuf);
		// or die ($sql_s_manuf." error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Montadora",
					"active":"'.$resM[active].'",
					"table":"ft_manufacturer",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		$sql_search = "select id, name, active from ft_model where name like ('%".$_GET[term]."%')";
		$query_search = mysql_query($sql_search);
		// or die (" error #30");
		$l = 0;
		while ($res = mysql_fetch_array($query_search)) {
			if ($l > 0 || $m > 0) { echo ","; }
			echo '{
					"id":"'.$res[id].'",
					"label":"'.$res[name].'",
					"category": "Modelo",
					"active":"'.$res[active].'",
					"table":"ft_model",
					"value":"'.$res[name].'"
				}';
			$l++;
		}
		$sql_v = "select id, name, active from ft_version where name like ('%".$_GET[term]."%')";
		$query_v = mysql_query($sql_v);
		// or die (mysql_error()." error #40");
		$v = 0;
		while ($resV = mysql_fetch_array($query_v)) {
			if ($l > 0 || $m > 0 || $v > 0) { echo ","; }
			echo '{
					"id":"'.$resV[id].'",
					"label":"'.$resV[name].'",
					"category": "Versão",
					"active":"'.$resV[active].'",
					"table":"ft_version",
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
		if ($_GET[table] == "ft_manufacturer") {
			$sqlTerm = "SELECT ft_manufacturer.id as manufacturerId, ft_manufacturer.name as manufacturerName, active FROM ft_manufacturer WHERE id = '".$_GET[idField]."'";
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #70");
			$l = 0;
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[manufacturerId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"featureId":"'.$res[featureId].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "ft_manufacturer",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL MODELS
		if ($_GET[table] == "ft_manufacturer" || $_GET[table] == "ft_model") {
			$sqlTerm = "SELECT ft_manufacturer.id as manufacturerId, ft_manufacturer.name as manufacturerName, ft_model.id as modelId, ft_model.name as modelName, ft_model.active FROM ft_manufacturer, ft_model WHERE ft_model.idManufacturer = ft_manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #95");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[modelId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"featureId":"'.$res[featureId].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "ft_model",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL VERSIONS
		if ($_GET[table] == "manufacturer" || $_GET[table] == "ft_model" || $_GET[table] == "ft_version" || $_GET[table] == "ft_feature") {
			$sqlTerm = "SELECT ft_manufacturer.id as manufacturerId, ft_manufacturer.name as manufacturerName, ft_model.id as modelId, ft_model.name as modelName, ft_version.id as versionId, ft_version.name as versionName, ft_version.active FROM ft_manufacturer, ft_model, ft_version WHERE ft_version.idModel = ft_model.id AND ft_model.idManufacturer = ft_manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #120");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[versionId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"featureId":"'.$res[featureId].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"category": "ft_version",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL ALL
		if ($_GET[table] == "ft_manufacturer" || $_GET[table] == "ft_model" || $_GET[table] == "ft_version" || $_GET[table] == "ft_feature") {
			$sqlTerm = "SELECT ft_feature.id as featureId, ft_feature.yearProduced, ft_feature.yearModel, ft_feature.engine, ft_feature.gear, ft_feature.fuel, ft_feature.steering, ft_manufacturer.id as manufacturerId, ft_manufacturer.name as manufacturerName, ft_model.id as modelId, ft_model.name as modelName, ft_version.id as versionId, ft_version.name as versionName, ft_feature.active FROM ft_manufacturer, ft_model, ft_version, ft_feature WHERE ft_feature.idVersion = ft_version.id AND ft_version.idModel = ft_model.id AND ft_model.idManufacturer = ft_manufacturer.id ".$filterSearch;
			$queryTerm = mysql_query($sqlTerm) or die (mysql_error()." // ".$sqlTerm." error #150");
			while ($res = mysql_fetch_array($queryTerm)) {
				if($l>0) {echo ",";}
				echo '{
						"idItem":"'.$res[featureId].'",
						"order":"'.$l.'",
						"label":"'.$_GET[term].'",
						"featureId":"'.$res[featureId].'",
						"manufacturerId":"'.$res[manufacturerId].'",
						"manufacturerName":"'.$res[manufacturerName].'",
						"modelId":"'.$res[modelId].'",
						"modelName":"'.$res[modelName].'",
						"versionId":"'.$res[versionId].'",
						"versionName":"'.$res[versionName].'",
						"yearProduced":"'.$res[yearProduced].'",
						"yearModel":"'.$res[yearModel].'",
						"engine":"'.$res[engine].'",
						"gear":"'.$res[gear].'",
						"fuel":"'.$res[fuel].'",
						"steering":"'.$res[steering].'",
						"segment1":"'.$res[segment1].'",
						"segment2":"'.$res[segment2].'",
						"segment3":"'.$res[segment3].'",
						"category": "ft_feature",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		echo "]";
		break;

	case 'addOption':
		$sql_addOpt = "insert into `ft_optionsManufacturer` (`id`, `idManufacturer`, `code`, `name`, `options`, `price`, `active`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('', '".$_GET[manufacturerId]."', '".$_GET[codopt]."', '".$_GET[name]."', '".$_GET[text]."', '".$_GET[price]."', 's', now(), now(),'')";
		mysql_query($sql_addOpt) or die ('[{"response":"false","error":"error #192","reason":"'.mysql_error().'"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
		break;

	case 'addColor':
		if ($_GET[cId] != "") {
			$sql_addColor = "UPDATE ft_colorManufacturer SET `idManufacturer` = '".$_GET[manufacturerId]."', `name` = '".$_GET[cname]."', `hexa` = '".$_GET[chexa]."', `type` = '".$_GET[ctype]."', `application` = '".$_GET[capp]."', `price` = '".$_GET[cprice]."', `dateUpdate` = now() WHERE id = '".$_GET[cId]."'";
		} else {
			$sql_addColor = "INSERT into `ft_colorManufacturer` (`idManufacturer`, `name`, `hexa`, `type`, `application`, `price`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('".$_GET[manufacturerId]."', '".$_GET[cname]."', '".$_GET[chexa]."', '".$_GET[ctype]."', '".$_GET[capp]."', '".$_GET[cprice]."', now(), now(),'')";
		}
		mysql_query($sql_addColor) or die ('[{"response":"false","error":"error #198","reason":"'.mysql_error().$sql_addColor.'"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
		break;

	case 'removeColor':
		$sql_addColor = "DELETE FROM `".$_GET[table]."` WHERE `".$_GET[table]."`.`id` = '".$_GET[idColor]."'";
		mysql_query($sql_addColor) or die ('[{"response":"false","error":"error #205","reason":"'.mysql_error()." ".$sql_addColor.'"}]');
		echo '[{"response":"true"}]';
		break;

		//first check if exist children-content about this, 
		//if true then response false and the children info (how many itens still using this item)
		//if false go to delConfirm
	case 'deleteForm':
		if ($_GET[table] && $_GET[idField]) {
			$sqlCheckChildren = "DELETE FROM ".$_GET[table]." WHERE `id` = '".$_GET[idField]."'";
			mysql_query($sqlCheckChildren) or die ('[{"response":"false","error":"error #215","reason":"'.mysql_error().'"}]');
			echo '[{"response":"true"}]';
		} else {
			echo '[{"response":"false","error":"error #210","reason":"Incomplete Data"}]';
		}
		break;

		//wait prompt confirm and userId
		//check if will erase the children data (NO NO NO . NOT NOW)
		//change the status to deleted by user ;x;
	case 'deleteFormConfirm':
		echo '[{"response":"true"}]';
		break;

	case 'askManuf':
		echo "[";
		$sql_s_manuf = "SELECT id, name, active from ft_manufacturer where name like ('%".$_GET[term]."%') ORDER by name";
		$query_s_manuf = mysql_query($sql_s_manuf) or die ($sql_s_manuf." error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Montadora",
					"table":"ft_manufacturer",
					"active":"'.$resM[active].'",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		echo "]";
		break;
	case 'askModel':
		echo "[";
		if ($_GET[mainId] != "") { $mainId = " and idManufacturer = '".$_GET[mainId]."' "; }
		$sql_search = "SELECT id, name, idSegment1, idSegment2, idSegment3 active from ft_model where name like ('%".$_GET[term]."%') ".$mainId." ORDER by name";
		$query_s_manuf = mysql_query($sql_search) or die (" error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Modelo",
					"table":"ft_model",
					"segmentId1":"'.$resM[idSegment1].'",
					"segmentId2":"'.$resM[idSegment2].'",
					"segmentId3":"'.$resM[idSegment3].'",
					"active":"'.$resM[active].'",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		echo "]";
		break;
	case 'askVersion':
		echo "[";
		if ($_GET[mainId] != "") { $mainId = " and idModel = '".$_GET[mainId]."' and ft_model.id = '".$_GET[mainId]."' "; }
		$sql_v = "SELECT ft_version.id, ft_version.name, ft_model.active, ft_model.idSegment1, ft_model.idSegment2, ft_model.idSegment3 from ft_version, ft_model where ft_version.name like ('%".$_GET[term]."%') ".$mainId." ORDER by ft_version.name";
		
		$query_s_manuf = mysql_query($sql_v) or die (" error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($nameSeg == "") {
				$sSeg1 = "SELECT ft_segment.name from ft_segment WHERE ft_segment.id = '".$resM[idSegment1]."'";
				$qSeg1 = mysql_query($sSeg1);
				$rSeg1 = mysql_fetch_array($qSeg1);
				$sSeg2 = "SELECT ft_segment.name from ft_segment WHERE ft_segment.id = '".$resM[idSegment2]."'";
				$qSeg2 = mysql_query($sSeg2);
				$rSeg2 = mysql_fetch_array($qSeg2);
				$sSeg3 = "SELECT ft_segment.name from ft_segment WHERE ft_segment.id = '".$resM[idSegment3]."'";
				$qSeg3 = mysql_query($sSeg3);
				$rSeg3 = mysql_fetch_array($qSeg3);
				$nameSeg = "ok";
			}
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Versão",
					"table":"ft_version",
					"idSegment1":"'.$resM[idSegment1].'",
					"segmentName1":"'.$rSeg1[name].'",
					"idSegment2":"'.$resM[idSegment2].'",
					"segmentName2":"'.$rSeg2[name].'",
					"idSegment3":"'.$resM[idSegment3].'",
					"segmentName3":"'.$rSeg3[name].'",
					"active":"'.$resM[active].'",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		echo "]";
		break;

	case 'activeItem':
		$select = "SELECT active from ".$_GET[category]." WHERE id = '".$_GET[idItem]."'";
		$query = mysql_query($select) or die ('[{"response":"false", "errorMsg":"'.mysql_error().'"}]');
		$resAI = mysql_fetch_array($query);
		if ($resAI[active] == "n") {
			$sql_aI = "UPDATE `".$_GET[category]."` SET `active` = 's' WHERE `id` = '".$_GET[idItem]."'";
			mysql_query($sql_aI) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
			echo '[{"response":"true", "reason":"active"}]';
		} else {
			$sql_aI = "UPDATE `".$_GET[category]."` SET `active` = 'n' WHERE `id` = '".$_GET[idItem]."'";
			mysql_query($sql_aI) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
			echo '[{"response":"true", "reason":"desactive"}]';
		}
		break;

	case 'askOption':
		$sql = "SELECT ft_optionsManufacturer.id, ft_optionsManufacturer.name, ft_optionsManufacturer.options, ft_optionsManufacturer.price, ft_optionsManufacturer.code, ft_manufacturer.name as manufacturerName FROM ft_optionsManufacturer, ft_manufacturer WHERE ft_manufacturer.id = ft_optionsManufacturer.idManufacturer and  ft_optionsManufacturer.idManufacturer = '".$_GET[manufacturerId]."'";
		$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		$m=0; echo "[";
		while ($resOpt = mysql_fetch_array($query)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resOpt[id].'",
					"label":"'.$resOpt[name].'",
					"category": "Opcional",
					"table":"ft_optionsManufacturer",
					"value":"'.$resOpt[name].'",
					"optValue":"'.$resOpt[options].'",
					"price":"'.$resOpt[price].'",
					"code":"'.$resOpt[code].'",
					"manufacturerName":"'.$resOpt[manufacturerName].'"
				}';
			$m++;
		}
		echo "]";
		break;
	case 'askOptionValue':
		$sql = "SELECT id, name, options, price, code FROM ft_optionsManufacturer WHERE id = '".$_GET[optId]."'";
		$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		$m=0; echo "[";
		while ($resOpt = mysql_fetch_array($query)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resOpt[id].'",
					"label":"'.$resOpt[name].'",
					"category": "Opcional",
					"table":"ft_optionsManufacturer",
					"value":"'.$resOpt[name].'",
					"optValue":"'.$resOpt[options].'",
					"price":"'.$resOpt[price].'",
					"code":"'.$resOpt[code].'"
				}';
			$m++;
		}
		echo "]";
		break;
	case 'megaInfo':
		$sqlMO = "SELECT id, place FROM megaOferta WHERE idFeature = '".$_GET[idFeature]."'";
		$queryMO = mysql_query($sqlMO) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		echo '[{"response":"true", "insertId":"'.mysql_insert_id().'", "reason":"Already exist, updated"}]';
		// if (mysql_num_rows($queryMO) > 0 ){
			// $sqlUp = "UPDATE `megaOferta` SET `price` = '".$_GET[price]."' AND `dateLimit` = '".$_GET[dateLimit]."' AND `place` = '".$_GET[place]."' WHERE `idFeature` = '".$_GET[idFeature]."'";
			// mysql_query($sqlUp) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		// }
		break;
	case 'megaAdd':
	//api/index.php?type=mega&idFeature=5&price=123&p=carrousel&dateLimit=12/12/2013&name=undefined 
		// $sqlMO = "SELECT id, place FROM megaOferta WHERE idFeature = '".$_GET[idFeature]."'";
		// $queryMO = mysql_query($sqlMO) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		// if (mysql_num_rows($queryMO) > 0 ){
		// 	$sqlUp = "UPDATE `megaOferta` SET `price` = '".$_GET[price]."' AND `dateLimit` = '".$_GET[dateLimit]."' AND `place` = '".$_GET[place]."' WHERE `idFeature` = '".$_GET[idFeature]."'";
		// 	mysql_query($sqlUp) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		// 	echo '[{"response":"true", "errorNumber":"#355", "reason":"Already exist, updated"}]';
		// } else {
			$sql = "INSERT INTO megaOferta (`manufacturerId`,`modelId`,`versionId`,`featureId`,`price`,`place`,`description`,`picture`,`dateIni`,`dateLimit`,`dateUpdate`) VALUES ('".$_GET[manufacturerId]."','".$_GET[modelId]."','".$_GET[versionId]."','".$_GET[featureId]."','".$_GET[price]."','".$_GET[place]."','".$_GET[description]."','".$_GET[picture]."','".$_GET[dateIni]."','".$_GET[dateLimit]."',now())";
			//$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
			//$res = mysql_fetch_array($query);
			echo '[{"response":"true", "id":"'.mysql_insert_id().'"}]';
		// }
		break;
	case 'megaRemove':
		//TO DO: remove or edit image name file
		$sqlRM = "DELETE from `megaOferta` WHERE `id` = '".$_GET[idItem]."'";
		mysql_query($sqlRM) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		echo '[{"response":"true", "reason":"Item removed"}]';
		break;

	case 'checkSearch':
		if ($_GET[idItem] && $_GET[table] && $_GET[field] && $_GET[text]) {
			$field = $_GET[field];
			$sql = "SELECT ".$_GET[field]." FROM ".$_GET[table]." WHERE id = '".$_GET[idItem]."'";
			$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
			$res = mysql_fetch_array($query);
			if ($res[$field] === $_GET[text]) {
				echo '[{"response":"true", "reason":""}]';
			} else {
				echo '[{"response":"false", "reason":"Different Info"}]';
			}
		} else {
			echo '[{"response":"false", "reason":"Incomplete Info"}]';
		}
		break;

	case 'askExplorer':
	$a = ($_GET[idVersion] == "" || $_GET[idVersion] == "0"  ? "" : " and ft_version.id = '".$_GET[idVersion]."' ");
		$sql = "SELECT ft_feature.id as featureId, ft_feature.code,ft_feature.engine,ft_feature.doors,ft_feature.acceleration,ft_feature.passagers,ft_feature.speedMax,ft_feature.powerMax,ft_feature.steering,ft_feature.fuel,ft_feature.feeding,ft_feature.torque,ft_feature.traction,ft_feature.frontSuspension,ft_feature.rearSuspension,ft_feature.frontBrake,ft_feature.wheels,ft_feature.dimensionLength,ft_feature.dimensionHeight,ft_feature.dimensionWidth,ft_feature.rearBrake,ft_feature.weight,ft_feature.trunk,ft_feature.tank,ft_feature.dimensionSignAxes,ft_feature.warranty,ft_feature.gear,ft_feature.consumptionCity,ft_feature.consumptionRoad,ft_feature.yearModel,ft_feature.yearProduced,ft_feature.items,ft_feature.picture,ft_feature.dualFrontAirBag,ft_feature.electricSteering,ft_feature.hydraulicSteering,ft_feature.airConditioning,ft_feature.leatherSeat,ft_feature.alarm,ft_feature.autoGear,ft_feature.absBrake,ft_feature.traction4x4,ft_feature.dateCreate,ft_feature.countryOrigin,ft_feature.dateUpdate,ft_feature.hotAir,ft_feature.heightAdjustment,ft_feature.rearSeatSplit,ft_feature.bluetoothSpeakerphone,ft_feature.bonnetSea,ft_feature.onboardComputer,ft_feature.accelerationCounter,ft_feature.rearWindowDefroster,ft_feature.sidesteps,ft_feature.fogLamps,ft_feature.xenonHeadlights,ft_feature.integratedGPSPanel,ft_feature.rearWindowWiper,ft_feature.bumper,ft_feature.autopilot,ft_feature.bucketProtector,ft_feature.roofRack,ft_feature.cdplayerUSBInput,ft_feature.radio,ft_feature.headlightsHeightAdjustment,ft_feature.rearviewElectric,ft_feature.alloyWheels,ft_feature.rainSensor,ft_feature.parkingSensor,ft_feature.isofix,ft_feature.sunroof,ft_feature.electricLock,ft_feature.electricWindow,ft_feature.rearElectricWindow,ft_feature.steeringWheelAdjustment,ft_feature.description,ft_feature.active,ft_feature.userUpdate,ft_feature.price, ft_version.id as versionId, ft_version.name as versionName, ft_model.id as modelId, ft_model.name as modelName from ft_feature, ft_version, ft_model where ft_feature.idVersion = ft_version.id and ft_version.idModel = ft_model.id and ft_model.id = '".$_GET[idModel]."' ".$a." ORDER BY ft_feature.yearProduced DESC limit 1 ";
		$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'error #416"}]');
		$result="[";
		$loop=0;
		while ($res = mysql_fetch_array($query)) {
			switch (strtolower($res[fuel])) {
			 	case 'g':
					$fuelType = "Gasolina";
			 		break;
			 	case 'f':
			 		$fuelType = "Flex";
			 		break;
			 	case 'a':
			 		$fuelType = "Alcool";
			 		break;
			 	case 'd':
			 		$fuelType = "Diesel";
			 		break;
			 	default:
			 		$fuelType = $res[fuel];
			 		break;
			}
			$result .= ($loop > 0 ? "," : "");
			$result.='{
				"response":"true",
				"featureId":"'.$res[featureId].'",
				"modelId":"'.$res[modelId].'",
				"modelName":"'.$res[modelName].'",
				"versionId":"'.$res[versionId].'",
				"versionName":"'.$res[versionName].'",
		        "code":"'.$res[code].'",
		        "engine":"'.$res[engine].'",
		        "doors":"'.$res[doors].'",
		        "acceleration":"'.$res[acceleration].'",
		        "passagers":"'.$res[passagers].'",
		        "speedMax":"'.$res[speedMax].'",
		        "powerMax":"'.$res[powerMax].'",
		        "steering":"'.$res[steering].'",
		        "fuel":"'.$fuelType.'",
		        "feeding":"'.$res[feeding].'",
		        "torque":"'.$res[torque].'",
		        "traction":"'.$res[traction].'",
		        "frontSuspension":"'.$res[frontSuspension].'",
		        "rearSuspension":"'.$res[rearSuspension].'",
		        "frontBrake":"'.$res[frontBrake].'",
		        "wheels":"'.$res[wheels].'",
		        "dimensionLength":"'.$res[dimensionLength].'",
		        "dimensionHeight":"'.$res[dimensionHeight].'",
		        "dimensionWidth":"'.$res[dimensionWidth].'",
		        "rearBrake":"'.$res[rearBrake].'",
		        "weight":"'.$res[weight].'",
		        "trunk":"'.$res[trunk].'",
		        "tank":"'.$res[tank].'",
		        "dimensionSignAxes":"'.$res[dimensionSignAxes].'",
		        "warranty":"'.$res[warranty].'",
		        "gear":"'.$res[gear].'",
		        "consumptionCity":"'.$res[consumptionCity].'",
		        "consumptionRoad":"'.$res[consumptionRoad].'",
		        "yearModel":"'.$res[yearModel].'",
		        "yearProduced":"'.$res[yearProduced].'",
		        "picture":"'.$res[picture].'",
		        "dualFrontAirBag":"'.$res[dualFrontAirBag].'",
		        "electricSteering":"'.$res[electricSteering].'",
		        "hydraulicSteering":"'.$res[hydraulicSteering].'",
		        "airConditioning":"'.$res[airConditioning].'",
		        "leatherSeat":"'.$res[leatherSeat].'",
		        "alarm":"'.$res[alarm].'",
		        "autoGear":"'.$res[autoGear].'",
		        "absBrake":"'.$res[absBrake].'",
		        "traction4x4":"'.$res[traction4x4].'",
		        "countryOrigin":"'.$res[countryOrigin].'",
		        "hotAir":"'.$res[hotAir].'",
		        "heightAdjustment":"'.$res[heightAdjustment].'",
		        "rearSeatSplit":"'.$res[rearSeatSplit].'",
		        "bluetoothSpeakerphone":"'.$res[bluetoothSpeakerphone].'",
		        "bonnetSea":"'.$res[bonnetSea].'",
		        "onboardComputer":"'.$res[onboardComputer].'",
		        "accelerationCounter":"'.$res[accelerationCounter].'",
		        "rearWindowDefroster":"'.$res[rearWindowDefroster].'",
		        "sidesteps":"'.$res[sidesteps].'",
		        "fogLamps":"'.$res[fogLamps].'",
		        "xenonHeadlights":"'.$res[xenonHeadlights].'",
		        "integratedGPSPanel":"'.$res[integratedGPSPanel].'",
		        "rearWindowWiper":"'.$res[rearWindowWiper].'",
		        "bumper":"'.$res[bumper].'",
		        "autopilot":"'.$res[autopilot].'",
		        "bucketProtector":"'.$res[bucketProtector].'",
		        "roofRack":"'.$res[roofRack].'",
		        "cdplayerUSBInput":"'.$res[cdplayerUSBInput].'",
		        "radio":"'.$res[radio].'",
		        "headlightsHeightAdjustment":"'.$res[headlightsHeightAdjustment].'",
		        "rearviewElectric":"'.$res[rearviewElectric].'",
		        "alloyWheels":"'.$res[alloyWheels].'",
		        "rainSensor":"'.$res[rainSensor].'",
		        "parkingSensor":"'.$res[parkingSensor].'",
		        "isofix":"'.$res[isofix].'",
		        "sunroof":"'.$res[sunroof].'",
		        "electricLock":"'.$res[electricLock].'",
		        "electricWindow":"'.$res[electricWindow].'",
		        "rearElectricWindow":"'.$res[rearElectricWindow].'",
		        "steeringWheelAdjustment":"'.$res[steeringWheelAdjustment].'",
		        "description":"'.$res[description].'",
		        "active":"'.$res[active].'",
		        "price":"'.$res[price].'"';
			$sqlOpt = "SELECT ft_optionsManufacturer.code, ft_optionsManufacturer.name, ft_optionsManufacturer.options, ft_optionsManufacturer.price as priceManufacturer, ft_optionsVersion.price as priceFeature from ft_optionsManufacturer, ft_optionsVersion WHERE ft_optionsVersion.idOption = ft_optionsManufacturer.id and ft_optionsVersion.idFeature = '".$res[featureId]."'";
			$queryOpt = mysql_query($sqlOpt) or die (mysql_error()."error #522");
			$result.= (mysql_num_rows($queryOpt) > 0 ? ',"options":' : "");
			$loopOpt=0;
			while ($resOpt = mysql_fetch_array($queryOpt)) {
				$result .= ($loopOpt > 0 ? "," : "[");
		        $result.='{
	        		"id":"'.$resOpt[id].'",
		        	"code":"'.$resOpt[code].'",
		        	"name":"'.$resOpt[name].'",
		        	"items":"'.$resOpt[options].'",
		        	"price":"'.$resOpt[priceFeature].'"
		        	}';
		        $loopOpt++;
			}
			$result.=($loopOpt>0 ? "]" : "");

			$sqlSerieItem = "SELECT description from ft_serieFeature WHERE idFeature = '".$res[featureId]."' order by description asc";
			$querySerieItem = mysql_query($sqlSerieItem) or die (mysql_error()."error #539");
			$result.= (mysql_num_rows($querySerieItem) > 0 ? ',"serieItems":' : "");
			$loopOpt=0;
			while ($resSerieItem = mysql_fetch_array($querySerieItem)) {
				$result .= ($loopOpt > 0 ? "," : "[");
		        $result.='{
		        	"description":"'.utf8_decode($resSerieItem[description]).'"
		        	}';
		        $loopOpt++;
			}
			$result.=($loopOpt>0 ? "]" : "");

			$sqlColors = "SELECT ft_colorFeature.hexa, ft_colorFeature.code, ft_colorFeature.name, ft_colorFeature.type, max(ft_colorManufacturer.price) as price from ft_colorFeature, ft_colorManufacturer WHERE ft_colorFeature.idFeature = '".$res[featureId]."' and ft_colorFeature.idManufacturer = ft_colorManufacturer.idManufacturer group by ft_colorFeature.hexa order by ft_colorFeature.name asc";
			$queryColors = mysql_query($sqlColors) or die (mysql_error()."error #552");
			$result.= (mysql_num_rows($queryColors) > 0 ? ',"colors":' : "");
			$loopOpt=0;
			while ($resColors = mysql_fetch_array($queryColors)) {
				$result .= ($loopOpt > 0 ? "," : "[");
		        $result.='{
		        	"name":"'.$resColors[name].'",
		        	"code":"'.$resColors[code].'",
		        	"hexa":"'.$resColors[hexa].'",
		        	"type":"'.$resColors[type].'",
		        	"price":"'.$resColors[price].'"
		        	}';
		        $loopOpt++;
			}
			$result.=($loopOpt>0 ? "]" : "");

			$sqlVrs = "SELECT ft_version.id, ft_version.name from ft_version, ft_feature WHERE ft_feature.idVersion = ft_version.id and ft_version.idModel = '".$res[modelId]."' group by ft_version.id";
			$queryVrs = mysql_query($sqlVrs) or die (mysql_error()."error #552");
			$result.= (mysql_num_rows($queryVrs) > 0 ? ',"sameModel":' : "");
			$loopOpt=0;
			while ($resVrs = mysql_fetch_array($queryVrs)) {
				$result .= ($loopOpt > 0 ? "," : "[");
		        $result.='{
	        		"id":"'.$resVrs[id].'",
		        	"name":"'.$resVrs[name].'"
		        	}';
		        $loopOpt++;
			}
			$result.=($loopOpt>0 ? "]" : "");
			$result.='}';
			$loop++;
		}
		$result.="]";
		print_r($result);
		break;

	case 'upOrder':
		$sql = "UPDATE `megaOferta` set `order` = '".$_GET[numOrder]."' WHERE id = '".$_GET[mainId]."'";
		mysql_query($sql) or die ('[{"response":"false", "reason":"#error 542"}]');
		echo '[{"response":"true", "reason":"order changed"}]';
		break;

	case 'searchMega':
		$sqlMega = "SELECT megaOferta.id as megaOfertaId, ft_manufacturer.name as manufacturerName, ft_manufacturer.id as manufacturerId, ft_model.id as modelId, ft_model.name as modelName, ft_version.id as versionId, ft_version.name as versionName, megaOferta.price, megaOferta.place, megaOferta.order, megaOferta.description, megaOferta.picture, megaOferta.dateLimit FROM megaOferta, ft_manufacturer, ft_model, ft_version WHERE megaOferta.manufacturerId = ft_manufacturer.id and megaOferta.versionId = ft_version.id AND megaOferta.modelId = ft_model.id and megaOferta.id = '".$_GET[idItem]."'";
		$queryMega = mysql_query($sqlMega) or die ('[{"response":"false", "reason":"#error 548"}]');
		$resMega = mysql_fetch_array($queryMega);
		echo '[{
			"response":"true",
			"megaOfertaId":"'.$resMega[megaOfertaId].'",
			"manufacturerId":"'.$resMega[manufacturerId].'",
			"manufacturerName":"'.$resMega[manufacturerName].'",
			"modelId":"'.$resMega[modelId].'",
			"modelName":"'.$resMega[modelName].'",
			"versionId":"'.$resMega[versionId].'",
			"versionName":"'.$resMega[versionName].'",
			"price":"'.$resMega[price].'",
			"place":"'.$resMega[place].'",
			"order":"'.$resMega[order].'",
			"description":"'.$resMega[description].'",
			"picture":"'.$resMega[picture].'"
		}]';

		break;


}



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