<?php 
/*
Template Name: Section - Intro
*/
// error_reporting(0);
?>

<!-- intro -->
<section id="intro">
    <div class="container-new" style="height:100%;">
    	<div class="row-new">

			<!-- portrait -->
			<div class="column column-2">
				<svg id="portrait" viewBox="0 0 200 200">
					<defs>
						<clipPath id="mask">
						<path d=""></path>
						</clipPath>
					</defs>
					<image clip-path="url(#mask)" height="100%" width="100%" href="wp-content/themes/benmiles-wp/img/ben-miles_portrait_IMG-1724_sq.jpg" />
				</svg>
			</div>

			<!-- info -->
			<div class="column column-2">
				<?php displaySVG( 'ben-miles_logo' ); ?>
				<h1 class="animated fadeInUp site-title" data-animation="fadeInUp" style="animation-delay: .1s;">Ben Miles</h2>
				<h2 class="animated fadeInUp site-description" data-animation="fadeInUp" style="animation-delay: .2s;">Graphic Designer <br>& Web Developer</h2>
				<ul class="social-media">
					<li>
						<a href="https://www.linkedin.com/in/benjaminmiles/" target="_blank">
							<?php displaySVG( 'LinkedIn', .3 ); ?>
						</a>
					</li>
					<li>
						<a href="https://codepen.io/benmiles/" target="_blank">
							<?php displaySVG( 'CodePen', .4 ); ?>
						</a>
					</li>
					<li>
						<a href="https://github.com/ben-miles" target="_blank">
							<?php displaySVG( 'GitHub', .5 ); ?>
						</a>
					</li>
				</ul>
				<a href="#about" class="bounce" target="_self">
					<?php displaySVG( 'Down', .6 ); ?>
				</a>
			</div>

		</div>
    </div>
</section>
<!-- / intro -->