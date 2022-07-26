<?php
/* TODOs:
- Get rid of jQuery & Bootstrap
- Make Menus dynamic
- Scrollspy for main nav?
- SEO
- Add captions to detail images
*/

get_header();

if ( have_posts() ){
	while ( have_posts() ){
		the_post();
	}
}

get_footer();

?>
