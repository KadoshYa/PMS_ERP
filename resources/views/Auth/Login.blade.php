@extends('PmsErp.layouts.intro')

@section('content')



<section class="content" style="margin-top:100px">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
    <div class="card-body login-card-body">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{asset('PmsERP/img/Logo.png')}}"
             alt="User profile picture">
             <h3>ADIKA ERP</h3>
      </div>
      <hr>
      <form method="POST" action="{{ route('login') }}" class="form-login" style="margin-top:0px;" >
        @csrf

        <div class="input-group mb-3">


          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
       
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="text-center">

            <div class="icheck-primary">
       
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
              
            </div>

        </div>
   
<hr>
      <div class="social-auth-links text-center mb-3">
        <button href="#" class="btn" style="background-color:maroon;color:white;font-weight:bolder" type="submit">
           ADIKA Login
        </button> 
      </div>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </form>
    </div>
    <!-- /.login-card-body -->
  </div>
        </div>

    <div class="col-md-4"></div>
  </div>
</section>

@endsection
