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
			<div class="column column-12">

				<h2 class="heading animated" data-animation="fadeIn">Portfolio</h2>
				<p style="color:#fff;margin: 0 0 30px;">These are just a few of my favorite projects.</p>
				<a href="<?php bloginfo('url'); ?>/portfolio" target="_self" class="button cta" style="margin-bottom: 30px;"><span>See all of my work</span><?php displaySVG('right'); ?></a>

				<!-- web development -->
				<div class="category" id="web-development">
					<h3 class="sub-heading">Web Development</h3>
					<div class="row">
						<?php getPortfolioItems('featured+web-development',null,3); ?>
					</div>
				</div>

				<!-- web design -->
				<div class="category" id="web-design">
					<h3 class="sub-heading">Web Design</h3>
					<div class="row">
						<?php getPortfolioItems('featured+web-design',null,4); ?>
					</div>
				</div>

				<!-- branding -->
				<div class="category" id="branding">
					<h3 class="sub-heading">Branding</h3>
					<div class="row">
						<?php getPortfolioItems('featured+branding',null,4); ?>
					</div>
				</div>

				<!-- print design -->
				<div class="category" id="print-design">
					<h3 class="sub-heading">Print Design</h3>
					<div class="row">
						<?php getPortfolioItems('featured+print-design',null,4); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- / portfolio (featured) -->