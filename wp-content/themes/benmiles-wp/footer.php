	    <!-- footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">

					<!-- copyright -->
                    <div class="column column-6">
						<div class="copyright">
							© <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>" target="_self">Ben Miles</a>. All Rights Reserved.
						</div>	
					</div>
                    
					<!-- social media links -->
					<div class="column column-6">
						<ul class="social-media">
							<li>
								<a href="https://www.linkedin.com/in/benjaminmiles/" target="_blank">
									<?php displaySVG('linkedin'); ?>
								</a>
							</li>
							<li>
								<a href="https://codepen.io/benmiles/" target="_blank">
									<?php displaySVG('codepen'); ?>
								</a>
							</li>
							<li>
								<a href="https://github.com/ben-miles" target="_blank">
									<?php displaySVG('github'); ?>
								</a>
							</li>
						</ul>
                    </div>

                </div>
            </div>
        </footer>
        <!-- / footer -->

		<!-- back to top -->
        <button class="btn btn-default scroll" id="backToTop" data-section="intro">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>

		<?php wp_footer(); ?>

    </body>
</html>
