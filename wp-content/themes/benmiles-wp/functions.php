<?php

// Enable Featured Image / Post Thumbnail
add_theme_support('post-thumbnails');

// Enable Title 
add_theme_support('title-tag');

if( !is_admin() ){

	// Remove Gutenberg Block Library CSS from loading on the frontend
	function smartwp_remove_wp_block_library_css(){
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' );
		wp_dequeue_style( 'global-styles' );

	} 
	add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

	// Make sure the main script gets a `type` attribute set to `module`
	function add_type_attribute($tag, $handle, $src) {
		// if not your script, do nothing and return original $tag
		// if ( 'custom' !== $handle ) {
		// 	return $tag;
		// }
		// change the script tag by adding type="module" and return it.
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
		return $tag;
	}

	// Styles
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css',false,'4.7.0','all' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css',false,'3.5.2','all' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css',false, '','all' );

	// Scripts
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.min.js', array(), '4.1.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array(), '3.0.4', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );

	add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

}

/*
* displaySVG
* Generates a responsive SVG item from a filename
* Based on https://stackoverflow.com/a/30000684/6853842
* $arrayPortfolioPiece: The input array.
*/
function displaySVG( $SVG = '', $delay = 0 ){
    $file = strtolower( str_replace( array( ' ', '!' ), '', $SVG ) );
    $svg_file = file_get_contents( 'wp-content/themes/benmiles-wp/assets/icons/' . $file . '.svg' );
    $find_string = '<svg';
    $position = strpos( $svg_file, $find_string );
    $svg_file_new = substr( $svg_file, $position );
    echo '<div class="svg animated ' . $file . '" title="' . $SVG . '" alt="' . $SVG . '" style="animation-delay: ' . $delay . 's;" data-animation="fadeInUp">' . $svg_file_new . '</div>';
}

/*
* getPosts
* Gets and formats Portfolio Items for display
*/
function getPosts($category){
	$args = array(
		'category_name' => 'featured+' . $category,
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$loop = new WP_Query($args);
	$i = 0;
	while ($loop->have_posts()){
		$loop->the_post();
		// Format Meta
		$the_title = get_the_title();
		$the_date = get_the_date();
		$the_excerpt = get_the_excerpt();
		$the_thumbnail = wp_get_attachment_image( get_field('home_page_thumbnail'), 'medium', false, ['class' => 'image'] );
		$the_video = get_field( 'home_page_video' );
		$the_external_url = get_field( 'url' );
		$the_permalink = get_permalink();
		?>
		<div class="column column-<?php echo $loop->post_count; ?>">
			<div class="portfolio-item animated <?php echo ($the_video) ? 'has-video' : ''; ?>" data-animation="fadeInUp" style="animation-delay: 0.<?php echo $i; ?>s;">
				<a href="<?php echo $the_permalink; ?>" target="_self" class="media">
					<?php echo $the_thumbnail;
					if($the_video){ ?>
					<video loop muted preload="none" class="video">
						<source src="<?php echo $the_video; ?>" type="video/webm">
					</video>
					<?php } ?>
				</a>
				<div class="meta">
					<a href="<?php echo $the_permalink; ?>" target="_self">
						<h6 class="title"><?php echo $the_title; ?></h6>
					</a>
					<!--<div class="date"><?php //echo $the_date; ?></div>-->
					<p class="excerpt"><?php echo $the_excerpt; ?></p>
					<?php if($the_external_url){ ?>
					<a href="<?php echo $the_external_url; ?>" target="_blank" class="external-link"><?php echo mb_strimwidth( str_replace( "https://", "", $the_external_url ), 0, 25, "..."); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		$i++;
	}
	wp_reset_postdata();
}

?>