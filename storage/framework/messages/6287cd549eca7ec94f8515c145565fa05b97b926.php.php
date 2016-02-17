<?php $__env->startSection('content'); ?>
<div class="container">
    <div class = "row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e($category->title); ?></h1>
        </div>
        <?php if(Session::has('message')): ?>
        <div class="col-lg-12 alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong><?php echo e(Session::get('message')); ?></strong></p>  
        </div>
        <?php endif; ?>

        <?php foreach($products as $product): ?>
        <div class = "col-sm-6 col-md-3">
            <div class = "thumbnail">
                <a href="<?php echo e(url($_lang.DIRECTORY_SEPARATOR.'product/'.$product->slug)); ?>"><img src = "<?php echo e(url("admin/product/400x300_".$product->image_url)); ?>" alt = "Generic placeholder thumbnail"></a>
            </div>

            <div class = "caption">
                <a href="<?php echo e(url($_lang.DIRECTORY_SEPARATOR.'product/'.$product->slug)); ?>"><h3><?php echo e($product->title); ?></h3></a>
                <h3 class="price"><?php echo e($product->price); ?> лв.</h3>
                <p><?php echo e($product->summary); ?></p>
                <p><strong>Код на продукта: <?php echo e($product->code); ?></strong></p>
                <p>
                    <a href = "<?php echo e(url($_lang.DIRECTORY_SEPARATOR."order/store/".$product->slug)); ?>" class = "btn btn-primary" role = "button">
                        <span class="glyphicon glyphicon-shopping-cart"> </span> Купи сега     <?php echo e(_('Translated string')); ?>

                    </a> 
                </p>

            </div>

        </div>
        <?php endforeach; ?>

    </div> 
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>