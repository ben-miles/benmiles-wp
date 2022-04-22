       <?php echo $jsonPortfolio; ?>
	    <!-- footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xl-8">

                        <ul class="social">
                            <li class="animated" data-animation="fadeIn">
                                <a class="facebook" href="https://www.facebook.com/bcgm3/" target="_blank">
                                    <i class="fa fa-facebook" data-animation="fadeInUp"></i>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeIn" style="animation-delay: .1s;">
                                <a class="twitter" href="https://twitter.com/bcgm3" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeIn" style="animation-delay: .2s;">
                                <a class="instagram" href="https://www.instagram.com/bencgmiles/" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeIn" style="animation-delay: .3s;">
                                <a class="linkedin" href="https://www.linkedin.com/in/benjaminmiles/" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeIn" style="animation-delay: .4s;">
                                <a class="codepen" href="https://codepen.io/benmiles/" target="_blank">
                                    <i class="fa fa-codepen"></i>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeIn" style="animation-delay: .5s;">
                                <a class="github" href="https://github.com/ben-miles" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </footer>
        <!-- footer -->

		<!-- back to top -->
        <button class="btn btn-default scroll" id="backToTop" data-section="hey">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>

		<!-- modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row">
							<div class="image col-md-8">
								<button type="button" class="close d-md-none" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="wrapper"></div>
							</div>
							<div class="info col-md-4">
								<button type="button" class="close d-none d-md-block" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<div class="row">
									<div class="col-12">
										<div class="header"></div>
										<div class="meta"></div>
										<div class="thumbs"></div>
										<div class="body"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / modal -->

		<?php wp_footer(); ?>

    </body>
</html>
