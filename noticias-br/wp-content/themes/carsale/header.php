<?php
/**
* Carsale
*
*/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewpoint" content="width=device-width" />
		<title><?php wp_title('|', true, 'right'); ?></title>
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="site-header">
			<h1>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php bloginfo('template_directory' );?>/images/logo.png" alt="Carsale" />
				CArsale</a>
			</h1>
		</header>

		<nav class="main-navigation" place="header">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
		</nav>
