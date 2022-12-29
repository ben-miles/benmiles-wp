<?php 
/*
Template Name: Single Portfolio
*/

get_header(null, ['bodyClass' => 'page-portfolio-item']);
?>

<!-- single-portfolio -->
<section id="single-portfolio">
    <div class="container">
    	<div class="row">

			<?php 
			// Start the loop.
			while(have_posts()) : the_post(); 
			?>

			<!-- Title -->
			<div class="column column-12">
				<h2 class="heading animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
			</div>
			
			<!-- Meta -->
			<div class="column column-12">
				<div class="post-meta">
					<div class="post-meta-item date"><h4 class="label">Date </h4><?php the_date(); ?></div>
					<?php if( get_field( 'agency' ) ){ ?>
					<div class="post-meta-item agency"><h4 class="label">Agency </h4><?php echo get_field( 'agency' ); ?></div>
					<?php } if( get_field( 'client' ) ){ ?>
					<div class="post-meta-item client"><h4 class="label">Client </h4><?php echo get_field( 'client' ); ?></div>
					<?php } ?>
				</div>
			</div>
				
			<!-- Images -->
			<div class="column column-6" style="justify-content: flex-start;">
				<div class="thumbnail">
					<?php the_post_thumbnail($post->ID,'small'); ?>
				</div>
				<div class="portfolio">
					<div class="row" style="width:auto;margin:0 -15px;">
						<?php 
						$images = acf_photo_gallery('additional_images', $post->ID);
						if( count($images) ):
							foreach($images as $image):
								$id = $image['id'];
								$title = $image['title'];
								$caption = $image['caption'];
								$full_image_url = $image['full_image_url'];
								$custom_thumbnail_image_url = acf_photo_gallery_resize_image($full_image_url, 360, 200);
						?>
						<div class="column column-6">
							<div class="portfolio-item">
								<?php if( !empty($full_image_url) ){ ?><a href="<?php echo $full_image_url; ?>" target="_blank" class="open-in-lightbox"><?php } ?>
									<img src="<?php echo $custom_thumbnail_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
									<?php if( !empty($full_image_url) ){ ?></a><?php } ?>
								<div class="meta">
									<?php echo $caption; ?>
								</div>
							</div>
						</div>
						<?php 
						endforeach; 
						endif; 
						?>
					</div>
				</div>
			</div>
			
			<!-- Text -->
			<div class="column column-6" style="justify-content: flex-start;">
			<?php if(get_the_content()){ ?>
				<div class="content animated" style="animation-delay: .1s;" data-animation="fadeIn">
					<?php the_content(); ?>
				</div>
			<?php } ?>
				<div class="categories animated" style="animation-delay: .2s;" data-animation="fadeIn">
					<h4 class="label">Categories</h4>
					<?php the_category(); ?>
				</div>
				<div class="tags animated" style="animation-delay: .3s;" data-animation="fadeIn">
					<h4 class="label">Tags</h4>
					<?php the_tags('<ul class="post-tags"><li>','</li><li>','</li></ul>'); ?>
				</div>
			</div>

			<!-- Post Navigation -->
			<div class="column column-12">
				<?php 
				the_post_navigation(
					array(
						'next_text' => '<h4 class="label">Next: </h4>%title',
						'prev_text' => '<h4 class="label">Previous: </h4>%title',
						)
					);
				?>
			</div>

			<?php 
			// End the loop.
			endwhile;
			?>

		</div>
	</div>
</section>
<!-- / about -->

<!-- lightbox -->
<div class="lightbox-container">
	<div class="lightbox">
		<span class="lightbox-close" onclick="closeLightbox()">&times;</span>
		<div class="lightbox-body"></div>
	</div>
</div>
<!-- / lightbox -->

<?php get_footer(); ?>