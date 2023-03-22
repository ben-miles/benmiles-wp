<?php 
/*
Template Name: Section - Experience & Skills
*/
// error_reporting(0);
?>

<!-- experience-and-skills -->
<section id="experience-and-skills">

    <!-- content -->
    <div class="section-body">
        <div class="container">
            <div class="row">

				<!-- experience -->
				<div class="column column-9 experience">
					<h2 class="heading animated" data-animation="fadeIn">Experience & Education</h2>
                    <ul class="timeline animated" data-animation="fadeIn" style="animation-delay:0.1s;">

                        <li class="timeline-item timeline-inverted animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Art Director & Web Developer</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="https://shire-digital.com/" target="_blank">Shire Digital Solutions</a></li>
									<li><?php echo displaySVG('calendar'); ?>May 2018 - Present</li>
									<li><?php echo displaySVG('map-pin'); ?>Cocoa Beach, FL</li>
								</ul>
                            </div>
                        </li>

						<li class="timeline-item animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Systems Analyst & Graphic Designer</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://pipbrevard.com/" target="_blank">PIP Printing & Marketing</a></li>
									<li><?php echo displaySVG('calendar'); ?>Nov. 2017 - May 2018</li>
									<li><?php echo displaySVG('map-pin'); ?>Merritt Island, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item timeline-inverted animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Web Developer & Graphic Designer</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://furrylogic.net/" target="_blank">furryLogic</a></li>
									<li><?php echo displaySVG('calendar'); ?>Nov. 2015 - Nov. 2017</li>
									<li><?php echo displaySVG('map-pin'); ?>Cocoa Village, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Graphic Designer, Pre-Press Specialist, Large-Format Production & Installation Lead</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://pipbrevard.com/" target="_blank">PIP Printing & Marketing</a></li>
									<li><?php echo displaySVG('calendar'); ?>Feb. 2012 - Nov. 2015</li>
									<li><?php echo displaySVG('map-pin'); ?>Merritt Island, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item timeline-inverted animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Graphic Designer, Web Support</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://spacecoast.coupons/" target="_blank">Space Coast Coupons</a></li>
									<li><?php echo displaySVG('calendar'); ?>Nov. 2011 - Feb. 2012</li>
									<li><?php echo displaySVG('map-pin'); ?>Merritt Island, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('work'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Owner, Graphic Designer, Web Developer</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://bcgm3.com/" target="_blank">BCGM3 Studios</a></li>
									<li><?php echo displaySVG('calendar'); ?>Apr. 2010 - Feb. 2012</li>
									<li><?php echo displaySVG('map-pin'); ?>Merritt Island, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item timeline-inverted animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('school'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Bachelors of Fine Arts in Graphic Design</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://svad.cah.ucf.edu/" target="_blank">University of Central Florida</a></li>
									<li><?php echo displaySVG('calendar'); ?>2006 - 2009</li>
									<li><?php echo displaySVG('map-pin'); ?>Orlando, FL</li>
								</ul>
                            </div>
                        </li>

                        <li class="timeline-item animated" data-animation="fadeInUp">
                            <div class="timeline-badge">
								<?php echo displaySVG('school'); ?>
                            </div>
                            <div class="timeline-panel">
								<h4 class="timeline-title">Associates of Arts with a Concentration in Design</h4>
								<ul class="timeline-details">
									<li><?php echo displaySVG('external-link'); ?><a href="http://easternflorida.edu/" target="_blank">Eastern Florida State College</a></li>
									<li><?php echo displaySVG('calendar'); ?>2004 - 2006</li>
									<li><?php echo displaySVG('map-pin'); ?>Cocoa, FL</li>
								</ul>
                            </div>
                        </li>

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