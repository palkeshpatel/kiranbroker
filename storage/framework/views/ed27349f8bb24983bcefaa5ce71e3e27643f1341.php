<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg <?php echo e((Request::is('/'))?'transparent-bg':''); ?>  static-nav">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('images/logo-white.png')); ?>" alt="logo" class="<?php echo e((Request::is('/'))?'logo-default':'logo-scrolled'); ?>">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" class="<?php echo e((!Request::is('/'))?'logo-default':'logo-scrolled'); ?>">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <?php $__currentLoopData = json_decode(menu('front-end','_json')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($menu_rw->url=="/properties"): ?>
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo e($menu_rw->title); ?> </a>
                            <div class="dropdown-menu">
								<a class="dropdown-item" href="/properties/Investment-opportunities">Investment-Opportunities</a>
                                <a class="dropdown-item" href="/properties/available">Available</a>
                                <a class="dropdown-item" href="/properties/past">Past</a>
                              
                                                          
                                <?php $__currentLoopData = \App\Models\PropertyClass::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property_class_rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--<a class="dropdown-item" href="<?php echo e($menu_rw->url); ?>/<?php echo e($property_class_rw->slug); ?>"><?php echo e($property_class_rw->title); ?></a>-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e($menu_rw->url); ?>"><?php echo e($menu_rw->title); ?></a>
                            </li>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span></span> <span></span> <span></span>
        </a>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hotel-management">Hotel Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projects">Projects</a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Properties </a>
                        <div class="dropdown-menu">
							<a class="dropdown-item" href="/properties/Investment-opportunities">Investment-Opportunities</a>
                            <a class="dropdown-item" href="/properties/available">Available</a>
                            <a class="dropdown-item" href="/properties/past">Past</a>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact Us</a>
                    </li>
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <!--<li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>-->
                    <li><a href="https://www.linkedin.com/in/kiranpatel-ccim/" target="_blank"><i class="fab fa-linkedin"></i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);" title="Close!"></a>
    <!-- End side menu -->
</header>
<?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\kinvestx\kinvestx-all\resources\views/includes/header.blade.php ENDPATH**/ ?>