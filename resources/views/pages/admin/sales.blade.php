@extends('layouts.admin')

@section('Auth.Content')
    <div class="container-fluid">
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>username</th>
                    <th>User Type</th>
                    <th>User Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->firstname}} {{ $user->lastname}}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->user_type }}</td>
                        <td>{{ $user->user_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    </style>
@endpush