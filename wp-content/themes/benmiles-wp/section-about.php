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
			<div class="column column-12">

				<h2 class="heading animated" data-animation="fadeIn">About Ben Miles</h2>

				<div class="animated card" data-animation="fadeIn" style="animation-delay: .1s;">
					<p><b>I'm a graphic designer and full-stack web developer, located in central Florida, with 20 years of experience.</b></p>
					<p>I have always found joy in the balance of creative and problem-solving tasks that my career offers.</p>
					<p>I've freelanced, incorporated and run my own design company, and worked lead positions in both design and development agencies.</p>
					<p>Outside of work, I prefer to spend time homebrewing, screenprinting, or gardening.</p>
				</div>
				
				<!-- <p style="text-align:center"> -->
					<?php 
					if( is_front_page() ){
						// Display this content on the Home Page ?>
						<a href="<?php echo home_url(); ?>/about" target="_self" class="button cta animated" data-animation="fadeInUp" style="animation-delay: .2s;"><span>Learn more about me</span><?php echo displaySVG('right'); ?></a>
					<?php } else { 
						// Display this content on the About Page ?>
						<a href="#experience-and-skills" target="_self" class="button cta animated" data-animation="fadeInUp" style="animation-delay: .2s;"><span>Experience & Skills</span><?php echo displaySVG('down', 'bounce'); ?></a>
					<?php } ?>
				<!-- </p> -->

            </div>
        </div>
    </div>
</section>
<!-- / about -->