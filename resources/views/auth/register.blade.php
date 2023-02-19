@extends('layouts.wrapper')
@section('content')    <div class="main-wrapper login-body">
      <div class="login-wrapper">
        <div class="container">
          <div class="loginbox">
            <div class="login-left">
              <img
                class="img-fluid"
                src="{{ asset('img/logo-white.png') }}"
                alt="Logo"
              />
            </div>
            <div class="login-right">
              <div class="login-right-wrap">
                <h1>Register</h1>
                <p class="account-subtitle">Access to our dashboard</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                  <div class="form-group">
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Name" name="name"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Email" name="email"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Password" name="password"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      class="form-control"
                      type="text" name="password_confirmation"
                      placeholder="Confirm Password"
                    />
                  </div>
                  <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">
                      Register
                    </button>
                  </div>
                </form>

                <div class="login-or">
                  <span class="or-line"></span>
                  <span class="span-or">or</span>
                </div>


                <div class="text-center dont-have">
                  Already have an account? <a href="login.html">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
