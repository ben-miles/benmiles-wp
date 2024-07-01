<div class="column column-<?= $column_class . ' ' . $the_categories_classes ?>">
	<div class="<?= $post_type ?>-item card animated" data-animation="fadeInUp" style="animation-delay: 0.<?= $animation_delay ?>s;">
		<div class="quote">
			<p><?= $the_excerpt ?></p><a class="read-more" href="<?= $the_permalink ?>" target="_self">[Read More]</a>
		</div>
		<a href="<?= $the_permalink ?>" target="_self" class="attribution">
			<?= $the_thumbnail ?>
			<div class="text">
				<h6 class="name"><?= $the_title ?></h6>
				<h6 class="title"><?= $the_professional_title ?></h6>
			</div>
		</a>
	</div>
</div>