@extends('loginLayout.app')
@section('content')
<div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5 text-center">
            <img src="assets/img/logo.png" />
              <div class="text-center text-muted mb-4">
                <small>Admin Login</small>
              </div>
              <form role="form"  method="post" action="{{url('/login/submit')}}">
               @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                          @foreach ($errors->all() as $error)
                              <span class="alert-text">{{ $error }}</span>
                          @endforeach
                  </div>
              @endif
			        @csrf
					
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email" value="{{old('email')}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>

@endsection
