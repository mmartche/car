<?

include ("../scripts/conectDB.php");


//$sql_search = "select feature.id as featureId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";

switch ($_GET[type]) {
 	case 'askInput':
		echo "[";
		$sql_s_manuf = "select id, name, active from manufacturer where name like ('%".$_GET[term]."%')";
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
					"table":"manufacturer",
					"value":"'.$resM[name].'"
				}';
			$m++;
		}
		$sql_search = "select id, name, active from model where name like ('%".$_GET[term]."%')";
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
					"table":"model",
					"value":"'.$res[name].'"
				}';
			$l++;
		}
		$sql_v = "select id, name, active from version where name like ('%".$_GET[term]."%')";
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
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, active FROM manufacturer WHERE id = '".$_GET[idField]."'";
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
						"category": "manufacturer",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL MODELS
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model") {
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, model.active FROM manufacturer, model WHERE model.idManufacturer = manufacturer.id ".$filterSearch;
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
						"category": "model",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL VERSIONS
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model" || $_GET[table] == "version" || $_GET[table] == "feature") {
			$sqlTerm = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, version.active FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id ".$filterSearch;
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
						"category": "version",
						"active":"'.$res[active].'",
						"value":"",
						"name":""
					}';
				$l++;
			}
		}
		//ALL ALL
		if ($_GET[table] == "manufacturer" || $_GET[table] == "model" || $_GET[table] == "version" || $_GET[table] == "feature") {
			$sqlTerm = "SELECT feature.id as featureId, feature.yearProduced, feature.yearModel, feature.engine, feature.gear, feature.fuel, feature.steering, manufacturer.id as manufacturerId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, feature.active FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id ".$filterSearch;
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
						"category": "feature",
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
		$sql_addOpt = "insert into `optionsManufacturer` (`id`, `idManufacturer`, `code`, `name`, `options`, `price`, `active`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('', '".$_GET[manufacturerId]."', '".$_GET[codopt]."', '".$_GET[name]."', '".$_GET[text]."', '".$_GET[price]."', 's', now(), now(),'')";
		mysql_query($sql_addOpt) or die ('[{"response":"false","error":"error #192","reason":"'.mysql_error().'"}]');
		echo '[{"response":"true","insertId":"'.mysql_insert_id().'"}]';
		break;

	case 'addColor':
		if ($_GET[cId] != "") {
			$sql_addColor = "UPDATE colorManufacturer SET `idManufacturer` = '".$_GET[manufacturerId]."', `name` = '".$_GET[cname]."', `hexa` = '".$_GET[chexa]."', `type` = '".$_GET[ctype]."', `application` = '".$_GET[capp]."', `price` = '".$_GET[cprice]."', `dateUpdate` = now() WHERE id = '".$_GET[cId]."'";
		} else {
			$sql_addColor = "INSERT into `colorManufacturer` (`idManufacturer`, `name`, `hexa`, `type`, `application`, `price`, `dateCreate`, `dateUpdate`, `userUpdate`) VALUES ('".$_GET[manufacturerId]."', '".$_GET[cname]."', '".$_GET[chexa]."', '".$_GET[ctype]."', '".$_GET[capp]."', '".$_GET[cprice]."', now(), now(),'')";
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
		$sql_s_manuf = "SELECT id, name, active from manufacturer where name like ('%".$_GET[term]."%') ORDER by name";
		$query_s_manuf = mysql_query($sql_s_manuf) or die ($sql_s_manuf." error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Montadora",
					"table":"manufacturer",
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
		$sql_search = "SELECT id, name, idSegment1, idSegment2, idSegment3 active from model where name like ('%".$_GET[term]."%') ".$mainId." ORDER by name";
		$query_s_manuf = mysql_query($sql_search) or die (" error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Modelo",
					"table":"model",
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
		if ($_GET[mainId] != "") { $mainId = " and idModel = '".$_GET[mainId]."' and model.id = '".$_GET[mainId]."' "; }
		$sql_v = "SELECT version.id, version.name, model.active, model.idSegment1, model.idSegment2, model.idSegment3 from version, model where version.name like ('%".$_GET[term]."%') ".$mainId." ORDER by version.name";
		
		$query_s_manuf = mysql_query($sql_v) or die (" error #15");
		$m = 0;
		while ($resM = mysql_fetch_array($query_s_manuf)) {
			if ($nameSeg == "") {
				$sSeg1 = "SELECT segment.name from segment WHERE segment.id = '".$resM[idSegment1]."'";
				$qSeg1 = mysql_query($sSeg1);
				$rSeg1 = mysql_fetch_array($qSeg1);
				$sSeg2 = "SELECT segment.name from segment WHERE segment.id = '".$resM[idSegment2]."'";
				$qSeg2 = mysql_query($sSeg2);
				$rSeg2 = mysql_fetch_array($qSeg2);
				$sSeg3 = "SELECT segment.name from segment WHERE segment.id = '".$resM[idSegment3]."'";
				$qSeg3 = mysql_query($sSeg3);
				$rSeg3 = mysql_fetch_array($qSeg3);
				$nameSeg = "ok";
			}
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resM[id].'",
					"label":"'.$resM[name].'",
					"category": "Versão",
					"table":"version",
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
		$sql = "SELECT optionsManufacturer.id, optionsManufacturer.name, optionsManufacturer.options, optionsManufacturer.price, optionsManufacturer.code, manufacturer.name as manufacturerName FROM optionsManufacturer, manufacturer WHERE manufacturer.id = optionsManufacturer.idManufacturer and  optionsManufacturer.idManufacturer = '".$_GET[manufacturerId]."'";
		$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		$m=0; echo "[";
		while ($resOpt = mysql_fetch_array($query)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resOpt[id].'",
					"label":"'.$resOpt[name].'",
					"category": "Opcional",
					"table":"optionsManufacturer",
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
		$sql = "SELECT id, name, options, price, code FROM optionsManufacturer WHERE id = '".$_GET[optId]."'";
		$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
		$m=0; echo "[";
		while ($resOpt = mysql_fetch_array($query)) {
			if ($m > 0) { echo ","; }
			echo '{
					"id":"'.$resOpt[id].'",
					"label":"'.$resOpt[name].'",
					"category": "Opcional",
					"table":"optionsManufacturer",
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
			$query = mysql_query($sql) or die ('[{"response":"false", "reason":"'.mysql_error().'"}]');
			//$res = mysql_fetch_array($query);
			echo '[{"response":"true", "id":"'.mysql_insert_id().'"}]';
		// }
		break;
	case 'megaRemove':
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
		$sql = "SELECT model.name from feature, version, model where feature.idVersion = version.id and version.idModel = model.id = '".$_GET[idModel]."'";
		// $query = mysql_query($sql) or die ('[{"response":"false", "reason":"error #416"}]');
		// while ($res = mysql_fetch_array($query)) {
		// 	//aee
		// }
		echo '[{"response":"true", "reason":""}]';
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