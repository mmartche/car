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
	'posts_per_page'   => 12,
	'offset'           => 0,
	'category'         => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true ); 
// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
        echo '<ul>';
        $current_date = '';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		//$post_date = $post->get_the_time();
		
		$hora = get_the_date('h' );
		$dia = get_the_date('d' );

		var_dump($dia, $hora);

		$post_date = get_the_date();
		if ($post_date != $current_date) {
			$current_date = $post_date;
			echo get_the_date() . " <hr />";
		}
		echo '<li>'. the_time() .'-' . get_the_title() . '</li>';
	}
        echo '</ul>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

exit;
			if (have_posts()): while(have_posts()): the_post(); ?>
			<?php
				$current_date = '';
				//(isset($current_date)) && 
				if ($post_date != get_the_date('Y-m-d') || $post_date == "") {
				$post_date = get_the_date('Y-m-d');
					echo "<h2>------dia diferente---------</h2>";
				}
				if ($post_hour = get_the_date('h') || $post_hour != "") {
					$post_date = get_the_date('h');
					echo "<h2>------hora diferente---------</h2>";
				}

			?>
			<li class="list-separator">
			</li>
			<li <?php post_class(); ?>>

				<?php	
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} ?>
				<h4 class="list-category"><?php the_category(); ?></h4>
				<h3 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="list-hour"><?php echo $post_date; ?> => <?php the_date('h'); ?></span>
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
