<div class="row">
    <div class="col-lg-12">
    
        <div id="navbar-main" >
            <!-- Fixed navbar -->
            <div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><strong>Избор на език</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties): ?>
                            <li>
                                <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode)); ?>">
                                    <?php echo e($properties['native']); ?>

                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <li><a href="<?php echo e(url('/logout')); ?>"><strong>Изход</strong></a><li>
                 </ul>
                
                
            </div>
        </div>


    </div>
</div>