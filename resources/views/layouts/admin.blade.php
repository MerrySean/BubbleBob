@extends('master')

@section('auth.navbar')
    <div class="right" style="margin-right:3rem;">
        <a class="dropdown-trigger btn" href="#" data-target='profileDropdown' style="">Profile</a>
        <ul id="profileDropdown" class="dropdown-content" style="">
            <li>Profile</li>
            <li>Account Settings</li>
            <li>
                <a href="/logout">logout</a>
            </li>
        </ul>
    </div>
@endsection

@section('auth.sidenav')

@endsection

@section('content')
    <div class="row w-100">
        <div class="col s2">
            @include('partials.links')
        </div>
  
        <div class="col s10 text-center">
            @yield('Auth.Content')
        </div>
    </div>
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        
    </style>
@endpush