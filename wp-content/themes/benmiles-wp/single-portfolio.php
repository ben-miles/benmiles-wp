<?php 
/*
Template Name: Single Portfolio
*/
// error_reporting(0);
get_header(); 
?>

<!-- single-portfolio -->
<section id="single-portfolio">
	
	<?php 
		// Start the loop.
		while(have_posts()) : the_post(); 
	?>



	<!-- header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
					
                </div>
            </div>
        </div>
    </div>
    <!-- / header -->

    <!-- content -->
    <div class="section-body">
        <div class="container">

            <div class="row">
                <div class="col">
					<div class="image" style="text-align: center; margin-bottom: 20px;"><?php the_post_thumbnail(); ?></div>
                    <div class="animated fadeIn card single-portfolio" style="animation-delay: .1s;" data-animation="fadeIn">
                        <div class="card-block">
							<div class="content"><?php the_content(); ?></div>
						</div>
						<div class="meta" style="padding:0 20px; margin-bottom:20px;">
							<div class="date"><?php the_date(); ?></div>
							<div class="agency">Agency: <?php echo post_custom( $key = 'agency' )[0]; ?></div>
							<div class="client">Client: <?php echo post_custom( $key = 'client' )[0]; ?></div>
						</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / content -->

	<?php 
	the_category();
	the_tags('<ul class="post-tags"><li>','</li><li>','</li></ul>');
	
		// Previous/next post navigation.
		the_post_navigation(
			array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">Next</span> ' .
					'<span class="screen-reader-text">Next post:</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">Previous</span> ' .
					'<span class="screen-reader-text">Previous post:</span> ' .
					'<span class="post-title">%title</span>',
			)
		);

		// End the loop.
		endwhile;
	?>

</section>
<!-- / about -->

<?php get_footer(); ?>