@extends('master')

@section('guest.navbar')
<form action="/login" method="post">
    @csrf
    <ul class="right hide-on-med-and-down" style="margin-right:2rem;">
        <li style="margin-right:2rem;">
            <div class="input-field">
                <input id="username" type="text" class="validate" name="username" style="color: white;">
                <label for="username" style="color: white;">Username</label>
            </div>
        </li>
        <li style="margin-right:2rem;">
            <div class="input-field">
                <input id="password" type="password" class="validate" name="password" style="color: white;">
                <label for="password" style="color: white;">Password</label>
            </div>
        </li>
        <li style="margin-right:2rem;">
            <button class="btn" type="submit">Login</button>
        </li>
    </ul>
</form>
@endsection

@section('guest.sidebar')
<form action="/login" method="post" class="sidenav" id="mobile-demo">
    @csrf
    <ul class="right hide-on-med-and-down" style="margin-right:2rem;">
        <li>
            <div class="input-field">
                <input id="username" type="text" class="validate white" name="username">
                <label for="username" class="">Username</label>
            </div>
        </li>
        <li>
            <div class="input-field">
                <input id="password" type="password" class="validate white" name="password">
                <label for="password">Password</label>
            </div>
        </li>
        <li>
            <button class="btn" type="submit">Login</button>
        </li>
    </ul>
</form>
@endsection

@push('styles')
<style>
    main {
        background-image: url("/Resources/Background_img.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }    

    input[type="text"]:not(.browser-default):focus:not([readonly]),
    input[type="password"]:not(.browser-default):focus:not([readonly]){
        border-bottom: 1px solid white;
    }
</style>
@endpush