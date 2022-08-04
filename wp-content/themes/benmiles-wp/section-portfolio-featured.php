<?php 
/*
Template Name: Section - Portfolio (Featured)
*/
// error_reporting(0);
?>

<!-- portfolio (featured) -->
<section id="portfolio">
	<div class="container-new">
		<div class="row-new">
			<div class="column column-1">

				<h2 class="section-header animated" data-animation="fadeIn">Portfolio</h2>
				<p>These are some of my favorite projects that I've worked on recently.</p>

				<!-- web development -->
				<div class="category" id="web-development">
					<h3 class="category-heading">Web Development</h3>
					<div class="row-new">
						<?php getPosts('web-development'); ?>
					</div>
				</div>

				<!-- web design -->
				<div class="category" id="web-design">
					<h3 class="category-heading">Web Design</h3>
					<div class="row-new">
						<?php getPosts('web-design'); ?>
					</div>
				</div>

				<!-- branding -->
				<div class="category" id="branding">
					<h3 class="category-heading">Branding</h3>
					<div class="row-new">
						<?php getPosts('branding'); ?>
					</div>
				</div>

				<!-- print design -->
				<div class="category" id="print-design">
					<h3 class="category-heading">Print Design</h3>
					<div class="row-new">
						<?php getPosts('print-design'); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- / portfolio (featured) -->