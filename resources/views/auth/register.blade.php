@extends('layouts.app')
@section('content')
@include('components.navbar')

<div class="back-register">
    <div class="the-row justify-content-center">
        <div class="col-md-6 register">
            <div class="register-form">    
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- <div class="avatar"><p>Halo Pengadaan</p></div> --}}
                    <div class="title d-md-flex">
                        <a class="modal-title" href="/">Halopengadaan</a>
                        <h4 class="modal-register ml-auto my-auto">Registration Form</h4>
                    </div>
                    <div class="form-group">
                        <h5>Full Name</h5>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h5>Email</h5>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="d-flex password">
                        <div class="form-group w-50 p-1">
                            <h5>Password</h5>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group w-50 p-1">
                            <h5>Password Confirmation</h5>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div> 

                    </div>
                    <div class="btn-div">
                        <input type="submit" class="btn btn-submit btn-block btn-lg" value="Register">              
                    </div>
                </form>			
                @if (Route::has('register'))
                <div class="medium mt-2">Have an account? <a href="{{ route('login') }}" class="font-weight-bold">Sign In</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
