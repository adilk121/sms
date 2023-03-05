@extends('layouts.wrapper')
@section('content')
// content section
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('img/logo-white.png') }}" alt="Logo" />
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        @if(session()->has('failed'))
                        <div class="alert" style="color:red">
                            {{ session()->get('failed') }}
                        </div>
                    @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email" />
                                <span style="color:red">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="password" id="password" placeholder="Password" />
                                <span style="color:red">@error('password'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center forgotpass">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
