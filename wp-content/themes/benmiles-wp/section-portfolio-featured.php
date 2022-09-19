<?php 
/*
Template Name: Section - Portfolio (Featured)
*/
// error_reporting(0);
?>

<!-- portfolio (featured) -->
<section id="portfolio">
	<div class="container">
		<div class="row">
			<div class="column column-1">

				<h2 class="section-header animated" data-animation="fadeIn">Portfolio</h2>
				<p style="color:#fff;">These are some of my favorite projects that I've worked on recently.</p>
				<a href="<?php bloginfo('url'); ?>/portfolio" target="_self" class="cta-button">See more of my work</a>

				<!-- web development -->
				<div class="category" id="web-development">
					<h3 class="category-heading">Web Development</h3>
					<div class="row">
						<?php getPortfolioItems('featured+web-development',null,3); ?>
					</div>
				</div>

				<!-- web design -->
				<div class="category" id="web-design">
					<h3 class="category-heading">Web Design</h3>
					<div class="row">
						<?php getPortfolioItems('featured+web-design',null,4); ?>
					</div>
				</div>

				<!-- branding -->
				<div class="category" id="branding">
					<h3 class="category-heading">Branding</h3>
					<div class="row">
						<?php getPortfolioItems('featured+branding',null,4); ?>
					</div>
				</div>

				<!-- print design -->
				<div class="category" id="print-design">
					<h3 class="category-heading">Print Design</h3>
					<div class="row">
						<?php getPortfolioItems('featured+print-design',null,4); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- / portfolio (featured) -->