@extends('master')

@section('content')
    <div class="wrapper">
        <h1>hello {{ Auth::User()->firstname }} {{ Auth::User()->user_type }}</h1>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>
@endsection

@section('styles')
    <!-- Styles -->
    <style>
        
    </style>
@endsection