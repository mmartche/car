<?php
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

?>