<?php get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'carsale' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'Parece que não encontramos nada referente a esta localização. Tente fazer uma nova pesquisa', 'carsale' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
?>