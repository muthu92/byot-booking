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
                  <li class="breadcrumb-item"><a href="{{url('/hostel')}}">Hostel</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Hostel View</li>
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
                  <h3 class="mb-0">Hostel View </h3>
                </div>
                 
              </div>
            </div>
            <div class="card-body">
             <form role="form"  method="post" action="{{url('/hostel/update')}}" enctype="multipart/form-data">
                 @csrf
				 <input type="hidden" name="hostel_id" id="hostel_id" value="{{$hostel_edit['id']}}">
				  <input type="hidden" name="user_id" id="user_id" value="{{$hostel_edit['user_id']}}">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Hostel Name:  </label>{{$hostel_edit['hostel_name']}}
						 
						  
                      </div>
                    </div>
                 
                   
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Email:</label>
                        {{$user_edit['email']}}
                      </div>
           </div>
					
          
          
          
          <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Phone number</label>
                        {{$user_edit['phone_no']}}
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Contact Person</label>
                        {{$user_edit['name']}}
                      </div>
                    </div>
					 
						<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Address: </label>{{$hostel_edit['address']}}
                      
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">State:</label> @if($hostel_edit["state"])
                        {{ $state_list[$hostel_edit["state"]]?$state_list[$hostel_edit["state"]]:''}}
                        @endif 
                       
					   
						 
                      </div>
                    </div>
					
                  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">City:</label> @if($hostel_edit['city'])
                        {{ $city_list[$hostel_edit['city']]?$city_list[$hostel_edit['city']]:''}}
                      @endif 
                         
                      </div>
					</div>
					
					
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Pincode:  </label>{{$hostel_edit['pincode']}}
                       
                      </div>
                    </div>
					 
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Description:</label>{{$hostel_edit['description']}}
                         
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Hostel Type:</label>  {{$hostel_edit['hostel_type']}}
                         
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Status:</label>
						@if ($hostel_edit["status"]==0||$hostel_edit["status"]==1) Active @else In Active @endif
						 
						 
                      </div>
                    </div>
					 
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Photo</label>
                          

                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Latitude:</label>  {{$hostel_edit['latitude']}}
                          
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Longitude:</label>{{$hostel_edit['longitude']}}
                          
						 

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
            $("#working").hide();
        else if ($(this).val() == 2)
            $("#working").show();
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
$('#state').trigger("change");
setTimeout(function(){$('#city option[value={{$hostel_edit["city"]}}]').attr("selected", "selected")},2000);

});
 
</script>		   
@endsection
