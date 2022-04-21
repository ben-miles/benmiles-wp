<!-- port'o'folio (a kid in middle school said it like that once and everybody laughed) -->
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
                            <!-- <button type="button" class="btn btn-default" data-filter=".featured">Featured</button> -->
                            <button type="button" class="btn btn-default" data-filter=".design">Design</button>
                            <button type="button" class="btn btn-default" data-filter=".development">Development</button>
                            <button type="button" class="btn btn-default" data-filter=".diy">DIY</button>
                            <button type="button" class="btn btn-default active" data-filter="*">All</button>
                        </div>
                        <div class="btn-group btn-group-sort animated" role="group" aria-label="Gallery Sort Buttons" data-animation="fadeIn" style="animation-delay: 0.2s;">
                            <span class="input-group-addon">Sort:&nbsp;</span>
                            <!-- <button type="button" class="btn active btn-default" data-sort="original-order">Original</button> -->
                            <button type="button" class="btn btn-default active" data-sort="date">Date</button>
                            <button type="button" class="btn btn-default" data-sort="title">Title</button>
                            <button type="button" class="btn btn-default" data-sort="agency">Agency</button>
                            <button type="button" class="btn btn-default" data-sort="client">Client</button>
                            <!-- <button type="button" class="btn btn-default" id="shuffle">Random</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- / controls -->

            <!-- gallery -->
            <div class="row animated" id="gallery" data-animation="fadeIn" style="animation-delay: 0.4s;">
                <?php buildPortfolio( $arrayPortfolio ); ?>
            </div>
            <!-- / gallery -->

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->
