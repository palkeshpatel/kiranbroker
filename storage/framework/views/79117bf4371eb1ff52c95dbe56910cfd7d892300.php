
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
<!--Bootstrap Core-->
<script src="<?php echo e(asset('js/propper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!--to view items on reach-->
<script src="<?php echo e(asset('js/jquery.appear.js')); ?>"></script>
<!--Owl Slider-->
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<!--number counters-->
<script src="<?php echo e(asset('js/jquery-countTo.js')); ?>"></script>
<!--Parallax Background-->
<script src="<?php echo e(asset('js/parallaxie.js')); ?>"></script>
<!--Cubefolio Gallery-->
<script src="<?php echo e(asset('js/jquery.cubeportfolio.min.js')); ?>"></script>
<!--Fancybox js-->
<script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
<!--tooltip js-->
<script src="<?php echo e(asset('js/tooltipster.min.js')); ?>"></script>
<!--wow js-->
<script src="<?php echo e(asset('js/wow.js')); ?>"></script>
<!--Revolution SLider-->
<script src="<?php echo e(asset('js/revolution/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/jquery.themepunch.revolution.min.js')); ?>"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.actions.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.kenburn.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.layeranimation.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.migration.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.navigation.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.slideanims.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/revolution/extensions/revolution.extension.video.min.js')); ?>"></script>
<!--custom functions and script-->
<script src="<?php echo e(asset('js/functions.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/typed.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js" type="text/javascript"></script>
<?php if( in_array(last(request()->segments()),['contact-us','agreement-form','inquiry']) ): ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('SITE_KEY')); ?>"></script>

<script src="<?php echo e(asset('js/intlTelInput.js')); ?>"></script>

<script>
 ///country code with flag
 var input = document.querySelector("#phone");
        hidden= document.querySelector("#country_code");
        var iti=window.intlTelInput(input, {
            autoPlaceholder: "off",
            hiddenInput: "full_number",
            preferredCountries: ['us', 'in'],
            separateDialCode: true,
            utilsScript: "assets/js/utils.js",
        });
</script>

<script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('reCAPTCHA_site_key', {action: 'inquiry'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>
   <script src="<?php echo e(asset('js/contact.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/inquiry.js')); ?>" type="text/javascript"></script>
<?php endif; ?>


<script>
    //smooth scroll script
    $(".banner_explore_btn").click(function() {
        $('html, body').animate({
            scrollTop: $("#home_main").offset().top
        }, 500);
    });

    //banner
    $("#amenities_slider").owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 1200,
            loop: true,
            margin:20,
            nav: true,
            navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
            dots: false,
            mouseDrag: true,
            touchDrag: true,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                640: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        
$("#banner-images-slider").owlCarousel({
        items: 1,
        autoplay: 1500,
        smartSpeed: 1500,
        autoplayHoverPause: true,
        slideBy: 1,
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        responsive: {
            1200: {
                items: 1,
            },
            991: {
                items: 1,
            },
            767: {
                items: 1,
            },
            480: {
                items: 1,
            },
            0: {
                items: 1,
            },
        }
    });
/*Services Box Slider*/
$("#services-slider").owlCarousel({
        autoplay: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        smartSpeed: 1200,
        loop: true,
        margin:20,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        dots: true,
        mouseDrag: true,
        touchDrag: true,
        center: true,
        responsive: {
            0: {
                items: 1
            },
            640: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
    //banner type part
    var typednew = new Typed('#typednew', {
        strings: [
        'He is involved in NetIP (Network of Indian Professional) for Carolinas as President where he believe that this organization can help an individual connect with so many other Indian professionals locally and nationally.',
        'He has also served as board of directors on C W Williams organization.',
        'He is also an alumni of LU40 (Leaders under 40).',
        'He likes to play volleyball and is a member of Volleyball group called Organized Chaos who has ties with Breakaway Sports.'
        ],
        typeSpeed: 30,
        backSpeed: 0,
        fadeOut: true,
        loop: true
    });
    document.querySelector('.loop2').addEventListener('click', function() {
        toggleLoop(typednew);
    });
   
</script>




<?php echo $__env->yieldContent('script'); ?>
<?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\resources\views/includes/script.blade.php ENDPATH**/ ?>