<?php 
/*
Template Name: Portfolio
*/
// error_reporting(0);
get_header(); 
?>

<!-- portfolio -->
<section id="portfolio">
	<div class="container-new">
		<div class="row-new">

			<!-- Title -->
			<div class="column column-1">
				<h2 class="section-header animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
			</div>

			<!-- Gallery -->
			<div class="row-new">
				<?php getPortfolioItems(); ?>
			</div>

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->

<?php get_footer(); ?>