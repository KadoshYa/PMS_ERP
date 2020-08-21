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
             src="{{asset('PmsErp/img/logo.png')}}"
             alt="User profile picture">
             <h3>ADIKA ERP</h3>
      </div>
      <hr>
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group mb-3">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="User Name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
           
          </div>

          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
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
            <input id="email" type="text" class="form-control @error('department') is-invalid @enderror" name="department" placeholder="Department" value="{{ old('department') }}" required autocomplete="email">
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            @error('department')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
           
          </div>

          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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
          <div class="input-group mb-3">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

       
   
<hr>
      <div class="social-auth-links text-center mb-3">
        <button href="#" class="btn" style="background-color:maroon;color:white;font-weight:bolder" type="submit">
        ADIKA Register
        </button>
      </div>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="/login" class="text-center">Adika Login</a>
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


