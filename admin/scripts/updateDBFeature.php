<?
include ("checkPermissions.php");
include("conectDB.php");

switch ($_POST[action]) {
	case 'update':
	switch ($_POST[category]) {
		case 'manufacturer':
			$sqlUpdate = "UPDATE `manufacturer` SET `name` = '".$_POST[manufacturerName]."' WHERE `id` = '".$_POST[manufacturerId]."'";
			mysql_query($sqlUpdate) or die (" error #10");
			break;
		case 'model':
			$sqlUpdate = "UPDATE `model` SET `idManufacturer` = '".$_POST[manufacturerId]."', `name` = '".$_POST[modelName]."' WHERE `id` = '".$_POST[modelId]."'";
			mysql_query($sqlUpdate) or die (" error #15");
			break;
		case 'version':
			$sqlUpdate = "UPDATE `model` SET `idManufacturer` = '".$_POST[manufacturerId]."', `idModel` = '".$_POST[modelId]."', `name` = '".$_POST[modelName]."' WHERE `id` = '".$_POST[modelId]."'";
			mysql_query($sqlUpdate) or die (" error #20");
			break;
		case 'feature':
			$sqlUpdate = "UPDATE `feature` 
			SET 
				`idManufacturer` = '".$_POST[manufacturerId]."',
				`idModel` = '".$_POST[modelId]."',
				`idVersion` = '".$_POST[versionId]."',
				`yearProduced` = '".$_POST[yearProduced]."',
				`yearModel` = '".$_POST[yearModel]."',
				`doors` = '".$_POST[doors]."',
				`passagers` = '".$_POST[passagers]."',
				`engine` = '".$_POST[engine]."',
				`feeding` = '".$_POST[feeding]."',
				`fuel` = '".$_POST[fuel]."',
				`powerMax` = '".$_POST[powerMax]."',
				`torque` = '".$_POST[torque]."',
				`acceleration` = '".$_POST[acceleration]."',
				`speedMax` = '".$_POST[speedMax]."',
				`consumptionCity` = '".$_POST[consumptionCity]."',
				`consumptionRoad` = '".$_POST[consumptionRoad]."',
				`gear` = '".$_POST[gear]."',
				`traction` = '".$_POST[traction]."',
				`wheels` = '".$_POST[wheels]."',
				`frontSuspension` = '".$_POST[frontSuspension]."',
				`rearSuspension` = '".$_POST[rearSuspension]."',
				`frontBrake` = '".$_POST[frontBrake]."',
				`rearBrake` = '".$_POST[rearBrake]."',
				`dimensionLength` = '".$_POST[dimensionLength]."',
				`dimensionWidth` = '".$_POST[dimensionWidth]."',
				`dimensionHeight` = '".$_POST[dimensionHeight]."',
				`dimensionSignAxes` = '".$_POST[dimensionSignAxes]."',
				`weight` = '".$_POST[weight]."',
				`trunk` = '".$_POST[trunk]."',
				`tank` = '".$_POST[tank]."',
				`warranty` = '".$_POST[warranty]."',
				`countryOrigin` = '".$_POST[countryOrigin]."',
				`dualFrontAirBag` = '".$_POST[dualFrontAirBag]."',
				`alarm` = '".$_POST[alarm]."',
				`airConditioning` = '".$_POST[airConditioning]."',
				`hotAir` = '".$_POST[hotAir]."',
				`leatherSeat` = '".$_POST[leatherSeat]."',
				`heightAdjustment` = '".$_POST[heightAdjustment]."',
				`rearSeatSplit` = '".$_POST[rearSeatSplit]."',
				`bluetoothSpeakerphone` = '".$_POST[bluetoothSpeakerphone]."',
				`bonnetSea` = '".$_POST[bonnetSea]."',
				`onboardComputer` = '".$_POST[onboardComputer]."',
				`accelerationCounter` = '".$_POST[accelerationCounter]."',
				`rearWindowDefroster` = '".$_POST[rearWindowDefroster]."',
				`steering` = '".$_POST[steering]."',
				`sidesteps` = '".$_POST[sidesteps]."',
				`fogLamps` = '".$_POST[fogLamps]."',
				`xenonHeadlights` = '".$_POST[xenonHeadlights]."',
				`absBrake` = '".$_POST[absBrake]."',
				`integratedGPSPanel` = '".$_POST[integratedGPSPanel]."',
				`rearWindowWiper` = '".$_POST[rearWindowWiper]."',
				`bumper` = '".$_POST[bumper]."',
				`autopilot` = '".$_POST[autopilot]."',
				`bucketProtector` = '".$_POST[bucketProtector]."',
				`roofRack` = '".$_POST[roofRack]."',
				`cdplayerWithUSBInput` = '".$_POST[cdplayerWithUSBInput]."',
				`headlightsHeightAdjustment` = '".$_POST[headlightsHeightAdjustment]."',
				`rearviewElectric` = '".$_POST[rearviewElectric]."',
				`alloyWheels` = '".$_POST[alloyWheels]."',
				`rainSensor` = '".$_POST[rainSensor]."',
				`parkingSensor` = '".$_POST[parkingSensor]."',
				`isofix` = '".$_POST[isofix]."',
				`sunroof` = '".$_POST[sunroof]."',
				`electricLock` = '".$_POST[electricLock]."',
				`electricWindow` = '".$_POST[electricWindow]."',
				`rearEletricWindow` = '".$_POST[rearEletricWindow]."',
				`steeringWheelAdjustment` = '".$_POST[steeringWheelAdjustment]."',
				`picture` = '".$_POST[txtPicture]."',
				`active` = '".$_POST[active]."',
				`dateCreate` = now(),
				`dateUpdate` = now(),
				`userUpdate` = ''
			WHERE `feature`.`id` = '".$_POST[featureId]."' ;";
		
			mysql_query($sqlUpdate) or die (" error #90");
			//serie
			$sqlDelSeries = "delete from `serieFeature` WHERE `idFeature` = '".$_POST[featureId]."'";
			mysql_query($sqlDelSeries) or die (" error #95");
			for ($i=0;$i<$_POST[lengthSerie];$i++){
				$serieOpt = "rdSerie".$i;
				$serieName = "txtSerie".$i;
				if ($i > 0) { $valuesSerieInput .= ","; }
				$valuesSerieInput .= "(NULL, '".$_POST[featureId]."', '".$_POST[$serieName]."', '".$_POST[$serieOpt]."', now(), now(), NULL)";
			}
			if ($valuesSerieInput != ""){
				$sqlAddSeries = "insert into `serieFeature` (`id`, `idFeature`, `description`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesSerieInput;
				mysql_query($sqlAddSeries) or die (" error #103");
			}

			//options
			$sqlDelOpts = "delete from `optionsFeature` WHERE `idFeature` = '".$_POST[featureId]."'";
			mysql_query($sqlDelOpts) or die (" error #110");
			$o=0;
			for ($i=0;$i<$_POST[lengthOptions];$i++){
				$optIdOption = "txtOpt".$i;
				$optChoice = "chOpt".$i;
				if ($_POST[$optChoice] == "s") {
					if ($o > 0) { $valuesOptInput .= ","; }
					$valuesOptInput .= "(NULL, '".$_POST[featureId]."', '".$_POST[$optIdOption]."', '".$_POST[$optChoice]."', now(), now(), '')";
					$o++;
				}
			}
			if ($valuesOptInput != ""){
				$sqlAddOpts = "insert into `optionsFeature` (`id`, `idFeature`, `idOption`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesOptInput;
				mysql_query($sqlAddOpts) or die (" error #121");
			}

			//color
			$sqlDelColor = "delete from `colorModel` where `modelId` = '".$_POST[modelId]."'";
			mysql_query($sqlDelColor) or die (mysql_error()." error #115");
			for ($i=0;$i<$_POST[colorLength];$i++){
				$colorName = $_POST["colorInputName".$i];
				$colorApp = $_POST["colorInputApp".$i];
				$colorHex = $_POST["colorInputColor".$i];
				$colorType = $_POST["colorInputType".$i];
				if ($i > 0) { $valuesColorInput .= ","; }
				$valuesColorInput .= "(NULL, '".$_POST[modelId]."', '".$_POST["colorInputName".$i]."', '".$_POST["colorInputColor".$i]."', '".$_POST["colorInputApp".$i]."', '".$_POST["colorInputType".$i]."', now(), now(), NULL)";
			}
			if ($valuesColorInput != ""){
				$sqlAddColor = "insert into `colorModel` (`id`, `modelId`, `name`, `hexa`, `application`, `type`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesColorInput;
				mysql_query($sqlAddColor) or die (" error #126");
			}

			//pictures
			break;
		
		default:
			break;
	}
	break;
	
	case 'new':
		switch ($_POST[category]) {
		case 'manufacturer':
			$sqlAdd = "INSERT INTO `manufacturer` (`name`, `active`, `description`) VALUES ('".$_POST[manufacturerName]."','s','')";
		break;
		case 'model':
			$sqlAdd = "INSERT into `model` (`idManufacturer`, `name`, `description`, `active`) VALUES ('".$_POST[manufacturerId]."','".$_POST[modelName]."','','s') ";
			mysql_query($sqlAdd) or die (" error #15");
		break;
		case 'version':
			$sqlAdd = "INSERT INTO `version` (`idManufacturer`,`idModel`,`name`) VALUES ('".$_POST[manufacturerId]."','".$_POST[modelId]."','".$_POST[versionName]."')";
			mysql_query($sqlUpdate) or die (" error #20");
		break;
		case 'feature':
			$sqlAdd = "INSERT INTO `feature` (`idModel`, `idVersion`, `yearProduced`, `yearModel`, `doors`, `passagers`, `engine`, `feeding`, `fuel`, `powerMax`, `torque`, `acceleration`, `speedMax`, `consumptionCity`, `consumptionRoad`, `gear`, `traction`, `wheels`, `frontSuspension`, `rearSuspension`, `frontBrake`, `rearBrake`, `dimensionLength`, `dimensionWidth`, `dimensionHeight`, `dimensionSignAxes`, `weight`, `trunk`, `tank`, `warranty`, `countryOrigin`, `dualFrontAirBag`, `alarm`, `airConditioning`, `hotAir`, `leatherSeat`, `heightAdjustment`, `rearSeatSplit`, `bluetoothSpeakerphone`, `bonnetSea`, `onboardComputer`, `accelerationCounter`, `rearWindowDefroster`, `steering`, `sidesteps`, `fogLamps`, `xenonHeadlights`, `absBrake`, `integratedGPSPanel`, `rearWindowWiper`, `bumper`, `autopilot`, `bucketProtector`, `roofRack`, `cdplayerWithUSBInput`, `headlightsHeightAdjustment`, `rearviewElectric`, `alloyWheels`, `rainSensor`, `parkingSensor`, `isofix`, `sunroof`, `electricLock`, `electricWindow`, `rearEletricWindow`, `steeringWheelAdjustment`, `picture`, `active`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('".$_POST[modelId]."','".$_POST[versionId]."','".$_POST[yearProduced]."','".$_POST[yearModel]."','".$_POST[doors]."','".$_POST[passagers]."','".$_POST[engine]."','".$_POST[feeding]."','".$_POST[fuel]."','".$_POST[powerMax]."','".$_POST[torque]."','".$_POST[acceleration]."','".$_POST[speedMax]."','".$_POST[consumptionCity]."','".$_POST[consumptionRoad]."','".$_POST[gear]."','".$_POST[traction]."','".$_POST[wheels]."','".$_POST[frontSuspension]."','".$_POST[rearSuspension]."','".$_POST[frontBrake]."','".$_POST[rearBrake]."','".$_POST[dimensionLength]."','".$_POST[dimensionWidth]."','".$_POST[dimensionHeight]."','".$_POST[dimensionSignAxes]."','".$_POST[weight]."','".$_POST[trunk]."','".$_POST[tank]."','".$_POST[warranty]."','".$_POST[countryOrigin]."','".$_POST[dualFrontAirBag]."','".$_POST[alarm]."','".$_POST[airConditioning]."','".$_POST[hotAir]."','".$_POST[leatherSeat]."','".$_POST[heightAdjustment]."','".$_POST[rearSeatSplit]."','".$_POST[bluetoothSpeakerphone]."','".$_POST[bonnetSea]."','".$_POST[onboardComputer]."','".$_POST[accelerationCounter]."','".$_POST[rearWindowDefroster]."','".$_POST[steering]."','".$_POST[sidesteps]."','".$_POST[fogLamps]."','".$_POST[xenonHeadlights]."','".$_POST[absBrake]."','".$_POST[integratedGPSPanel]."','".$_POST[rearWindowWiper]."','".$_POST[bumper]."','".$_POST[autopilot]."','".$_POST[bucketProtector]."','".$_POST[roofRack]."','".$_POST[cdplayerWithUSBInput]."','".$_POST[headlightsHeightAdjustment]."','".$_POST[rearviewElectric]."','".$_POST[alloyWheels]."','".$_POST[rainSensor]."','".$_POST[parkingSensor]."','".$_POST[isofix]."','".$_POST[sunroof]."','".$_POST[electricLock]."','".$_POST[electricWindow]."','".$_POST[rearEletricWindow]."','".$_POST[steeringWheelAdjustment]."','".$_POST[txtPicture]."','".$_POST[active]."',now(),now(),'')";
		
			mysql_query($sqlAdd) or die (" error #90");
			$fetId = mysql_insert_id();
			//serie
			for ($i=0;$i<$_POST[lengthSerie];$i++){
				$serieOpt = "rdSerie".$i;
				$serieName = "txtSerie".$i;
				if ($i > 0) { $valuesSerieInput .= ","; }
				$valuesSerieInput .= "(NULL, '".$fetId."', '".$_POST[$serieName]."', '".$_POST[$serieOpt]."', now(), now(), NULL)";
			}
			if ($valuesSerieInput != ""){
				$sqlAddSeries = "insert into `serieFeature` (`id`, `idFeature`, `description`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesSerieInput;
				mysql_query($sqlAddSeries) or die (" error #103");
			}

			//options
			$o=0;
			for ($i=0;$i<$_POST[lengthOptions];$i++){
				$optIdOption = "txtOpt".$i;
				$optChoice = "chOpt".$i;
				if ($_POST[$optChoice] == "s") {
					if ($o > 0) { $valuesOptInput .= ","; }
					$valuesOptInput .= "(NULL, '".$fetId."', '".$_POST[$optIdOption]."', '".$_POST[$optChoice]."', now(), now(), '')";
					$o++;
				}
			}
			if ($valuesOptInput != ""){
				$sqlAddOpts = "insert into `optionsFeature` (`id`, `idFeature`, `idOption`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesOptInput;
				mysql_query($sqlAddOpts) or die (" error #121");
			}

			//color
			$sqlDelColor = "delete from `colorModel` where `modelId` = '".$_POST[modelId]."'";
			mysql_query($sqlDelColor) or die (mysql_error()." error #115");
			for ($i=0;$i<$_POST[colorLength];$i++){
				$colorName = $_POST["colorInputName".$i];
				$colorApp = $_POST["colorInputApp".$i];
				$colorHex = $_POST["colorInputColor".$i];
				$colorType = $_POST["colorInputType".$i];
				if ($i > 0) { $valuesColorInput .= ","; }
				$valuesColorInput .= "(NULL, '".$_POST[modelId]."', '".$_POST["colorInputName".$i]."', '".$_POST["colorInputColor".$i]."', '".$_POST["colorInputApp".$i]."', '".$_POST["colorInputType".$i]."', now(), now(), NULL)";
			}
			if ($valuesColorInput != ""){
				$sqlAddColor = "insert into `colorModel` (`id`, `modelId`, `name`, `hexa`, `application`, `type`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesColorInput;
				mysql_query($sqlAddColor) or die (" error #126");
			}
		break;
		}
		if ($sqlUpdate) {
			mysql_query($sqlUpdate) or die (" error #10");
		}
}

echo $sqlUpdate;











?>



























