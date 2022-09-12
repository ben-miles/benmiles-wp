<?php 
/*
Template Name: Portfolio
*/
// error_reporting(0);
get_header(); 
?>

<!-- port'o'folio (once, in middle school, a kid said it like that, and everybody laughed, even the teacher) -->
<section id="portfolio">

    <!-- section-header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="animated" data-animation="fadeIn">Portfolio</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / section-header -->

    <!-- section-body -->
    <div class="section-body">
        <div class="container">


			<!-- gallery -->
			<div class="row" id="gallery" style="height:auto !important;">
				<?php
				$args = array(  
					'post_type' => 'portfolio',
					'post_status' => 'publish',
					'posts_per_page' => -1, 
					'orderby' => 'date', 
					'order' => 'DESC'
				);
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
					<a href="<?php the_permalink() ?>">
						<div class="text">
							<div class="title">
								<h3><?php the_title() ?></h3>
							</div>
							<div class="meta">
								<?php echo $the_agency; ?>
								<?php echo $the_client; ?>
								<div class="date"><?php the_date() ?></div>
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

			</div>
			<!-- / gallery -->

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->

<?php get_footer(); ?>