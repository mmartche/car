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
	}
endif;
add_action('after_setup_theme', 'prowordpress_setup');

function prowordpress_scripts_and_styles() {
	wp_enqueue_style('style',get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','prowordpress_scripts_and_styles');

?>