<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 
	<title>Customer Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
  
</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Book a Car</h1>
						</div>
		@if (session()->has('message'))
		<div class="alert alert-info">
		{{ session('message') }}
		</div>
		@endif
						<form name="customer" id="customer" method="post" action="{{url('/customer/submit')}}" 	>
						 @csrf
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
									 
										<span class="form-label">Name</span>
										<input class="form-control" type="text" placeholder="Enter your name" required    title="Please Enter your name" id="customer_name" name="customer_name">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" placeholder="Enter your email"  title="Please Enter your Email" required id="email_id" name="email_id">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Mobile</span>
								<input class="form-control" type="tel" placeholder="Enter your Mobile number" title="Please Enter your Mobile" required id="mobile_no" name="mobile_no">
							</div>
							<div class="form-group">
								<span class="form-label">Pickup Location</span>
								<input class="form-control" type="text" placeholder="Enter Pickup Location" required id="pickup" name="pickup">
							</div>
							<div class="form-group">
								<span class="form-label">Destination</span>
								<input class="form-control" type="text" placeholder="Enter Drop Location" required id="drop" name="drop">
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<span class="form-label">Pickup Date</span>
										<input class="form-control" type="datetime-local" required id="pickup_date" name="pickup_date" value="<?php echo date('Y-m-d\TH:i'); ?>">
									</div>
								</div>
								
							</div>
							<input type="hidden" name="latitude" id="latitude" >
							<input type="hidden" name="longitude" id="longitude" >
							<div class="form-btn">
								<button class="submit-btn" id="send-message" type="submit">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
 
</html>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  
//var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    //x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
getLocation();
function showPosition(position) {
	$("#latitude").val(position.coords.latitude);
	$("#longitude").val(position.coords.longitude);
 
} 
</script>
<style>
.section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Montserrat', sans-serif;
	background-image: url('assets/img/background.jpg');
	background-size: cover;
	background-position: center;
}

#booking::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	background: rgba(0, 0, 0, 0.6);
}

.booking-form {
	max-width: 642px;
	width: 100%;
	margin: auto;
}

.booking-form .form-header {
	text-align: center;
	margin-bottom: 25px;
}

.booking-form .form-header h1 {
	font-size: 58px;
	text-transform: uppercase;
	font-weight: 700;
	color: #ffc001;
	margin: 0px;
}

.booking-form>form {
	background-color: #101113;
	padding: 30px 20px;
	border-radius: 3px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 15px;
}

.booking-form .form-control {
	background-color: #f5f5f5;
	border: none;
	height: 45px;
	border-radius: 3px;
	-webkit-box-shadow: none;
	box-shadow: none;
	font-weight: 400;
	color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
	color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
	color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
	color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	bottom: 6px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: #101113;
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	color: #fff;
	font-size: 12px;
	font-weight: 400;
	margin-bottom: 5px;
	display: block;
	text-transform: uppercase;
}

.booking-form .submit-btn {
	color: #101113;
	background-color: #ffc001;
	font-weight: 700;
	height: 50px;
	border: none;
	width: 100%;
	display: block;
	border-radius: 3px;
	text-transform: uppercase;
}
</style>
