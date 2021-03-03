@extends('layouts.app')
@section('menu')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Hostel</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Hostel</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hostel Add</li>
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
        <div class="col-12">
         <div class="col-xl-12 order-xl-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="mb-0">Hostel Add </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="{{url('/hostel/submit')}}" enctype="multipart/form-data">
                 @csrf
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-username">Hostel Name</label>
                        <input type="text" id="hostel_name" name="hostel_name" class="form-control" placeholder="HostelName" required>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-last-name">Hostel Type</label>
                        <select id="hostel_type"name="hostel_type" class="form-control" required>
                          <option value="">Select</option>
                          @foreach($staycategory as $data)
                          <option value="{{ $data->id }}">{{ $data->name }}</option>
                          @endforeach
                        <!-- <option value="Dormitory">Dormitory</option>
                        <option value="Hostel">Hostel</option> -->
                        </select> 
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Photo</label>
                         <input type="file" class="form-control" name="photo[]" multiple >

                      </div>
                    </div>
                  
                  
                  <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-last-name">State</label>
                        <select name="state" id="state" class="form-control" required>
						 <option value="" disabled selected>Select</option>
						 @foreach ($state_list as $key=>$state)
						 <option value="{{$state->id}}" >{{$state->name}}</option>
						 @endforeach
 						 </select>
						 
                      </div>
                    </div>
					
                  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-first-name">City</label>
                        <select name="city" id="city" class="form-control" required>
						 <option value="" disabled selected>Select</option>
						 @foreach($city_list as $key=>$city)
						 <option value="{{$city->id}}" >{{$city->name}}</option>
						 @endforeach
						 </select>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-username">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-username">Phone number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number" required>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label required" for="input-username">Contact Person</label>
                        <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person" required>
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Pincode</label>
                        <input type="text" id="pincode"name="pincode" class="form-control" placeholder="Pincode" value="">
                      </div>
                    </div>
					
					          
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Status</label>
                        <select name="status" class="form-control">
						 <option value="" disabled selected>Select</option>
						 <option value="1">Active</option>
						 <option value="2">In Active</option>
						 </select>
                      </div>
                    </div>
					 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Latitude</label>
                         <input type="text" class="form-control"  name="latitude" >
						 

                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Longitude</label>
                         <input type="text" class="form-control"  name="longitude" >
						 

                      </div>
					  
					 </div>
					 <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Address</label>
                       <!-- <input type="text" id="address" name="address" class="form-control" placeholder="Address">-->
						<textarea class="form-control" name="address" id="address"></textarea>
                      </div>
                    </div>
					
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Description</label>
                        <!--<input type="text" id="description"name="description" class="form-control" placeholder="Description" value="">-->
						
						<textarea class="form-control" name="description" id="description"></textarea>
                      </div>
                    </div>
					
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="{{url('hostel')}}" class="btn btn-primary my-4">Cancel</a>
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
