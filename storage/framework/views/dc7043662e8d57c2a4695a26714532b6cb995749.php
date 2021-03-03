
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
                  <li class="breadcrumb-item active" aria-current="page">Users Edit</li>
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
                 <?php echo csrf_field(); ?>
				 <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user_edit['id']); ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full name" value="<?php echo e($user_edit['name']); ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo e($user_edit['email']); ?>" required>
                      </div>
                    </div>
                   
                   
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone No</label>
                        <input type="text" id="phone_no"name="phone_no" class="form-control" placeholder="Phone No" value="<?php echo e($user_edit['phone_no']); ?>" required>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Country</label>
                        <select name="country" id="country" class="form-control" >
						  <option value="1" selected>India</option>
 						            </select>
                      </div>
                    </div>
                   <div class="col-lg-4">
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
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">User Type</label>
                         <select name="user_type" id="user_type" class="form-control">
                          <option value="1" <?php if($user_edit['user_type']=='1'): ?> selected <?php endif; ?>>Admin</option>
                          <option value="2" <?php if($user_edit['user_type']=='2'): ?> selected <?php endif; ?>>Job Assistance</option>
                          </select>
                      </div>
                    </div>
					<div class="col-lg-4" id="vehiclelist"  style="<?php if ($user_edit['user_type']==2){ echo "display:block"; }else{echo "display:none";} ?>">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-control" >
						 <option value="" disabled selected>Select</option>
						 <?php $__currentLoopData = $vehicle_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <option value="<?php echo e($vehicle->id); ?>" <?php if ($user_edit['vehicle_id']==$vehicle->id){ echo "selected"; } ?>><?php echo e($vehicle->vehicle_name); ?>

						 </option>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </select>
                      </div>
                    </div>
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Status</label>
                        <select name="status" class="form-control">
						 <option value="" disabled selected>Select</option>
						 <option value="1" <?php if($user_edit['status']==1): ?> selected <?php endif; ?>>Active</option>
						 <option value="2" <?php if($user_edit['status']==2): ?> selected <?php endif; ?>>In Active</option>
						 </select>
                      </div>
                    </div>
					
					 
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="<?php echo e(url('users')); ?>" class="btn btn-primary my-4">Cancel</a>
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
<script type="text/javascript">

$(document).ready(function(){
//if(@php $user_edit['')
     $("#user_type").on('change',function () {
          if ($(this).val() == 1)
            $("#vehiclelist").hide();
        else if ($(this).val() == 2)
            $("#vehiclelist").show();
    });
	
	 



$('#state').on('change',function(){
  var stateID = $(this).val();  
  if(stateID){
    $.ajax({
      type:"GET",
      url:"<?php echo e(url('users/get-city-list')); ?>?state_id="+stateID,
      success:function(res){        
      if(res){
        $("#city").empty();
		$("#city").append('<option value="" disabled selected>Select</option>');
        $.each(res,function(key,value){
          $("#city").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#city").empty();
      }
      }
    });
  }else{
    $("#city").empty();
  }
});
$('#state').trigger("change");
setTimeout(function(){$('#city option[value=<?php echo e($user_edit["city"]); ?>]').attr("selected", "selected")},2000);

});
 
</script>	   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Users/Views/users_edit.blade.php ENDPATH**/ ?>