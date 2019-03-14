@extends('layouts.Auth')

@section('Auth.Content')
    <div class="container">
            <ul class="collection">
                <li class="collection-item avatar">
                    <i class="material-icons circle blue" style="" src="" alt="">face</i>
                    <span class="title">Firstname</span>
                    <p> {{ Auth::user()->firstname }} </p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">face</i>
                    <span class="title">Lastname</span>
                    <p>{{ Auth::user()->lastname }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">event</i>
                    <span class="title">Birthday</span>
                    <p>{{ Auth::user()->date_of_birth }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">face</i>
                    <span class="title">Age</span>
                    <p>{{ Auth::user()->age }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">location_on</i>
                    <span class="title">address</span>
                    <p>{{ Auth::user()->address }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">email</i>
                    <span class="title">email</span>
                    <p>{{ Auth::user()->email }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">developer_board</i>
                    <span class="title">contact</span>
                    <p>{{ Auth::user()->contact }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">loyalty</i>
                    <span class="title">username</span>
                    <p>{{ Auth::user()->username }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">people</i>
                    <span class="title">user type</span>
                    <p>{{ Auth::user()->user_type }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">people</i>
                    <span class="title">user status</span>
                    <p>{{ Auth::user()->user_status }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">lock_outline</i>
                    <span class="title">secret question</span>
                    <p>{{ Auth::user()->secret_question }}</p>
                </li>
                <li class="collection-item avatar">
                    <i class="material-icons circle blue">lock_open</i>
                    <span class="title">secret answer</span>
                    <p>{{ Auth::user()->secret_answer }}</p>
                </li>
                {{-- <li class="collection-item avatar">
                    <i class="material-icons circle blue">lock</i>
                    <span class="title">password</span>
                    <p>{{ Auth::user()->password }}</p>
                </li> --}}
            </ul>                
    </div>
@endsection



@push('styles')
    <!-- Styles -->
    <style>
        .sidenav.sidenav-fixed {
            position: absolute;
            top: 0;
            bottom:0;
        }
        .text-center{
            text-align: center;
        }
        ul {
            text-align: left;
        }
        ul li span.title{
            text-transform: capitalize;
        }
    </style>
@endpush