@extends('master')

@section('content')
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">BUBBLE BOB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline my-2 my-lg-0 ml-auto" action="/login" method="POST">
                @csrf
                <label for="username" class="mr-3">Username : </label>
                <input id="username"  class="form-control mr-sm-2" name="username" type="text" placeholder="Username" aria-label="Username">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                <label for="password" class="ml-4 mr-3">Password : </label>
                <input id="password"  class="form-control mr-sm-2" name="password" type="password" placeholder="Password" aria-label="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
              </form>
            </div>
        </nav>
        <div class="background-image">
        </div>
        <footer class="text-light bg-primary text-center">
            <span id="date-part">time</span>
            <span id="time-part">time</span>
        </footer>
    </div>
@endsection

@section('styles')
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
            margin: 0;
            max-height: 100%;
            overflow: hidden;
        }

        .wrapper{
            height: 100vh;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .background-image{
            position: relative;
            height: 100%;
            width: 100%;
            background-image: url('/Resources/Background_img.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        footer {
            height: 50px;
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var interval = setInterval(function() {
                var momentNow = moment();
                $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                                    + momentNow.format('dddd')
                                    .substring(0,3).toUpperCase());
                $('#time-part').html(momentNow.format('A hh:mm:ss'));
            }, 100);
        });
    </script>    
@endpush