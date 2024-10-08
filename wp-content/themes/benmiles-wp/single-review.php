<?php 
/*
Template Name: Single Review
*/

get_header(null, ['bodyClass' => 'page-review-item']);
?>

<!-- single-review -->
<section id="single-review" class="review-item">
    <div class="container">
    	<div class="row">

			<?php while(have_posts()) : the_post(); ?>

			<div class="column column-8">

				<div class="card animated" data-animation="fadeIn">
					<!-- Attribution -->
					<div class="post-meta">
						<div class="thumbnail animated" data-animation="fadeInUp" style="animation-delay: .1s;">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="text animated" data-animation="fadeInUp" style="animation-delay: .2s;">
							<h2 class="name"><?php the_title(); ?></h2>
							<h2 class="title"><?= get_field('title') ?></h2>
						</div>
					</div>
					<!-- Content -->
					<div class="quote animated" data-animation="fadeIn" style="animation-delay: .3s;">
						<?php the_content(); ?>
					</div>
					<a class="linkedin-link animated" href="https://www.linkedin.com/in/benjaminmiles/" data-animation="fadeIn" style="animation-delay: .4s;" target="_blank"><?= displaySVG('external-link') ?> Originally written by <?php the_title(); ?> on LinkedIn, <?= get_the_date() ?>.</a>
				</div>

				<!-- Post Navigation -->
				<?php the_post_navigation([
					'next_text' => '<h4 class="label">Previous: </h4>%title',
						'prev_text' => '<h4 class="label">Next: </h4>%title'
				]) ?>

			</div>

			<?php endwhile; ?>

		</div>
	</div>
</section>
<!-- / single-review -->

<?php get_footer(); ?>