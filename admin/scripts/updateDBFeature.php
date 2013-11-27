<?
include("conectDB.php");
switch ($_POST[action]) {
	case 'update':
		$sqlFeature = "update `feature` 
		SET 
			`manufacturerId` = '".$_POST[manufacturerId]."',
			`modelId` = '".$_POST[modelId]."',
			`versionId` = '".$_POST[versionId]."',
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
			`active` = '".$_POST[active]."',
			`dateCreate` = now(),
			`dateUpdate` = now(),
			`userUpdate` = ''
		WHERE `feature`.`id` = '".$_POST[idFeature]."' ;";
		mysql_query($sqlFeature) or die (" error #80");
		
		//serie
		$sqlDelSeries = "delete from `serieFeature` WHERE `idFeature` = '".$_POST[idFeature]."'";
		mysql_query($sqlDelSeries) or die (mysql_error()." error #85");
		for ($i=0;$i<$_POST[lengthSerie];$i++){
			$serieOpt = "rdSerie".$i;
			$serieName = "txtSerie".$i;
			if ($i > 0) { $valuesSerieInput .= ","; }
			$valuesSerieInput .= "(NULL, '".$_POST[idFeature]."', '".$_POST[$serieName]."', '".$_POST[$serieOpt]."', now(), now(), NULL)";
		}
		if ($valuesSerieInput != ""){
			$sqlAddSeries = "insert into `serieFeature` (`id`, `idFeature`, `description`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesSerieInput;
			mysql_query($sqlAddSeries) or die (" error #93");
		}

		//options
		$sqlDelOpts = "delete from `optionsFeature` WHERE `idFeature` = '".$_POST[idFeature]."'";
		mysql_query($sqlDelOpts) or die (" error #100");
		$o=0;
		for ($i=0;$i<$_POST[lengthOptions];$i++){
			$optIdOption = "txtOpt".$i;
			$optChoice = "chOpt".$i;
			if ($_POST[$optChoice] == "s") {
				if ($o > 0) { $valuesOptInput .= ","; }
				$valuesOptInput .= "(NULL, '".$_POST[idFeature]."', '".$_POST[$optIdOption]."', '".$_POST[$optChoice]."', now(), now(), '')";
				$o++;
			}
		}
		if ($valuesOptInput != ""){
			$sqlAddOpts = "insert into `optionsFeature` (`id`, `idFeature`, `idOption`, `option`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ".$valuesOptInput;
			mysql_query($sqlAddOpts) or die (" error #110");
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
		# code...
		break;
}












?>



























