<?php get_header(); ?>
<?php global $post; ?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<div class="content">
	<div class="columnMiddle">
		<h2 class="title-page">
		<span class="title-background"><?php the_date('d/m/Y H:i'); ?></span>
		<span class="title-name"><?php the_category(); ?></span>
	</h2>
			<article <?php post_class();?>>
				<h2 class="post-title"><?php the_title(); ?></h2>
				<h3 class="post-author"><?php the_author(); ?></h3>
				<div class="news-content">
					<?php the_content(); ?>
				</div>
			</article>
			<div class="about-author">
				<img class="about-author-img" src="#" />
				<div class="about-author-desc" ><?php the_author_description();?></div>
				<div class="about-author-link" ><?php the_author_link(); ?></div>
			</div>
<?php endwhile; endif; ?>
		<?php
		$categories = get_the_category();
		foreach ($categories as $category) :
			?>
		<div class="read-more">
			<h3 class="read-more-title">Leia Mais</h3>
		<ul class="ul-read-more">
			<?php
			$posts = get_posts('numberposts=4&category='. $category->term_id);
			foreach($posts as $post) :
				?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<span class="read-more-date">aa<?php the_date('d/m/Y H:i'); ?></span>
				</li>

			<?php endforeach; ?>
		</ul>
			<div class="read-more-link"><a href="<?php echo get_category_link($category->term_id);?>" title="View all posts filed under <?php echo $category->name; ?>">Veja mais notícias sobre <?php echo $category->name; ?>  &raquo;</a></div>
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
        	<div class="comunicar-erro"><a data-toggle="modal" data-target="#comunicar-erro" id="fichaTecnica1">Comunicar erro</a></div>
        </div>
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
				$args = array(		
							'posts_per_page' => 4,

						);
				$latest_news = 	new WP_Query($args);
				if ($latest_news->have_posts()): while($latest_news->have_posts()): $latest_news->the_post(); ?>
				<li>
					<h3 class="read-more-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<span class="read-more-date"><?php the_date('d/m/Y H:i'); ?></span>
				</li>
				<?php endwhile; endif;  ?>
				<?php wp_reset_query(); ?>
			</ol>
			<div class="read-more-link"><a href="http://localhost:8888/carsale/noticias-br/?cat=4" title="View all posts filed under olololo">Veja mais notícias sobre olololo  »</a></div>
		</div>
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
