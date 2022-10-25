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
			<div class="column column-12">
				<h2 class="section-header animated" data-animation="fadeIn">Contact</h2>
				<p style="color:#fff;margin-bottom:40px;">Send me a message with the form below.</p>
				<div class="form-wrapper">
					<?php echo do_shortcode( '[contact-form-7 id="381" title="Contact Form"]' ); ?>		
				</div>
			</div>
		</div>
    </div>
</section>
<!-- / contact -->