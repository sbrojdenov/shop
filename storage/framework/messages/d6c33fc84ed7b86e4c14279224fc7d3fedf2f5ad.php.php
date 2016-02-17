<?php $__env->startSection('content'); ?>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form>
                       <?php foreach($products as $pr ): ?>


                    <div class="form-group">
                        <label for="usr">Име на продукта: </label>                 
                        <input name="title" value="<?php echo e($pr['title']); ?>" type="text" class="form-control" disabled id="usr">
                    </div>
                    
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    
                    <div class="form-group">
                        <label for="usr">Код на продукта: </label>                 
                        <input name="title" value="<?php echo e($pr['code']); ?>" type="text" class="form-control" disabled id="usr">
                    </div>
                     
                      <div class="form-group">
                        <label for="usr">Цена на продукта: </label>                 
                        <input name="title" value="<?php echo e($pr['price']); ?>" type="text" class="form-control" disabled id="usr">
                    </div>
                     <hr>
                     <?php endforeach; ?>

                    <div class="form-group">
                        <label for="usr">Имейл: </label>                 
                        <input name="title" value="<?php echo e($orders->email); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Име на клиент:</label>                 
                        <input name="title" value="<?php echo e($orders->user_name); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Телефон:</label>                 
                        <input name="title" value="<?php echo e($orders->telephone); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Количество:</label>                 
                        <input name="title" value="<?php echo e($orders->quantity); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Адрес:</label>                 
                        <input name="title" value="<?php echo e($orders->adress); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Град:</label>                 
                        <input name="title" value="<?php echo e($orders->town); ?>" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="comment">Коментар:</label>
                        <textarea class="form-control" rows="3" id="comment" disabled><?php echo e($orders->comment); ?></textarea>
                    </div>

                </form>

            </div> 
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>