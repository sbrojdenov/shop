<?php $__env->startSection('content'); ?>
<div class="container">
    <div class = "row">
          <?php if(Session::has('msg')): ?>
        <div class="col-lg-12 alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong><?php echo e(Session::get('msg')); ?></strong></p>  
        </div>
        <?php endif; ?>
        <div class = "col-md-7">
            <img class="img-responsive" src="<?php echo e(url("admin/product/600x500_".$product->image_url)); ?>" alt="Chania">
        </div>
        <div class = "col-md-5">
            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#"><h3><?php echo e($product->title); ?></h3> </a>
                    <h3 class="price ">Цена : <?php echo e($product->price); ?></h3>
                    <a href = "<?php echo e(url($_lang.DIRECTORY_SEPARATOR."order/detail/".$product->slug)); ?>" class = "btn btn-primary pull-right" role = "button" >
                        <span class="glyphicon glyphicon-shopping-cart"> </span> Купи сега
                    </a>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Подобни продукти</div>
                <div class="panel-body">
                    <ul class = "list-group">
                          <?php foreach($similar as $sm): ?>
                              <li  class = "list-group-item"> <a href=""><img class="img-responsive" src="<?php echo e(url("admin/product/400x300_".$sm->image_url)); ?>" width="50px" height="50px" alt=""></a><div class="text-cont"><a href=""> <?php echo e($sm->title); ?></a></div></li>
                         <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-7">

                <p class="product-paragraph"><?php echo e($product->description); ?></p>

            </div>
        </div>
    </div>

 
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>