
<!--?php

/**
* Carsale function and definitions
*
*/
if (! function_exists('prowordpress_setup')) :
	function prowordpress_setup() {
		/*
		* adicionar posts padrão e comentarios do rss vinculado com o head
		*/
		add_theme_support('automatic-feed-links');

		/*
		* habilitar suporte a thumbnails
		*/
		add_theme_support('post-thumbnails');

		/*
		* esse tema usa wp_nav_menu( ) num so lugar
		*/
		register_nav_menus(array(
				'primary' => __('Primary Menu', 'ao_starter'),
			) );
		/*
		* habilita suport para os seguintes formatos
		*/
		add_theme_support('post-formats',array( 'aside', 'image', 'video', 'quote', 'link') );
	}
endif;
add_action('after_setup_theme', 'prowordpress_setup');

function prowordpress_scripts_and_styles() {
	wp_enqueue_style('style',get_stylesheet_uri());

	if(!is_admin()) {
		wp_deregister_script('jquery' );
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false );
		wp_enqueue_script('jquery' );
	}
}
add_action('wp_enqueue_scripts','prowordpress_scripts_and_styles');

function simple_copyright (){
	echo "&copy; ".get_bloginfo('name' )." ".date("Y");
}

function prowordpress_post_types() {
	$types = array(
				'ptd_staff' => array(
								'menu_title' => '1Staff',
								'plural' => 'Pesso2a',
								'singular' => 'Pessoas',
								'supports' => array('title','editor', 'excerpt', 'thumbnail', 'author', 'page-attributes'),
								'slug' => 'staff'
							),
				'ptd_menu' => array(
								'menu_title' => 'Menu',
								'plural' => 'Items',
								'singular' => 'Item',
								'supports' => array('title','editor', 'excerpt', 'thumbnail', 'author', 'page-attributes'),
								'slug' => 'menu'
							)
		);
	$counter = 0;
	foreach ($types as $type => $arg) {
		$labels = array(
					'name' => $arg['menu_title'],
					'singular_name' => $arg['singular'],
					'add_new' => 'ADD new',
					'add_new_item' => 'AdD new'.strtolower($arg['singular']),
					'edit_item' => 'EdiT'.strtolower($arg['singular']),
					'new_item' => 'NeW'.strtolower($arg['singular']),
					'all_items' => 'Todos os '.strtolower($arg['plural']),
					'view_item' => 'Ver'.strtolower($arg['plural']),
					'search_item' => 'Buscar'.strtolower($arg['plural']),
					'not_found' => 'NoNo'.strtolower($arg['plural']).' encontrado',
					'not_found_in_trash' => 'Nao '.strtolower($arg['plural']).' encontrado no lixo',
					'parent_item_colon' => '',
					'menu_name' => $arg['menu_title']
			);
		register_post_type($type,array(
									'labels' => $labels,
									'public' => true,
									'has_archive' => true,
									'capability_type' => 'post',
									'supports' => $arg['supports'],
									'rewrite' => array('slug' => $arg['slug']),
									'menu_position' => (20 + $counter)
			)
		);
		$counter++;
	}
}
add_action('init', 'prowordpress_post_types');

function prowordpress_updated_messages($messages){
	global $post, $post_ID;

	$types = array(
				'ptd_staff' => 'Person',
				'ptd_menu' => 'Item'
				);
	foreach ($types as $type => $title) {
		$messages[$type] = array(
							0 => '',
							1 => sprintf( __('%s updated. <a href="%s">VER %s</a>'), $title, esc_url(get_permalink($post_ID)),$title),
							2 => __('Custom field updatid'),
							3 => __('Custom field deletedi.'),
							4 => __(strtolower($title).' updatedi'),
							5 => isset($_GET['revision']) ? sprintf( __('%s restored to revision from %s'), $title, wp_post_revision_title( (int) $_GET['revision'], false) ) : false,
							6 => sprintf( __('%s published. <a href="%s">Ver %s</a>'), $title, esc_url(get_permalink($post_ID) ), strtolower($title)),
							7 => __($title.' salvo'),
							8 => sprintf( __('%s submite. <a target="_blank" href="%s">Preview %s</a>'), $title, esc_url( add_query_arg('preview', 'true', get_permalink($post_ID) ) ), strtolower($title) ),
							9 => sprintf( __('%s agendado pra: <strong>%2$s</strong>. <a target="_blank" href="%3$s">Preview %1$s</a>'), $title, date_i18n( __('M j, Y @ G:i'), strtotime( $post->post_date) ), esc_url(get_permalink($post_ID) ) ),
							10 => sprintf( __('%s rascunho atualizado. <a target="_blank" href="%s">Prevciew %s</a>'), $title, esc_url(add_query_arg('preview', 'true', get_permalink($post_ID) ) ), strtolower($title) )
			);
	}
	return $messages;
}
//add_filter ('post_updated_messages' 'prowordpress_updated_messages');

function prowordpress_custom_columns($cols) {
	$cols = array(
			'cb' => '<input type="checkbox" />',
			'title' => __('Title', 'prowordpress'),
			'photo' => __('Thumbnail', 'prowordpress'),
			'date' => __('Date', 'prowordpress')
		);
	return $cols;
}
//add_filter("manage_ptd_staff_posts_columns", "prowordpress_custom_columns");
//add_filter("manage_ptd_menu_posts_columns", "prowordpress_custom_columns");

function prowordpress_custom_column_content($column, $post_id) {
	switch ($column) {
		case 'photo':
			if(has_post_thumbnail($post_id) ) {
				echo get_the_post_thumbnail ($post_id, array(50,50));
			}
			break;
	}
}
//add_action("manage_ptd_staff_posts_custom_column", "prowordpress_custom_column_content" 10, 2);
//add_action("manage_ptd_menu_posts_custom_column", "prowordpress_custom_column_content", 10, 2);

function my_rewrite_flush() {
	flush_rewrite_rules();
}
//add_action('after_switch_theme', 'prowordpress_flush_rewrite_rules');

?-->
































