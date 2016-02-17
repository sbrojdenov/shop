<?php $__env->startSection('content'); ?>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         <?php echo $__env->make('template.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-category-edit/'.$category->id)); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>                 
                        <input name="title" value="<?php echo e($category->title); ?>" type="text" class="form-control" id="usr">
                    </div>
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label for="sel1">Избери категория:</label>
                        <select class="form-control" id="sel1" name="main_category">
                            <option value="1" <?php if($category->main_category ==1): ?>  selected  <?php endif; ?>>Главна</option>
                            <option value="2" <?php if($category->main_category ==2): ?>  selected  <?php endif; ?>>Допълнителна</option>
                            <option value="3" <?php if($category->main_category ==3): ?>  selected  <?php endif; ?>>Главна и допълнителна</option>
                        </select>
                    </div>
                     <?php if(isset($category->image_url)): ?>
                    <div class="form-group">
                        <label for="comment"><img src="<?php echo e(URL::asset('admin/category/'.$category->image_url)); ?>" width="50px" height="50px"/> Картинка:</label>
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