<?php 
/*
Template Name: Section - About
*/
// error_reporting(0);
?>

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
					<a href="<?php bloginfo('url'); ?>/about" target="_self" class="cta-button">Learn more about me</a>

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