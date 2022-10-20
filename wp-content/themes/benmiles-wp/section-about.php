<?php 
/*
Template Name: Section - About
*/
// error_reporting(0);
?>

<!-- about -->
<section id="about">
	<div class="container" style="height:100%;">
		<div class="row">
			<div class="column column-1">

				<h2 class="section-header animated" data-animation="fadeInUp">About Ben Miles</h2>

				<div class="animated bio" style="animation-delay: .1s;" data-animation="fadeInUp">
					<p><b>I am an experienced and well-rounded graphic designer and web developer located in central Florida.</b></p>
					<p>I've freelanced, incorporated and run my own design company with a brick-and-mortar location, worked lead positions for print and web agencies, both as an artist and developer, both in-person and remotely. I have always enjoyed the juxtaposition of art and engineering that a career in commercial design offers. </p>
					<p>Outside of work, I'm an avid gardener, a homebrewer, a musician and a movie buff. </p>
				</div>
				<p style="text-align:center">
					<a href="<?php bloginfo('url'); ?>/about" target="_self" class="cta-button">Learn more about me</a>
				</p>

				<!-- TODO: SHOW all of this stuff on the About page, but HIDE on the Home page -->
				<!-- TODO: Update the text content above to reflect knowledge of these items, briefly.  -->

				<!-- code languages -->
				<h3>Code Languages</h3>
				<div class="svg-row">
					<div class="svg-wrapper svg-html">
						<?php displaySVG('html'); ?>
					</div>
					<div class="svg-wrapper svg-css">
						<?php displaySVG('css'); ?>
					</div>
					<div class="svg-wrapper svg-js">
						<?php displaySVG('js'); ?>
					</div>
					<div class="svg-wrapper svg-php">
						<?php displaySVG('php'); ?>
					</div>
					<div class="svg-wrapper svg-mysql">
						<?php displaySVG('mysql'); ?>
					</div>
				</div>
				<!-- frameworks, libraries -->
				<h3>Frameworks & Libraries</h3>
				<div class="svg-row">
					<div class="svg-wrapper svg-bootstrap">
						<?php displaySVG('bootstrap'); ?>
					</div>
					<div class="svg-wrapper svg-jquery">
						<?php displaySVG('jquery'); ?>
					</div>
					<div class="svg-wrapper svg-joomla">
						<?php displaySVG('joomla'); ?>
					</div>
				</div>
				<div class="svg-row">
					<div class="svg-wrapper svg-vue">
						<?php displaySVG('vue'); ?>
					</div>
					<div class="svg-wrapper svg-laravel">
						<?php displaySVG('laravel'); ?>
					</div>
					<div class="svg-wrapper svg-wordpress">
						<?php displaySVG('wordpress'); ?>
					</div>
				</div>
				<!-- software -->
				<h3>Software</h3>
				<div class="svg-row">
					<div class="svg-wrapper svg-phpstorm">
						<?php displaySVG('phpstorm'); ?>
					</div>
					<div class="svg-wrapper svg-photoshop">
						<?php displaySVG('photoshop'); ?>
					</div>
					<div class="svg-wrapper svg-illustrator">
						<?php displaySVG('illustrator'); ?>
					</div>
					<div class="svg-wrapper svg-indesign">
						<?php displaySVG('indesign'); ?>
					</div>
					<div class="svg-wrapper svg-vscode">
						<?php displaySVG('vscode'); ?>
					</div>
				</div>

				<?php } // End if() for Home/About Page Content ?>				

            </div>
        </div>
    </div>
</section>
<!-- / about -->