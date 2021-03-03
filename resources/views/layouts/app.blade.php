<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Laravel">
  <meta name="author" content="Creative Tim">
  <title>Byot Booking</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">

  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
	@yield('externalStyles')
   <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>  

</head>
	<body >
       
        @if(Auth::user()->user_type==1)
           @include('layouts.navigation')
        @elseif(Auth::user()->user_type==2)
          @include('layouts.navigation_job')
        @endIf
        <div class="main-content" id="panel">
            @include('layouts.navbar')
			
			 @yield('menu')
            <!-- Page content -->
            <div class="container-fluid mt--6">
		            @yield('content')
                @yield('script')
		        @include('layouts.footer')

	        </div><!-- #wrapper end -->
        </div>
    
 
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
</body>

</html>

