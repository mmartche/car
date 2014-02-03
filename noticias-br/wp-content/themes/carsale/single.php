<?php get_header(); ?>
<?php global $post; ?>
<div class="content">
	<div class="columnMiddle">
		<?php if (have_posts()): while(have_posts()): the_post(); ?>
			<article <?php post_class();?>>
				<h2><?php the_title(); ?></h2>
				<h3><?php the_author(); ?> tem <?php echo number_format_i18n( get_the_author_posts() ); ?> </h3>
				<h4><?php the_date(); ?></h4>
				<hr />
				<div class="news-content">
					<?php the_content(); ?>
				</div>
			</article>
			<div class="about-author">
				<?php the_author_description(); the_author_link();  ?>
			</div>
		<?php endwhile; endif; ?>
		<ul class="readMore">
		<?php
		$categories = get_the_category();
		foreach ($categories as $category) :
			?>
			<h2>Mais sobre <?php echo $category->name; ?></h2>
			<?php
			$posts = get_posts('numberposts=4&category='. $category->term_id);
			foreach($posts as $post) :
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
			<li><strong><a href="<?php echo get_category_link($category->term_id);?>" title="View all posts filed under <?php echo $category->name; ?>">Mais Noticias '<?php echo $category->name; ?>'  &raquo;</a></strong></li>
		<?php endforeach; ?>
		</ul>
		<?php /* FOI INSTALADO UM PLUGIN, PRECISO DO SECRET ID ?>
		<!--div style="background-color:#fafafa; width:640px; padding-top:20px; float:left; position:relative;" id="new_coment">
            <div id="fb-root" class=" fb_reset"><div style="position: absolute; height: 0pt; width: 0pt;"></div></div>
			  <div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=162820543751733";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="3" data-width="640"></div>  
        </div-->
		*/ ?>
	</div>
	<div class="contentRight">
		<div class="tm-ads banner300" id="banner-300x250">
			<script type="text/javascript">
				TM.display();
			</script>
		</div>
		<h2>Ultimas noticias</h2>
		<ol class="latest-news" place="front-page#2">
			<?php
			$args = array(		
						'posts_per_page' => 4,

					);
			$latest_news = 	new WP_Query($args);
			if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
			<li <?php post_class(); ?>>
				<h3><?php the_title(); ?></h3>
				<h4><?php the_category(); ?></h4>
				<a href="<?php the_permalink(); ?>">Leia Mais &raquo;</a>
			</li>
			<?php endwhile; endif;  ?>
			<?php wp_reset_query(); ?>
		</ol>
		<div class="tm-ads banner300" id="banner-300x600">
			<script type="text/javascript">
				TM.display();
			</script>
		</div>
		<ul class="readMore">
		<?php
		//TO DO fix this
		$categories = get_the_category_list();
		foreach ($categories as $category) :
			?>
			<h2>Mais sobre <?php echo $category->name; ?></h2>
			<?php
			$posts = get_posts('numberposts=4&category='. $category->term_id);
			foreach($posts as $post) :
				?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
			<li><strong><a href="<?php echo get_category_link($category->term_id);?>" title="View all posts filed under <?php echo $category->name; ?>">Mais Noticias '<?php echo $category->name; ?>'  &raquo;</a></strong></li>
		<?php endforeach; ?>
		</ul>
		<div class="fbSocialLike">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcarsale.brasil&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;show_border=true&amp;appId=441715265891994" style="border:none; overflow:hidden; width:300px; height:258px;" ></iframe>
		</div>
	</div>
</div>
<?php get_footer(); ?>
