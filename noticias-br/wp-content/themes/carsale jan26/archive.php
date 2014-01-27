<?php get_header(); ?>
	<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

		<?php if (is_category()) : ?>
			<h1>Lista da categoria: <?php single_cat_title(); ?></h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif( is_tag()) : ?>
			<h1>Tags: <?php single_tag_title(); ?></h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif (is_day()) : ?>
			<h1>Dia: <?php the_time('F js, Y'); ?></h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif (is_month()) : ?>
			<h1>Por mes: <?php the_time('F, Y' ); ?></h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif(is_year()) : ?>
			<h1>Por ano: <?php the_time('Y' ); ?> </h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif(is_author()) : ?>
			<h1>Autor</h1>
			<h3><?php the_permalink(); ?></h3>
		<?php elseif(isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
			<h1>Arquivo</h1>
			<h3><?php the_permalink(); ?></h3>
		<?php endif; ?>

		<?php endwhile; rewind_posts(); ?>
			<hr>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

	<?php else : ?>

		<?php if(is_category()) : ?>
			<h1>Mals, tem nada em <?php single_cat_title( ); ?> . ainda.</h1>
		<?php elseif(is_date()) : ?>
			<h1>Mals, nao tem post com essa data</h1>
		<?php elseif (is_author()) : ?>
			<?php get_userdatabylogin(get_query_var('author_name')); ?>
			<h1>Mals, nao tem post com <?php echo $userdata->display_name; ?> .inda.</h1>
		<?php else : ?>
			<h1>Nenhum post encontrado</h1>
		<?php endif; ?>
	<?php endif; ?>

<?php get_footer( ); ?>