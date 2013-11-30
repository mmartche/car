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
		<h1 class="logo">Carsale</h1>
		<h2><span>Sistema administrativo - Ficha Técnica de Veículos</span><a href='formDetails.php' class='btnButton btnNewForm'>Novo Cadastro</a></h2>
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
					<div class="rhYear">Ano de Fabricaçao</div>
					<div class="rhYear">Ano do Modelo</div>
					<div class="rhPicture">Foto</div>
					<div class="rhSegment">Segmento</div>
					<div class="rhGear">Câmbio</div>
					<div class="rhOil">Combustível</div>
					<div class="rhAvaliable">Disponível</div>
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
					if ($_GET[askInput] != "") {
						$sqlTerm = "SELECT manufacturer.id as id, manufacturer.name as manufacturerName FROM manufacturer WHERE name like ('%".$_GET[askInput]."%')";
						$query_search = mysql_query($sqlTerm) or die ($sqlTerm. mysql_error()." error #135");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
									<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=manufacturer" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT manufacturer.name as manufacturerName, model.id as id, model.name as modelName FROM manufacturer, model WHERE model.idManufacturer = manufacturer.id and model.name like ('%".$_GET[askInput]."%')";
						$query_search = mysql_query($sqlTerm) or die (" error #150");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
									<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=model" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT manufacturer.name as manufacturerName, model.name as modelName, version.id as id, version.name as versionName FROM manufacturer, model, version WHERE version.idModel = model.id AND model.idManufacturer = manufacturer.id and version.name like ('%".$_GET[askInput]."%')";
						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[idFeature]?>">
								<div class="rsItems">
									<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
									<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=version" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
									<div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div>
									<div class="rsSegment"></div>
									<div class="rsGear"></div>
									<div class="rsOil"></div>
									<div class="rsAvaliable">Sim</div>
								</a>
							</li>
						<? } 
						$sqlTerm = "SELECT feature.id as id, feature.yearProduced, feature.yearModel, feature.engine, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id and (version.name like ('%".$_GET[askInput]."%') or model.name like ('%".$_GET[askInput]."%'))";
						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[idFeature]?>">
								<div class="rsItems">
									<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
									<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=feature" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
									<div class="rsYear"><?=$res[yearModel]?></div>
									<div class="rsYear"><?=$res[yearProduced]?></div>
									<div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div>
									<div class="rsSegment"></div>
									<div class="rsGear"></div>
									<div class="rsOil"></div>
									<div class="rsAvaliable">Sim</div>
								</a>
							</li>
						<? } 
					} else {
						$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName FROM manufacturer";
						$query_search = mysql_query($sql_search) or die (" error #180");
						while ($res = mysql_fetch_array($query_search)) {
						?>
						<li class="resultItem" idDB="<?=$res[idFeature]?>">
							<div class="rsItems">
								<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
								<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
							</div>
							<a href="formDetails.php?vehicle=<?=$res[manufacturerId]?>&category=manufacturer" class="resultContent">
								<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
							</a>
						</li>
						<? } 
					} ?>
				</ul></li>
			</ul>
		</div>
	</div>
	<footer>
		Copyright 2013
	</footer>
</div>

</body>
</html>