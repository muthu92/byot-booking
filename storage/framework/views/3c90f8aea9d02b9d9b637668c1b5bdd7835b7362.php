
<?php $__env->startSection('menu'); ?>

    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users View</li>
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
                  <h3 class="mb-0">Users Edit </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="<?php echo e(url('/users/update')); ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                       <?php echo e($user_edit['name']); ?>

                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address: </label>
                        <?php echo e($user_edit['email']); ?>

                      </div>
                    </div>
                   
                
                    <div class="col-lg-4">
                      <div class="form-group">
                      <label class="form-control-label" for="input-email">Phone Number:</label>
                        <?php echo e($user_edit['phone_no']); ?>

                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Country</label>
                        India
                      </div>
                    </div>
                   <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">State</label>
						 <?php $__currentLoopData = $state_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <?php if($user_edit['state']==$state->id) echo $state->name; ?>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 						 </select>
						 
                      </div>
                    </div>
					
                  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">City</label>
						 <?php $__currentLoopData = $city_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <?php if($user_edit['city']==
							 $city->id) echo $city->name; ?>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">User Type</label>
                           <?php if($user_edit['user_type']=='2'): ?> Hostel Admin <?php elseif($user_edit['user_type']=='4'): ?>  Staff
                           <?php endif; ?>
                      </div>
                    </div>
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Status</label>
                         <?php if( $user_edit['status']==1): ?> Active <?php endif; ?>
					 <?php if($user_edit['status']==0): ?> In Active <?php endif; ?>
                      </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Users/Views/view.blade.php ENDPATH**/ ?>