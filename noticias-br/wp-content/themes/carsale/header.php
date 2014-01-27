<?php
/**
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Carsale
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript" src="/carsale/scripts/jquery.2.9.3.min.js"></script>
	<script type="text/javascript" src="/carsale/scripts/bootstrap.min.js"></script>

	<script type="text/javascript" src="/carsale/scripts/Dfp_home.js"></script>
	<script type="text/javascript" src="http://tm.uol.com.br/h/par/parceiros.js"></script>
	<script type="text/javascript" src="/carsale/scripts/scriptHome.js"></script>
	<script type="text/javascript" src="/carsale/scripts/enquete.js" ></script>

	<link rel="stylesheet" type="text/css" href="/carsale/styles/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/carsale/styles/home.css" />
	<link rel="stylesheet" type="text/css" href="/carsale/styles/internas.css" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<div id="uolBar"></div>
	<header id="masthead" class="site-header" role="banner">
	<div class="logoBanner">
		<h1 class="logo site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
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
		<div id="menu" class="menu" data-spy="affix" data-offset-top="135">
	<!--nav class="navbar navbar-default navbar-fixed-top" role="navigation"-->
		<ul class="nav nav-pills">
			<li class="active menuHome"><a href="../">Home</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="menuClassificados" title="">Classificados<span class="caret"></span></a>
			</li>
			<li><a href="http://carsale.uol.com.br/compracoletiva/" title="">Compra Coletiva</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="/carsale/noticias/" id="menuEditorial" title="">Editorial<span class="caret"></span></a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="menuInterativo" title="">Interativo<span class="caret"></span></a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="menuMultimidia" title="">Multimidia<span class="caret"></span></a>
			</li>
			<li class="dropdown menuLastItem">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="menuGuia" title="">Guia do Motorista<span class="caret"></span></a>
			</li>
			<li class="subMenuLi">
				<ul class="subMenu dropdown-menu" id="submenuClassificados">
					<li><a href="/carsale/explorador/" title="">Explorador</a></li>
					<li><a href="/carsale/mega-oferta/" title="">Mega Oferta</a></li>
				</ul>
				<ul class="subMenu dropdown-menu" id="submenuEditorial">
					<li><a href="/carsale/noticias/" title="">Notícias</a></li>
					<li><a href="" title="">Segredos</a></li>
					<li><a href="" title="">Testes</a></li>
					<li><a href="" title="">Lançamentos</a></li>
					<li><a href="http://carsale.uol.com.br/blog/" title="">Blog do CarSale</a></li>
					<li><a href="#" title="">Carros Verdes</a></li>
					<li><a href="" title="">Alta Rodagem</a></li>
				</ul>
				<ul class="subMenu dropdown-menu" id="submenuInterativo">
					<li><a href="#" title="">Opniāo do Dono</a></li>
					<li><a href="#" title="">Enquete</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="#" title="">Papel de Parede</a></li>
				</ul>
				<ul class="subMenu dropdown-menu" id="submenuMultimidia">
					<li><a href="#" title="">Galeria de Vídeos</a></li>
					<li><a href="#" title="">Galeria de Fotos</a></li>
				</ul>
				<ul class="subMenu dropdown-menu" id="submenuGuia">
					<li><a href="#" title="">Explorador</a></li>
					<li><a href="#" title="">Opnião do Dono</a></li>
					<li><a href="#" title="">CarSale Corretora</a></li>
				</ul>
			</li>
		</ul>
	</div>
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
        <!--div class="txtBuscaNoticias">Busca de Notícias</div>
        <div class="inputTextBuscaNoticiasBox">
            <form action="http://carsale.uol.com.br/novosite/revista/incs/busca.asp" id="frmRevBusca" name="frmRevBusca" method="post" onsubmit="return Busca_Rev();">    
                <input type="text" class="inputTextBuscaNoticias" value="" name="valor_string" id="valor_string" title="Palavras Chave" placeholder="Palavras Chave" />
                <input type="submit" class="btnBuscaNoticia" value="Buscar" />
            </form>
        </div-->
            <?php get_search_form(); ?>
	</div>
		<!--div class="header-main">
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'carsale' ); ?></h1>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'carsale' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div-->

	</header><!-- #masthead -->

	<div id="main" class="site-main">

