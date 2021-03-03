
<?php $__env->startSection('menu'); ?>
  
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Manage Booking</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Manage Booking</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Booking List</li>
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
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Manage Booking List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="jobs_list">
                <thead class="thead-light">
                  <tr>
				            <th scope="col" class="sort" data-sort="name">No</th>
							 <th scope="col" class="sort" data-sort="name">Booking Time</th>
							 <th scope="col" class="sort" data-sort="name">Booking PickUp Time</th>
							 <th scope="col" class="sort" data-sort="name">Trip Id</th>
                    <th scope="col" class="sort" data-sort="name">Passanger</th>
                    <!-- <th scope="col">Description</th>-->
                    <th scope="col">Driver</th>
					<th scope="col">Vehicle</th>
					<th scope="col">Pickup Location</th>
					<th scope="col">Drop Location</th>
                     <th scope="col">Status</th>
                     
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
				<?php $__currentLoopData = $jobs_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$jobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
					<td><span class="status"><?php echo e($key+1); ?></span></td>
					<td>                     
                      <span class="status">					  <?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($jobs->created_at))->format('d-m-Y h:m')); ?> 
					  </span>
                    </td>
					<td>                     
                      <span class="status">
					  <?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($jobs->pickup_date))->format('d-m-Y h:m')); ?>

					  </span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($jobs->trip_id); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($jobs->customer_name); ?>

					 </span>
                    </td>
					<td>                     
                      <span class="status"> 
					  <?php echo e($jobs->job_assistance); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($jobs->vehicle_type); ?><br><?php echo e($jobs->vehicle_name); ?> <?php echo e($jobs->vehicle_no); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($jobs->pickup_location); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($jobs->drop_location); ?></span>
                    </td>
                    
					<td>                     
                      <span class="status"><?php if($jobs->status==0): ?> <span style="color:red"> Not Assigned  </span><?php else: ?> <span style="color:green">On Trip</span> <?php endif; ?></span>
                    </td>
					
					<td> <?php   if($jobs->status==0){?>                  
					<span class="status" onclick="assign('<?php echo e($jobs->id); ?>','<?php echo e($jobs->customer_name); ?>','<?php echo e($jobs->pickup_location); ?>','<?php echo e($jobs->drop_location); ?>','<?php echo e($jobs->pickup_date); ?>')"><img src="<?php echo e(asset('assets/img/car.png')); ?>" style="    width: 50px;height: 37px;"></img></span><?php } ?>
                    </td>
					 
                  </tr>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </tbody>
              </table>
            </div>
			
            <!-- Card footer -->
            <div class="card-footer py-4">
               
            </div>
          </div>
        </div>
      </div>
<div id="job_select" style="display:none;">
 <select name="job_assistance" id="job_assistance" class="form-control" >
<option value="" disabled selected>Select</option>
<?php $__currentLoopData = $job_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($job->id); ?>" ><?php echo e($job->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>	  
	   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<style>
.customSwalBtn{
		background-color: rgba(214,130,47,1.00);
    border-left-color: rgba(214,130,47,1.00);
    border-right-color: rgba(214,130,47,1.00);
    border: 0;
    border-radius: 3px;
    box-shadow: none;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    font-weight: 500;
    margin: 30px 5px 0px 5px;
    padding: 10px 32px;
	}
</style>
<script>
$(function () {
	$('#jobs_list').DataTable();
});
   
function accept_fun(id,status){
	var job_assistance=$("#job_assistance").val();
	 $.ajax({
type: 'POST',
url: "<?php echo e(url('/managejobs/assign_job')); ?>",
data: {id: id,job_assistance: job_assistance,status: status,_token: "<?php echo e(csrf_token()); ?>"},
dataType: 'JSON',
success: function (results) {
if (results.success === true) {
	location.reload(true);
//swal("Done!", results.message, "success");
} else {
	location.reload(true);
//swal("Error!", results.message, "error");
}
}
});
}

function assign(id,name,from,to,date){
	var select=$('#job_select').html();
swal({
title: "Assign Job",
text: "Are You accept or reject",
html: 	
		"<table class='table align-items-center table-flush'><tr><td><label>Passanger Name:</label></td><td><h3>" + name +"</h3></td></tr>" +
 		"<tr><td><label>PickUp Location:</label></td><td><h3>" + from +
		"</h3></td></tr>" +
 		"<tr><td><label>Drop Location:</label></td><td><h3>"+ to +
		"</h3></td></tr>" +
		"<tr><td><label>Pick Up Date:</label></td><td><h3>" + date +
		"<tr><td><label>Job Assistance:</label></td><td>"+select+"</td></tr></table>" +
             "<br>" +
            '<a onclick="accept_fun('+id+',1)"><button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn" onclick="accept_fun('+id+',1)">' + 'Accept' + '</button></a>' +
            '<a onclick="accept_fun('+id+',2)"><button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn" onclick="accept_fun('+id+',2)">' + 'Reject' + '</button></a>',
		showCancelButton: false,
        showConfirmButton: false
})
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Managejobs/Views/managejobs.blade.php ENDPATH**/ ?>