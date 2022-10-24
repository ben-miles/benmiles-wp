<?php

// Enable Featured Image / Post Thumbnail
add_theme_support('post-thumbnails');

// Enable Title 
add_theme_support('title-tag');

// Shorten Auto-Excerpts
// Via https://www.hostinger.com/tutorials/wordpress-excerpt-length
function shorten_auto_excerpts($length){ 
	return 18; 
}
add_filter('excerpt_length', 'shorten_auto_excerpts');

// Remove p and br tags from Contact Form 7
// Via https://stackoverflow.com/a/49025096/6853842
add_filter('wpcf7_autop_or_not', '__return_false');

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
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
		return $tag;
	}
	add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

	// Load Styles
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css',false, '','all' );

	// Load Scripts
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );

}

/*
* displaySVG
* Generates optimized, inline SVG code from an SVG file
* Accepts: Name of SVG file, Additional CSS Class(es)
* Returns: String of HTML containing optimized, inline SVG code
* Based on https://stackoverflow.com/a/30000684/6853842
*/
function displaySVG( $filename = '', $additional_classes = NULL ){
    $svg_file = file_get_contents( get_template_directory_uri() . '/assets/icons/' . $filename . '.svg' );
    $search_string = '<svg';
    $start_position = strpos( $svg_file, $search_string );
    $svg_code = substr( $svg_file, $start_position );
    $output = '<div class="svg-wrapper svg-' . $filename . ' ' . $additional_classes . '">' . $svg_code . '</div>';
    echo $output;
}

/*
* getPortfolioItems
* Gets and formats Portfolio Items for display
* Accepts: Category Name(s), Tag(s), and a Max number of Items to collect, as arguments
* Returns: String of HTML containing the collection of Portfolio Items, formatted for display
*/
function getPortfolioItems($category=null,$tag=null,$max_items=-1){
	$args = array(
		'category_name' => $category,
		'order' => 'DESC',
		'orderby' => 'date',
		'post_status' => 'publish',
		'post_type' => 'portfolio',
		'posts_per_page' => $max_items,
		'tag' => $tag,
	);
	$loop = new WP_Query($args);
	$i = 0;
	while ($loop->have_posts()){
		$loop->the_post();
		// Format Meta
		$the_title = get_the_title();
		$the_date = get_the_date();
		$the_excerpt = get_the_excerpt();
		$the_thumbnail = get_the_post_thumbnail( null, 'medium', ['class' => 'thumbnail-image'] );
		$the_video = get_field( 'home_page_video' );
		$the_external_url = get_field( 'url' );
		$the_permalink = get_permalink();
		$max_items = ( $max_items > 4 || $max_items === -1) ? 4 : $max_items;
		$animation_delay = $i % $max_items;
		?>
		<div class="column column-<?php echo $max_items; ?>">
			<div class="portfolio-item animated <?php echo ($the_video) ? 'has-video' : ''; ?>" data-animation="fadeInUp" style="animation-delay: 0.<?php echo $animation_delay; ?>s;">
				<a href="<?php echo $the_permalink; ?>" target="_self" class="media">
					<?php echo $the_thumbnail;
					if($the_video){ ?>
					<video loop muted preload="none" class="thumbnail-video">
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