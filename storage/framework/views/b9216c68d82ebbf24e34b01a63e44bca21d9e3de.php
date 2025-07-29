<!DOCTYPE html>
<html lang="en">
<head>
   <?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <style>
.email_verify_btn {
	position:relative;
} 
.email_verify_btn .btn {
	position: absolute;
    top: 6px;
    right: 5px;
    padding: 2px 12px;
    font-size: 12px;
}
</style>
</head>
<?php if(! Request::segment(1)): ?>
<body class="home_page">
<?php else: ?>
<body >
<?php endif; ?>

      <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\clients\Palkesh\kiranbroker\resources\views/layouts/default.blade.php ENDPATH**/ ?>