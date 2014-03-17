<?
session_start();
header('Content-Type: text/html; charset=utf-8');
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

	<?php if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == '::1') { ?>
			
		<script type="text/javascript" src="../scripts/jquery.2.9.3.min.js"></script>
		<script type="text/javascript" src="../scripts/bootstrap.min.js"></script>

		<script type="text/javascript" src="../scripts/Dfp_home.js"></script>
		<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
		<script type="text/javascript" src="../scripts/scriptHome.js"></script>
		<script type="text/javascript" src="../scripts/enquete.js" ></script>
		<script type="text/javascript" src="../scripts/explorer.js"></script>
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../styles/home.css" />
		<link rel="stylesheet" type="text/css" href="../styles/explorado.css" />
		<link rel="stylesheet" type="text/css" href="../styles/explorador.css" />
	<?php } else { ?>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/scriptHome.js"></script>
	<script type="text/javascript" src="http://noticias.carsale.uol.com.br/scripts/enquete.js" ></script>
	<script type="text/javascript" src="../scripts/explorer.js"></script>
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/home.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/explorado.css" />
	<link rel="stylesheet" type="text/css" href="http://noticias.carsale.uol.com.br/styles/explorador.css" />
	<?php } ?>

</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>

<div id="uolBar"><script type="text/javascript" src="http://jsuol.com/barra/parceiro-1024.js?refbusca=carsale&full=true"></script></div>
<header>
	<?
	include ("../includes/logoBanner.php");
	include ("../includes/menu.php");
	include ("../includes/socialBar.php");
	?>
</header>