<aside class="sidebar news">
	<h2>Arquivo</h2>
	<ul class="news-navigation">
		<?php wp_get_archives(); ?>
	</ul>

	<h2>Categoria popular</h2>
	<ul class="news-navigation">
		<?php
		$args = array(
					'title'=>'',
					'orderby'=>'count',
					);
		wp_list_categories($args); 
		?>
	</ul>
</aside>
<aside class="sidebar page-navigation">
	<?php
		global $post;
		$ancestors = get_post_ancestors( $post );
		$top = get_post(end($ancestors), "OBJECT" );
	?>
	<h2>titulo: <?php echo $top->post_title; ?></h2>
	<ul class="sub-nav">
		<?php wp_list_pages('title_li=&child_of='.$top->ID); ?>
	</ul>

</aside>