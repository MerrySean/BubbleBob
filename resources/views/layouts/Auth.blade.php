@extends('master')

@section('content')
    <div class="wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
            <a class="navbar-brand text-white" href="/">Bubble Bob</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav my-2 my-lg-0 ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::User()->firstname . " " . Auth::User()->lastname }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                  </div>
                </li>
              </ul>
              
            </div>
          </nav>

          @yield('Auth.Content')

    </div>
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        html, body{
            background-color: aqua;
        }
    </style>
@endpush