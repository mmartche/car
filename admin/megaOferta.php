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
	<form action="./scripts/addMegaOferta.php" method="post" enctype="multipart/form-data" style="overflow:hidden">
		<div class="formMega"  data-spy="affix" data-offset-top="145">
		<input type="hidden" name="megaOfertaId" class="megaOfertaId" id="megaOfertaId" />
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
				<a id="versionDetails" class="hide" href="#" target="_blank">Veja a Ficha Tecnica desta Versão</a>
			</div>
			<div class="megaInputs">
				<p><label for="price">R$</label><input class="inputDesc" type="text" name="price" id="price" placeholder="Preço" /></p>
				<p><label for="description">Descriçao:</label><input class="inputDesc" type="text" name="description" id="description" placeholder="Descrição" /></p>
				<p><label for="orderMega">Ordem: </label><input type="text" name="orderMega" class="inputDesc" id="orderMega" /> </p>
			</div>
			<input type="hidden" name="manufacturerId" id="manufacturerId" />
			<input type="hidden" name="modelId" id="modelId" />
			<input type="hidden" name="versionId" id="versionId" />
			<!-- <input type="button" value="Limpar Campos" id="btnClean" /> -->
			<input type="hidden" name="dateIni" id="dateIni" class="addMegaDate" />
			<input type="hidden" name="dateLimit" id="dateLimit" class="addMegaDate" />
			<input type="file" class="filePicture" name="file" id="picture" placeholder="Imagem" />
			<textarea class="image-preview" disabled="disabled"></textarea>
			<div class="megaInputs">
				<input type="checkbox" name="place" id="place" value="carousel" /><label for="place">Aparecer em destaque?</label>
				<input type="submit" name="btnAddMegaOferta" id="btnAddMegaOferta" value="Adicionar" />
			</div>
		</div>
		</div>
	</form>
	<div class="content contentMega">
		<?
		$sql_mo = "SELECT megaOferta.id as megaOfertaId, ft_manufacturer.name as manufacturerName, ft_model.id as modelId, ft_model.name as modelName, ft_version.id as versionId, ft_version.name as versionName, megaOferta.price, megaOferta.place, megaOferta.orderMega, megaOferta.description, megaOferta.picture, megaOferta.dateLimit FROM megaOferta, ft_manufacturer, ft_model, ft_version WHERE megaOferta.manufacturerId = ft_manufacturer.id and megaOferta.ft_versionId = ft_version.id AND megaOferta.modelId = ft_model.id GROUP BY megaOferta.id order by megaOferta.place desc, `orderMega` asc";
		$query_mo = mysql_query($sql_mo) or die (mysql_error());
		?>
		<div class="megaOfertaData">
			<ul class="ulMO">
				<?
				echo '<hr style="width:100%" /><h2 class="subTitleMega">Chamada em Destaque</h2>';
					while ($resMO = mysql_fetch_array($query_mo)) {
						if (($placeHr != "") && ($resMO[place] != $placeHr)) {
							echo '<hr style="width:100%" /><h2 class="subTitleMega">Chamada Secundária</h2>';
							$placeHr = $resMO[place];
						} else {
							$placeHr = $resMO[place];
						}
						if ($resMO[place] == 'carousel') {
							$placeName = " Em destaque";
						} else {
							$placeName = "Secundária";
						}
				?>
				<li class="liMO">
					<div class="orderMega">
						<div class="downOrder" id="downOrder" onclick="orderMega(this,'downOrder','<?=$resMO[megaOfertaId]?>','<?=$resMO[orderMega]?>')">/\</div>
						<div class="numberOrder" id="numberOrder"><?=$resMO[orderMega]?></div>
						<div class="upOrder" id="upOrder" onclick="orderMega(this,'upOrder','<?=$resMO[megaOfertaId]?>','<?=$resMO[orderMega]?>')">\/</div>
					</div>
					<span class="titleLiMO"><?=$resMO[modelName]?> - <?=$resMO[versionName]?></span>
					<img class="imgLiMO" src="../carImagesMegaOferta/<?=$resMO[picture]?>" />
					<span class="priceLiMO">R$ <?=$resMO[price]?></span>
					<!--span class="dateLimitLiMO">Válido até: <?=$resMO[dateLimit]?></span-->
					<span class="descLiMO"><?=$resMO[description]?></span>
					<span class="placeLiMO">Exibindo em: <?=$placeName?></span>
					<span><a href="./formDetails.php?vehicle=<?=$resMO[versionId]?>&category=feature&action=viewVersion" target="_blank">Ficha Técnica</a></span>
					<div class="removeItem" onclick="removeItemMega(this,'<?=$resMO[megaOfertaId]?>')">Remover</div>
					<div class="updateItem" onclick="updateItemMega(this,'<?=$resMO[megaOfertaId]?>')">Editar</div>
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