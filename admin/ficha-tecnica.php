<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" />
	
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
include ("./scripts/functions.php");
?>

<div class="body">
	<header>
		<h1 class="logo"><span class="logoText logoRed">Car</span><span class="logoText logoBlack">sale</span></h1>
		<h2>
			<span>Sistema administrativo - Ficha Técnica de Veículos</span><a href='#' class='btnButton btnNewForm'>Novo Cadastro</a>
			<div class="newChoice">
				<a href="formDetails.php?action=new&category=ft_manufacturer" class="btnButton">Montadora</a>
				<a href="formDetails.php?action=new&category=ft_model" class="btnButton">Modelo</a>
				<a href="formDetails.php?action=new&category=ft_version" class="btnButton">Versão</a>
				<a href="formDetails.php?action=new&category=ft_feature" class="btnButton">Ficha Técnica</a>
			</div>
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
				<?
				$queryUrl = "&filterActive=".$_GET[filterActive]."&filterManuf=".$_GET[filterManuf]."&filterModel=".$_GET[filterModel]."&filterVersion=".$_GET[filterVersion]."&filterYearModel=".$_GET[filterYearModel]."&filterYearProduced=".$_GET[filterYearProduced]."&filterEngine=".$_GET[filterEngine]."&filterGear=".$_GET[filterGear]."&filterFuel=".$_GET[filterFuel]."&filterPrice=".$_GET[filterPrice];
				?>
					<div class="rhItems"></div>
					<div class="rhManufacturer">Montadora</div>
					<div class="rhModel">Modelo</div>
					<div class="rhVersion">Versão</div>
					<div class="rhYearModel">AnoModelo</a></div>
					<div class="rhYearProduced">AnoFabricação</a></div>
					<div class="rhEngine">Motor</div>
					<div class="rhGear">Câmbio</div>
					<div class="rhFuel">Combustível</div>
					<div class="rhSteering">Direção</div>
					<div class="rhPrice">Preço</div>
				</li>
				<li class="resultFilter">
					<form action="?filter=true" method="post">
					<div class="rfItems"><input type="checkbox" name="filterActive" id="chkRSActive" 
					<? if ($_POST[filterActive] == "n") echo 'checked="checked"'; ?> 
					value="n" onchange="submit()" style="width:10px;display:none;" />
					<label for="chkRSActive"><? if ($_POST[filterActive] == "n") echo 'Ver Ativados'; else echo 'Ver Desativos'; ?></label>
					</div>
					<div class="rfManufacturer"><input type="text" name="filterManuf" id="txtRSManufacturer" onkeyup="filterFields('rsManufacturer',this)" value="<?=$_POST[filterManuf]?>" /></div>
					<div class="rfModel"><input type="text" name="filterModel" id="txtRSModel" onkeyup="filterFields('rsModel',this)" value="<?=$_POST[filterModel]?>" /></div>
					<div class="rfVersion"><input type="text" name="filterVersion" id="txtRSVersion" onkeyup="filterFields('rsVersion',this)" value="<?=$_POST[filterVersion]?>" /></div>
					<div class="rfYearModel"><input type="text" name="filterYearModel" id="txtRSYearModel" onkeyup="filterFields('rsYearModel',this)" value="<?=$_POST[filterYearModel]?>" /></div>
					<div class="rfYearProduced"><input type="text" name="filterYearProduced" id="txtRSYearProduced" onkeyup="filterFields('rsYearProduced',this)" value="<?=$_POST[filterYearProduced]?>" /></div>
					<div class="rfEngine"><input type="text" name="filterEngine" id="txtRSEngine" onkeyup="filterFields('rsEngine',this)" value="<?=$_POST[filterEngine]?>" /></div>
					<div class="rfGear"><input type="text" name="filterGear" id="txtRSGear" onkeyup="filterFields('rsGear',this)" value="<?=$_POST[filterGear]?>" /></div>
					<div class="rfFuel"><input type="text" name="filterFuel" id="txtRSFuel" onkeyup="filterFields('rsFuel',this)" value="<?=$_POST[filterFuel]?>" /></div>
					<div class="rfSteering"><input type="text" name="filterSteering" id="txtRSSteering" onkeyup="filterFields('rsSteering',this)" value="<?=$_POST[filterSteering]?>" /></div>
					<div class="rfPrice"><input type="text" name="filterPrice" id="txtRSPrice" onkeyup="filterFields('rsPrice',this)" value="<?=$_POST[filterPrice]?>" /></div>
					<div class="rfSubmit"><input type="submit" value="Pesquisar" /></div>
					</form>
				</li>

				<li class="resultData"><ul>
				<?
					if ($_GET[askInput] != "") {
						$sqlTerm = "SELECT ft_manufacturer.id as id, ft_manufacturer.name as manufacturerName FROM ft_manufacturer WHERE name like ('%".$_GET[askInput]."%') ORDER by name";
						$query_search = mysql_query($sqlTerm) or die ($sqlTerm. mysql_error()." error #135");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=ft_model&action=new&vehicle=<?=$res[id]?>" title="Incluir Modelo para esta Montadora" alt="Incluir Modelo para esta Montadora">Novo modelo</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'manufacturer',this)"></div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=ft_manufacturer&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT ft_manufacturer.name as manufacturerName, ft_model.id as id, ft_model.name as modelName FROM ft_manufacturer, ft_model WHERE ft_model.idManufacturer = ft_manufacturer.id and ft_model.name like ('%".$_GET[askInput]."%') ORDER by ft_manufacturer.name, ft_model.name";
						$query_search = mysql_query($sqlTerm) or die (" error #150");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=ft_version&action=new&vehicle=<?=$res[id]?>" title="Incluir Versão para este Modelo" alt="Incluir Versão para este Modelo">Nova versão</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'model',this)"></div>
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=ft_model&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
								</a>
							</li>
						<? }
						$sqlTerm = "SELECT ft_manufacturer.name as manufacturerName, ft_model.name as modelName, ft_version.id as id, ft_version.name as versionName  FROM ft_manufacturer, ft_model, ft_version WHERE ft_version.idModel = ft_model.id AND ft_model.idManufacturer = ft_manufacturer.id and ft_version.name like ('%".$_GET[askInput]."%') ORDER by ft_manufacturer.name, ft_model.name, ft_version.name";
						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="?category=ft_feature&action=new&vehicle=<?=$res[id]?>" title="Incluir Ficha Técnica para esta Versão" alt="Incluir Ficha Técnica para esta Versão">Nova Ficha</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'version',this)"></div>
									<!--div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div-->
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=ft_version&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
								</a>
							</li>
						<? } 
						$sqlTerm = "SELECT ft_feature.id as id, ft_feature.yearProduced, ft_feature.yearModel, ft_feature.engine, ft_feature.gear, ft_feature.fuel, ft_feature.steering, ft_manufacturer.name as manufacturerName, ft_model.name as modelName, ft_version.name as versionName, ft_feature.price FROM ft_manufacturer, ft_model, ft_version, ft_feature WHERE ft_feature.idVersion = ft_version.id AND ft_version.idModel = ft_model.id AND ft_model.idManufacturer = ft_manufacturer.id and (ft_version.name like ('%".$_GET[askInput]."%') or ft_model.name like ('%".$_GET[askInput]."%'))";

						$query_search = mysql_query($sqlTerm) or die (" error #165");
						while ($res = mysql_fetch_array($query_search)) {
						?>
							<li class="resultItem" idDB="<?=$res[id]?>">
								<div class="rsItems">
									<a class="btnClone btnButton" href="formDetails.php?category=ft_feature&action=clone&vehicle=<?=$res[id]?>" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>
									<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'feature',this)"></div>
									<!--div class="rsPicture"><img src="<?=$res[picture]?>+'" /></div-->
								</div>
								<a href="formDetails.php?vehicle=<?=$res[id]?>&category=ft_feature&action=update" class="resultContent">
									<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
									<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
									<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
									<div class="rsYearModel"><?=$res[yearModel]?></div>
									<div class="rsYearProduced"><?=$res[yearProduced]?></div>
									<div class="rsEngine"><?=$res[engine]?></div>
									<div class="rsGear"><?=$res[gear]?></div>
									<div class="rsFuel">
									<?
									switch (strtolower($res[fuel])) {
										case 'G':
											echo "Gasolina";
											break;
										case 'f':
											echo "Flex";
											break;
										case 'e':
											echo "Ethanol";
											break;
										case 'd':
											echo "Diesel";
											break;
										default:
											echo $res[fuel];
											break;
									}
									?>
									</div>
									<div class="rsSteering"><?=$res[steering]?></div>
									<div class="rsPrice">R$ <?=formatToPrice($res[price])?></div>
								</a>
							</li>
						<? } 
					} else {
						if ($_POST[filterManuf] != "") { $filterSql .= " AND ft_manufacturer.name like ('%".$_POST[filterManuf]."%') "; }
						if ($_POST[filterModel] != "") { $filterSql .= " AND ft_model.name like ('%".$_POST[filterModel]."%') "; }
						if ($_POST[filterVersion] != "") { $filterSql .= " AND ft_version.name like ('%".$_POST[filterVersion]."%') "; }
						if ($_POST[filterYearModel] != "") { $filterSql .= " AND ft_feature.yearModel  like ('%".$_POST[filterYearModel]."%') "; }
						if ($_POST[filterYearProduced] != "") { $filterSql .= " AND ft_feature.yearProduced like ('%".$_POST[filterYearProduced]."%') "; }
						if ($_POST[filterEngine] != "") { $filterSql .= " AND ft_feature.engine like ('%".$_POST[filterEngine]."%') "; }
						if ($_POST[filterGear] != "") { $filterSql .= " AND ft_feature.gear like ('%".$_POST[filterGear]."%') "; }
						if ($_POST[filterFuel] != "") { $filterSql .= " AND ft_feature.fuel like ('%".$_POST[filterFuel]."%') "; }
						if ($_POST[filterPrice] != "") { $filterSql .= " AND ft_feature.price like ('%".$_POST[filterPrice]."%') "; }
						if ($_POST[filterActive] == "n") { $filterSql .= " AND ft_feature.active = 'n' "; } else { $filterSql .= " AND ft_feature.active != 'n' "; }

						$sql_search = "SELECT ft_feature.id as id, ft_feature.yearProduced, ft_feature.yearModel, ft_feature.engine, ft_feature.gear, ft_feature.fuel, ft_feature.steering, ft_feature.picture, ft_feature.active, ft_manufacturer.name as manufacturerName, ft_model.name as modelName, ft_version.name as versionName, ft_feature.price FROM ft_manufacturer, ft_model, ft_version, ft_feature WHERE ft_feature.idVersion = ft_version.id AND ft_version.idModel = ft_model.id AND ft_model.idManufacturer = ft_manufacturer.id ".$filterSql." ORDER BY manufacturerName ASC, modelName ASC, versionName ASC, yearModel desc, yearProduced desc";
						//$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName FROM manufacturer ORDER by name";
						$query_search = mysql_query($sql_search) or die (mysql_error()." error #180");
						while ($res = mysql_fetch_array($query_search)) {
						?>
						<li class="resultItem <? if ($res[active] == "n") { echo "desactive"; } ?>" idDB="<?=$res[id]?>">
							<div class="rsItems">
								<a class="btnClone btnButton" href="formDetails.php?category=ft_feature&action=clone&vehicle=<?=$res[id]?>" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</a>
								<div class="btnActive" title="Ativo" alt="Ativo" onclick="activeItem(<?=$res[id]?>,'feature',this)"></div>
								<!--div class="rsPicture"><img src="<?=$res[picture]?>" /></div-->
							</div>
							<a href="formDetails.php?vehicle=<?=$res[id]?>&category=ft_feature&action=update" class="resultContent">
								<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
								<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
								<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
								<div class="rsYearModel"><?=$res[yearModel]?></div>
								<div class="rsYearProduced"><?=$res[yearProduced]?></div>
								<div class="rsEngine"><?=$res[engine]?></div>
								<div class="rsGear"><?=$res[gear]?></div>
								<div class="rsFuel">
								<?
									switch (strtolower($res[fuel])) {
										case 'g':
											echo "Gasolina";
											break;
										case 'f':
											echo "Flex";
											break;
										case 'e':
											echo "Ethanol";
											break;
										case 'd':
											echo "Diesel";
											break;
									}
									?>
									</div>
								<div class="rsSteering"><?=$res[steering]?></div>
								<div class="rsPrice">R$ <?=formatToPrice($res[price])?></div>
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