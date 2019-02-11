@extends('layouts.admin')

@section('Auth.Content')
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                    <span class="card-title">Filter</span>
                        <div class="row">
                            <div class="col s6">
                                <div class="form-control">
                                    <label for="from">From</label>
                                    <input id="from" type="date" min="31-12-1990">
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="form-control">
                                    <label for="to">To</label>
                                    <input id="to" type="date" max="{{ date('d/m/Y') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="javascript:AddPettyCash()">Apply Filter</a>
                    </div>
                </div>
            </div>
        </div>
        <table class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Customer Address</th>
                    <th>Cash</th>
                    <th>Total Cost</th>
                    <th>Change</th>
                    <th>Transaction Date</th>
                    <th>Transacted By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="sale_single_row" >
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale['Customer']['Name'] }}</td>
                        <td>{{ $sale['Customer']['Contact'] }}</td>
                        <td>{{ $sale['Customer']['Address'] }}</td>
                        <td>{{ $sale['Details']['Cash'] }}</td>
                        <td>{{ $sale['Details']['Cost'] }}</td>
                        <td>{{ $sale['Details']['Change'] }}</td>
                        <td>{{ $sale['Details']['transaction_date'] }}</td>
                        <td>{{ $sale['Details']['transaction_by'] }}</td>
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
        .sale_single_row:hover{
            cursor: pointer;
            background-color: #0544a28c !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.sale_single_row').click(function(){
                alert('row Click')
            })




        })
    </script>
@endpush