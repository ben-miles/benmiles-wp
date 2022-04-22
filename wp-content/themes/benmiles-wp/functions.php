<?php

// Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Override WordPress core's default jQuery
function override_jquery() {
    if( !is_admin()){
        wp_deregister_script('jquery');
        wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.3.2.1.min.js', [], '3.2.1', true );
		// string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'override_jquery');

// Styles
wp_enqueue_style( 'exo-2', get_template_directory_uri() . '/assets/css/exo-2.19.min.css',false,'19','all');
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.4.7.0.min.css',false,'4.7.0','all');
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.4.0.0.a6.min.css',false,'4.0.0','all');
wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.3.5.2.min.css',false,'3.5.2','all');
wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/assets/css/ie10-viewport-bug-workaround.css',false, '','all');
wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css',false, '','all');

// Scripts
wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.3.2.1.min.js', [], '3.2.1', true);
wp_enqueue_script( 'tether-fix', get_template_directory_uri() . '/assets/js/tether-fix.js', array(), '', true);
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.4.0.0.a6.min.js', array('jquery'), '4.0.0', true);
wp_enqueue_script( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/assets/js/ie10-viewport-bug-workaround.js', '', '', true);
wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.4.1.3.min.js', '', '4.1.3', true);
wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.3.0.4.min.js', '', '3.0.4', true);
wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);

?>