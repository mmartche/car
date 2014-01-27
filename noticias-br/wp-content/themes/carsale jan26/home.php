<?php get_header(); ?>
	<h1 place="home">Ultimas</h1>

	<?php if(have_posts()) : ?>
		<?php while(have_posts()): the_post(); ?>
			<?php get_template_part('content',get_post_format()); ?>
		<?php endwhile; ?>
	<?php else: ?>
		<article class="error" place="home">
			<h2>Mals ae</h2>
		</article>
	<?php endif; ?>

	<p class="post-page-navigation" place="home">
		<?php previous_posts_link("Mais recente"); ?>
		<?php next_posts_link("Anterior"); ?>
	</p>

	<?php get_sidebar('news'); ?>

<?php get_footer(); ?>