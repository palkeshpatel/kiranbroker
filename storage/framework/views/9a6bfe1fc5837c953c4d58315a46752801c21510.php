<section id="main-banner-area" class="position-relative">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="rev_creative" class="rev_slider fullwidthabanner white" data-version="5.4.1">
            <ul>
                <!-- SLIDE 1 -->
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-index="rs-0<?php echo e($key+1); ?>" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="0<?php echo e($key+1); ?>">
                    <!-- MAIN IMAGE -->
                    <div class="overlay overlay-dark opacity-5"></div>
                       <img src="<?php echo e(str_replace('\\', '/', asset('storage/'.$banner_row->image))); ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina />
                       <div class="banner_content" style="display: none;">
                            <h2>India's 1st AI Data Center</h2>
                            <a href="https://kinvestx.com/projects_detail/invest-in-india-s-first-ai-dedicated-data-center" class="btn btn-primary">Read More</a>
                       </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <span href="#home_main" class="banner_explore_btn">Explore <i class="fa fa-angle-down"></i></span>
</section><?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\kinvestx\kinvestx-all\resources\views/helper/home_banner.blade.php ENDPATH**/ ?>