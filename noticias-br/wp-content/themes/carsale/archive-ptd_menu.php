<?php get_header(); ?>
	<h1>Meuy menu</h1>

	<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

	<?php get_template_part('content', 'menu'); ?>

	<?php endwhile; ?>

	<?php else: ?>

		<article class="error">
			<h1>Mals</h1>
		</article>

	<?php endif; ?>
<?php get_footer(); ?>