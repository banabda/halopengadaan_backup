@extends('layouts.app')
@section('content')
@include('components.navbar')
<div class="back-login">
    <div class="the-row justify-content-center">
        <div class="col-md-6 login">
            <div class="login-form">    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <div class="avatar"><p>Halo Pengadaan</p></div> --}}
                    <div class="title d-md-flex">
                        <a class="modal-title" href="/">Halopengadaan</a>
                        <h4 class="modal-login ml-auto my-auto">Login Form</h4>
                    </div>
                    <div class="form-group">
                        <h5>Email</h5>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h5>Password</h5>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="w-100 d-md-flex">
                        <div class="btn-div">
                            <input type="submit" class="btn btn-submit btn-block btn-lg" value="Login">
                        </div>              
                        <div class="form-group clearfix">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> --}}
                            @if (Route::has('password.request'))
                                <a class="forgot-link font-weight-bold" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>			
                @if (Route::has('register'))
                <div class="medium mt-2">Don't have an account? <a href="{{ route('register') }}" class="font-weight-bold">Sign up</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
