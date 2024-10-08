<?php

// Enable Featured Image / Post Thumbnail
add_theme_support('post-thumbnails');

// Enable Custom Page Titles
add_theme_support('title-tag');

// Disable automatic image scaling
add_filter('big_image_size_threshold', '__return_false');

// Shorten Automatic Excerpts
// Via https://www.hostinger.com/tutorials/wordpress-excerpt-length
function shorten_auto_excerpts($length){ 
	return 18; 
}
add_filter('excerpt_length', 'shorten_auto_excerpts');

// Change "More" Indicator on Auto Excerpts
function excerpt_more_indicator($more){
	return '...';
}
add_filter('excerpt_more', 'excerpt_more_indicator');

// Remove Comments
add_action('admin_init', function(){
	// Redirect any user trying to access comments page
	global $pagenow;
	if($pagenow === 'edit-comments.php'){
		wp_safe_redirect(admin_url());
		exit;
	}
	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	// Disable support for comments and trackbacks in post types
	foreach(get_post_types() as $post_type){
		if(post_type_supports($post_type, 'comments')){
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});
// Remove comments page in menu
add_action('admin_menu', function(){
	remove_menu_page('edit-comments.php');
});
// Remove comments links from admin bar
add_action('init', function(){
	if(is_admin_bar_showing()){
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove Automatic <p> and <br> Tags from Contact Form 7
// Via https://stackoverflow.com/a/49025096/6853842
add_filter('wpcf7_autop_or_not', '__return_false');

// Remove Gutenberg / Block Library CSS
function remove_wp_block_library_css(){
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style');
	wp_dequeue_style('global-styles');
} 
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

// Remove Emojis
// Via https://kinsta.com/knowledgebase/disable-emojis-wordpress/
function remove_emojis(){
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles'); 
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'remove_emojis_tinymce');
	add_filter('wp_resource_hints', 'remove_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'remove_emojis');
function remove_emojis_tinymce($plugins){
	if(is_array($plugins)){
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}
function remove_emojis_remove_dns_prefetch($urls, $relation_type){
	if('dns-prefetch' == $relation_type){
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
		$urls = array_diff($urls, array($emoji_svg_url));
	}
	return $urls;
}

// Load Custom Scripts and Styles
function load_custom_scripts_and_styles(){
	// Make sure the custom script gets a `type` attribute set to `module`
	add_filter('script_loader_tag', 'add_type_to_script', 10, 3);
	function add_type_to_script($tag, $handle, $src){
		if($handle === 'custom'){
			$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
		}
		return $tag;
	}
	// Load Styles
	if(is_singular('portfolio')){
		// Single Portfolio Pages Only:
		wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css', array(), null, false);
		wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', array(), null, false);
	}
	if(is_page('About') || is_page('Home')){
		// Contact & Home Pages Only:
		wp_enqueue_style('flickity', get_template_directory_uri() . '/assets/css/flickity.min.css', array(), null, false);
	}
	wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', false, '', 'all');
	// Load Scripts
	wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js?render=' . GOOGLE_RECAPTCHA_SITE_KEY, array(), null, false);
	if(is_page('Portfolio')){
		// Portfolio Page Only:
		wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.min.js', array(), null, false);
		wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('imagesloaded'), null, false);
	}
	if(is_page('About') || is_page('Home')){
		// Contact & Home Pages Only:
		wp_enqueue_script('flickity', get_template_directory_uri() . '/assets/js/flickity.min.js', array(), null, false);
	}
	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'load_custom_scripts_and_styles');
// Load custom Admin Styles
function load_custom_admin_styles(){
	wp_enqueue_style('admin', get_template_directory_uri() . '/assets/css/admin.css', array(), null, false);
}
add_action('admin_enqueue_scripts', 'load_custom_admin_styles');

/*
* displaySVG
* Generates optimized, inline SVG code from an SVG file
* Accepts: Name of SVG file, Additional CSS Class(es)
* Returns: String of HTML containing optimized, inline SVG code
* Based on https://stackoverflow.com/a/30000684/6853842
*/
function displaySVG($filename = '', $additional_classes = NULL){
	$svg_file = file_get_contents(get_template_directory_uri() . '/assets/icons/' . $filename . '.svg');
	$search_string = '<svg';
	$start_position = strpos($svg_file, $search_string);
	$svg_code = substr($svg_file, $start_position);
	$output = '<div class="svg-wrapper svg-' . $filename . ' ' . $additional_classes . '">' . $svg_code . '</div>';
	return $output;
}

/*
* urlToLabel
* Formats a complete URL string into a simpler label
* Accepts: A string containing a complete URL 
* Returns: A string containing only the domain name and extension
*/
function urlToLabel($url){
	// Remove common prefixes
	$label = str_replace(["http://", "https://", "www."], "", $url);
	// Remove paths
	$label = explode('/', $label, 2);
	return $label[0];
}

/*
* getPosts
* Gets posts from the database and formats them for display
* Accepts: Post Type, Category Name(s), Tag(s), and a Max number of Items to collect, as arguments
* Returns: String of HTML containing the collection of Portfolio Items, formatted for display
*/
function getPosts($post_type='any', $category=NULL, $tag=NULL, $max_items=-1, $order='DESC', $orderby='date'){
	$args = array(
		'category_name' => $category,
		'order' => $order,
		'orderby' => $orderby,
		'post_status' => 'publish',
		'post_type' => $post_type,
		'posts_per_page' => $max_items,
		'tag' => $tag,
	);
	$loop = new WP_Query($args);
	$i = 0;
	while($loop->have_posts()){
		$loop->the_post();
		// Gather Data
		$the_title = get_the_title();
		$the_categories = get_the_category();
		$the_categories_classes = "";
		foreach($the_categories as $the_category){
			$the_categories_classes .= $the_category->slug . ' ';
		}
		$the_categories_classes = trim($the_categories_classes);
		$the_date = get_the_date();
		$the_excerpt = get_the_excerpt();
		$the_thumbnail = get_the_post_thumbnail(null, 'medium', ['class' => 'thumbnail-image']);
		$the_permalink = get_permalink();
		$max_items = ($max_items > 4 || $max_items === -1) ? 4 : $max_items;
		$column_class = 12 / $max_items;
		$animation_delay = $i % $max_items;
		$the_professional_title = get_field('title');
		$the_external_url = get_field('url');
		$the_external_url_label = mb_strimwidth(urlToLabel($the_external_url), 0, 25, "...");
		$the_video = get_field('home_page_video');
		// Output
		include 'item-' . $post_type . '.php';
		$i++;
	}
	wp_reset_postdata();
} 
?>