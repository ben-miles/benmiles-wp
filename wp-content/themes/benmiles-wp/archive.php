<?php 
/*
Template Name: Archive
*/

$category =	$tag = "";
if ( is_tag() ) {
	$meta_type = 'Tag';
	$meta_key = get_tag( get_query_var( 'tag_id' ) );
	$category = null;
	$tag = $meta_key->name;
}
if ( is_category() ) {
	$meta_type = 'Category';
	$meta_key = get_category( get_query_var( 'cat' ) );
	$category = $meta_key->name;
	$tag = null;
}
get_header(null, ['bodyClass' => 'page-archive']);
?>

<!-- archive -->
<section id="archive">
	<div class="container">
		<div class="row">
			<div class="column column-12">

				<h2 class="heading animated" data-animation="fadeIn">
					<?php echo $meta_type . ': ' . $meta_key->name;	?>
				</h2>

				<!-- gallery -->
				<div class="row">
					<?php getPortfolioItems($category,$tag); ?>
				</div>
				<!-- / gallery -->

			</div>
		</div>
	</div>
</section>
<!-- / archive -->

<?php get_footer(); ?>