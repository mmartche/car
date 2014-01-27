<?php get_header(); ?>

	<aside class="latest-news" place="front-page#2">
		<h2>Ultimas noticias</h2>

		<?php
		$args = array(		
					'posts_per_page' => 10,
				);

		$latest_news = 	new WP_Query($args);

		if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post();

		?>
		<article <?php post_class(); ?> place="front-page">
			<h3><?php the_title(); ?></h3>

			<a href="<?php the_permalink(); ?>">Leia Mais &raquo;</a>
		</article>

		<?php endwhile; endif;  ?>

		<?php wp_reset_query(); ?>

	</aside>

<?php get_footer(); ?>