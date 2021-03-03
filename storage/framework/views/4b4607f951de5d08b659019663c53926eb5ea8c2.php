
<?php $__env->startSection('menu'); ?>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Vehicle</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Vehicle</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehicle List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="vehicle/vehicle_add" class="btn btn-sm btn-neutral">New</a>
               
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Vehicle List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="vehicle">
                <thead class="thead-light">
                  <tr>
				   <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">Vehicle Name</th>
					<th scope="col" class="sort" data-sort="name">Vehicle Type</th>                    
					<th scope="col" class="sort" data-sort="name">Vehicle No</th>                    
					<th scope="col" class="sort" data-sort="name">Vehicle Model</th>                    
                    <th scope="col" class="sort" data-sort="completion">Created Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
				
                <tbody class="list">
				<?php $__currentLoopData = $vehicle_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
				 

          <td><span class="status"><?php echo e($key+1); ?></span></td>
                    <td>                     
                      <span class="status"><?php echo e($vehicle->vehicle_name); ?></span>
                    </td>
					  <td>                     
                      <span class="status"><?php echo e($vehicletype_list[$vehicle->vehicle_type]); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($vehicle->vehicle_no); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($vehicle->vehicle_model); ?></span>
                    </td>
					 
					<td>                     
                      <span class="status"><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($vehicle->created_at))->format('d-m-Y h:m')); ?>

</span>
                    </td>
                     
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="vehicle/vehicle_edit?vehicle_id=<?php echo e($vehicle->id); ?>">Edit</a>
						  <a class="dropdown-item" href="vehicle/delete?id=<?php echo e($vehicle->id); ?>">Delete</a> 
                         </div>
                      </div>
                    </td>
                  </tr>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <?php echo e($vehicle_list->links()); ?>

            </div>
          </div>
        </div>
      </div>       
	   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
    $(function () {
        $('#vehicle').DataTable();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Vehicle/Views/vehicle.blade.php ENDPATH**/ ?>