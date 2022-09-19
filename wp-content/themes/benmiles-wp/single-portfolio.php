<?php 
/*
Template Name: Single Portfolio
*/
// error_reporting(0);
get_header(); 
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
			<div class="column column-1">
				<h2 class="section-header animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
			</div>
			
			<!-- Meta -->
			<div class="column column-1">
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
			<div class="column column-2" style="justify-content: flex-start;">
				<div class="thumbnail">
					<!-- <div class="row">
						<div class="column column-1"> -->
							<?php the_post_thumbnail($post->ID,'small'); ?>
						<!-- </div>
					</div> -->
				</div>
				<div class="portfolio">
					<div class="row" style="width:auto;margin:0 -15px;">
						<?php 
						// acf_photo_gallery('additional_images',$post->ID); 
						//Get the images ids from the post_metadata
						$images = acf_photo_gallery('additional_images', $post->ID);
						//Check if return array has anything in it
						if( count($images) ):
							//Cool, we got some data so now let's loop over it
							foreach($images as $image):
								$id = $image['id']; // The attachment id of the media
								$title = $image['title']; //The title
								$caption= $image['caption']; //The caption
								$full_image_url= $image['full_image_url']; //Full size image url
								$custom_thumbnail_image_url = acf_photo_gallery_resize_image($full_image_url, 360, 200); //Resized size to 262px width by 160px height image url
								// $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
								// $url= $image['url']; //Goto any link when clicked
								// $target= $image['target']; //Open normal or new tab
								$alt = get_field('photo_gallery_alt', $id);
								$class = get_field('photo_gallery_class', $id);
						?>
						<div class="column column-2">
							<div class="portfolio-item">
								<?php if( !empty($full_image_url) ){ ?><a href="<?php echo $full_image_url; ?>" target="_blank" class="media"><?php } ?>
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
			<div class="column column-2" style="justify-content: flex-start;">
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
			<div class="column column-1">
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

<?php get_footer(); ?>