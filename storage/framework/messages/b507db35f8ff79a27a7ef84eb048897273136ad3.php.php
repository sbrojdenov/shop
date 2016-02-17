<?php $__env->startSection('content'); ?>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         <?php echo $__env->make('template.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-product-edit/'.$product->id)); ?> " method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>                 
                        <input name="title" value="<?php echo e($product->title); ?>" type="text" class="form-control" id="usr">
                    </div>
                    
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    
                    <div class="form-group">
                        <label for="usr">Кратко описание: </label>
                        <textarea name='summary'  class="form-control" rows="3" id="comment"><?php echo e($product->summary); ?></textarea>
                    </div>
                    
                     <div class="form-group">
                        <label for="usr">Oписание: </label>
                        <textarea name='description'  class="form-control" rows="3" id="comment"><?php echo e($product->description); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="usr">Цена: </label>
                        <input name="price" value="<?php echo e($product->price); ?>" type="text" class="form-control" id="usr">
                    </div>
                    
                      <div class="form-group">
                        <label for="usr">Код на продукта: </label>
                        <input name="code" type="text" value="<?php echo e($product->code); ?>" class="form-control" id="usr">
                    </div>

                   <div class="form-group">
                        <label for="sel1">Категория на продукта:</label>
                        <select class="form-control" id="sel1" name="category">
                           <?php foreach($category as $cat ): ?>
                            <option value="<?php echo e($cat->id); ?>" <?php if($cat->id ==$product->categories_id): ?>  selected  <?php endif; ?>><?php echo e($cat->title); ?></option>
                           <?php endforeach; ?>
                        </select>
                    </div>
                    
                    
                    <?php if(isset($product->image_url)): ?>
                    <div class="form-group">
                        <label for="comment"><img src="<?php echo e(URL::asset('admin/product/'.$product->image_url)); ?>" width="50px" height="50px"/> Картинка:</label>
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