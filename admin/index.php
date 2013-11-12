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
		<div class="menu">
			<ul>
				<li><a href="#">Montadoras</a></li>
				<li><a href="#">Modelos</a></li>
			</ul>
		</div>
		<?
		switch ($_GET[search]) {
			case 'manufacturer':
				echo "<h1>Sistema administrativo - Cadastro de Montadoras</h1>";
				break;
			case 'model':
				echo "<h1>Sistema administrativo - Cadastro de Linhas</h1>";
				break;
			default:
				echo "<h1>Sistema administrativo - Ficha Técnica de veículos / Versao</h1>";
				break;
		}
		?>
	</header>
	<div class="formSearch">
		<form action="" method="post" onsubmit="return false" >
			<div class="ui-widget">
				<input id="askInput" class="askInput" placeholder="Search by version, vehicle, manufacturer" />
			</div>
			<div class="ui-widget result-box">
				Result:
				<!--div id="log" class="ui-widget-content log-box"></div-->
			</div>
			<div id="resultSearch" class="resultSearch"></div>
		</form>
	</div>
	<div class="content">
		<ol class="breadcrumb">
			<li><a href=".">Home</a></li>
			<?
			switch ($_GET[search]) {
				case 'manufacturer':
					?><li class="active">Montadoras</li><?
					break;
				case 'model':
					?><li><a href="?search=manufacturer">Montadoras</a></li><li class="active">Modelos</li><?
					break;
				default:
					?><li><a href="?search=manufacturer">Montadoras</a><li><a href="?search=model">Modelos</a></li><li class="active">Versao</li><?
					break;
			}
			?>
		</ol>
		<div class="resultSearch">
			<ul class="resultList">
				<li class="resultHeader">
				<?
				switch ($_GET[search]) {
					case 'manufacturer':
						echo '<div class="rhItems"></div>
						 	<div class="rhManufacturer">Montadora</div>';
						break;
					case 'model':
						echo '<div class="rhItems"></div>
							<div class="rhManufacturer">Montadora</div>
							<div class="rhModel">Modelo</div>';
						break;
					default:
						echo '<div class="rhItems"></div>
							<div class="rhManufacturer">Montadora</div>
							<div class="rhModel">Modelo</div>
							<div class="rhVersion">Versão</div>
							<div class="rhYear">Ano de Fabricaçao</div>
							<div class="rhYear">Ano do Modelo</div>
							<div class="rhPicture">Foto</div>
							<div class="rhSegment">Segmento</div>
							<div class="rhGear">Câmbio</div>
							<div class="rhOil">Combustível</div>
							<div class="rhAvaliable">Disponível</div>';
						break;
				}
				?>
				</li>
				<li class="resultFilter">
				<?
				switch ($_GET[search]) {
					case 'manufacturer':
						echo '<div class="rfItems"></div>
							<div class="rfManufacturer"><input type="text" id="txtRSManufacturer" onkeyup="filterFields(\'rsManufacturer\',this)" /></div>';
						break;
					case 'model':
						echo '<div class="rfItems"></div>
							<div class="rfManufacturer"><input type="text" id="txtRSManufacturer" onkeyup="filterFields(\'rsManufacturer\',this)" /></div>
							<div class="rfModel"><input type="text" id="txtRSModel" onkeyup="filterFields(\'rsModel\',this)" /></div>';
						break;
					default:
						echo '<div class="rfItems"></div>
							<div class="rfManufacturer"><input type="text" id="txtRSManufacturer" onkeyup="filterFields(\'rsManufacturer\',this)" /></div>
							<div class="rfModel"><input type="text" id="txtRSModel" onkeyup="filterFields(\'rsModel\',this)" /></div>
							<div class="rfVersion"><input type="text" id="txtRSVersion" onkeyup="filterFields(\'rsVersion\',this)"  /></div>
							<div class="rfYear"><input type="text" id="txtRSYear" onkeyup="filterFields(\'rsYear\',this)" /></div>
							<div class="rfOptions"><input type="text" id="txtRSOptions" onkeyup="filterFields(\'rsOptions\',this)" /></div>
							<div class="rfPicture"><input type="text" id="txtRSPicture" /></div>
							<div class="rfSegment"><input type="text" id="txtRSSegment" onkeyup="filterFields(\'rsSegment\',this)" /></div>
							<div class="rfGear"><input type="text" id="txtRSGear" onkeyup="filterFields(\'rsGear\',this)" /></div>
							<div class="rfOil"><input type="text" id="txtRSOil" onkeyup="filterFields(\'rsOil\',this)" /></div>
							<div class="rfAvaliable"><input type="text" id="txtRSAvaliable" /></div>';
						break;
				}
				?>
				</li>
				<?
				switch ($_GET[search]) {
					case 'manufacturer':
						$sql_search = "select id as manufacturerId, name as manufacturerName from manufacturer";
						break;
					case 'model':
						$sql_search = "select model.id as modelId, model.name as modelName, manufacturer.name as manufacturerName from model, manufacturer where model.idManufacturer = manufacturer.id";
						break;
					default:
						$sql_search = "select feature.id as featureId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, feature.yearProduced, feature.yearModel from manufacturer, model, version, feature where feature.idManufacturer = manufacturer.id and feature.idModel = model.id and feature.idVersion = version.id order by model.name";
						
						break;
				}
				$query_search = mysql_query($sql_search) or die (" error #130");
				while ($res = mysql_fetch_array($query_search)) {
				?>
				<?
				switch ($_GET[search]) {
					case 'manufacturer':
					?>
						<a href="formDetails.php?vehicle=<?=$res[manufacturerId]?>&search=<?=$_GET[search]?>">
						<li class="resultContent" idDB="<?=$res[manufacturerId]?>">
							<div class="rsItems">
								<div class="btnEdit"></div>
								<div class="btnDelete"></div>
								<div class="btnClone"></div>
								<div class="btnActive"></div>
							</div>
							<div class="rsManufacturer"><?=$res[manufacturerName]?></div>
							<div class="rsAvaliable">Sim</div>
						</li>
						</a>
						<?
						break;
					case 'model':
					?>
						<a href="formDetails.php?vehicle=<?=$res[modelId]?>&search=<?=$_GET[search]?>">
						<li class="resultContent" idDB="<?=$res[modelId]?>">
							<div class="rsItems">
								<div class="btnEdit"></div>
								<div class="btnDelete"></div>
								<div class="btnClone"></div>
								<div class="btnActive"></div>
							</div>
							<div class="rsManufacturer"><?=$res[manufacturerName]?></div>
							<div class="rsModel"><?=$res[modelName]?></div>
							<div class="rsAvaliable">Sim</div>
						</li>
						</a>
						<?
						break;
					default:
					?>
						<a href="formDetails.php?vehicle=<?=$res[featureId]?>&search=<?=$_GET[search]?>">
						<li class="resultContent" idDB="<?=$res[featureId]?>">
							<div class="rsItems">
								<div class="btnEdit"></div>
								<div class="btnDelete"></div>
								<div class="btnClone"></div>
								<div class="btnActive"></div>
							</div>
							<div class="rsManufacturer"><?=$res[manufacturerName]?></div>
							<div class="rsModel"><?=$res[modelName]?></div>
							<div class="rsVersion"><?=$res[versionName]?></div>
							<div class="rsYear"><?=$res[yearProduced]?></div>
							<div class="rsYear"><?=$res[yearModel]?></div>
							<div class="rsPicture"></div>
							<div class="rsSegment"></div>
							<div class="rsGear"></div>
							<div class="rsOil"></div>
							<div class="rsAvaliable">Sim</div>
						</li>
						</a>
						<?
						break;
				}
				?>
				<? } ?>
				<li class="resultContent">
					<div class="rsItems">
						<div class="btnEdit"></div>
						<div class="btnDelete"></div>
						<div class="btnClone"></div>
						<div class="btnActive"></div>
					</div>
					<div class="rsManufacturer">Fiat</div>
					<div class="rsModel">Uno</div>
					<div class="rsVersion">Mille</div>
					<div class="rsYear">2010</div>
					<div class="rsOptions">Opcionais</div>
					<div class="rsPicture">Foto</div>
					<div class="rsSegment">Carro</div>
					<div class="rsGear">Manual</div>
					<div class="rsOil">Gasolina</div>
					<div class="rsAvaliable">Sim</div>
				</li>
			</ul>
		</div>




























	</div>
	<footer>
		Copyright 2013
	</footer>
</div>

</body>
</html>