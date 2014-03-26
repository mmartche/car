<?php get_header(); 
global $wp_query;
?>
<div class="content">
	<div class="columnMiddle">
	<h2 class="title-page">
		<span class="title-background"></span>
		<span class="title-name">Notícias</span>
	</h2>
		<ol class="lastest-news">
			<?php
			if (have_posts()): while(have_posts()): the_post(); ?>
			</li>
			<?php
			$hora = get_the_date('H\hi' );
			$dia = get_the_date('d/m/Y' );

			if (!$ch) {	$ch = ""; }
			if ($ch != $dia) {
				$ch = $dia;
				echo '<li class="list-separator"><div class="arrow-list-separator"></div>'.$dia.'</li>';
			}
			?>
			<li <?php post_class(); if (has_post_thumbnail()) { echo ' id="thumbPost" ';} ?>>

				<?php if ( has_post_thumbnail() ) { ?>
				<div class="list-thumbPost imgHover"><a href="<?php the_permalink(); ?>">
				<?php 
					the_post_thumbnail(array(170,150));
				?>
				</a></div>
				<?php
				} ?>
				<h4 class="list-category"><?php the_category(); ?></h4>
					<h3 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="list-hour"><?php echo $hora; ?></span>
			</li>
			<?php endwhile; ?>
			<div class="index-pagination">
				<div class="index-pagination-div">
					<div class="nav-next alignright"><?php previous_posts_link( '' ); ?></div>
					<?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>
					<div class="nav-label"><?php echo $paged; ?> de <?php echo $wp_query->max_num_pages; ?></div>
					<div class="nav-previous alignleft"><?php next_posts_link( '' ); ?></div>
				</div>
			</div>

			<?php endif;  ?>
			
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
</div>
<?php get_footer(); ?>
