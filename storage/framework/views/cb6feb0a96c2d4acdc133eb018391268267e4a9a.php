<?php 
$dashboard_class = "";
$user_class = "";
$building_class = "";
$floor_class = "";
$rooms_class = "";
$facilities_class = "";
$roomtype_class = "";

$category_class = "";
$subcategory_class = "";
$subscription_class = ""; 
$hostel_class = ""; 
$customer_class = ""; 
$staff_class = ""; 
$task_class = ""; 
$faci_class = ""; 
$room_class = ""; 
?>

<?php if(str_contains(Request::fullUrl(), 'dashboard')): ?>
	<?php $dashboard_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'users')): ?>
	<?php $user_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'building')): ?>
	<?php $building_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'floor')): ?>
	<?php $floor_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'room')): ?>
	<?php $rooms_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'facilities')): ?>
	<?php $facilities_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'roomtype')): ?>
	<?php $roomtype_class = "active" ?>	
<?php elseif(str_contains(Request::fullUrl(), 'subcategory')): ?>
	<?php $subcategory_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'category')): ?>
	<?php $category_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'subscription')): ?>
	<?php $subscription_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'hostel')): ?>
	<?php $hostel_class = "active" ?>	
<?php elseif(str_contains(Request::fullUrl(), 'customer')): ?>
	<?php $customer_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'staff')): ?>
	<?php $staff_class = "active" ?>	
<?php elseif(str_contains(Request::fullUrl(), 'task')): ?>
	<?php $task_class = "active" ?>
<?php elseif(str_contains(Request::fullUrl(), 'faci')): ?>
	<?php $faci_class = "active" ?>	
<?php elseif(str_contains(Request::fullUrl(), 'room')): ?>
	<?php $room_class = "active" ?>	
<?php endif; ?>


 <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo e(asset('assets/img/brand/blue.png')); ?>" class="navbar-brand-img" alt="...">
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
          </ul>
		  <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $user_class; ?>" href="<?php echo e(url('Hosteluser')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">User Management</span>
              </a>
            </li>
          </ul>
		  <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $building_class; ?>" href="<?php echo e(url('Building')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Building Management</span>
              </a>
            </li>
          </ul>
		  <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $floor_class; ?>" href="<?php echo e(url('Floor')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Floor Management</span>
              </a>
            </li>
          </ul>
		   <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $roomtype_class; ?>" href="<?php echo e(url('RoomType')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Room Type Management</span>
              </a>
            </li>
          </ul>
		  <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $rooms_class; ?>" href="<?php echo e(url('RoomManage')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Room Management</span>
              </a>
            </li>
          </ul>
		  <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $facilities_class; ?>" href="<?php echo e(url('HostelFacility')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Manage Facilities</span>
              </a>
            </li>
          </ul>
		 
		  
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Assets</span>
          </h6>
          <ul >
          <ul class="navbar-nav">
			<li class="nav-item">
              <a class="nav-link <?php echo $category_class; ?>" href="<?php echo e(url('category')); ?>">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link <?php echo $subcategory_class; ?>" href="<?php echo e(url('subcategory')); ?>">
                <i class="ni ni-folder-17 text-orange"></i>
                <span class="nav-link-text">Sub Category</span>
              </a>
            </li>
			</ul>
      <li class="nav-item">
              <a class="nav-link <?php echo $task_class; ?>" href="<?php echo e(url('room')); ?>">
                <i class="ni ni-istanbul text-yellow"></i>
                <span class="nav-link-text">Room</span>
              </a>
            </li>

			<li class="nav-item">
              <a class="nav-link <?php echo $staff_class; ?>" href="<?php echo e(url('staff')); ?>">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Staff</span>
              </a>
            </li>
			<li class="nav-item">
              <a class="nav-link <?php echo $task_class; ?>" href="<?php echo e(url('task')); ?>">
                <i class="ni ni-ui-04 text-yellow"></i>
                <span class="nav-link-text">Task Management</span>
              </a>
            </li>

			
			<li class="nav-item">
              <a class="nav-link <?php echo $room_class; ?>" href="<?php echo e(url('room')); ?>">
                <i class="ni ni-ui-04 text-yellow"></i>
                <span class="nav-link-text">Room Management</span>
              </a>
            </li>
		
			
          </ul>
           
        </div>
      </div>
    </div>
  </nav><?php /**PATH D:\xampp7\htdocs\byot-booking\resources\views/layouts/navigation_hostel.blade.php ENDPATH**/ ?>