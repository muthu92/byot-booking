@extends('layouts.app')
@section('menu')
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
@endsection
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Users List</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
				   <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Email</th>
                    <th scope="col" class="sort" data-sort="status">Phone No</th>
                    <th scope="col" class="sort" data-sort="status">Country</th>
                    <th scope="col" class="sort" data-sort="status">State</th>
                    <th scope="col" class="sort" data-sort="status">City</th>
                    <th scope="col">User Type</th>
					 <th scope="col">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Created Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
				@foreach ($user_list as $key=>$user)
                <tr>
          <td><span class="status">{{ $key+1 }}</span></td>
                    <td>                     
                      <span class="status">{{ $user->name }}</span>
                    </td>
					
                    	<td>                     
                      <span class="status">{{ $user->email }}</span>
                    </td>
					<td>                     
                      <span class="status">{{ $user->phone_no }}</span>
                    </td>
					<td>                     
                      <span class="status">{{ $user->country="India" }}</span>
                    </td>
                    <td>                   
                      <span class="status">
                        @if($user->state)
                        {{ $state_list[$user->state]?$state_list[$user->state]:''}}
                        @endif
                        </span>
                    </td>
                    <td>                     
                      <span class="status">
                      @if($user->city)
                        {{ $city_list[$user->city]?$city_list[$user->city]:''}}
                      @endif
                       </span>
                    </td>
					<td>                     
                      <span class="status">
					  <?php
if($user->user_type==1)
	echo "Super Admin";
if($user->user_type==2)
	echo "Hostel Admin";
if($user->user_type==3)
	echo "Customer";
if($user->user_type==4)
	echo "Staff";
					  ?>
					 
				  </span>
                    </td>
					 <td>                     
                      <span class="status">@if ($user->status==0||$user->status==1) Active @else In Active @endif</span>
                    </td>
					<td>                     
                      <span class="status">{{ \Carbon\Carbon::createFromTimestamp(strtotime($user->created_at))->format('d-m-Y h:m')}} </span>
                    </td>
                     
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="users/users_edit?user_id={{$user->id}}">Edit</a>
						  <a class="dropdown-item" href="users/delete?id={{$user->id}}">Delete</a> 
                          
                        </div>
                      </div>
                    </td> 
                  </tr> 
				   @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
                {{ $user_list->links() }}
            </div>
          </div>
        </div>
      </div>       
	   
@endsection
