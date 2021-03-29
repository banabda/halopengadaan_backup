@extends('layouts.app')

@section('content')
<div class="back-register-narasumber">
    <div class="the-row justify-content-center">
        <div class="col-md-4 register-narasumber">
            <div class="register-narasumber-form">
                <form method="POST" id="createNarasumber" action="{{ route('narasumber.register.save') }}">
                    @csrf
                    {{-- <div class="avatar"><p>Halo Pengadaan</p></div> --}}
                    <div class="title d-flex">
                        <a class="modal-title" href="/">Halopengadaan</a>
                        <h4 class="modal-register-narasumber ml-auto my-auto">Register Form For <b>Narasumber</b></h4>
                    </div>
                    <div class="form-group">
                        <h4>Full Name</h4>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h4>Email</h4>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
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
                    <div class="btn-div w-25">
                        <button class="btn btn-submit btn-block btn-lg" >Register</button>
                    </div>
                    {{-- <input type="submit" class="btn btn-primary btn-block btn-lg" value="Register"> --}}
                </form>
                @if (Route::has('register'))
                <div class="medium">Have an account? <a href="{{ route('login') }}"  class="font-weight-bold">Sign In</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
