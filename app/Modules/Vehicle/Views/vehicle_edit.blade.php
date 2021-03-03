@extends('layouts.app')
@section('menu')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Vehicle</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Vehicle</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehicle Edit</li>
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
                  <h3 class="mb-0">Vehicle Edit </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="{{url('/vehicle/update')}}">
                 @csrf
				 <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{$vehicle_edit['id']}}">
                <div class="pl-lg-4">
                  <div class="row">
                     
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Name</label>
                        <input type="text" id="vehicle" name="vehicle_name" class="form-control" placeholder="Vehicle Name" required value="{{$vehicle_edit['vehicle_name']}}">
                      </div>
                      </div>
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Type</label>
                        <select name="vehicle_type" class="form-control" required>
						 <option value="" disabled selected>Select</option>
						 @foreach ($vehicletype_list as $key=>$vehicle)
						 <option value="{{$vehicle->id}}" <?php if($vehicle_edit['vehicle_type']==
							 $vehicle->id) echo "selected"; ?> >{{$vehicle->name}}</option>
						  @endforeach
						 </select>
                      </div>
					 
                    </div>
					 <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle Model</label>
                        <input type="text" id="vehicle_model" name="vehicle_model" class="form-control" placeholder="Vehicle Model" required value="{{$vehicle_edit['vehicle_model']}}">
                      </div>
                      </div>
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vehicle no</label>
                        <input type="text" id="vehicle_no" name="vehicle_no" class="form-control" placeholder="Vehicle No" required value="{{$vehicle_edit['vehicle_no']}}">
                      </div>
                      </div>
					   
                     
                  </div>
                  <div class="row">
                   
					 
				<div class="col-lg-12"> 
					<div class="text-center">
                  
				  <a href="{{url('vehicle')}}" class="btn btn-primary my-4">Cancel</a>
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
	   
@endsection
