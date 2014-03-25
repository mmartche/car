<?php get_header(); ?>


	<div id="primary" class="content-area content">
		<div id="content" class="site-content columnMiddle" role="main">
			<div class="page-content">
				<div class="alertError">
					<h1 class="page-title"><b>Ops!</b> Página não encontrada</h1>
					<p>Parece que não encontramos nada referente a esta localização. Tente fazer uma nova pesquisa</p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- .page-content -->
		</div><!-- #content -->
		<div class="contentRight">
			<div class="tm-ads banner300" id="banner-300x250">
				<script type="text/javascript">
					TM.display();
				</script>
			</div>
			<div class="more-categories">
				<h2 class="title-more">
					<span class="title-background"></span>
					<span class="title-name">Canais</span>
				</h2>
				<ul class="ul-more-categories">
				<?php $args = array (
					'orderby' => 'name',
					'order' => 'ASC',
					'style' => 'list',
					'show_count' => 0,
					'hide_empty' => 0,
					'title_li' => '',
					'number' => 10,
					'depth' => -1,
					);
				wp_list_categories($args);
				?>
				</ul>
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