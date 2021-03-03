
<?php $__env->startSection('menu'); ?>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">My Profile</h6>
             
            </div>
            
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt--6">
      <div class="row">

        <div class="col-xl-12 order-xl-1">
          <div class="card">
           
            <div class="card-body">
            <form role="form"  method="post" action="<?php echo e(url('/users/profile/update')); ?>">
                 <?php echo csrf_field(); ?>
                <h6 class="heading-small text-muted mb-4">User information</h6>

				 <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user_edit['id']); ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="User name" value="<?php echo e($user_edit['name']); ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo e($user_edit['email']); ?>" required>
                      </div>
                    </div>
                   
                   
                   
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone No</label>
                        <input type="text" id="phone_no"name="phone_no" class="form-control" placeholder="Phone No" value="<?php echo e($user_edit['phone_no']); ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="row">
                <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Country</label>
                        <select name="country" id="country" class="form-control" >
						  <option value="1" selected>India</option>
 						            </select>
                      </div>
                    </div>
                <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">State</label>
                        <select name="state" id="state" class="form-control" >
						 <option value="" disabled selected>Select</option>
						 <?php $__currentLoopData = $state_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <option value="<?php echo e($state->id); ?>" <?php if($user_edit['state']==
							 $state->id) echo "selected"; ?>><?php echo e($state->name); ?></option>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 						 </select>
						 
                      </div>
                    </div>
					
                  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">City</label>
                        <select name="city" id="city" class="form-control" >
						 <option value="" disabled selected>Select</option>
						 <?php $__currentLoopData = $city_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <option value="<?php echo e($city->id); ?>" <?php if($user_edit['city']==
							 $city->id) echo "selected"; ?>><?php echo e($city->name); ?></option>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </select>
                      </div>
                    </div>
					
					
					
					
					
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="<?php echo e(url('users')); ?>" class="btn btn-primary my-4">Cancel</a>
				   <button type="submit" class="btn btn-primary my-4">Update</button>
                </div>



>               </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Users/Views/profile.blade.php ENDPATH**/ ?>