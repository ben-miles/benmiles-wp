<?php 
/*
Template Name: Portfolio
*/

get_header(null, ['bodyClass' => 'page-portfolio']);
?>

<!-- portfolio -->
<section id="portfolio">
	<div class="container">
		
		<!-- Title -->
		<div class="row">
			<div class="column column-12">
				<h2 class="heading animated fadeInUp" data-animation="fadeInUp"><?php the_title(); ?></h1>
			</div>
		</div>

		<!-- Filter -->
		<div class="row">
			<div class="column column-12">
				<div class="filter">
					<div class="label">
						<span>Show: </span>
					</div>
					<div class="button-group">
						<button class="button filter-button active" data-filter="*" data-description="Showing all projects. Click the buttons above to filter by category.">All</button>
						<?php 
						$the_categories = get_categories();
						foreach($the_categories as $the_category){
							$the_category_name = $the_category->name;
							$the_category_slug = $the_category->slug;
							$the_category_description = $the_category->description;
							echo '<button class="button filter-button" data-filter=".' . $the_category_slug . '" data-description="' . $the_category_description . '">' . $the_category_name . '</button>';
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<!-- Category Description -->
		<div class="row">
			<div class="column column-12">
				<div id="category-description">
					<p>Showing all projects. Click the buttons above to filter by category.</p>
				</div>
			</div>
		</div>

		<!-- Gallery -->
		<div class="row" id="portfolio-items">
			<?php getPortfolioItems(); ?>
		</div>

	</div>
</section>
<!-- / port'o'folio -->

<?php get_footer(); ?>