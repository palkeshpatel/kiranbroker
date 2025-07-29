<section id="our-testimonial" class="bglight padding_bottom">
    <div class="parallax page-header testimonial-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 col-md-12 text-center text-lg-right">
                    <div class="heading-title wow fadeInUp padding_testi" data-wow-delay="300ms">

                        <h2 class="whitecolor font-normal">What People Say</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="owl-carousel" id="testimonial-slider">
            <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial_rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item testi-box">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 text-center">
                            <div class="testimonial-round d-inline-block">

                                <img src="<?php echo e(($testimonial_rw->image!='')?asset('storage/'.$testimonial_rw->image):'images/testimonial-1.jpg'); ?>" alt="">
                            </div>
                            <h4 class="defaultcolor font-light top15"><a href="#."><?php echo e($testimonial_rw->title); ?></a></h4>
                            <p><?php echo e($testimonial_rw->position); ?></p>
                        </div>
                        <div class="col-lg-6 offset-lg-2 col-md-10 offset-md-1 text-lg-left text-center">
                            <p class="bottom15 top90"><?php echo e($testimonial_rw->description); ?></p>
                            <span class="d-inline-block test-star">
                                    <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                    </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<section class="footer-options">
    <div class="container whitebox">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-6">
                <div class="widget  top60 w-100">
                    <div class="contact-box">
                        <span class="icon-contact defaultcolor"><i class="far fa-comment"></i></span>
                        <h4>Chat With Us</h4>
                        <p><a href="https://wa.me/+17042931105">WhatsApp Chat </a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="widget top60 w-100">
                    <div class="contact-box">
                        <span class="icon-contact defaultcolor"><i class="fas fa-headset"></i></span>
                        <h4>Phone Support</h4>
                        <p>(704) 293 1105</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="widget top60 w-100">
                    <div class="contact-box">
                        <span class="icon-contact defaultcolor"><i class="fas fa-map-marker-alt"></i></span>
                        <h4>Location</h4>
                        <p><a href="https://maps.app.goo.gl/EiPYS6Boej3depy29" target="_blank">19453 W Catawba Ave ste a, Cornelius, NC </a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="widget top60 w-100">
                    <div class="contact-box">
                        <span class="icon-contact defaultcolor"><i class="far fa-user"></i></span>
                        <h4>Social Media</h4>
                        <ul class="social-icons mb-sm-0 wow fadeInUp" data-wow-delay="300ms">
                            <!--<li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                            <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                            <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>-->
                            <li><a href="https://www.linkedin.com/in/kiranpatel-ccim/" target="_blank"><i class="fab fa-linkedin-in"></i> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\resources\views/helper/home_testimonials.blade.php ENDPATH**/ ?>