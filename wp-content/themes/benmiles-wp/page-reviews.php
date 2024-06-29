<?php 
/*
Template Name: Reviews
*/

get_header(null, ['bodyClass' => 'page-reviews']);
?>

<!-- Reviews -->
<section id="reviews">
	<div class="container">
			
		<div class="row">
			<div class="column column-8">
				<!-- Title -->
				<h2 class="heading animated" data-animation="fadeIn"><?php the_title(); ?></h1>
				<!-- Description -->
				<div id="meta-description" class="animated" data-animation="fadeIn" style="animation-delay: 0.1s;">
					<p>Working together on something unique and useful is so fulfilling, and I'm grateful to have had the opportunity to collaborate with some truly talented individuals.</p>
					<p>Below, you'll find testimonials from my clients about their experiences working with me. If you're interested in partnering on a project, please don't hesitate to <a href="#contact" target="_self">get in touch!</a></p>
				</div>
			</div>
		</div>

		<!-- Posts -->
		<div class="row" id="review-items">
			<?php getPosts('review'); ?>
		</div>

	</div>
</section>
<!-- / Reviews -->

<?php include('section-contact.php'); ?>

<?php get_footer(); ?>