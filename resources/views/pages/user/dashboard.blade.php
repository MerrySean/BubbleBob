@extends('layouts.Auth')

@section('Auth.Content')
    <div class="wrapper">
        <div class="container-fluid p-5">
            <div class="d-flex justify-content-around">
                <div class="card bg-primary" style="width: 25rem;">
                    <div class="card-header text-white">
                        WASH
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card bg-primary" style="width: 25rem;">
                    <div class="card-header text-white">
                        DRY
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
                <div class="card bg-primary" style="width: 25rem;">
                    <div class="card-header text-white">
                        ADDITIONALS
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        
    </style>
@endpush