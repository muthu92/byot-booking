<?php /*
* File Name: recieve.blade.php
* Description: to display otp submission screen
* Created Date: 16 Nov 2017
* Created By: Naresh Shankar S <shankar@gaadizo.com>
* Modified Date & Reason: 
*/  ?>
<?php $pageTitle='OTP Verification | Gaadizo - Complete Car Care'; ?>
@extends('loginLayout.app')
@section('content')

<form id="otp-form" name="otp-form" class="nobottommargin" action="{{url('login/otpsubmit')}}" method="post">	

	<div class="row @if(count($errors)==0) hidden  @endif" id="error_div_id">
		<div class="col-xs-12">	
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ $errors->first()}}
			</div>
		</div>
	</div>
	
 {{ csrf_field() }}	
	<div class="col_full">
		<!-- Timer Starts -->
		<div class="item html" id="timer_id" @if(count($errors)>0) style="display: none;" @endif>
			<h2>0</h2>
			<svg class="svgcircle" width="160" height="160" xmlns="https://www.w3.org/2000/svg">
			 <g>
			  <title>Layer 1</title>
			  <circle id="circle" class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
			 </g>
			</svg>
		</div>
		<!-- Timer Ends -->
			<div class="col_full nobottommargin">
		<button class="button button-3d button-blue nomargin " style="@if(count($errors)==0) display:none;  @endif" id="resend_otp" name="login-form-submit" type="button" onclick="resendOtp('{{url('/login/resendotp')}}')">Resend OTP</button>
			</div>
				
		<label for="login-form-otp">Enter OTP Number</label>
		<input type="tel" onkeypress='return validateTel(event);'  id="login-form-otp" name="otp"  value="{{old('otp')}}" data-validation="number" maxlength="4" data-validation-length="4-4" data-validation-error-msg="Please enter the valid otp number" class="form-control not-dark" />
	</div>

	<div class="col_full nobottommargin">
		<button class="button button-3d button-blue nomargin" id="login-form-submit" name="login-form-submit" value="login">Submit OTP</button>
	</div>
</form>
@endsection

@section('externalScript')
	<script>
	@if(count($errors)==0)	
	$('.circle_animation').css('stroke-dashoffset', initialOffset-(1*(initialOffset/time)));
	@endif
	</script>
@endsection

