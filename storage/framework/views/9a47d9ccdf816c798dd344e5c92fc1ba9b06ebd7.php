
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
                  <li class="breadcrumb-item active" aria-current="page">Vehicle Add</li>
                </ol>
              </nav>
            </div>
             
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
        <div class="col">
         <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Vehicle Add </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="<?php echo e(url('/vehicle/submit')); ?>">
                 <?php echo csrf_field(); ?>
                <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Name</label>
                        <input type="text" id="vehicle" name="vehicle_name" class="form-control" placeholder="Vehicle Name" required>
                      </div>
                      </div>
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Type</label>
                        <select name="vehicle_type" class="form-control" required>
						 <option value="" disabled selected>Select</option>
						 <?php $__currentLoopData = $vehicletype_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <option value="<?php echo e($vehicle->id); ?>" ><?php echo e($vehicle->name); ?></option>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </select>
                      </div>
					 
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Model</label>
                        <input type="text" id="vehicle_model" name="vehicle_model" class="form-control" placeholder="Vehicle Model" required>
                      </div>
                      </div>
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle no</label>
                        <input type="text" id="vehicle_no" name="vehicle_no" class="form-control" placeholder="Vehicle No" required>
                      </div>
                      </div>
                  </div>
                  <div class="row">
                   
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="<?php echo e(url('vehicle')); ?>" class="btn btn-primary my-4">Cancel</a>
				   <button type="submit" class="btn btn-primary my-4">Add</button>
                </div>
                </div>
                
					 
                  </div>
                </div>
                  
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>       
	   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Vehicle/Views/vehicle_add.blade.php ENDPATH**/ ?>