<?php $__env->startSection('content'); ?>
<div class="container">
   <div class = "row">
      <div class = "col-md-12">
         <?php foreach($products as $product): ?>
         <div class="panel panel-default">
            <div class="panel-body">
               <ul id="order">
                  <a href="<?php echo e(url($_lang.DIRECTORY_SEPARATOR."order/delete/".$product['id'])); ?>" id="myClose" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <li>
                     <div  style="float: left;">
                        <p><span class="order-title"><?php echo e($product['name']); ?><span>                            
                     </div>
                     <div  style="float: right;margin-right:3%;">
                        <p class="price-el">Цена: <?php echo e($product['price']); ?> лв.</p>
                     </div>
                     <!--                            <div  class="form-group" style="float: right;">
                        <select class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                            
                        </div>-->
                     <div style="float: none; clear: both;"></div>
                  </li>
               </ul>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
   <div class="panel panel-default">
      <div class="panel-heading"><strong>Бърза поръчка</strong></div>
      <div class="panel-body">
         <form role="form" action="<?php echo e(url("order/save")); ?>" method="post">     
              <?php echo csrf_field(); ?>

         <?php if(!isset($authUser)): ?>
         <div class="form-group <?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
            <input type="text" name="telephone"  value="<?php echo e(old('telephone')); ?>" class="form-control" id="usr" placeholder="Телефон">
            <?php if($errors->has('telephone')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('telephone')); ?></strong>
                </span>
           <?php endif; ?>          
         </div>
         <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="usr" placeholder="Име и фамиля">
             <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
           <?php endif; ?>  
         </div>
         <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="usr" placeholder="E-mail">
              <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
           <?php endif; ?> 
         </div>
         <div class="form-group <?php echo e($errors->has('town') ? ' has-error' : ''); ?>">
            <input type="text" name="town" value="<?php echo e(old('town')); ?>"  class="form-control" id="usr" placeholder="Град">
            <?php if($errors->has('town')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('town')); ?></strong>
                </span>
           <?php endif; ?>  
         </div>
         <div class="form-group <?php echo e($errors->has('adress') ? ' has-error' : ''); ?>">
            <input type="text" name="adress" value="<?php echo e(old('adress')); ?>" class="form-control" id="usr" placeholder="Адрес">
             <?php if($errors->has('adress')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('adress')); ?></strong>
                </span>
           <?php endif; ?>  
         </div>
         <?php endif; ?>
         <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Коментар към поръчката" rows="3" id="comment"><?php echo e(old('comment')); ?></textarea>
         </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block"><strong>Поръчай сега</strong></button> 
      </form>
          
    

   </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>