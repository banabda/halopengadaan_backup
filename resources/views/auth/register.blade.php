@extends('layouts.app')

@section('content')
@include('components.navbar')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 form-style">
            <div class="login-form">    
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- <div class="avatar"><p>Halo Pengadaan</p></div> --}}
                    <h4 class="modal-title">Register to Halopengadaan</h4>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div> 
                    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Register">              
                </form>			
                @if (Route::has('register'))
                <div class="text-center small">Have an account? <a href="{{ route('login') }}">Sign In</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
