<?php get_header(); ?>
<?php global $post; ?>
<?php global $wpdb; ?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<div class="content">
	<div class="columnMiddle">
		<h2 class="title-page">
			<span class="title-background"><?php the_date('d/m/Y H\hi'); ?></span>
			<span class="title-name"><?php the_category(); ?></span>
		</h2>
			<article <?php post_class();?>>
				<h2 class="post-title"><?php the_title(); ?></h2>
				<?php  if (has_excerpt() ) { ?>
					<p class="post-subtitle"><?php echo get_the_excerpt(); ?></p>
				<?php } ?>
				<div class="post-author-box">
					<h3 class="post-author"><?php the_author(); ?></h3>
					<h3 class="post-author-photo"><?php the_meta(); ?></h3>
					<?php //get_post_meta($post->ID, 'll_appprice', true); ?>
				</div>
				<div class="news-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php $lastDate = get_the_date(); ?>
<?php endwhile; endif; ?>
		<?php $categories = get_the_category(); ?>
		<?php foreach ($categories as $category) : ?>
		
		<?php if ($category->slug == "blog") { ?>
		<?php 
			$arrayNextPosts = array();
			if (!$postIdTemp) { $postIdTemp = get_the_ID(); }
			$exclude_ids = array( $postIdTemp );
			$args = array(
						'posts_per_page' => 2,
						'post__not_in' => $exclude_ids,
						'category__in' => $category->term_id,
						'date_query' => array(
											array(
												'after' => $lastDate
											),
						),
					);
			$latest_news = 	new WP_Query($args);
			if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>

			<?php //$nextPost = get_adjacent_post(true,'',true); var_dump($nextPost); ?>
			<h2 class="title-page">
				<span class="title-background"><?php the_date('d/m/Y H:i'); ?></span>
				<span class="title-name"><?php the_category(); ?></span>
			</h2>
				<article <?php post_class();?>>
					<h2 class="post-title"><?php the_title(); ?></h2>
					<?php  if (has_excerpt() ) { ?>
						<p class="post-subtitle"><?php echo get_the_excerpt(); ?></p>
					<?php } ?>
					<div class="post-author-box">
						<h3 class="post-author"><?php the_author(); ?></h3>
						<h3 class="post-author-photo"><?php the_meta(); ?></h3>
						<?php //get_post_meta($post->ID, 'll_appprice', true); ?>
					</div>
					<div class="news-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php $exclude_ids[] = get_the_ID(); ?>
			<?php endwhile; endif; ?>

			<?php //get_next_post( $in_same_cat, $excluded_categories ); ?>
		<?php } //endif category=blog ?>

		<div class="read-more">
			<h3 class="read-more-title"><div class="arrow-read-more"></div><a href="<?php echo get_category_link($category->term_id);?>" title="Ver todas as notícias sobre <?php echo $category->name; ?>">Leia Mais</a></h3>
		<ul class="ul-read-more">
		<?php
				if (!$postIdTemp) { $postIdTemp = get_the_ID(); }
				if (!$exclude_ids) { $exclude_ids = array( $postIdTemp); }
				$args = array(
							'posts_per_page' => 4,
							'post__not_in' => $exclude_ids,
							'category__in' => $category->term_id
						);
				$latest_news = 	new WP_Query($args);
				if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
				<?php
					$hora = get_the_date('H\hi' );
					$dia = get_the_date('d/m/Y' );
				?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="read-more-thumb imgHover">
							<?php	the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="read-more-label">
							<?php echo mb_strimwidth(get_the_title(), 0, 100, "..."); ?>
 						</div>
 					</a>
					<span class="read-more-date"><?php echo ($dia." ".$hora); ?></span>
				</li>
				<?php endwhile; endif;  ?>
<?php wp_reset_query(); ?>
			
		</ul>
		</div>
		<?php endforeach; ?>
		<?php /* FOI INSTALADO mas precisa de config UM PLUGIN, PRECISO DO SECRET ID /*/ ?>
		<div style="background-color:#fafafa; width:640px; padding-top:20px; float:left; position:relative;" id="new_coment">
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
        </div>
        <div class="footer-content">
        	<div class="comunicar-erro"><div class="arrow-comunicar-erro"></div><a data-toggle="modal" data-target="#comunicar-erro" id="fichaTecnica1">Comunicar erro</a></div>
        </div>
        <div class="nextPost"><a href="#">Proximo post</a></div>
        <div class="previousPost"><a href="#">Anterior</a></div>
	</div>
	<div class="contentRight">
		<div class="tm-ads banner300" id="banner-300x250">
			<script type="text/javascript">
				TM.display();
			</script>
		</div>
		<div class="last-news-component">
			<h2 class="title-more">
				<span class="title-background"></span>
				<span class="title-name">Últimas notícias</span>
			</h2>
			<ol>
				<?php
				$postIdTemp = get_the_ID(); 
				$exclude_ids = array( $postIdTemp );
				$args = array(
							'posts_per_page' => 4,
							'post__not_in' => $exclude_ids,
						);
				$latest_news = 	new WP_Query($args);
				if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
				<?php
					$hora = get_the_date('H\hi' );
					$dia = get_the_date('d/m/Y' );
				?>
				<li class="read-more-li">
					<h3 class="read-more-name"><a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="read-more-thumb imgHover">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="read-more-text">
							<?php echo mb_strimwidth(get_the_title(), 0, 100, "..."); ?>
						</div>
					</a></h3>
					<span class="read-more-date"><?php echo ($dia." ".$hora); ?></span>
				</li>
				<?php endwhile; endif;  ?>
				<?php wp_reset_query(); ?>
			</ol>
			<div class="read-more-link"><a href="http://noticias.carsale.uol.com.br/noticias" title="View all posts">+ Veja mais</a></div>
		</div>
		<div class="tm-ads banner300" id="banner-300x600">
			<script type="text/javascript">
				TM.display();
			</script>
		</div>
		<div class="last-news-component">
			<h2 class="title-more">
				<span class="title-background"></span>
				<span class="title-name">Testes</span>
			</h2>
			<ol>
				<?php
				$postIdTemp = get_the_ID(); 
				$exclude_ids = array( $postIdTemp );
				$args = array(
							'posts_per_page' => 4,
							'post__not_in' => $exclude_ids,
							'category_name' => 'testes',
						);
				$latest_news = 	new WP_Query($args);
				if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
				<?php
					$hora = get_the_date('H\hi' );
					$dia = get_the_date('d/m/Y' );
				?>
				<li class="read-more-li">
					<h3 class="read-more-name"><a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="read-more-thumb imgHover">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="read-more-text">
							<?php echo mb_strimwidth(get_the_title(), 0, 50, "..."); ?>
						</div>
					</a></h3>
					<span class="read-more-date"><?php echo ($dia." ".$hora); ?></span>
				</li>
				<?php endwhile; endif;  ?>
				<?php wp_reset_query(); ?>
			</ol>
			<div class="read-more-link"><a href="http://noticias.carsale.uol.com.br/noticias/categorias/testes/" title="View all posts">+ Veja mais</a></div>
		</div>
		<div class="fbSocialLike">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcarsale.brasil&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;show_border=true&amp;appId=441715265891994" style="border:none; overflow:hidden; width:300px; height:258px;" ></iframe>
		</div>
	</div>
</div>
<?php get_footer(); ?>
