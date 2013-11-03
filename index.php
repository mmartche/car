<?
session_start();
$_SESSION["tokenTime"] = time();
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
	<script type="text/javascript" src="scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="scripts/Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="scripts/scriptHome.js"></script>
	<script type="text/javascript" src="scripts/enquete.js" ></script>

	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/home.css" />

	

</head>
<body>
<script type="text/javascript" src="http://tm.uol.com.br/b/par/parceiros.js"></script>

<div id="uolBar"></div>
<header>
	<div class="logoBanner">
		<h1 class="logo">CarSale</h1>
		<div class="bannerHome">
			<div class="publicidade">publicidade</div>
			<div class="bannerHomeImg">
				<div class="tm-ads banner700" id="banner-728x90">
					<script type="text/javascript">
						TM.display();
					</script>
				</div>
			</div>
		</div>
	</div>
	<?
	include("includes/menu.php");
	?>
	<div class="socialBar">
        <div class="btnFaceBook">
        	<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fcarsale.brasil&amp;send=false&amp;layout=button_count&amp;width=180&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=31" style="border:none; overflow:hidden; width:108px; height:20px;" ></iframe>
        </div>
        <div class="btnTwitter">
			<iframe src="http://platform.twitter.com/widgets/follow_button.1380141200.html#_=1380554220744&amp;id=twitter-widget-0&amp;lang=pt&amp;screen_name=carsale_brasil&amp;show_count=true&amp;show_screen_name=true&amp;size=m" class="twitter-follow-button twitter-follow-button" title="Twitter Follow Button" data-twttr-rendered="true" style="width: 259px; height: 20px;border:none;"></iframe>
			<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
        </div>
        <div class="btnGoogle">
			<iframe  src="https://plusone.google.com/u/0/_/+1/fastbutton?url=http%3A%2F%2Fcarsale.com.br%2F&amp;size=small&amp;count=true&amp;annotation=&amp;hl=en-US&amp;jsh=r%3Bgc%2F23217085-590ae8cc#id=I1_1314037697624&amp;parent=http%3A%2F%2Fwww.awwwards.com&amp;rpctoken=903490124&amp;_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe" name="I1_1314037697624" ></iframe>
        </div>
        <div class="btnMidiasSociais"><a target="_blank" title="" href="https://www.facebook.com/carsale.brasil"><img alt="" title="" src="http://carsale.uol.com.br/novosite/img/gridMidiasSociais_FaceBook.gif"></a></div>
        <div class="btnMidiasSociais"><a target="_blank" title="" href="http://twitter.com/carsale_brasil"><img alt="" title="" src="http://carsale.uol.com.br/novosite/img/gridMidiasSociais_Twitter.gif" ></a></div>
        <div class="btnMidiasSociais"><a target="_blank" title="" href="http://www.orkut.com.br/Community?cmm=276832"><img alt="" title="" src="http://carsale.uol.com.br/novosite/img/gridMidiasSociais_Orkut.gif"></a></div>
        <div class="btnMidiasSociais"><a target="_blank" title="" href="http://carsale.uol.com.br/noticias/rss.xml"><img alt="" title="" src="http://carsale.uol.com.br/novosite/img/gridMidiasSociais_Rss.gif" ></a></div>
        <div class="txtBuscaNoticias">Busca de Notícias</div>
        <div class="inputTextBuscaNoticiasBox">
            <form action="http://carsale.uol.com.br/novosite/revista/incs/busca.asp" id="frmRevBusca" name="frmRevBusca" method="post" onsubmit="return Busca_Rev();">    
                <input type="text" class="inputTextBuscaNoticias" value="" name="valor_string" id="valor_string" title="Palavras Chave" placeholder="Palavras Chave" />
                <input type="submit" class="btnBuscaNoticia" value="Buscar" />
            </form>
        </div>
	</div>
</header>
<div class="content">
	<div class="columnMiddle">
		<? 
		include ("includes/carrosselHome.php");
		include ("includes/chamadaFotoTopo.php");
		?>
		
		<div class="contentMiddle">
			
			<?
			include ("includes/ultNot.php");
			include ("includes/chamadaHome.php");
			include ("includes/carrosselVideos.php");
			include("includes/enqueteHome.php");
			?>
			<div class="banner-325x200">
				<img src="http://localhost/carsale/carsaleHOME/img/opiniaodoDono.jpg" alt="..." title="" />
			</div>
			
		</div>
		<div class="contentRight">
			<div class="tm-ads banner300" id="banner-300x250">
				<script type="text/javascript">
					TM.display();
				</script>
			</div>
			<div class="tm-ads banner300" id="banner-300x600">
				<script type="text/javascript">
					TM.display();
				</script>
			</div>
			<div class="fbSocialLike">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcarsale.brasil&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;show_border=true&amp;appId=441715265891994" style="border:none; overflow:hidden; width:300px; height:258px;" ></iframe>
			</div>
		</div>
	</div>
	<div class="columnRight"></div>
</div>
<?
include ("includes/footer.php");
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


</body>
</html>