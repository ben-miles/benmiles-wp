<?php

// Styles
wp_enqueue_style( 'exo-2', get_template_directory_uri() . '/assets/css/exo-2.19.min.css',false,'19','all');
wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.4.7.0.min.css',false,'4.7.0','all');
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.4.0.0.a6.min.css',false,'4.0.0','all');
wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.3.5.2.min.css',false,'3.5.2','all');
wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/assets/css/ie10-viewport-bug-workaround.css',false,'','all');
wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css',false,'','all');

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

?>