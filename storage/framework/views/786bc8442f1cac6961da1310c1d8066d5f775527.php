<?php 
$dashboard_class = "";
$user_class = "";
$jobs_class = "";
$vehicletype_class = "";
$vehicle_class = "";
?>

<?php if(str_contains(Request::fullUrl(), 'dashboard')): ?>
	<?php $dashboard_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'users')): ?>
	<?php $user_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'managejobs')): ?>
	<?php $jobs_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'vehicletype')): ?>
	<?php $vehicletype_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'vehicle')): ?>
	<?php $vehicle_class = "active" ?>
 <?php endif; ?>
 <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo e(asset('assets/img/logo.png')); ?>" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $dashboard_class; ?>" href="<?php echo e(url('dashboard')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $user_class; ?>" href="<?php echo e(url('users')); ?>">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">User Management</span>
              </a>
            </li>
			 <li class="nav-item">
              <a class="nav-link <?php echo $jobs_class; ?>" href="<?php echo e(url('managejobs')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Manage Booking</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link <?php echo $vehicletype_class; ?>" href="<?php echo e(url('vehicletype')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Vehicle Type</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link <?php echo $vehicle_class; ?>" href="<?php echo e(url('vehicle')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Vehicle</span>
              </a>
            </li>
			</ul>
             
        </div>
      </div>
    </div>
  </nav>
   <?php /**PATH D:\xampp7\htdocs\byot-booking\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>