
<?php $__env->startSection('menu'); ?>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Vehicle Type</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Vehicle Type</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehicle Type Edit</li>
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
                  <h3 class="mb-0">Vehicle Type Edit </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="<?php echo e(url('/vehicletype/update')); ?>">
                 <?php echo csrf_field(); ?>
				  <input type="hidden" name="vehicletype_id" id="vehicletype_id" value="<?php echo e($vehicletype_edit['id']); ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-username">Vehicle Type</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Vehicle Type" value="<?php echo e($vehicletype_edit['name']); ?>" required>
                      </div>
                    </div>
					 
                     
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Status</label>
                        <select name="status" class="form-control">
						 <option value="" disabled selected>Select</option>
						 <option value="1" <?php if($vehicletype_edit['status']==1): ?> selected <?php endif; ?>>Active</option>
						 <option value="2" <?php if($vehicletype_edit['status']==2): ?> selected <?php endif; ?>>In Active</option>
						 </select>
                      </div>
                    </div>
                     
                  </div>
                  <div class="row">
                   
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="<?php echo e(url('vehicletype')); ?>" class="btn btn-primary my-4">Cancel</a>
				   <button type="submit" class="btn btn-primary my-4">Update</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Vehicletype/Views/vehicletype_edit.blade.php ENDPATH**/ ?>