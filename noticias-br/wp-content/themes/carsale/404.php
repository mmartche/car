<?php get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="page-content">
				<div class="alertError">
					<h1 class="page-title"><b>Ops!</b> Página não encontrada</h1>
					<p>Parece que não encontramos nada referente a esta localização. Tente fazer uma nova pesquisa</p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->
<style type="text/css">
	.alertError {
		text-align: center;
		margin: 100px 0;
	}
	.alertError .page-title {
		background: url('../images/ico404.jpg') no-repeat 0 0;
		width: 620px;
		margin: auto;
		vertical-align: text-bottom;
		padding-top: 55px;
	}
	.alertError .page-title b {
		color: darkred;
	}
</style>
<?php
get_footer();
?>