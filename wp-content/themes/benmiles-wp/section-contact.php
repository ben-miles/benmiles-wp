<?php 
/*
Template Name: Section - Contact
*/
// error_reporting(0);
?>

<!-- contact -->
<section id="contact">
    <div class="container" style="height:100%;">
    	<div class="row">
			<div class="column column-1">
				<h2 class="section-header animated" data-animation="fadeIn">Contact</h2>
				<p style="color:#fff;">Send me a quick message with the form below, or email me at <a href="mailto:ben@benmiles.com" style="color:#fff;text-decoration:underline;">ben@benmiles.com</a>.</p>
				<?php echo do_shortcode( '[contact-form-7 id="381" title="Contact Form"]' ); ?>		
			</div>
		</div>
    </div>
</section>
<!-- / contact -->