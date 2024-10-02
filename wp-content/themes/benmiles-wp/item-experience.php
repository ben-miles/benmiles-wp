<li class="timeline-item animated" data-animation="fadeInUp">
	<div class="timeline-badge">
		<?= displaySVG($the_categories_classes) ?>
	</div>
	<div class="timeline-panel">
		<h4 class="timeline-title"><?= get_field('position') ?></h4>
		<ul class="timeline-details">
			<li>
				<?= displaySVG('external-link') ?><a href="<?= get_field('link') ?>" target="_blank"><?= get_the_title() ?></a>
			</li>
			<li>
				<?= displaySVG('map-pin')?><?= get_field('location') ?>
			</li>
			<li>
				<?= displaySVG('calendar') ?><?= get_the_date('M Y') ?> - <?= get_field('end_date') ?>
			</li>
		</ul>
		<?= the_content() ?>
	</div>
</li>