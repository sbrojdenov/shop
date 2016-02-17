<?php $__env->startSection('content'); ?>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         <?php echo $__env->make('template.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider-add')); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Име: </label>
                        <input name="name" type="text" class="form-control" id="usr">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label for="usr">Oписание: </label>
                        <textarea name='description' class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    
                     <div class="form-group">
                        <label for="usr">Връзка: </label>
                        <input name="link" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="comment">Картинка:</label>
                        <input type="file" class="form-control" name="image_url" id="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-default">Запазване</button>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>