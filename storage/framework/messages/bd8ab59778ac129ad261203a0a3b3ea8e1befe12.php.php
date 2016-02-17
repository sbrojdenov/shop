<?php $__env->startSection('content'); ?>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         <?php echo $__env->make('template.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider-edit/'.$slaider->id)); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Име: </label>                 
                        <input name="name" value="<?php echo e($slaider->name); ?>" type="text" class="form-control" id="usr">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    
                     <div class="form-group">
                        <label for="usr">Oписание: </label>
                        <textarea name='description'  class="form-control" rows="5" id="comment"><?php echo e($slaider->description); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="usr">Връзка: </label>                 
                        <input name="link" value="<?php echo e($slaider->link); ?>" type="text" class="form-control" id="usr">
                    </div>

             
                     <?php if(isset($slaider->image_url)): ?>
                    <div class="form-group">
                        <label for="comment"><img src="<?php echo e(URL::asset('admin/slaider/'.$slaider->image_url)); ?>" width="50px" height="50px"/> Картинка:</label>
                        <input type="file" class="form-control" name="image_url" id="fileToUpload">
                    </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-default">Редактиране</button>
                </form>

            </div> 
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>