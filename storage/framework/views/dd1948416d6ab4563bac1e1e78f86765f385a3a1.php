<!--Services -->
<?php if((count(Request::segments()))==0 || last(request()->segments())=='featured' ): ?>
<section class="padding_bottom_half">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center bottom20">
            <?php if( last(request()->segments())=='featured' ): ?>
                <p class="alert alert-danger no_property_list" style="display:none;">There are no Properties Listed yet!!</p>
            <?php endif; ?>
                <div class="heading-title darkcolor wow fadeInUp" data-wow-delay="300ms" style="visibility: visible;">
                    <h2 class="font-bold bottom30"> Services</h2>
                </div>
            </div>

            <div class="col-md-12">
                <div id="services-slider" class="owl-carousel services-slider-light">
                   <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                    $image=url('/storage')."/".$rw->bg_image;
                    ?>
                   <div class="item" style="background-image:url('<?php echo e($image); ?>')">
                        <div class="service-box">
                            <span class="bottom25"><i class="<?php echo e($rw->icon_class); ?>"></i></span>
                            <h4 class="bottom10"><a href="/inquiry/"><?php echo e($rw->title); ?></a></h4>
                            <p><?php echo e($rw->description); ?></p>
                           
                        </div>
                    </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php elseif((count(Request::segments()))==1): ?>
<?php if(Request::segments()[0]=='services'): ?>
<section class="services-block bglight padding_top padding_bottom_half">
    <div class="container">
        <div class="row">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 bottom20">
                    <div class="news_item shadow text-center text-md-left">
                        <div class="blog-img"><a href="/inquiry/" class="image" > <img class="img-responsive" src="<?php echo e(url('/storage')."/".$rw->bg_image); ?>" alt="Latest News" /> </a></div>
                        <div class="news_desc">
                            <h4 class="text-capitalize font-bold darkcolor bottom20"><a href="/inquiry/"><?php echo e($rw->title); ?></a></h4>
                            <p><?php echo e($rw->description); ?></p>
                            
                        </div>
                    </div>
                </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<!--Services ends-->
<?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\resources\views/helper/home_service.blade.php ENDPATH**/ ?>