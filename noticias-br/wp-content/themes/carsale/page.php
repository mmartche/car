<?php get_header(); ?>
<div class="content" place="page">
	<div class="columnMiddle">
	<?php
	global $query_string;

	$query_args = explode("&", $query_string);
	$search_query = array();

	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach

	$search = new WP_Query($search_query);
	?>
		<ol class="latest-news">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li <?php post_class(); ?>>
				<h3><?php the_title(); ?><?php echo $_GET[wppa-album]; ?></h3>
				<h4><?php the_content(); ?></h4>
				<a href="<?php the_permalink(); ?>">Leia Mais &raquo;</a>
			</li>
			<?php endwhile; endif;  ?>
			
		</ol>
	</div>
	<?php if ($_GET[wppa-album] == "") { ?>
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
	<?php } ?>
</div>
<?php get_footer(); ?>
