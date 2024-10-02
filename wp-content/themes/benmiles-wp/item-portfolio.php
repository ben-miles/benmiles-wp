<div class="column column-<?= $column_class . ' ' . $the_categories_classes ?>">
	<div class="<?= $post_type ?>-item animated <?= ($the_video) ? 'has-video' : '' ?>" data-animation="fadeInUp" style="animation-delay: 0.<?= $animation_delay ?>s;">
		<a href="<?= $the_permalink ?>" target="_self" class="media">
			<?= $the_thumbnail;
			if($the_video){ ?>
			<video loop muted preload="none" class="thumbnail-video">
				<source src="<?= $the_video ?>" type="video/webm">
			</video>
			<?php } ?>
		</a>
		<div class="meta">
			<a href="<?= $the_permalink ?>" target="_self">
				<h6 class="title"><?= $the_title ?></h6>
			</a>
			<p class="excerpt"><?= $the_excerpt ?></p>
			<?php if($the_external_url){ ?>
			<a href="<?= $the_external_url ?>" target="_blank" class="external-link">
				<?= displaySVG('external-link'); echo $the_external_url_label ?>
			</a>
			<?php } ?>
		</div>
	</div>
</div>