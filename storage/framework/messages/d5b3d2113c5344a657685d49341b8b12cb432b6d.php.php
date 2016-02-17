<?php $__env->startSection('content'); ?>
<div class="container">
    <div class = "row">
        <div class = "col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul id="order">
                        <li>
                            <div style="float: left;">
                                <img class="img-responsive" src="http://placehold.it/50x50" alt="2013 Toyota Tacoma" id="itemImg">
                            </div>
                            <div  style="float: left;">
                                <p><span class="order-title">Toyota Tacoma<span> <a href="">Информация за доставаката</a></p>                             
                            </div>
                            
                              <div style="float: right;">
                                <p class="price-el">Цена: 35 лв.</p>                             
                            </div>

                            <div  class="form-group" style="float: right;">
                                <select class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>                            
                            </div>

                          
                            <div style="float: none; clear: both;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
<div class="panel panel-default">
    <div class="panel-heading"><strong>Бърза поръчка</strong></div>
 <div class="panel-body">
      
 <div class="form-group">
     <input type="text" class="form-control" id="usr" placeholder="Телефон">
</div>
 <div class="form-group">
     <input type="text" class="form-control" id="usr" placeholder="Име и фамиля">
</div>
 <div class="form-group">
     <input type="text" class="form-control" id="usr" placeholder="E-mail">
</div>

 <div class="form-group">
     <input type="text" class="form-control" id="usr" placeholder="Град">
</div> 

 <div class="form-group">
     <input type="text" class="form-control" id="usr" placeholder="Адрес">
</div>
     
 <div class="form-group">
    <textarea class="form-control" placeholder="Коментар към поръчката" rows="3" id="comment"></textarea>
</div>

 <div class="form-group">
    <select class="form-control" id="sel1">
     <option value="" disabled selected hidden>Избери начин на доставка</option>
    <option>На адрес</option>
  
  </select>
</div> 
     <button type="button" class="btn btn-primary btn-block"><strong>Поръчай сега</strong></button>    
 </div>
 </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>