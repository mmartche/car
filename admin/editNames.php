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
	<style type="text/css">
.custom-combobox-input {
	width: 360px;
}
	</style>
</head>
<body name="searchList">
<?
include ("./scripts/conectDB.php");
include ("./scripts/functions.php");

?>

<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<h2>
			<span>Sistema administrativo - Editar Nomenclaturas</span>
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
	<form action="./scripts/addMegaOferta.php" method="post" enctype="multipart/form-data" style="overflow:hidden">
		<div class="formMega"  data-spy="affix" data-offset-top="145">
		<input type="hidden" name="megaOfertaId" class="megaOfertaId" id="megaOfertaId" />
		<div class="megaDiv">
			<div class="MegaSelects">
				<select name="manufacturer" id="manufacturerName">
					<option>Escolha uma Marca</option>
					<?
				    $sqlManuf = "SELECT manufacturer.id, manufacturer.name from manufacturer, model, version, feature where feature.idVersion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id group by manufacturer.name order by name";
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
				<select name="optionsName"></select>
				<select name="colorName"></select>
			</div>
			<input type="hidden" name="manufacturerId" id="manufacturerId" />
			<input type="hidden" name="modelId" id="modelId" />
			<input type="hidden" name="versionId" id="versionId" />
			<!-- <input type="button" value="Limpar Campos" id="btnClean" /> -->
			<input type="hidden" name="dateIni" id="dateIni" class="addMegaDate" />
			<input type="hidden" name="dateLimit" id="dateLimit" class="addMegaDate" />
		</div>
		</div>
		<div class="formEditFeature">
			<input type="text"  >
			<textarea></textarea>
			<button>Salvar</button>
		</div>
	</form>
	<footer>
		Copyright 2013 carsale.com.br - Todos os direitos reservados
	</footer>
</div>
</body>
</html>