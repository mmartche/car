<?php get_header(); ?>
<?php global $post; ?>


<?php global $wpdb; ?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<div class="content">
	<div class="columnMiddle">
	<?php if (is_category('blog')) { ?>
		<div class="headerBlog"><h1>header blog</h1></div>
	<?php } else { ?>
	<h2 class="title-page">
		<span class="title-background"><?php the_date('d/m/Y H\hi'); ?></span>
		<span class="title-name"><?php the_category(); ?></span>
	</h2>
	<?php } ?>
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
		$next_post = get_next_post(true);
		if (!empty( $next_post )): ?>
			<div class="arrow-previous-post"></div>
			<div class="previous-post blog-nav-post hide">
				<a href="<?php echo get_permalink( $next_post->ID ); ?>">
					<div class="blog-nav-post-content">
						<span>Anterior</span><p><?php echo $next_post->post_title; ?></p>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<?php
		$prev_post = get_previous_post(TRUE);
		if (!empty( $prev_post )): ?>
			<div class="arrow-next-post"></div>
			<div class="next-post blog-nav-post hide">
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
					<div class="blog-nav-post-content">
						<span>Próximo</span>
						<p><?php echo $prev_post->post_title; ?></p>
					</div>
				</a>
			</div>
		<?php endif; ?>
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
		<?php foreach ($categories as $category) : ?>
		<?php if ($category->slug == "blog") { ?>
			<div class="blog-description">
				<h3>Sobre o Blog</h3>
				<div class="blog-description-content">
					<img src="http://noticias.carsale.uol.com.br/images/foto-equipe-editorial.jpg" />
					<p>Este espaço é destinado aos comentários da Redação do Carsale e de seus colaboradores. Aqui, você vai encontrar informações de bastidores, artigos, análises, crônicas, curiosidades e novidades das mais diversas áreas. Participe dando a sua opinião sobre os mais variados temas.</p>
				</div>
			</div>

			<div class="tm-ads banner300" id="banner-300x250">
				<script type="text/javascript">
					TM.display();
				</script>
			</div>

			<div class="blog-about-author">
				<h3>Editorial</h3>
				<ol>
					<li class="blog-about-author-item">
						<div class="img-author <?php the_author_meta('user_login','3'); ?>"></div>
						<h4><?php the_author_meta('display_name','3'); ?></h4>
						<p><?php the_author_meta( 'user_description', '3' ); ?></p>
						<span><a href="mailto:<?php the_author_meta( 'user_email', '3' );?>"><?php the_author_meta( 'user_email', '3' );?></a></span>
					</li>
					<li class="blog-about-author-item">
						<div class="img-author <?php the_author_meta('user_login','4'); ?>"></div>
						<h4><?php the_author_meta('display_name','4'); ?></h4>
						<p><?php the_author_meta( 'user_description', '4' ); ?></p>
						<span><a href="mailto:<?php the_author_meta( 'user_email', '4' );?>"><?php the_author_meta( 'user_email', '4' );?></a></span>
					</li>
					<li class="blog-about-author-item">
						<div class="img-author <?php the_author_meta('user_login','5'); ?>"></div>
						<h4><?php the_author_meta('display_name','5'); ?></h4>
						<p><?php the_author_meta( 'user_description', '5' ); ?></p>
						<span><a href="mailto:<?php the_author_meta( 'user_email', '5' );?>"><?php the_author_meta( 'user_email', '5' );?></a></span>
					</li>
				</ol>
			</div>

			<div class="tm-ads banner300" id="banner-300x600">
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

			<div class="fbSocialLike">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcarsale.brasil&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;show_border=true&amp;appId=441715265891994" style="border:none; overflow:hidden; width:300px; height:258px;" ></iframe>
			</div>

		<?php } else { ?>
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
		<?php } ?>
		<?php endforeach; ?>
</div>
<?php get_footer(); ?>
