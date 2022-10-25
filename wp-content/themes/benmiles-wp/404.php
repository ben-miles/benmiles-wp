<?php 
/*
Template Name: 404
*/
// error_reporting(0);
get_header(); 
?>

<!-- 404 -->
<section id="error-404">
	<div class="container" style="height:100%;">
		<div class="row">
			<div class="column column-12">
				
				<!-- header -->
				<h1 class="heading animated" data-animation="fadeInUp">404</h1>
				
				<!-- content -->
				<div class="animated card error-404" style="animation-delay: .1s;" data-animation="fadeInUp">
					<div class="card-block">
						<p class="card-text">Page not found.</p>
						<p class="card-text">Go to <a href="<?php bloginfo('url'); ?>" target="_self">home page</a>?</p>
					</div>
				</div>
				
			</div>	
		</div>
	</div>
</section>
<!-- / about -->

<?php get_footer(); ?>