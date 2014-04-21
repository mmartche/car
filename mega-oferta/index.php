<?
session_start();
$_SESSION["tokenTime"] = time();
include ("../scripts/conectDB.php");
include ("../admin/scripts/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/50192_124345857613786_740480673_q.jpg" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--meta name="google-site-verification" content="htc5j0tj4c1Fsee2bSoUs42QzGEcsSiviny-uUICt6Y" />
	<meta property="fb:admins" content="100000868647048" />
	<meta property="fb:page_id" content="124345857613786" />
	<meta name="msvalidate.01" content="270B7706358DDE8D5FA26B2B7522BC42" /-->
	
	<!--meta http-equiv="Pragma" content="no-cache"/-->
	<meta name="robots" content="index, follow" />
	<meta name="description" content="Carsale,o maior e mais completo site de compra e venda direta de veículos na internet, com garantia de fábrica e entrega pela concessionária,Carros novos, Classificados, Notícias Automotivas, Testes e Opinião do Dono" />
	<meta name="keywords" content="Carsale notícias,Opinião do dono,Opiniao do dono,Classificados,Carros novos,carros okm,Anúncio,Testes / Comparativos,Avaliação de carros,Oferta de carros,Venda de carros" />
	<title>Carsale</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Search The" />
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/scriptHome.js"></script>

	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/home.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/explorador.css" />
	<!--link rel="stylesheet" type="text/css" href="http://carsale.uol.com.br/classificado/css/carsaleMegaOfertas.css" /-->
	<!--link rel="stylesheet" type="text/css" href="http://carsale.uol.com.br/classificado/css/carsale.css?no_cache=20120305"-->
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/megaOferta.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/megaOfertaOld.css" />

</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>


<div id="uolBar">
<script type="text/javascript" src="http://jsuol.com/barra/parceiro-1024.js?refbusca=carsale&full=true"></script>
</div>

<header>
	<?
	include ("../includes/logoBanner.php");
	include ("../includes/menu.php");
	include ("../includes/socialBar.php");
	?>
	
</header>
<div class="content">
	<div class="columnMiddle">
		<div class="contentMiddle">
			<div id="carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
				<ol class="carousel-indicators">
					<? 
					$sql = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, megaOferta.price, megaOferta.yearModel, megaOferta.place, megaOferta.orderMega, megaOferta.description, megaOferta.dateLimit, feature.picture FROM megaOferta, manufacturer, model, version, feature WHERE feature.idVersion = version.id and feature.yearModel = megaOferta.yearModel and megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id and megaOferta.place = 'carousel' GROUP BY megaOferta.id order by megaOferta.place desc, `orderMega` asc";

					//$sql = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.name as modelName, version.name as versionName, megaOferta.price, megaOferta.place, megaOferta.description, megaOferta.picture, megaOferta.dateLimit FROM megaOferta, manufacturer, model, version WHERE megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id and megaOferta.place = 'carousel' GROUP BY megaOferta.id order by megaOferta.place, `megaOferta`.`orderMega` asc";

					// $sql = "SELECT model.name as modelName, version.name as versionName, megaOferta.price, place, dateLimit, feature.picture FROM megaOferta, model, version, feature WHERE megaOferta.idFeature = feature.id and feature.idVersion = version.id and version.idModel = model.id AND place = 'carousel' ORDER by place";

					$query = mysql_query($sql) or die (mysql_error());
					for ($i=0; $i < mysql_num_rows($query); $i++) { 
					?>
					<li data-target="#carousel" data-slide-to="<?=$i?>"
						<? if ($i == 0 ) { echo ' class="active" '; } ?>
					></li>
					<? } ?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?
					$r=0;
					while ($resItem = mysql_fetch_array($query)) {
						if (file_exists("../carImages/".utf8_encode($resItem[picture]))) {
		                    $picture = "../carImages/".utf8_encode($resItem[picture]);
		                	// http://carsale.uol.com.br/images/ofertas/AudiA7Sportback_g.gif
		                } else {
		                    $picture = "http://carsale.uol.com.br/foto/".$resItem[picture]."_g.jpg";
		                }
					?>
						<div class="item <? if ($r == 0) echo ' active'; ?>">
							<a href="./detalhes-mega-oferta.php?veiculo=<?=$resItem[megaOfertaId]?>">
							<div class="carousel-title carousel-caption">
								<h3><?=$resItem[modelName]?></h3>
							</div>
							<img class="carousel-image" src="<?=$picture?>" alt="<?=$resItem[modelName]?>" class="carrosselImg" title="<?=$resItem[modelName]?>" />
							<div class="carousel-caption">
								<h4>R$ <?=formatToPrice($resItem[price])?></h4>
								<!--div class="carousel-opacity"><?=$resItem[dateLimit]?></div-->
								<div class="carousel-version"><?=utf8_encode($resItem[versionName])?></div>
								<div class="carousel-desc"><?=utf8_encode($resItem[description])?></div>
							</div>
							</a>
						</div>
					<? $r++; } ?>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel" data-slide="prev">
					<span class="icon-prev"></span>
					<!-- <span class="glyphicon glyphicon-chevron-left"></span> -->
				</a>
				<a class="right carousel-control" href="#carousel" data-slide="next">
					<span class="icon-next"></span>
					<!-- <span class="glyphicon glyphicon-chevron-right"></span> -->
				</a>
			</div>
			<!-- END CAROUSEL -->
			<?
			// $sql = "SELECT model.name as modelName, version.name as versionName, megaOferta.price, place, dateLimit, feature.picture FROM megaOferta, model, version, feature WHERE megaOferta.idFeature = feature.id and feature.idVersion = version.id and version.idModel = model.id AND place = 'normal' ORDER by place";
			$sql = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.id as modelId, model.name as modelName, version.id as versionId, version.name as versionName, megaOferta.price, megaOferta.yearModel, megaOferta.place, megaOferta.orderMega, megaOferta.description, megaOferta.dateLimit, feature.picture FROM megaOferta, manufacturer, model, version, feature WHERE feature.idVersion = version.id and feature.yearModel = megaOferta.yearModel and megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id and megaOferta.place != 'carousel' GROUP BY megaOferta.id order by megaOferta.place desc, `orderMega` asc";

//			$sql = "SELECT megaOferta.id as megaOfertaId, manufacturer.name as manufacturerName, model.name as modelName, version.id as versionId, version.name as versionName, megaOferta.price, megaOferta.place, megaOferta.description, megaOferta.picture, megaOferta.dateLimit FROM megaOferta, manufacturer, model, version WHERE megaOferta.manufacturerId = manufacturer.id and megaOferta.versionId = version.id AND megaOferta.modelId = model.id and megaOferta.place != 'carousel' GROUP BY megaOferta.id order by megaOferta.place, `megaOferta`.`orderMega` asc";
			$query = mysql_query($sql) or die (mysql_error());
			$arrayModalVersion = array();
			$arrayModalYear = array();
			while ($resN = mysql_fetch_array($query)) {
				$arrayModalVersion[] = $resN[versionId];
				$arrayModalYear[] = $resN[yearModel];
				if (file_exists("../carImages/".utf8_encode($resN[picture]))) {
                    $picture = "../carImages/".utf8_encode($resN[picture]);
                } else {
                    $picture = "http://carsale.uol.com.br/images/ofertas/".$resN[picture]."_g.gif";
                }
			?>
			<div class="megaOfertasCarsaleOferta">
				<div class="megaOfertasCarsaleTituloOferta"><a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>"><?=$resN[modelName]."<br />".utf8_encode($res[versionName])?></a></div>
				<div class="megaOfertasCarsaleImgBgOferta <?=$resN[yearModel]?>">
					<div class="megaOfertasCarsaleImgOferta">
						<a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>">
							<img alt="" title="" border="0" class="imgMegaOfertaNormal" src="<?=$picture?>">
						</a>
					</div>
					<div class="megaOfertasCarsaleValorOferta"><a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>">R$ <?=formatToPrice($resN[price])?> </a></div>
				</div>
				<!--div class="megaOfertasCarsaleTxtOferta textoBold"><a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>"><?=$resN[dateLimit]?></a></div-->
				<div class="megaOfertasCarsaleTxtOferta"><a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>">Cat.: <?=utf8_encode($resN[versionName])?></a></div>
				<div class="megaOfertasCarsaleTxtOferta"><a data-toggle="modal" data-target="#feature_<?=$resN[versionId]?>" id="fichaTecnica1">Ficha Técnica</a></div>
				<div class="megaOfertasCarsaleBtnComprarOferta"><a href="./detalhes-mega-oferta.php?veiculo=<?=$resN[megaOfertaId]?>">comprar</a></div>
			</div>
			<? } ?>
		</div>
	</div>
</div>
<!-- Modals -->
<?
include ("../scripts/modalFeatureMakup.php");
include ("../includes/footer.php");
?>


<script type="text/javascript">
var uolJsHost = (("https:" == document.location.protocol) ? "https://ssl.carsale.com.br/js/carsale.js" : "http://me.jsuol.com/omtr/carsale.js");
document.write(unescape("%3Cscript language='JavaScript' src='" + uolJsHost + "' type='text/javascript' %3E%3C/script%3E"));
</script>
<script type="text/javascript"><!--
uol_sc.channel="Carros-parceiros-carsale";
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=uol_sc.t();if(s_code)document.write(s_code)//--></script>
<!-- End SiteCatalyst code version: H.20.2. -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10478324-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 </script>
<script type="text/javascript">
function updateField(obj){
	$("#expModel option").remove();
	var optTemp;
	$.getJSON('../admin/api/index.php?type=askModel&mainId='+obj.value, function(data) {
		$.each(data, function(key, val) {
			optTemp += '<option value="'+val.id+'" >'+val.label+'</option>';
		});
		$("#expModel").append(optTemp);
	});
}


</script>

</body>
</html>