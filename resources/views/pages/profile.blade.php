@extends('layouts.Auth')

@section('Auth.Content')
    <h1>Profile</h1>
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
    </style>
@endpush