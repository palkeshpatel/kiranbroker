<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo DbView::make($rw)->field('section')->render(); ?>

    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<section id="our-testimonial" class="bglight padding_bottom">
    <div class="parallax page-header testimonial-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 col-md-12 text-center text-lg-right">
                    <div class="heading-title wow fadeInUp padding_testi" data-wow-delay="300ms">
                        <span class="whitecolor">Quisque tellus risus, adipisci</span>
                        <h2 class="whitecolor font-normal">What People Say</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="owl-carousel" id="testimonial-slider">
            <!--item 1-->
            <div class="item testi-box">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 text-center">
                        <div class="testimonial-round d-inline-block">
                            <img src="images/testimonial-1.jpg" alt="">
                        </div>
                        <h4 class="defaultcolor font-light top15"><a href="#.">John Smith</a></h4>
                        <p>UPWORK, New York</p>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                        <p class="bottom15 top90">We have a number of different teams within our agency that specialise in different areas of business so you can be sure that you won’t receive a generic service and although we boast a years and years of service.</p>
                        <span class="d-inline-block test-star">
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                </span>
                    </div>
                </div>
            </div>
            <!--item 2-->
            <div class="item testi-box">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 text-center">
                        <div class="testimonial-round d-inline-block">
                            <img src="images/testimonial-2.jpg" alt="">
                        </div>
                        <h4 class="defaultcolor font-light top15"><a href="#.">Hayden Wood</a></h4>
                        <p>FIVERR, Italy</p>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                        <p class="bottom15 top90">Trax’s customer testimonial page is another beauty. Its simple design focuses on videos and standout quotes from customers. This approach is clean, straightforward, text that can be overwhelming and easy to skip.</p>
                        <span class="d-inline-block test-star">
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> <i class="far fa-star"></i>
                                </span>
                    </div>
                </div>
            </div>
            <!--item 3-->
            <div class="item testi-box">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 text-center">
                        <div class="testimonial-round d-inline-block">
                            <img src="images/testimonial-1.jpg" alt="">
                        </div>
                        <h4 class="defaultcolor font-light top15"><a href="#.">Kevin Miller</a></h4>
                        <p>ENVATO, Australia</p>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                        <p class="bottom15 top90">Trax is a company that provides tools to help professional event planning and execution, and their customers are very happy folks! The thing I love about their customer testimonial page provides content formats.</p>
                        <span class="d-inline-block test-star">
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                </span>
                    </div>
                </div>
            </div>
            <!--item 4-->
            <div class="item testi-box">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12 text-center">
                        <div class="testimonial-round d-inline-block">
                            <img src="images/testimonial-2.jpg" alt="">
                        </div>
                        <h4 class="defaultcolor font-light top15"><a href="#.">Alina Johanson</a></h4>
                        <p>INTEL, Sidney</p>
                    </div>
                    <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                        <p class="bottom15 top90">Startup Institute is a career accelerator that allows professionals to learn new skills, take their careers in a different direction, and pursue a career they are passionate about that have completed the program.</p>
                        <span class="d-inline-block test-star">
                                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i> <i class="far fa-star"></i>
                                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\kinvestx\kinvestx-all\resources\views/pages/home.blade.php ENDPATH**/ ?>