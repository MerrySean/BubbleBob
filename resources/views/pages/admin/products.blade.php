@extends('layouts.Auth')

@section('Auth.Content')
    <div class="container-fluid">
        <div class="card blue darken-4">
            <div class="card-content">
                <span class="card-title white-text">Products</span>
                <div class="row">
                    <div class="input-field col s4">
                        <select id="product_type" class="validate white-text">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Wash">Wash</option>
                            <option value="Dry">Dry</option>
                            <option value="Additional">Additional</option>
                        </select>
                        <label class="white-text">Product Type</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_name" style="color: white;" type="text" class="validate">
                        <label for="product_name" style="color: white;">Product Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="product_price" style="color: white;" type="text" class="validate">
                        <label for="product_price" style="color: white;">Product Price</label>
                    </div>
                    <div id="pqw" class="input-field col s4">
                        <input id="product_quantity" style="color: white;" type="text" class="validate">
                        <label for="product_quantity" style="color: white;">Product Quantity</label>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button id="product_save" class="waves-effect waves-teal btn-flat teal-text text-accent-1">ADD PRODUCT
                        <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        <div class="card blue">
            <ul id="tabs-swipe-demo" class="tabs blue darken-3">
                <li class="tab col s4"><a class="white-text active"  href="#test-swipe-1">Wash</a></li>
                <li class="tab col s4"><a class="white-text " href="#test-swipe-2">Dry</a></li>
                <li class="tab col s4"><a class="white-text " href="#test-swipe-3">Additional</a></li>
            </ul>
            <div id="test-swipe-1" class="col s12 blue">
                <table id="Wash" class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="head-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- rows added by javascript --}}
                    </tbody>
                </table>
            </div>
            <div id="test-swipe-2" class="col s12 blue">
                <table id="Dry" class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="head-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- rows added by javascript --}}
                    </tbody>
                </table>
            </div>
            <div id="test-swipe-3" class="col s12 blue">
                <table id="Additional" class="responsive-table highlight">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class="head-action">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- rows added by javascript --}}
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal_update" class="modal">
            <div class="modal-content" style="min-height: 400px;">
                <h4>Product Update</h4>
                <div class="row">
                    <div class="input-field col s4">
                        <select id="m_product_type" class="validate">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Wash">Wash</option>
                            <option value="Dry">Dry</option>
                            <option value="Additional">Additional</option>
                        </select>
                        <label>Product Type</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="m_product_name" type="text" class="validate">
                        <label class="active" for="product_name">Product Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="m_product_price" type="text" class="validate">
                        <label class="active" for="product_price">Product Price</label>
                    </div>
                    <div id="pqwu" class="input-field col s4">
                        <input id="m_product_quantity" type="text" class="validate">
                        <label class="active" for="product_quantity">Product Quantity</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a id="product_update" href="#!" class="modal-close waves-effect waves-green btn-flat">Update</a>
                <a id="product_cancel" href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            </div>
        </div>
    </div>            
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        .tabs .tab a:focus, .tabs .tab a:focus.active, .tabs .tab a.active {
            background-color: rgb(33, 150, 243);
        }
        .sidenav.sidenav-fixed {
            position: absolute;
            top: 0;
            bottom:0;
        }
        input[type="text"]:not(.browser-default):focus:not([readonly]),
        input[type="password"]:not(.browser-default):focus:not([readonly]){
            border-bottom: 1px solid white;
        }
        .card .select-dropdown{
            color:white;
        }
        .select-wrapper .caret {
            fill:rgba(255, 255, 255, 0.9);
        }

        table {
            counter-reset: rowNumber;
        }

        table tbody tr {
            counter-increment: rowNumber;
        }

        table tbody tr td:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }
        .btn{
            margin-left: 2px;
            margin-right: 2px;
        }
        .cell-action, .head-action {
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
    <script src="/js/products.js"></script>
@endpush