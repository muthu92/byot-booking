<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Laravel">
  <meta name="author" content="Creative Tim">
  <title>Byot Booking</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo e(asset('assets/img/brand/favicon.png')); ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/nucleo/css/nucleo.css')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')); ?>" type="text/css">

  <link rel="stylesheet" href="<?php echo e(asset('css/dataTables.bootstrap4.css')); ?>">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/argon.css?v=1.2.0')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
	<?php echo $__env->yieldContent('externalStyles'); ?>
   <script src="<?php echo e(asset('assets/vendor/jquery/dist/jquery.min.js')); ?>"></script>  

</head>
	<body >
       
        <?php if(Auth::user()->user_type==1): ?>
           <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(Auth::user()->user_type==2): ?>
          <?php echo $__env->make('layouts.navigation_job', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="main-content" id="panel">
            <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			 <?php echo $__env->yieldContent('menu'); ?>
            <!-- Page content -->
            <div class="container-fluid mt--6">
		            <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->yieldContent('script'); ?>
		        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	        </div><!-- #wrapper end -->
        </div>
    
 
  <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>

  <script src="<?php echo e(asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/chart.js/dist/Chart.extension.js')); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(asset('assets/js/argon.js?v=1.2.0')); ?>"></script>
  <script src="<?php echo e(asset('js/dataTables.bootstrap4.min.js')); ?>"></script>
</body>

</html>

<?php /**PATH D:\xampp7\htdocs\byot-booking\resources\views/layouts/app.blade.php ENDPATH**/ ?>