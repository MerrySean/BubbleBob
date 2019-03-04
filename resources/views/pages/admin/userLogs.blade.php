@extends('layouts.Auth')

@section('Auth.Content')
    <div class="container-fluid">
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>User Type</th>
                    <th>Log Details</th>
                    <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users_logs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->user_id}}</td>
                        <td>{{ $log->user->firstname}} {{ $log->user->lastname}}</td>
                        <td>{{ $log->user->user_type }}</td>
                        <td>{{ $log->status }}</td>
                        <td>{{ $log->created_at }}</td>
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