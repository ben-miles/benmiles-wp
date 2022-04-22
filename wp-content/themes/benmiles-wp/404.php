<?php 
/*
Template Name: 404
*/
// error_reporting(0);
get_header(); 
?>

<!-- 404 -->
<section id="404">

    <!-- header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <h2 class="animated" data-animation="fadeInUp">404</h2>
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
                    <div class="animated card error-404" style="animation-delay: .1s;" data-animation="fadeInUp">
                        <div class="card-block">
                            <p class="card-text">Page not found.</p>
                            <p class="card-text">Go to home page? Search?</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / content -->

</section>
<!-- / about -->

<?php get_footer(); ?>