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
		<div class="menu">
			<ul>
				<li><a href="#">Montadoras</a></li>
				<li><a href="#">Modelos</a></li>
			</ul>
		</div>
		<?
		switch ($_GET[search]) {
			case 'manufacturer':
				echo "<h2>Sistema administrativo - Cadastro de Montadoras</h2>";
				break;
			case 'model':
				echo "<h2>Sistema administrativo - Cadastro de Linhas</h2>";
				break;
			default:
				echo "<h2><span>Sistema administrativo - Ficha Técnica de veículos / Versao</span><a href='formDetails.php' class='btnButton btnNewForm'>Novo Cadastro</a></h2>";
				break;
		}
		?>
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
			<div id="resultSearch" class="resultSearch"></div>
			<input type="submit" value="Buscar" class="btnButton btnSearch" />
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
				switch ($_GET[search]) {
					case 'manufacturer':
						$sql_search = "select id as manufacturerId, name as manufacturerName from manufacturer";
						$query_search = mysql_query($sql_search) or die (" error #130");
						while ($res = mysql_fetch_array($query_search)) {
					?>
						<li idDB="<?=$res[manufacturerId]?>">
							<div class="rsItems">
								<div class="btnEdit"><a href="#">edita</a></div>
								<div class="btnDelete"><a href="#">apaga</a></div>
								<div class="btnClone"><a href="#">clona</a></div>
								<div class="btnActive"><a href="#">ativa</a></div>
							</div>
						<a href="formDetails.php?vehicle=<?=$res[manufacturerId]?>&search=<?=$_GET[search]?>" class="resultContent">
							<div class="rsManufacturer"><?=$res[manufacturerName]?></div>
							<div class="rsAvaliable">Sim</div>
						</li>
						</a>
						<?
						}
						break;
					case 'model':
						$sql_search = "select model.id as modelId, model.name as modelName, manufacturer.name as manufacturerName from model, manufacturer where model.idManufacturer = manufacturer.id";
						$query_search = mysql_query($sql_search) or die (" error #160");
						while ($res = mysql_fetch_array($query_search)) {
					?>
						<li idDB="<?=$res[modelId]?>">
							<div class="rsItems">
								<div class="btnEdit">edita</div>
								<div class="btnDelete">apaga</div>
								<div class="btnClone">clona</div>
								<div class="btnActive">ativa</div>
							</div>
						<a href="formDetails.php?vehicle=<?=$res[modelId]?>&search=<?=$_GET[search]?>" class="resultContent">
							<div class="rsManufacturer"><?=$res[manufacturerName]?></div>
							<div class="rsModel"><?=$res[modelName]?></div>
							<div class="rsAvaliable">Sim</div>
						</li>
						</a>
						<?
						}
						break;
					default:
						$sql_search = "SELECT feature.id as featureId, feature.yearModel, feature.yearProduced, feature.engine as featureEngine, feature.picture, version.name as versionName, model.name as modelName, manufacturer.name as manufacturerName FROM feature,version,model,manufacturer where feature.idversion = version.id and version.idModel = model.id and model.idManufacturer = manufacturer.id";
						$query_search = mysql_query($sql_search) or die (" error #180");
						while ($res = mysql_fetch_array($query_search)) {
					?>
						<li class="resultItem" idDB="<?=$res[featureId]?>">
							<div class="rsItems">
								<div class="btnClone btnButton" title="Copiar todos os dados para um novo cadastro" alt="Copiar todos os dados para um novo cadastro">Clonar</div>
								<div class="btnActive btnButton" title="Ativo" alt="Ativo">v</div>
							</div>
						<a href="formDetails.php?vehicle=<?=$res[featureId]?>&search=<?=$_GET[search]?>" class="resultContent">
							<div class="rsManufacturer" title="<?=$res[manufacturerName]?>"><?=$res[manufacturerName]?></div>
							<div class="rsModel" title="<?=$res[modelName]?>"><?=$res[modelName]?></div>
							<div class="rsVersion" title="<?=$res[versionName]?>"><?=$res[versionName]?></div>
							<div class="rsYear" title="<?=$res[yearProduced]?>"><?=$res[yearProduced]?></div>
							<div class="rsYear" title="<?=$res[yearModel]?>"><?=$res[yearModel]?></div>
							<div class="rsPicture"><img src="<?=$res[picture]?>" /></div>
							<div class="rsSegment"></div>
							<div class="rsGear"></div>
							<div class="rsOil"></div>
							<div class="rsAvaliable">Sim</div>
						</a>
						</li>
						<?
						}
						break;
				}
				?>
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