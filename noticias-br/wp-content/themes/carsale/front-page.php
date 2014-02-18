<?php get_header(); ?>
<div class="content">
	<div class="columnMiddle">
	<h2 class="title-page">
		<span class="title-background"></span>
		<span class="title-name">Notícias</span>
	</h2>
		<ol class="latest-news">
			<?php
			$args = array(		
						'posts_per_page' => 10,
					);
			$latest_news = 	new WP_Query($args);
			if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
			<li class="list-separator"><?php the_date('d/m','',''); ?></li>
			<li <?php post_class(); ?>>
				<?php	
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} ?>
				<h4 class="list-category"><?php the_category(); ?></h4>
				<h3 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="list-hour"><?php the_date('h','',''); ?>[hora do post]</span>
			</li>
			<?php endwhile; endif;  ?>
			<?php wp_reset_query(); ?>
		</ol>
	</div>
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
				'orderby' => 'count',
				'order' => 'ASC',
				'style' => 'list',
				'show_count' => 1,
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
</div>
<?php get_footer(); ?>
