@php 
$dashboard_class = "";
$user_class = "";
$jobs_class = "";
$vehicletype_class = "";
$vehicle_class = "";
@endphp

@if (str_contains(Request::fullUrl(), 'dashboard'))
	@php $dashboard_class = "active" @endphp
@elseif (str_contains(Request::fullUrl(), 'users'))
	@php $user_class = "active" @endphp
@elseif (str_contains(Request::fullUrl(), 'jobs'))
	@php $jobs_class = "active" @endphp
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
	 <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

 <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/logo.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo $dashboard_class; ?>" href="{{ url('dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
 		   
            <li class="nav-item">
              <a class="nav-link <?php echo $jobs_class; ?>" href="{{ url('jobs') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Jobs Management</span>
              </a>
            </li>
          </ul>
		    
        </div>
      </div>
    </div>	 
  </nav>
@section('script')	
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
  
     var pusher = new Pusher("a0431439590a90562551", {
      cluster: "ap2",
      encrypted: true
    });

    var channel = pusher.subscribe('notification');
    channel.bind('App\\Events\\TestEvent', function(data) {
	$.ajax({
	type: 'POST',
	url: "{{url('/jobs/accept_auto')}}",
	data: {booking_id: data.booking_id,_token: "{{ csrf_token() }}"},
	dataType: 'JSON',
	success: function (results) {
	if (results.length>=1) {
		assign(results[0].id,results[0].customer_id,results[0].pickup_location,results[0].drop_location,results[0].pickup_date)
	//swal("Done!", results.message, "success");
	} else {
	//swal("Error!", results.message, "error");
	}
	}
	});
	
    });
	function accept_fun(id,status){
	 $.ajax({
type: 'POST',
url: "{{url('/jobs/assign_job')}}",
data: {id: id,status: status,_token: "{{ csrf_token() }}"},
dataType: 'JSON',
success: function (results) { 
console.log(results);
if (results.msg == 'Success') {
	swal("Booked", results.message, "success");
	 location.reload(true);

} else {
swal("Rejected", results.message, "error");
	 location.reload(true);
}
}
});
}

function assign(id,name,from,to,date) {
swal({
title: "Assign Job",
text: "Are You accept or reject",
timer:20000,
html: 	
"<table class='table align-items-center table-flush'><tr><td><label>Passanger Name:</label></td><td><h3>" + name +"</h3></td></tr>" +
 		"<tr><td><label>PickUp Location:</label></td><td><h3>" + from +
		"</h3></td></tr>" +
 		"<tr><td><label>Drop Location:</label></td><td><h3>"+ to +
		"</h3></td></tr>" +
		"<tr><td><label>Pick Up Date:</label></td><td><h3>" + date +
		"</h3></td></tr></table>" +
             "<br>" +
             '<a onclick="accept_fun('+id+',1)"><button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn" onclick="accept_fun('+id+',1)">' + 'Accept' + '</button></a>' +
            '<a onclick="accept_fun('+id+',2)"><button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn" onclick="accept_fun('+id+',2)">' + 'Reject' + '</button></a>',
			showCancelButton: false,
        showConfirmButton: false
})
}
//onclick="accept_fun('+id+',1)"
</script> 
@endsection