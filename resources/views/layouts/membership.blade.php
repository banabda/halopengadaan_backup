@extends('layouts.app')

@section('content')
@include('components.navbar')
<div class="container" style="margin-top: 100px">
    <div class="row align-self-center mx-auto">
        <div class="col-md-6 text-center">
            @include('components.membership-card', ['title'=>'card1', 'p1'=>'ini paragraph 1'])
        </div>
        <div class="col-md-6 text-center">
            @include('components.membership-card', ['title'=>'card1', 'p1'=>'ini paragraph 1'])
        </div>
    </div>
</div>
@endsection