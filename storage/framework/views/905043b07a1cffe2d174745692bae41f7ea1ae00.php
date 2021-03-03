
<?php $__env->startSection('menu'); ?>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Sub Category</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sub Category Edit</li>
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
                  <h3 class="mb-0">Sub Category Edit </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="<?php echo e(url('/subcategory/update')); ?>">
                 <?php echo csrf_field(); ?>
				 <input type="hidden" name="sub_id" id="sub_id" value="<?php echo e($subcategory_edit['id']); ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Sub Category Name</label>
                        <input type="text" id="subcategory_name" name="subcategory_name" class="form-control" placeholder="Sub Category Name" value="<?php echo e($subcategory_edit['sub_category_name']); ?>" required>
                      </div>
                      </div>
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Category Name</label>
                        <select name="category_id" class="form-control">
						 <option value="" disabled selected required>Select</option>
						 <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 
 						 <option value="<?php echo e($category->id); ?>" 
						 <?php if($subcategory_edit['category_id']==
							 $category->id) echo "selected"; ?> ><?php echo e($category->category_name); ?></option>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </select>
                      </div>
                    </div>
                     
                  </div>
                  <div class="row">
                   
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="<?php echo e(url('subcategory')); ?>" class="btn btn-primary my-4">Cancel</a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Vehicle/Views/Vehicle_edit.blade.php ENDPATH**/ ?>