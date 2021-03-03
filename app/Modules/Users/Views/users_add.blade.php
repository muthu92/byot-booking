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
                  <li class="breadcrumb-item active" aria-current="page">Users Add</li>
                </ol>
              </nav>
            </div>
             
          </div>
        </div>
      </div>
    </div>
@endsection
@section('content')

<div class="row">
        <div class="col">
         <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Users Add </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="{{url('/users/submit')}}">
                 @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full name" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
                   
                     <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone No</label>
                        <input type="text" id="phone_no"name="phone_no" class="form-control" placeholder="Phone No" value="" required>
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
						 @foreach ($state_list as $key=>$state)
						 <option value="{{$state->id}}" >{{$state->name}}</option>
						 @endforeach
 						 </select>
						 
                      </div>
                    </div>
					
                  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">City</label>
                        <select name="city" id="city" class="form-control" >
						 <option value="" disabled selected>Select</option>
						 @foreach($city_list as $key=>$city)
						 <option value="{{$city->id}}" >{{$city->name}}</option>
						 @endforeach
						 </select>
                      </div>
                    </div>
                   
					<!--<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Pincode</label>
                        <input type="text" id="pincode"name="pincode" class="form-control" placeholder="Pincode" value="">
                      </div>
                    </div>-->
					
					
					<div class="col-lg-4" >
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">User Type</label>
                         <select name="user_type" id="user_type" class="form-control" onchange="show(this.value)">
						 <option value="" disabled selected>Select</option>
						 <option value="1" >Admin</option>
						 <option value="2" >Job Assistance</option>
						 </select>
                      </div>
                    </div>
					
					<div class="col-lg-4" id="vehiclelist" style="display:none">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-control" >
						 <option value="" disabled selected>Select</option>
						 @foreach($vehicle_list as $key=>$vehicle)
						 <option value="{{$vehicle->id}}" >{{$vehicle->vehicle_name}}</option>
						 @endforeach
						 </select>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Status</label>
                        <select name="status" class="form-control">
						 <option value="" disabled selected>Select</option>
						 <option value="1">Active</option>
						 <option value="2">In Active</option>
						 </select>
                      </div>
                    </div>
					 
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="{{url('users')}}" class="btn btn-primary my-4">Cancel</a>
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
 <script type="text/javascript">
$(document).ready(function(){
     $("#user_type").on('change',function () {
		
        if ($(this).val() == 1)
            $("#working").hide();
        else if ($(this).val() == 2)
            $("#working").show();

    });
	$("#user_type").on('change',function () {
		
        if ($(this).val() == 1)
            $("#vehiclelist").hide();
        else if ($(this).val() == 2)
            $("#vehiclelist").show();

    });
});

$('#state').on('change',function(){
  var stateID = $(this).val();  
  if(stateID){
    $.ajax({
      type:"GET",
      url:"{{url('users/get-city-list')}}?state_id="+stateID,
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
</script>
 	   
@endsection
