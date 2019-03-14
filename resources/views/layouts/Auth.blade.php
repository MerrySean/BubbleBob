@extends('master')

@section('auth.navbar')
    <div class="right" style="margin-right:3rem; positition:relative;">
        <a class="dropdown-trigger btn" href="#" data-target='profileDropdown' style="">Profile</a>
        <ul id="profileDropdown" class="dropdown-content" style="">
            <li>
                <a href="/Account">Profile</a>
            </li>
            <li>
                <a href="/admin/register">Register New user</a>
            </li>
            <li>
                <a href="/logout">logout</a>
            </li>
        </ul>
    </div>
@endsection

@section('auth.sidenav')

@endsection

@section('content')
    @if (Auth::user()->user_type == "admin")
        <div class="row w-100">
            <div class="col s2">
                @include('partials.links')
            </div>
        
            <div class="col s10 text-center">
                @yield('Auth.Content')
            </div>
        </div>
    @else
        @yield('Auth.Content')
    @endif
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        /* #profileDropdown {
            display: block;
            width: auto;
            left: 88%;
            top: 82%;
        } */
    </style>
@endpush