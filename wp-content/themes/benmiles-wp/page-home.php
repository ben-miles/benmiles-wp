<?php 
/*
Template Name: Home
*/

// error_reporting(0);

get_header(); 


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

<!-- about -->
<section id="about">
	<div class="container-new">
		<div class="row-new">
			<div class="column column-1">

				<h2 class="section-header animated" data-animation="fadeInUp">About</h2>

				<div class="animated bio" style="animation-delay: .1s;" data-animation="fadeInUp">
					<p><strong>I am an experienced and well-rounded graphic designer and web developer located in central Florida.</strong> 
						<br><strong>For as long as I've been able, I have been creating.</strong></p>
					<p>I've freelanced, incorporated and run my own design company with a brick-and-mortar location, worked lead positions for print and web agencies, both as an artist and developer, both in-person and remotely. I have always enjoyed the juxtaposition of art and engineering that a career in commercial design offers. </p>
					<p>Outside of work, I'm an avid gardener, a homebrewer, a musician and a movie buff. </p>
				</div>

				<!-- code languages -->
				<h3>Code Languages</h3>
				<div class="svg-row">
					<?php
					displaySVG( 'HTML 5' );
					displaySVG( 'CSS 3', .1 );
					displaySVG( 'JavaScript', .2 );
					displaySVG( 'PHP', .3 );
					displaySVG( 'mySQL', .4 );
					?>
				</div>
				<!-- frameworks, libraries -->
				<h3>Frameworks & Libraries</h3>
				<div class="svg-row">
					<?php
					displaySVG( 'Bootstrap', .1 );
					displaySVG( 'jQuery', .2 );
					displaySVG( 'Joomla!', .3 );
					?>
				</div>
				<div class="svg-row">
					<?php
					displaySVG( 'Vue', .4 );
					displaySVG( 'Laravel', .5 );
					displaySVG( 'WordPress', .6 );
					?>
				</div>
				<!-- software -->
				<h3>Software</h3>
				<div class="svg-row">
					<?php
					displaySVG( 'phpStorm', .1 );
					displaySVG( 'Photoshop', .2 );
					displaySVG( 'Illustrator', .3 );
					displaySVG( 'inDesign', .4 );
					displaySVG( 'VS Code', .4 );
					?>
				</div>

            </div>
        </div>
    </div>
</section>
<!-- / about -->

<!-- portfolio -->
<section id="portfolio">
	<div class="container-new">
		<div class="row-new">
			<div class="column column-1">

				<h2 class="section-header animated" data-animation="fadeIn">Portfolio</h2>

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
<!-- / portfolio -->

<?php get_footer(); ?>