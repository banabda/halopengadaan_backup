@extends('layouts.app')

@section('content')
@include('components.navbar')
    <div>
        <chat-component :user="{{ auth()->user() }}" :role="{{ auth()->user()->getRoleNames() }}"></chat-component>
    </div>
@endsection