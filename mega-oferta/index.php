<?
session_start();
$_SESSION["tokenTime"] = time();
include ("../scripts/conectDB.php");
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
	<script type="text/javascript" src="../scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="../scripts/scriptHome.js"></script>

	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../styles/home.css" />
	<link rel="stylesheet" type="text/css" href="../styles/explorador.css" />
	<link rel="stylesheet" type="text/css" href="http://carsale.uol.com.br/classificado/css/carsaleMegaOfertas.css" />
	<link rel="stylesheet" type="text/css" href="../styles/megaOferta.css" />
</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>

<div id="uolBar"></div>
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
					$sql = "SELECT model.name as modelName, version.name as versionName, megaOferta.price, place, dateLimit, feature.picture FROM megaOferta, model, version, feature WHERE megaOferta.idFeature = feature.id and feature.idVersion = version.id and version.idModel = model.id AND place = 'carousel' ORDER by place";
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
					?>
						<div class="item <? if ($r == 0) echo ' active'; ?>">
							<div class="carousel-title carousel-caption">
								<h3><?=$resItem[modelName]?></h3>
							</div>
							<?
							if( strpos($resItem[picture], ".") === false) { ?>
								<img class="carousel-image" src="http://carsale.uol.com.br/foto/<?=$resItem[picture]?>_g.jpg" alt="<?=$resItem[modelName]?>" class="carrosselImg" title="<?=$resItem[modelName]?>" />
							<? } else { ?>
								<img class="carousel-image" src="../carImages/<?=$resItem[picture]?>" alt="<?=$resItem[modelName]?>" class="carrosselImg" title="<?=$resItem[modelName]?>" />
							<? } ?>
							<div class="carousel-caption">
								<h4>R$ <?=$resItem[price]?></h4>
								<div class="carousel-opacity"><?=$resItem[dateLimit]?></div>
								<div class="carousel-version"><?=$resItem[versionName]?></div>
							</div>
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
			$sql = "SELECT model.name as modelName, version.name as versionName, megaOferta.price, place, dateLimit, feature.picture FROM megaOferta, model, version, feature WHERE megaOferta.idFeature = feature.id and feature.idVersion = version.id and version.idModel = model.id AND place = 'normal' ORDER by place";
					$query = mysql_query($sql) or die (mysql_error());
			while ($resN = mysql_fetch_array($query)) {
			?>
			<div class="megaOfertasCarsaleOferta">
				<div class="megaOfertasCarsaleTituloOferta"><a href="/classificado/campanha/visualizar/259/explorador"><?=$resN[modelName]."<br />".$res[versionName]?></a></div>
				<div class="megaOfertasCarsaleImgBgOferta">
					<div class="megaOfertasCarsaleImgOferta"><a href="/classificado/campanha/visualizar/259/explorador"><img alt="" title="" border="0" src="<?=$resN[picture]?>"></a></div>
					<div class="megaOfertasCarsaleValorOferta"><a href="/classificado/campanha/visualizar/259/explorador">R$ <?=$resN[price]?> </a></div>
				</div>
				<div class="megaOfertasCarsaleTxtOferta textoBold"><a href="/classificado/campanha/visualizar/259/explorador"><?=$resN[dateLimit]?></a></div>
				<div class="megaOfertasCarsaleTxtOferta"><a href="/classificado/campanha/visualizar/259/explorador">Cat.: <?=$resN[versionName]?></a></div>
				<div class="megaOfertasCarsaleTxtOferta"><a href="/classificado/fichatecnica/68084" id="fichaTecnica1">Ficha Técnica</a></div>
				<div class="megaOfertasCarsaleBtnComprarOferta"><a href="/classificado/campanha/visualizar/259/explorador">comprar</a></div>
			</div>
			<? } ?>
		</div>
	</div>
</div>
<?
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