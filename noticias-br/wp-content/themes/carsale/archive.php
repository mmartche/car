<?php get_header(); ?>
	<?php  if (have_posts()) : while(have_posts()) : the_post(); ?>
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
	<?php endif;  ?>


<div class="content">
	<div class="columnMiddle">
		<?php if (have_posts()) : ?>
	<h2 class="title-page">
		<span class="title-background"></span>
		<span class="title-name"><?php the_category(); ?></span>
	</h2>
		<ol class="lastest-news">
			<?php
			 while(have_posts()): the_post(); ?>
			</li>
			<?php
			$hora = get_the_date('h:m' );
			$dia = get_the_date('d/m/Y' );

			if (!$ch) {	$ch = ""; }
			if ($ch != $dia) {
				$ch = $dia;
				echo '<li class="list-separator">'.$dia.'</li>';
			}
			?>
			<li <?php post_class(); if (has_post_thumbnail()) { echo ' id="thumbPost" ';} ?>>

				<?php if ( has_post_thumbnail() ) { ?>
				<div class="list-thumbPost">
				<?php 
					the_post_thumbnail();
				?>
				</div>
				<?php
				} ?>
				<h3 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="list-hour"><?php echo $hora; ?> => <?php echo $dia; ?></span>
			</li>
			<?php endwhile; endif;  ?>
			
			<?php wp_reset_postdata(); ?>
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
</div>

<?php get_footer( ); ?>