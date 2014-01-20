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
	<script type="text/javascript" src="scripts/megaOferta.js"></script>
	
	<link rel="stylesheet" href="styles//jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/index.css" />
	<link rel="stylesheet" type="text/css" href="styles/explorer.css" />
</head>
<body name="searchList">
<?
include ("./scripts/conectDB.php");

function uploadFile ($manufacturerId,$modelId,$versionId) {
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& in_array($extension, $allowedExts)) {
	// && ($_FILES["file"]["size"] < 20000) ==> check the file size
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		} else {
			$_FILES["file"]["name"] = $manufacturerId."-".$modelId."-".$versionId.".".end($temp);
			// echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			// echo "Type: " . $_FILES["file"]["type"] . "<br>";
			// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			// echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
				//if (file_exists("../../carImages/" . $_FILES["file"]["name"])) {
					//echo $_FILES["file"]["name"] . " already exists. ";
				//} else {
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"../carImagesMegaOferta/" . $_FILES["file"]["name"]);
					// echo "Stored in: " . "../carImagesMegaOferta/" . $_FILES["file"]["name"];
					return $_FILES["file"]["name"];
				//}
		}
	} else {
		echo "Invalid file";
	}
}

if($_POST[btnAddMegaOferta] == "Adicionar") {
	$picTemp = uploadFile($_POST[manufacturerId],$_POST[modelId],$_POST[versionId]);
	if ($picTemp != "") {
		$picTempSql = "`picture` = '".$picTemp."',";
	}
	$sql = "INSERT INTO megaOferta (`manufacturerId`,`modelId`,`versionId`,`featureId`,`price`,`place`,`description`,`picture`,`dateIni`,`dateLimit`,`dateUpdate`) VALUES ('".$_POST[manufacturerId]."','".$_POST[modelId]."','".$_POST[versionId]."','".$_POST[featureId]."','".$_POST[price]."','".$_POST[place]."','".$_POST[description]."','".$picTemp."','".$_POST[dateIni]."','".$_POST[dateLimit]."',now())";
	mysql_query($sql) or die("#error 35");
}
?>

<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<h2>
			<span>Sistema administrativo - Mega Oferta</span>
		</h2>
	</header>
	<ol class="breadcrumb">
		<li><a href="index.php">Home</a></li>
	</ol>
	<!--form class="form-search">
	<div class="input-append">
	<input type="text" class="span2 search-query">
	<button type="submit" class="btn">Search</button>
	</div>
	</form-->
	<form onsubmit="" action="#" method="post" enctype="multipart/form-data" style="overflow:hidden">
		<div class="megaDiv">
			<div class="MegaSelects">
				<select name="manufacturer" id="manufacturerName">
					<option>Escolha uma Marca</option>
					<?
				    $sqlManuf = "SELECT id, name from manufacturer order by name";
				    $queryManuf = mysql_query($sqlManuf);
				    while ($resManuf = mysql_fetch_array($queryManuf)) {
				    	?>
				    	<option value="<?=$resManuf[id]?>"><?=$resManuf[name]?></option>
				    	<?
				    }
				    ?>
				</select>
				<select name="modelName" id="modelName"></select>
				<select name="versionName" id="versionName"></select>
			</div>
			<div class="megaInputs">
				<input type="text" name="price" id="price" placeholder="Preço" />
				<input type="text" name="description" id="description" placeholder="Descrição" />
				<input type="checkbox" name="place" id="place" value="carousel" /><label for="place">Aparecer em destaque?</label>
				<input type="submit" name="btnAddMegaOferta" value="Adicionar" />
			</div>
			<input type="hidden" name="manufacturerId" id="manufacturerId" />
			<input type="hidden" name="modelId" id="modelId" />
			<input type="hidden" name="versionId" id="versionId" />
			<!-- <input type="button" value="Limpar Campos" id="btnClean" /> -->
			<input type="hidden" name="dateIni" id="dateIni" class="addMegaDate" />
			<input type="hidden" name="dateLimit" id="dateLimit" class="addMegaDate" />
			<input type="file" name="file" id="picture" placeholder="Imagem" />
			<textarea class="image-preview" disabled="disabled"></textarea>
		</div>
	</form>
	<div class="content">
		<?
		$sql_mo = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, megaOferta.price, megaOferta.place, megaOferta.description, megaOferta.picture, megaOferta.dateLimit FROM megaOferta, manufacturer, model, version WHERE megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id GROUP BY megaOferta.id order by megaOferta.place desc";
		$query_mo = mysql_query($sql_mo) or die (mysql_error());
		?>
		<div class="megaOfertaData">
			<ul class="ulMO">
				<?
					while ($resMO = mysql_fetch_array($query_mo)) {
				?>
				<li class="liMO">
					<span class="titleLiMO"><?=$resMO[modelName]?> - <?=$resMO[versionName]?></span>
					<img class="imgLiMO" src="../carImagesMegaOferta/<?=$resMO[picture]?>" />
					<span class="priceLiMO">R$ <?=$resMO[price]?></span>
					<!--span class="dateLimitLiMO">Válido até: <?=$resMO[dateLimit]?></span-->
					<?php
						if ($resMO[place] == 'carousel') {
							$placeName = " Em destaque";
						} else {
							$placeName = "Secundária";
						}
					?>
					<span class="placeLiMO">Exibindo em: <?=$placeName?></span>
					<div class="removeItem" onclick="removeItemMega(this,'<?=$resMO[megaOfertaId]?>')">remover</div>
				</li>
				<? } ?>
			</ul>
		</div>
	</div>
	<footer>
		Copyright 2013 carsale.com.br - Todos os direitos reservados
	</footer>
</div>
</body>
</html>