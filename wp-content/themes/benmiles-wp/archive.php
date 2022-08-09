<?php 
/*
Template Name: Archive
*/
get_header(); 

$args = array(  
	'post_type' => 'portfolio',
	'post_status' => 'publish',
	'posts_per_page' => -1, 
	'orderby' => 'date', 
	'order' => 'DESC'
);
$meta_key =	$meta_value = "";
if ( is_tag() ) {
	$tag = get_tag( get_query_var( 'tag_id' ) );
	$taxonomy_id = $tag->term_taxonomy_id;
	$taxonomy_name = $tag->name;
	$taxonomy_slug = $tag->slug;
	$args['tag_id'] = $taxonomy_id;
}
if ( is_category() ) {
	$category = get_category( get_query_var( 'cat' ) );
	$taxonomy_id = $category->term_taxonomy_id;
	$taxonomy_name = $category->name;
	$taxonomy_slug = $category->slug;
	$args['cat'] = $taxonomy_id;
}
?>

<!-- archive -->
<section id="archive">

    <!-- header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <h2 class="animated" data-animation="fadeInUp">
						<?php
						if ( is_tag() ) {
							echo 'Tag: ' . $taxonomy_name;
						}
						if ( is_category() ) {
							echo 'Category: ' . $taxonomy_name;
						}
						?>
					</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / header -->

    <!-- content -->
    <div class="section-body">
        <div class="container">

            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <div class="animated card" style="animation-delay: .1s;" data-animation="fadeInUp">
                        <div class="card-block">
                            <!-- <p class="card-text">You've found the Archive page!</p> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / content -->

	<?php
	
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	// Format Advanced Custom Fields
	$the_thumbnail_size = trim( get_field( 'thumbnail_size' ), '"' );
	$the_agency = get_field( 'agency' ) ? '<div class="agency"><span class="label">Agency:</span> ' . get_field( 'agency' ) .'</div>' : '';
	$the_client = get_field( 'client' ) ? '<div class="client"><span class="label">Client:</span> ' . get_field( 'client' ) .'</div>' : '';
	// Format Categories
	$categories = get_the_category();
	foreach($categories as $category) {
		$the_category = $category->name; 
	}
	// Format Tags
	$the_tags = '<ul>';
	$tags = get_the_tags();
	foreach($tags as $tag) {
		$the_tags .= '<li>' . $tag->name . '</li>'; 
	}
	$the_tags .= '</ul>';
	// Format Date
	$the_date = get_the_date('Ymd');
	?>

	<!-- gallery-item -->
	<div class="gallery-item <?php echo strtolower( $the_category ) . ' ' . $the_thumbnail_size; ?>" data-date="<?php echo $the_date; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="text">
				<div class="title">
					<h3><?php the_title(); ?></h3>
				</div>
				<div class="meta">
					<?php echo $the_agency; ?>
					<?php echo $the_client; ?>
					<div class="date"><?php the_date(); ?></div>
					<div class="category">
						<span class="label">Category:</span>
						<ul>
							<li><?php echo $the_category; ?></li>
						</ul>
					</div>
					<div class="tags">
						<span class="label">Tags:</span>
						<?php echo $the_tags; ?>
					</div>
					
				</div>
			</div>
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<!-- / gallery-item -->

	<?php
	endwhile;
	wp_reset_postdata(); 
	?>
	
</section>
<!-- / about -->

<?php get_footer(); ?>