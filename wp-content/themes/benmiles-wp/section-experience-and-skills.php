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
					<h2 class="heading animated" data-animation="fadeInUp">Experience & Education</h2>
                    <ul class="timeline">

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
					<h2 class="heading animated" data-animation="fadeInUp">Skills</h2>

					<!-- code languages -->
					<h3 class="sub-heading">Code Languages</h3>
					<div class="row">
						<?php 
						displaySVG('html');
						displaySVG('css');
						displaySVG('js');
						displaySVG('php');
						displaySVG('mysql');
						?>
					</div>

					<!-- frameworks, libraries -->
					<h3 class="sub-heading">Frameworks & Libraries</h3>
					<div class="row">
						<?php
						displaySVG('bootstrap', 'wide');
						displaySVG('jquery', 'wide');
						displaySVG('joomla', 'wide');
						displaySVG('vue', 'wide');
						displaySVG('laravel', 'wide');
						displaySVG('wordpress', 'wide');
						?>
					</div>

					<!-- software -->
					<h3 class="sub-heading">Software</h3>
					<div class="row">
						<?php
						displaySVG('phpstorm');
						displaySVG('photoshop');
						displaySVG('illustrator');
						displaySVG('indesign');
						displaySVG('vscode');
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