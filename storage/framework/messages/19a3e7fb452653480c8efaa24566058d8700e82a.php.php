<?php $__env->startSection('content'); ?>
<div class="container">
      <?php if(Session::has('msg')): ?>
        <div class="col-lg-12 alert alert-success">
<!--            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
            <p><strong><?php echo e(Session::get('msg')); ?></strong></p>  
        </div>
        <?php endif; ?>
    <div id="myCarousel" class="carousel slide row"> <!-- slider -->
        <div class="carousel-inner">
            <?php foreach($slaider as $key=>$slaid ): ?>
            <div class="<?php if($key==0): ?> active <?php endif; ?> item"> <!-- item 1 -->
                <div class="col-md-6">
                    <a href="<?php echo e($slaid->link); ?>"><img src="<?php echo e(url("admin/slaider/450x250_".$slaid->image_url)); ?>"  alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo e($slaid->link); ?>"><h2 class="featurette-heading"><?php echo e($slaid->name); ?></h2></a>
                    <p class="lead"><?php echo e($slaid->description); ?></p>
                </div>
            </div> 
            
           <?php endforeach; ?>

        </div> <!-- end carousel inner -->

    </div> <!-- end slider -->

    <div class="row" id="thumb">

        <?php foreach($othercat as $other): ?>
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="<?php echo e(url($_lang.DIRECTORY_SEPARATOR.'category/'.$other->slug)); ?>">
                <img class="img-responsive" src="<?php echo e(url("admin/category/400x300_".$other->image_url)); ?>"  alt="">
            </a>
        </div>
       <?php endforeach; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>