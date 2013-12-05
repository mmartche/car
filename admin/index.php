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
	<link rel="stylesheet" type="text/css" href="styles/index.css" />

</head>
<body name="searchList">
<?
include ("./scripts/conectDB.php");
?>

<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<h2><span>Sistema administrativo - Ficha Técnica de Veículos</span><a href='formDetails.php?action=new' class='btnButton btnNewForm'>Novo Cadastro</a></h2>
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
		<!--ol class="breadcrumb">
			<li><a href=".">Home</a></li>
			<li><a href="?search=manufacturer">Montadoras</a></li>
			<li><a href="?search=model">Modelos</a></li>
			<li class="active">Versao</li>
		</ol-->
		<div class="resultSearch">
			<ul class="resultList">
				<li class="resultHeader">
					<div class="rhItems"></div>
					<div class="rhManufacturer">Montadora</div>
					<div class="rhModel">Modelo</div>
					<div class="rhVersion">Versão</div>
					<div class="rhYearModel">Ano do Modelo</div>
					<div class="rhYearProduced">Ano de Fabricaçao</div>
					<div class="rhEngine">Motor</div>
					<div class="rhGear">Câmbio</div>
					<div class="rhFuel">Combustível</div>
					<div class="rhSteering">Direção</div>
					<div class="rhSegment">Segmento 1</div>
					<div class="rhSegment">Segmento 2</div>
					<div class="rhSegment">Segmento 3</div>
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
					<div class="rfSegment"><input type="text" id="txtRSSegment1" onkeyup="filterFields('rsSegment1',this)" /></div>
					<div class="rfSegment"><input type="text" id="txtRSSegment2" onkeyup="filterFields('rsSegment2',this)" /></div>
					<div class="rfSegment"><input type="text" id="txtRSSegment3" onkeyup="filterFields('rsSegment3',this)" /></div>
					<div class="rfOptions"><input type="text" id="txtRSOptions" onkeyup="filterFields('rsOptions',this)" /></div>
				</li>
				<li class="resultData"><ul>
				<?
					if ($_GET[askInput] != "") {
						$sqlTerm = "SELECT manufacturer.id as id, manufacturer.name as manufacturerName FROM manufacturer WHERE name like ('%".$_GET[askInput]."%') ORDER by name limit 10";
						$query_search = mysql_query($sqlTerm) or die ($sqlTerm. mysql_error()." error #135");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=model&action=new&vehicle=<?=$res[id]?>" title="Incluir Modelo para esta Montadora" alt="Incluir Modelo para esta Montadora">Novo modelo</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'manufacturer',this)"></div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=manufacturer&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT manufacturer.name as manufacturerName, model.id as id, model.name as modelName FROM manufacturer, model WHERE model.idManufacturer = manufacturer.id and model.name like ('%".$_GET[askInput]."%') ORDER by manufacturer.name, model.name limit 10";
						$query_search = mysql_query($sqlTerm) or die (" error #150");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=version&action=new&vehicle=<?=$res[id]?>" title="Incluir Versão para este Modelo" alt="Incluir Versão para este Modelo">Nova versão</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'model',this)"></div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=model&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT manufacturer.name as manufacturerName, model.name as modelName, version.id as id, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id and version.name like ('%".$_GET[askInput]."%') ORDER by manufacturer.name, model.name, version.name limit 10";
						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=feature&action=new&vehicle=<?=$res[id]?>" title="Incluir Ficha Técnica para esta Versão" alt="Incluir Ficha Técnica para esta Versão">Nova Ficha</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'version',this)"></div>
									<!--div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div-->
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=version&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
								</a>
							</li>
						<? } 
						$sqlTerm = "SELECT feature.id as id, feature.yearProduced, feature.yearModel, feature.engine, feature.gear, feature.fuel, feature.steering, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id and (version.name like ('%".$_GET[askInput]."%') or model.name like ('%".$_GET[askInput]."%')) limit 10";
						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="formDetails.php?category=feature&action=clone&vehicle=<?=$res[id]?>" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'feature',this)"></div>
									<!--div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div-->
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=feature&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
									<div class="rsYearModel"><?=$res[yearModel]?></div>
									<div class="rsYearProduced"><?=$res[yearProduced]?></div>
									<div class="rsEngine"><?=$res[engine]?></div>
									<div class="rsGear"><?=$res[gear]?></div>
									<div class="rsFuel"><?=$res[fuel]?></div>
									<div class="rsSteering"><?=$res[steering]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
								</a>
							</li>
						<? } 
					} else {
						$sql_search = "SELECT feature.id as id, feature.yearProduced, feature.yearModel, feature.engine, feature.gear, feature.fuel, feature.steering, feature.picture, feature.active, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id ORDER BY manufacturerName ASC, modelName ASC, versionName ASC, yearModel asc, yearProduced asc limit 30";
						//$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName FROM manufacturer ORDER by name";
						$query_search = mysql_query($sql_search) or die (mysql_error()." error #180");
						while ($res = mysql_fetch_array($query_search)) {
						?>
						<li class="resultItem <? if ($res[active] == "n") { echo "desactive"; } ?>" idDB="<?=$res[id]?>">
							<div class="rsItems">
									<a class="btnClone btnButton" href="formDetails.php?category=feature&action=clone&vehicle=<?=$res[id]?>" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'feature',this)"></div>
									<!--div class="rsPicture"><img src="<?=$res[picture]?>" /></div-->
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=feature&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
									<div class="rsYearModel"><?=$res[yearModel]?></div>
									<div class="rsYearProduced"><?=$res[yearProduced]?></div>
									<div class="rsEngine"><?=$res[engine]?></div>
									<div class="rsGear"><?=$res[gear]?></div>
									<div class="rsFuel"><?=$res[fuel]?></div>
									<div class="rsSteering"><?=$res[steering]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
									<div class="rsSegment"><?=$res[segment]?></div>
								</a>
						</li>
						<? } 
					} ?>
				</ul></li>
			</ul>
		</div>
	</div>
	<footer>
		Copyright 2013 carsale.com.br - Todos os direitos reservados
	</footer>
</div>

</body>
</html>