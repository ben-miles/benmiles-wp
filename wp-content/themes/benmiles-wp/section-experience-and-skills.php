<?php 
/*
Template Name: Section - Experience & Skills
*/

$jobs = [
	[
		'title' => 'Art Director & Web Developer',
		'company' => 'Shire Digital Solutions',
		'link' => 'https://shire-digital.com/',
		'dates'	=> 'May 2018 - Present',
		'location' => 'Remote'
	],
	[
		'title' => 'Systems Analyst & Graphic Designer',
		'company' => 'PIP Printing & Marketing',
		'link' => 'https://pipbrevard.com/',
		'dates'	=> 'Nov. 2017 - May 2018',
		'location' => 'Merritt Island, FL'
	],
	[
		'title' => 'Web Developer & Graphic Designer',
		'company' => 'furryLogic',
		'link' => 'https://furrylogic.net/',
		'dates'	=> 'Nov. 2015 - Nov. 2017',
		'location' => 'Cocoa Village, FL'
	],
	[
		'title' => 'Graphic Designer, Pre-Press Specialist, Large-Format Production & Installation Lead',
		'company' => 'PIP Printing & Marketing',
		'link' => 'https://pipbrevard.com/',
		'dates'	=> 'Feb. 2012 - Nov. 2015',
		'location' => 'Merritt Island, FL'
	],
	[
		'title' => 'Graphic Designer, Web Support',
		'company' => 'Space Coast Coupons',
		'link' => 'https://spacecoast.coupons/',
		'dates'	=> 'Nov. 2011 - Feb. 2012',
		'location' => 'Cocoa Village, FL'
	],
	[
		'title' => 'Owner, Graphic Designer, Web Developer',
		'company' => 'BCGM3 Studios',
		'link' => 'https://bcgm3.com/',
		'dates'	=> 'Jan. 2009 - Nov. 2011',
		'location' => 'Cocoa Village, FL'
	]
];

$schools = [
	[
		'title' => 'Bachelors of Fine Arts in Graphic Design',
		'company' => 'University of Central Florida',
		'link' => 'http://svad.cah.ucf.edu/',
		'dates'	=> '2006 - 2009',
		'location' => 'Orlando, FL'
	],
	[
		'title' => 'Associates of Arts with a Concentration in Design',
		'company' => 'Eastern Florida State College',
		'link' => 'http://easternflorida.edu/',
		'dates'	=> '2004 - 2006',
		'location' => 'Cocoa, FL'
	]
];
?>

<!-- experience-and-skills -->
<section id="experience-and-skills">

    <!-- content -->
    <div class="section-body">
        <div class="container">
            <div class="row">

				<!-- experience -->
				<div class="column column-9 experience">
					<h2 class="heading animated" data-animation="fadeIn">Experience</h2>
                    <ul class="timeline animated" data-animation="fadeIn" style="animation-delay:0.1s;">

						<?php
							foreach($jobs as $job) {
								echo '<li class="timeline-item animated" data-animation="fadeInUp">
										<div class="timeline-badge">
											' . displaySVG('work') . '
										</div>
										<div class="timeline-panel">
											<h4 class="timeline-title">' . $job['title'] . '</h4>
											<ul class="timeline-details">
												<li>' . displaySVG('external-link') . '<a href="' . $job['link'] . '" target="_blank">' . $job['company'] . '</a></li>
												<li>' . displaySVG('calendar') . $job['dates'] . '</li>
												<li>' . displaySVG('map-pin') . $job['location'] . '</li>
											</ul>
										</div>
									</li>';
							}
						?>

					</ul>
					<h2 class="heading animated" data-animation="fadeIn">Education</h2>
                    <ul class="timeline animated" data-animation="fadeIn" style="animation-delay:0.1s;">

					<?php
						foreach($schools as $school) {
							echo '<li class="timeline-item animated" data-animation="fadeInUp">
									<div class="timeline-badge">
										' . displaySVG('work') . '
									</div>
									<div class="timeline-panel">
										<h4 class="timeline-title">' . $school['title'] . '</h4>
										<ul class="timeline-details">
											<li>' . displaySVG('external-link') . '<a href="' . $school['link'] . '" target="_blank">' . $school['company'] . '</a></li>
											<li>' . displaySVG('calendar') . $school['dates'] . '</li>
											<li>' . displaySVG('map-pin') . $school['location'] . '</li>
										</ul>
									</div>
								</li>';
						}
					?>

                    </ul>
                </div>
				<!-- / experience -->

				<!-- skills -->
                <div class="column column-3 skills" style="justify-content: flex-start;">
					<h2 class="heading animated" data-animation="fadeIn">Skills</h2>

					<!-- code languages -->
					<h3 class="sub-heading animated" data-animation="fadeInUp">Code Languages</h3>
					<div class="row">
						<?php 
							$icons = ['html', 'css', 'js', 'php', 'mysql'];
							$animationDelay = 0;
							foreach ($icons as $icon) {
								echo '<div class="skill-icon animated" data-animation="fadeInUp" style="animation-delay: ' . $animationDelay . 's;">' . displaySVG($icon) . '</div>';
								$animationDelay += 0.1;
							}
						?>
					</div>

					<!-- frameworks, libraries -->
					<h3 class="sub-heading animated" data-animation="fadeInUp">Frameworks & Libraries</h3>
					<div class="row">
						<?php
							$icons = ['bootstrap', 'jquery', 'joomla', 'vue', 'laravel', 'wordpress'];
							$animationDelay = 0;
							foreach ($icons as $icon) {
								echo '<div class="skill-icon wide animated" data-animation="fadeInUp" style="animation-delay: ' . $animationDelay . 's;">' . displaySVG($icon) . '</div>';
								$animationDelay += 0.1;
							}
						?>
					</div>

					<!-- software -->
					<h3 class="sub-heading animated" data-animation="fadeInUp">Software</h3>
					<div class="row">
						<?php
							$icons = ['illustrator', 'indesign', 'photoshop', 'phpstorm', 'vscode'];
							$animationDelay = 0;
							foreach ($icons as $icon) {
								echo '<div class="skill-icon animated" data-animation="fadeInUp" style="animation-delay: ' . $animationDelay . 's;">' . displaySVG($icon) . '</div>';
								$animationDelay += 0.1;
							}
						// TODO: Add Figma icon
						// TODO: Update Adobe icons
						?>
					</div>
					
				</div>
				<!-- / skills -->

			</div>				
        </div>
    </div>
    <!-- / content -->

</section>
<!-- / timeline -->