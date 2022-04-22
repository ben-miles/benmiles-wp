<?php
/*
TODO: Get rid of jQuery
TODO: Switch data source from flatfile to REST API
TODO: Make Menus dynamic
TODO: linkify the animated list items to portfolio subsections?
TODO: work/edu timelines? d3.js + gantt chart: https://github.com/dk8996/Gantt-Chart
TODO: SVG logo?
TODO: normalize gallery item heights to prevent big gaps?
TODO: Scrollspy for main nav?
TODO: SEO
TODO: image traversal ( <-- PREV and NEXT --> ) for lightbox
TODO: multiple image support for lightbox
TODO: make gallery thumbnails and modal display images as backgrounds for better centering/scaling. set heights/widths as needed
TODO: Add captions to detail images
*/

get_header();

if ( have_posts() ){
	while ( have_posts() ){
		the_post();
	}
}

get_footer();

?>
