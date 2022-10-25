<?php 
/*
Template Name: Portfolio
*/
// error_reporting(0);
get_header(); 
?>

<!-- portfolio -->
<section id="portfolio">
	<div class="container">
		<div class="row">

			<!-- Title -->
			<div class="column column-12">
				<h2 class="heading animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
			</div>

			<!-- Gallery -->
			<div class="row">
				<?php getPortfolioItems(); ?>
			</div>

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->

<?php get_footer(); ?>