@extends('layouts.app')

@section('content')
@include('components.navbar')
<style>
	
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 form-style">
            <div class="login-form">    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <div class="avatar"><p>Halo Pengadaan</p></div> --}}
                    <h4 class="modal-title">Login to Halo Pengadaan</h4>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group small clearfix">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div> 
                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">              
                </form>			
                @if (Route::has('register'))
                <div class="text-center small">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
