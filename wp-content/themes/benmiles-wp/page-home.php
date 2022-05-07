<?php 
/*
Template Name: Home
*/
// error_reporting(0);
get_header(); 
?>

<!-- intro -->
<section id="hey">
    <div class="container-fluid">
        <div class="row whats-up">
            <div class="col-xs-12 col-md-6 col-xl-4 offset-md-6">
                <div class="col-inner">
                    <div>
                        <h1 class="animated fadeInUp" data-animation="fadeInUp">Hey.</h1>
                        <h1 class="animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1s;">I'm Ben.</h2>
                        <div class="titles scroll animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1.2s;">
                            <ul>
                                <li>Graphic Designer.</li>
                                <li>Web Developer.</li>
                                <li>DIY Enthusiast.</li>
                            </ul>
                        </div>                    
                        <button class="btn btn-default animated fadeInUp scroll" data-animation="fadeInUp" style="animation-delay: 1.3s;" data-section="portfolio">
                            <i class="fa fa-angle-down bounce" aria-hidden="true"></i>
                        </button>
                    </div>
                    <ul class="social list-unstyled list-inline">
                        <li class="list-inline-item facebook animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1.7s;">
                            <a href="https://www.facebook.com/bcgm3/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item twitter animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1.8s;">
                            <a href="https://twitter.com/bcgm3" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item instagram animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1.9s;">
                            <a href="https://www.instagram.com/bencgmiles/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item linkedin animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 1.9s;">
                            <a href="https://www.linkedin.com/in/benjaminmiles/" target="_blank" title="linkedIn"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item codepen animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 2s;">
                            <a href="https://codepen.io/benmiles/" target="_blank" title="CodePen"><i class="fa fa-codepen"></i></a>
                        </li>
                        <li class="list-inline-item github animated fadeInUp" data-animation="fadeInUp" style="animation-delay: 2.1s;">
                            <a href="https://github.com/ben-miles" target="_blank" title="GitHub"><i class="fa fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / intro -->

<!-- port'o'folio (once, in middle school, a kid said it like that, and everybody laughed, even the teacher) -->
<section id="portfolio">

    <!-- section-header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="animated" data-animation="fadeIn">Portfolio</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / section-header -->

    <!-- section-body -->
    <div class="section-body">
        <div class="container">

            <!-- controls -->
            <div class="row" id="row-buttons">
                <div class="col">
                    <div class="btn-toolbar" role="toolbar" aria-label="Gallery Toolbar">
                        <div class="btn-group btn-group-filter animated" role="group" aria-label="Gallery Filter Buttons" data-animation="fadeIn" style="animation-delay: 0.2s;">
                            <span class="input-group-addon">Show:&nbsp;</span>
                            <button type="button" class="btn btn-default btn-filter active" onclick="isotopeFilter(this)" data-filter="*">All</button>
                            <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".design">Design</button>
                            <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".logo">Logo</button>
                            <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".print">Print</button>
                            <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".diy">DIY</button>
                            <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".website">Website</button>
                            <!-- <button type="button" class="btn btn-default btn-filter" onclick="isotopeFilter(this)" data-filter=".featured">Featured</button> -->
                        </div>
                        <div class="btn-group btn-group-sort animated" role="group" aria-label="Gallery Sort Buttons" data-animation="fadeIn" style="animation-delay: 0.2s;">
                            <span class="input-group-addon">Sort:&nbsp;</span>
                            <button type="button" class="btn btn-default btn-sort active" onclick="isotopeSort(this)" data-sort="date">Date</button>
                            <button type="button" class="btn btn-default btn-sort" onclick="isotopeSort(this)" data-sort="title">Title</button>
                            <button type="button" class="btn btn-default btn-sort" onclick="isotopeSort(this)" data-sort="agency">Agency</button>
                            <button type="button" class="btn btn-default btn-sort" onclick="isotopeSort(this)" data-sort="client">Client</button>
                            <!-- <button type="button" class="btn active btn-sort btn-default" onclick="isotopeSort(this)" data-sort="original">Original</button> -->
                            <!-- <button type="button" class="btn btn-default" onclick="isotopeSort(this)" data-sort="random">Random</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- / controls -->

			<!-- gallery -->
			<div class="row" id="gallery" style="height:auto !important;">
				<?php
				$args = array(  
					'post_type' => 'portfolio',
					'post_status' => 'publish',
					'posts_per_page' => -1, 
					'orderby' => 'date', 
					'order' => 'DESC'
				);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); 
				// Format Advanced Custom Fields
				$the_thumbnail_size = trim( get_field( 'thumbnail_size' ), '"' );
				$the_agency = get_field( 'agency' ) ? '<div class="agency"><span class="label">Agency:</span> ' . get_field( 'agency' ) .'</div>' : '';
				$the_client = get_field( 'client' ) ? '<div class="client"><span class="label">Client:</span> ' . get_field( 'client' ) .'</div>' : '';
				// Format Categories
				$categories = get_the_category();
				foreach($categories as $category) {
					$the_category = $category->name; 
				}
				// Format Tags
				$the_tags = '<ul>';
				$tags = get_the_tags();
				foreach($tags as $tag) {
					$the_tags .= '<li>' . $tag->name . '</li>'; 
				}
				$the_tags .= '</ul>';
				// Format Date
				$the_date = get_the_date('Ymd');
				?>

				<!-- gallery-item -->
				<div class="gallery-item <?php echo strtolower( $the_category ) . ' ' . $the_thumbnail_size; ?>" data-date="<?php echo $the_date; ?>">
					<a href="<?php the_permalink() ?>">
						<div class="text">
							<div class="title">
								<h3><?php the_title() ?></h3>
							</div>
							<div class="meta">
								<?php echo $the_agency; ?>
								<?php echo $the_client; ?>
								<div class="date"><?php the_date() ?></div>
								<div class="category">
									<span class="label">Category:</span>
									<ul>
										<li><?php echo $the_category; ?></li>
									</ul>
								</div>
								<div class="tags">
									<span class="label">Tags:</span>
									<?php echo $the_tags; ?>
								</div>
								
							</div>
						</div>
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
				<!-- / gallery-item -->

				<?php
				endwhile;
				wp_reset_postdata(); 
				?>

			</div>
			<!-- / gallery -->

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->

<!-- about -->
<section id="about">

    <!-- header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <h2 class="animated" data-animation="fadeInUp">About</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / header -->

    <!-- content -->
    <div class="section-body">
        <div class="container">

            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <div class="animated card about" style="animation-delay: .1s;" data-animation="fadeInUp">
                        <div class="card-block">
                            <p class="card-text">I'm an experienced and well-rounded graphic designer and web developer, having run my own design company, and worked in lead positions for both print and web companies since the early 2000s. Born and raised here in the Sunshine State, and currently based out of Florida's Space Coast. Driven by a love for learning and refining my craft, I am always trying new methods and media.</p>
                            <p class="card-text">Outside of work, I am an avid collector of creative hobbies. I spend most of my free time homebrewing kombucha, screen printing, making custom furniture and home decor, and reading (just finished <em>Rant</em> and <em>A Feast for Crows</em>, and started <em>A Dance with Dragons</em>).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <div class="svg-row">
                        <?php
                        echo displaySVG( 'HTML 5' );
                        echo displaySVG( 'CSS 3', .1 );
                        echo displaySVG( 'JavaScript', .2 );
                        echo displaySVG( 'PHP', .3 );
                        echo displaySVG( 'mySQL', .4 );
                        ?>
                    </div>
                    <div class="svg-row">
                        <?php
                        echo displaySVG( 'Bootstrap', .1 );
                        echo displaySVG( 'jQuery', .2 );
                        echo displaySVG( 'Joomla!', .3 );
                        echo displaySVG( 'WordPress', .4 );
                        ?>
                    </div>
                    <div class="svg-row">
                        <?php
                        echo displaySVG( 'phpStorm', .1 );
                        echo displaySVG( 'Photoshop', .2 );
                        echo displaySVG( 'Illustrator', .3 );
                        echo displaySVG( 'inDesign', .4 );
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <ul class="timeline">

                        <li class="timeline-inverted">
                            <div class="timeline-badge success">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Art Director & Web Developer</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://shire-digital.com/" target="_blank">Shire Digital Solutions</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;May 2018 - Present</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Cocoa Beach, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

						<li>
                            <div class="timeline-badge success">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Systems Analyst & Graphic Designer</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://pipbrevard.com/" target="_blank">PIP Printing & Marketing</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Nov. 2017 - May 2018</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge" style="background: #739c43;">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Web Developer & Graphic Designer</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://furrylogic.net/" target="_blank">furryLogic</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Nov. 2015 - Nov. 2017</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Cocoa Village, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge" style="background: #bdab49;">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Graphic Designer, Pre-Press Specialist, Large-Format Production & Installation Lead</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://pipbrevard.com/" target="_blank">PIP Printing & Marketing</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Feb. 2012 - Nov. 2015</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge warning">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Graphic Designer, Web Support</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://spacecoast.coupons/" target="_blank">Space Coast Coupons</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Nov. 2011 - Feb. 2012</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge" style="background: #f0954f;">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Owner, Graphic Designer, Web Developer</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://bcgm3.com/" target="_blank">BCGM3 Studios</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Apr. 2010 - Feb. 2012</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge" style="background: #e66f4f;">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Bachelors of Fine Arts in Graphic Design</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://svad.cah.ucf.edu/" target="_blank">University of Central Florida</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2006 - 2009</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Orlando, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Associates of Arts with a Concentration in Design</h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-group" aria-hidden="true"></i>&nbsp;<a href="http://easternflorida.edu/" target="_blank">Eastern Florida State College</a></small>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2004 - 2006</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Cocoa, FL</small>
                                    </p>
                                </div>
                                <!-- <div class="timeline-body">
                                    <p></p>
                                </div> -->
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- / content -->

</section>
<!-- / about -->

<?php get_footer(); ?>