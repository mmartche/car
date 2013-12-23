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
		<h2>
			<span>Sistema administrativo - Mega Oferta</span>
		</h2>
	</header>
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
		<?
		$sql_mo = "SELECT megaOferta.idFeature, megaOferta.price, megaOferta.place, megaOferta.dateLimit, version.name as versionName, model.name as modelName, feature.picture FROM megaOferta, manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id AND megaOferta.idFeature = feature.id";
		$query_mo = mysql_query($sql_mo) or die (mysql_error());
		?>
		<div class="megaOfertaData">
			<ul class="ulMO">
				<?
					while ($resMO = mysql_fetch_array($query_mo)) {
				?>
				<li class="liMO">
					<img src="http://carsale.uol.com.br/foto/<?=$resMO[picture]?>_g.jpg?>" />
					<span><?=$resMO[modelName]?> - <?=$resMO[versionName]?></span>
					<span><?=$resMO[price]?></span>
				</li>
				<? } ?>
			</ul>
		</div>
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
					if ($_POST[filterManuf] != "") { $filterSql .= " AND manufacturer.name like ('%".$_POST[filterManuf]."%') "; }
					if ($_POST[filterModel] != "") { $filterSql .= " AND model.name like ('%".$_POST[filterModel]."%') "; }
					if ($_POST[filterVersion] != "") { $filterSql .= " AND version.name like ('%".$_POST[filterVersion]."%') "; }
					if ($_POST[filterYearModel] != "") { $filterSql .= " AND feature.yearModel  like ('%".$_POST[filterYearModel]."%') "; }
					if ($_POST[filterYearProduced] != "") { $filterSql .= " AND feature.yearProduced like ('%".$_POST[filterYearProduced]."%') "; }
					if ($_POST[filterEngine] != "") { $filterSql .= " AND feature.engine like ('%".$_POST[filterEngine]."%') "; }
					if ($_POST[filterGear] != "") { $filterSql .= " AND feature.gear like ('%".$_POST[filterGear]."%') "; }
					if ($_POST[filterFuel] != "") { $filterSql .= " AND feature.fuel like ('%".$_POST[filterFuel]."%') "; }
					if ($_POST[filterPrice] != "") { $filterSql .= " AND feature.price like ('%".$_POST[filterPrice]."%') "; }
					if ($_POST[filterActive] == "n") { $filterSql .= " AND feature.active = 'n' "; } else { $filterSql .= " AND feature.active != 'n' "; }

					$sql_search = "SELECT feature.id as id, feature.yearProduced, feature.yearModel, feature.engine, feature.gear, feature.fuel, feature.steering, feature.picture, feature.active, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName FROM manufacturer, model, version, feature WHERE feature.idVersion = version.id AND version.idModel = model.id AND model.idManufacturer = manufacturer.id ".$filterSql." ORDER BY manufacturerName ASC, modelName ASC, versionName ASC, yearModel desc, yearProduced desc limit 400";
					//$sql_search = "SELECT manufacturer.id as manufacturerId, manufacturer.name as manufacturerName FROM manufacturer ORDER by name";
					$query_search = mysql_query($sql_search) or die (mysql_error()." error #180");
					while ($res = mysql_fetch_array($query_search)) {
					?>
					<li class="resultItem <? if ($res[active] == "n") { echo "desactive"; } ?>" idDB="<?=$res[id]?>">
						<div class="rsItems">
							<select id="addMegaPlace_<?=$res[id]?>">
								<option value="carrousel">Destaque (Rotativo/TV)</option>
								<option value="normal">Secundárias</option>
							</select><br />
							<input type="text" id="addMegaPrice_<?=$res[id]?>" placeholder="Preço" value="" /><br />
							<input type="text" id="addMegaDateLimit_<?=$res[id]?>" class="addMegaDateLimit" placeholder="Data Limite" value="" /><br />
							<div class="btnClone btnButton"onclick="addMega(<?=$res[id]?>)" title="Adicionar a lista" alt="Adicioanr a lista">Adicionar</div>
							<input type="hidden" id="addMegaName_<?=$res[id]?>" value="<?=$res[modelName]?>-<?=$res[versionName]?>" />
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
							<div class="rsSegment"><?=$res[segmentName]?></div>
						</a>
					</li>
					<? }  ?>
				</ul></li>
			</ul>
		</div>
	</div>
	<footer>
		Copyright 2013 carsale.com.br - Todos os direitos reservados
	</footer>
</div>
<script type="text/javascript">
	function addMega(id) {
		price = $("#addMegaPrice_"+id).val(),
		place = $("#addMegaPlace_"+id).val(),
		dateLimit = $("#addMegaDateLimit_"+id).val(),
		name = $("#addMegaName_"+id).val();
		console.log('api/index.php?type=mega&idFeature='+id+'&price='+price+'&place='+place+'&dateLimit='+dateLimit+'&name='+name);
		$.getJSON('api/index.php?type=mega&idFeature='+id+'&price='+price+'&place='+place+'&dateLimit='+dateLimit+'&name='+name, function(data) {
			if(data[0].response == "true"){
				console.log("item adicionado");
				$(".ulMO").append('<li class="liMO"><img src="http://carsale.uol.com.br/foto/'+data[0].picture+'_g.jpg?>" /><span>'+data[0].name+'</span><span>'+data[0].price+'</span></li>');
			} else {
				alert(data[0].reason);
				console.log(data[0].reason);
			}
		});
	}
$(document).ready(function(){
	$(".addMegaDateLimit").focusin(function(){
		if ($(this).is(".hasDatepicker") == false) {
			$(this).datepicker();
			$(this).datepicker( "option", "dateFormat", "yy-mm-dd" );
		}
	})
});
</script>
</body>
</html>