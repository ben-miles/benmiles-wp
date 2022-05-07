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

	// Override WordPress core's default jQuery
	function override_jquery() {
		if( !is_admin()){
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '3.2.1', true );
			wp_enqueue_script( 'jquery' );
		}
	}
	add_action('init', 'override_jquery');

	// Styles
	wp_enqueue_style( 'exo-2', get_template_directory_uri() . '/assets/css/exo-2.min.css',false,'19','all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css',false,'4.7.0','all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css',false,'4.0.0','all' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css',false,'3.5.2','all' );
	wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/assets/css/ie10-viewport-bug-workaround.css',false, '','all' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css',false, '','all' );

	// Scripts
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.2.1', true );
	wp_enqueue_script( 'tether-fix', get_template_directory_uri() . '/assets/js/tether-fix.js', array(), '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/assets/js/ie10-viewport-bug-workaround.js', array(), '', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.min.js', array(), '4.1.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array(), '3.0.4', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );

}

/*******************************************************************************
* menu_item
* Generates a nav menu item, consisting of li > a
* Allows for dynamic indication of 'current' or 'active' page.
*** $active: Derived from logic in /core/head.php.
*** $label: The visible text in the link.
*** $link: The url of the link, if different than sanitize( $label ).
*** $target: The target of the link, if other than "_self".
*******************************************************************************/
function menu_item( $label, $link, $target='' ) {
    $page   = str_replace( '/', '', $_SERVER['REQUEST_URI'] );
    $active = ( strtolower( $label ) == $page ) ? ' active' : '';
    $target = ( $target == '' ) ? '_self' : $target;
    $output = <<<OUTPUT
        <li class="nav-item$active">
            <a class="nav-link scroll" data-section="$link" href="#$link" target="$target">$label</a>
        </li>
OUTPUT;

    return $output;
}

/*******************************************************************************
* excerpt
* Generates a short excerpt from a longer string
* Based on https://www.brightcherry.co.uk/scribbles/php-how-to-show-an-excerptteaser-from-a-string/
*** $string: The input string of long text.
*** $count: The limit on the number of words.
*******************************************************************************/
function excerpt( $string, $count ){
    $words = explode( ' ', $string );
    if( count( $words ) > $count ){
        $words = array_slice( $words, 0, $count );
        $string = implode( ' ', $words );
        $string .= '...';
    }
    return $string;
}

/*******************************************************************************
* buildPortfolio
* Generates a responsive gallery item from an array of item information
*** $arrayPortfolioPiece: The input array.
*******************************************************************************/
function buildPortfolio( $arrayPortfolio ){
    $output = '';
    foreach( $arrayPortfolio as $k => $arrayPortfolioPiece ){

        extract( $arrayPortfolioPiece );

        // $title = ( !empty( $client ) ) ? $client . ': ' . $title : $title; // leaving client's name out of the title now
        $dateDisp = ( !empty( $date ) ) ? date( 'M. d, Y', strtotime( $date ) ) : '';
        // $excerpt = excerpt( $description, 20 );
        $clientDisp = $client ? '<h6 class="client"><small>CLIENT:</small> ' . $client . '</h6>' : NULL;
        $clientMeta = $client ? $client : 'z';
        $agencyDisp = $agency ? '<h6 class="agency"><small>AGENCY:</small> ' . $agency . '</h6>' : NULL;
        $agencyMeta = $agency ? $agency : 'z';

        // cats
        if( is_array( $cats ) && sizeof( $cats ) > 1 ){
            sort( $cats, SORT_NATURAL | SORT_FLAG_CASE );
        }
        $catsDisp = implode( ', ', $cats );
        $catsMeta = strtolower( $catsDisp );
        $catsMeta = str_replace( ',', '', $catsMeta );

        // tags
        if( is_array( $tags && sizeof( $tags ) > 1 ) ){
            sort( $tags, SORT_NATURAL | SORT_FLAG_CASE );
        }
        $tagsDisp = implode( ', ', $tags );
        $tagsMeta = strtolower( $tagsDisp );
        $tagsMeta = str_replace( ' ', '-', $tagsMeta ); // replace spaces with hyphens
        $tagsMeta = str_replace( ',-', ' ', $tagsMeta ); // replace commahyphens with spaces, aren't I so clever I HATE REGEX

        // size
        $size = $img['thumb']['size'];
        $colSizes = $size === 'wide' ? 'col-sm-12 col-md-8 col-lg-6' : 'col-sm-6 col-md-4 col-lg-3';

        $output .= <<<OUTPUT
        <div class="gallery-item $size $catsMeta $tagsMeta $colSizes" data-id="$k" data-date="$date" data-agency="$agencyMeta" data-client="$clientMeta">
            <a href="javascript:void(0)">
                <div class="text">
                    <div class="title">
                        <h3>$title</h3>
                        $clientDisp
                        $agencyDisp
                    </div>
                    <div class="meta">
                        <small class="date">$dateDisp</small>
                        <small class="cats">$catsDisp</small>
                        <small class="tags">$tagsDisp</small>
                    </div>
                </div>
                <img src="/wp-content/themes/benmiles-wp/img/portfolio/{$img['thumb']['path']}" />
            </a>
        </div>
OUTPUT;

    }

    echo $output;

}

/*******************************************************************************
* displaySVG
* Generates a responsive SVG item from a filename
* Based on https://stackoverflow.com/a/30000684/6853842
*** $arrayPortfolioPiece: The input array.
*******************************************************************************/
function displaySVG( $SVG = '', $delay = 0 ){
    $file = strtolower( str_replace( array( ' ', '!' ), '', $SVG ) );
    $svg_file = file_get_contents( 'wp-content/themes/benmiles-wp/assets/icons/' . $file . '.svg' );
    $find_string = '<svg';
    $position = strpos( $svg_file, $find_string );
    $svg_file_new = substr( $svg_file, $position );
    return '<div class="svg animated ' . $file . '" title="' . $SVG . '" alt="' . $SVG . '" style="animation-delay: ' . $delay . 's;" data-animation="fadeInUp">' . $svg_file_new . '</div>';
}

?>