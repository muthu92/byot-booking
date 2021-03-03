
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
                  <li class="breadcrumb-item active" aria-current="page">Users List</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="users/users_add" class="btn btn-sm btn-neutral">New</a>
               
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
              <h3 class="mb-0">Users List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="users_list" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
				   <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Email</th>
                    <th scope="col" class="sort" data-sort="status">Phone No</th>
                    <th scope="col">User Type</th>
					 <th scope="col">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Created Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
				<?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
          <td><span class="status"><?php echo e($key+1); ?></span></td>
                    <td>                     
                      <span class="status"><?php echo e($user->name); ?></span>
                    </td>
					
                    	<td>                     
                      <span class="status"><?php echo e($user->email); ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e($user->phone_no); ?></span>
                    </td>
				
					<td>                     
                      <span class="status">
					  <?php
				if($user->user_type==1)
					echo "Admin";
				if($user->user_type==2)
					echo "Job Assistance";
					  ?>
					 
				  </span>
                    </td>
					 <td>                     
                      <span class="status"><?php if($user->status==0||$user->status==1): ?> Active <?php else: ?> In Active <?php endif; ?></span>
                    </td>
					<td>                     
                      <span class="status"><?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($user->created_at))->format('d-m-Y h:m')); ?> </span>
                    </td>
                     
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="users/users_edit?user_id=<?php echo e($user->id); ?>">Edit</a>
						  <a class="dropdown-item" href="users/delete?id=<?php echo e($user->id); ?>">Delete</a> 
              <a class="dropdown-item" href="users/view?user_id=<?php echo e($user->id); ?>">View</a> 
                          
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
                <?php echo e($user_list->links()); ?>

            </div>
          </div>
        </div>
      </div>       
	   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script>
    $(function () {
        $('#users_list').DataTable();

        var oTable = $('#users_list1').DataTable({
            "oLanguage": {
                "sSearch": "Search"
            },
            "bPaginate": true,
            "lengthChange": true,
            "bFilter": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo e(URL::to('users/loadUsers')); ?>",
                "data": function (d) {

                }
            },
            "columns": [
                {"data": "id", visible: false},
                {"data": "name"},
                {"data": "email"},
                {"data": "phone_no"},
                {"data": "country_name"},
                {"data": "state_name"},
                {"data": "city_name"},
                {"data": "user_type"},
                {"data": "status == 1 ? 'Active':'In Active'"},
                {"data": "created_at"},
                {"data": "id"},
            ],
            'columnDefs': [
                {
                    "searchable": true,
                    "orderable": false,
                    "targets": 1,
                    "className": 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        var editHTML = data;
                        editHTML = '<a href="users/users_edit?user_id=' + full.id + '" title="Edit Users">' + data + '</a>';  
                        return editHTML;
                    } 
                },
                {
                    "searchable": true,
                    "orderable": false,
                    "targets": 10,
                    "className": 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        var editHTML = '<a href="users/users_edit?user_id=' + full.id + '" title="View user">' + data + '</a>';
                        return editHTML;
                    }
                },
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 11,
                    "className": 'dt-body-center',
                    'render': function (data, type, full, meta) {
                        var editHTML = '';
                        editHTML += '<a class="btn btn-primary btn-xs" href="users/users_edit?user_id=' + full.id + '" title="Edit"><i class="fa fa-edit"></i></a>';
                        editHTML += '<a href="users/delete?id=' + full.id + '" title="Delete" class="btn btn-danger btn-xs delete_item" title="Delete customer" data-id="' + full.id + '"><i class="fas fa-trash"></i></a>';
                        return editHTML;
                    }
                }
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {

            },
            'iDisplayLength': 25,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "order": [[0, 'desc']]
        });
        
        $('#listings').on('click', '.delete_item', function () {
            var id = $(this).data('id');
            
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to delete this listing",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
              }).then((result) => {
                if (result.value) {
                    
                    showOverlay();
                            $.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "<?php echo e(URL::route('deleteUser')); ?>",
                                data: {id: id},
                                success: function (data)
                                {
                                    hideOverlay();
                                    if (data == '1')
                                    {
                                        oTable.draw();
                                        flashMessage('s', 'Data deleted successfully');
                                    } else
                                    {
                                        flashMessage('e', 'An error occured! Please try again later.');
                                    }
                                },
                                error: handleAjaxError
                            });
                    
                }
              });

            
        });
        
        
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Users/Views/users.blade.php ENDPATH**/ ?>