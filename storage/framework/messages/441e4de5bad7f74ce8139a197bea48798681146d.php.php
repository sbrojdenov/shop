<?php $__env->startSection('content'); ?>
<div class="container">
    <div id="myCarousel" class="carousel slide row"> <!-- slider -->
        <div class="carousel-inner">
            <div class="active item "> <!-- item 1 -->
                <div class="col-md-6">
                    <img src="http://placehold.it/940x120" width="450px" height="250px" alt="">
                </div>
                <div class="col-md-6">
                    <h2 class="featurette-heading">asdasFirst featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
            </div> <!-- end item -->
            <div class="item "> <!-- item 1 -->
                <div class="col-md-6">
                    <img src="http://placehold.it/940x120"  width="450px" height="250px" alt="">
                </div>
                <div class="col-md-6">
                    <h2 class="featurette-heading">AsdasFirst featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
            </div>
            <div class="item "> <!-- item 1 -->
                <div class="col-md-6">
                    <img src="http://placehold.it/940x120"  width="450px" height="250px" alt="">
                </div>
                <div class="col-md-6">
                    <h2 class="featurette-heading">DsdasFirst featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
            </div>
        </div> <!-- end carousel inner -->

    </div> <!-- end slider -->

    <div class="row" id="thumb">


        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>