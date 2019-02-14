@extends('layouts.Auth')

@section('Auth.Content')
    <div class="wrapper d-flex flex-column min-h-100 align-content-stretch w-100">
        {{-- TOP ROW --}}
        <div id="top-row" class="row w-100">
            {{-- WASH --}}
            <div class="col s4">
                <div class="card blue" style="max-height:400px; overflow-x:scroll">
                    <div class="card-content">
                        <span class="card-title white-text"><b>WASH</b></span>
                        @foreach ($wash as $w)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($w[0])
                                    <div class="col s6" style="padding-right:5px">
                                        <button class="btn-wash card blue-grey darken-1 card-btn" data-id="{{ $w[0]['id'] }}" data-name="{{ $w[0]['name'] }}" data-price="{{ $w[0]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $w[0]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $w[0]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($w[1])
                                    <div class="col s6" style="padding-left:5px">
                                        <button class="btn-wash card blue-grey darken-1 card-btn" data-id="{{ $w[1]['id'] }}" data-name="{{ $w[1]['name'] }}" data-price="{{ $w[1]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $w[1]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $w[1]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- WASH --}}

            {{-- DRY --}}
            <div class="col s4" style="border-left: solid blue; border-right: solid blue;">
                <div class="card blue" style="max-height:400px; overflow-x:scroll">
                    <div class="card-content">
                        <span class="card-title white-text"><b>DRY</b></span>
                        @foreach ($dry as $d)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($d[0])
                                    <div class="col s6"  style="padding-right:5px">
                                        <button class="btn-dry card blue-grey darken-1 card-btn" data-id="{{ $d[0]['id'] }}" data-name="{{ $d[0]['name'] }}" data-price="{{ $d[0]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $d[0]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $d[0]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($d[1])
                                    <div class="col s6"  style="padding-left:5px">
                                        <button class="btn-dry card blue-grey darken-1 card-btn" data-id="{{ $d[1]['id'] }}" data-name="{{ $d[1]['name'] }}" data-price="{{ $d[1]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $d[1]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $d[1]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Dry --}}

            {{-- ADDITIONAL --}}
            <div class="col s4">
                <div class="card blue" style="max-height:400px; overflow-x:scroll">
                    <div class="card-content">
                        <span class="card-title white-text"><b>ADDITIONAL</b></span>
                        @foreach ($additionals as $a)    
                            <div class="row" style="margin-bottom:0;">
                                @isset($a[0])
                                    <div class="col s6"  style="padding-right:5px">
                                        <button class="btn-additionals card blue-grey darken-1 card-btn" data-id="{{ $a[0]['id'] }}" data-name="{{ $a[0]['name'] }}" data-price="{{ $a[0]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">    
                                                <h5>{{ $a[0]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $a[0]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                                @isset($a[1])
                                    <div class="col s6"  style="padding-left:5px">
                                        <button class="btn-additionals card blue-grey darken-1 card-btn" data-id="{{ $a[1]['id'] }}" data-name="{{ $a[1]['name'] }}" data-price="{{ $a[1]['price'] }}" style="width:100%; border:none;margin: 5px 0;">
                                            <div class="card-content white-text center-align">
                                                <h5>{{ $a[1]['name'] }}</h5>
                                                <hr>
                                                <p>P {{ $a[1]['price'] }}</p>
                                            </div>
                                        </button>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Additional --}}
        </div>
        {{-- TOP ROW --}}

        
        {{-- BOTTOM ROW --}}
        <div id="bottom-row" class="row w-100 d-block">
            <div class="col s8">
                <div class="card blue">
                    <div class="card-content">
                        <span class="card-title white-text"><b>TRANSACTION</b></span>
                        {{-- Wash And Dry Selection --}}
                        <div class="row">
                            <div class="col s6">
                                {{-- Wash --}}
                                <h4>Wash</h4>
                                <div class="input-group">
                                    <input id="wash" type="text" placeholder="WASH" readonly>
                                    <input id="wash-price" type="text" placeholder="Price" readonly>
                                </div>
                            </div>
                            <div class="col s6">
                                {{-- Dry --}}
                                <h4>Dry</h4>
                                <div class="input-group">
                                    <input id="dry" type="text" placeholder="DRY" readonly >
                                    <input id="dry-price" type="text" placeholder="Price" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- Additional And Total Cost Info --}}
                        <div class="row">
                            <div id="" class="col s6">
                                {{-- Additional --}}
                                <h4>Additionals</h4>
                                <div id="Additional-lists">
                                    <div class="input-group inline">
                                        <input type="text" placeholder="Additional" readonly>
                                        <input type="text" placeholder="Price" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                {{-- total cost --}}
                                <div class="card">
                                    <div class="card-content">
                                        <span class="card-title">TOTAL COST</span>
                                        <span style="font-size:4rem;">₱</span>
                                        <h1 id="total-cost" class="center-align p-0 m-0" style="display:inline;">0</h1>
                                        <div class="row">
                                            <div class="col s6">
                                                <input id="coh" type="text">
                                                <label for="coh">Customer Cash on Hand</label>
                                            </div>
                                            <div class="col s6">
                                                <input id="change" type="text" readonly>
                                                <label for="change"> Change </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card blue">
                    <div class="card-content">
                        <span class="card-title center-align white-text">Customer Information</span>
                        <div class="input-dropdown-autocomplete">
                            <div class="input-simple">
                                <label class="white-text" for="cname"> Customer Name </label>
                                <input id="cname" type="text" placeholder="Name">
                            </div>
                            {{-- autocomplete-list-customer-containter --}}
                            <div id="alcc" class="autocomplete-list d-none">
                                <ul id="autocomplete-list-customer">
                                    {{-- list is going to be populated by Javascript --}}
                                </ul>
                            </div>
                        </div>
                        <div class="input-simple">
                            <label class="white-text" for="cAddress"> Address </label>
                            <input id="cAddress" type="text" placeholder="Address">
                        </div>
                        <div class="input-simple">
                            <label class="white-text" for="cNumber"> Contact Number </label>
                            <input id="cNumber" type="text" placeholder="Contact Number" data-length="10">
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col s12">
                                    <button id="btn-save" style="margin:5px;" class=" w-100 btn green accent-2">Save</button>
                            </div>
                            <div class="col s12">
                                    <button id="btn-cancel" style="margin:5px;" class=" w-100 btn btn  orange darken-4">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- BOTTOM ROW --}}

        {{-- bottom row hidden --}}
        <div id="bottom-row-loading" class="row w-100 d-none">
            <div class="col s8">
                <div class="card blue">
                    <div class="card-content">
                        <h1 class="center-align">
                            Loading
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card blue">
                    <div class="card-content">
                        <h1 class="center-align">
                            Loading
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- bottom row hidden --}}

        {{-- Start Receipt --}}
        <div style="width:302.362205px; margin: auto;">
            @include('pages.user.receipt')
        </div>
        {{-- End Receipt --}}
    </div>
@endsection

@push('styles')
    <!-- Styles -->
    <style>
        hr{
            color:white;
        }
        label {
            font-size: 20px;
        }
        .card-btn:hover{
            cursor: pointer;
            background-color: #5e8394 !important;
        }
        .card-btn:focus{
            background-color: #5e8394 !important;
        }
        .card-btn:active{
            background-color: #5a717b !important;
        }
        #top-row .card .card-content {
            padding: 10px;
            border-radius: 0 0 2px 2px;
        }
        #top-row{
            flex: 1 0 auto;
            position: relative;
        }
        .card-content > h5{
            margin:0;
        }
        button.card.red:hover{
            background-color:red !important;
        }
        .input-group input {
            border:none !important;
            background-image:none !important;
            background-color:white !important;
            padding-left: 10px !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
            color: black;
        }

        .input-group input::placeholder{
            color: gray;
        }

        .input-group {
            display: flex !important;
        }

        .input-group > input:nth-child(1){
            border-top-left-radius: 50px !important;
            border-bottom-left-radius: 50px !important;
        }
        .input-group > input:nth-child(2){
            border-top-right-radius: 50px !important;
            border-bottom-right-radius: 50px !important;
            width: 150px;
            border-left: 1px solid black !important;
        }
        .input-simple input{
            border:none !important;
            background-image:none !important;
            background-color:white !important;
            padding-left: 10px !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
            color: black;
            border-radius: 50px !important;
        }
        #Additional-lists {
            max-height: 500px;
            overflow: scroll;
        }
        #toast-container {
            top: 50% !important;
            right: auto !important;
            bottom: 10%;
            left:50%;  
        }
        .invalid {
            border-color: red;
            color: red;
        }
        .invalid::placeholder {
            color: red !important;
        }
    </style>
    <style>
        .input-dropdown-autocomplete{
            width: 100%;
            position: relative;
        }
        .input-dropdown-autocomplete > .input-simple{
            position: relative;
            z-index: 2;
        }
        .input-dropdown-autocomplete > .input-simple input{
            margin: 0;
        }

        .autocomplete-list {
            background-color: #fff;
            position: absolute;
            width: calc(100% + 10px);
            top: 75%;
            border: solid black 1px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .autocomplete-list > ul{
            margin-bottom: 0px;
        }
        .autocomplete-list > ul li{
            border-bottom: solid black 1px;
            padding: 5px
        }
        .autocomplete-list > ul li:hover{
            background-color: bisque
        }
        .autocomplete-list > ul li:last-child{
            border-bottom: none;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        .list-customer-details {
            background: transparent;
            border: none;
            width: 100%;
            text-align: start;
        }
    </style>

    {{-- Printing receipt styles --}}
    <link rel="stylesheet" href="/css/print.min.css">
    <link rel="stylesheet" href="/css/receipt.css">

@endpush

@push('scripts')
    {{-- Dashboard scripts --}}
    <script src="{{asset('/js/userDashboard.js')}}"></script>

    {{-- Autocomplere customer details Script --}}
    <script>
        field.customer_name.keyup(function(){
            let x = $(this).val()
            axios.get('/user/customerByName', {
                params: {
                    name: x
                }
            }).then(function(res){
                // clear list
                $('#autocomplete-list-customer').empty()
                // loop thou each customers found
                for (const key in res.data) {
                    // add items to list
                    let n = "Name: " +  res.data[key].name
                    let a = "Address: " + res.data[key].address
                    let c = "Contact: " + res.data[key].contact
                    $('#autocomplete-list-customer').append(
                        $('<li>').append(
                            $('<button>').append(
                                $('<p>').text(n)
                            ).append(
                                $('<p>').text(a)
                            ).append(
                                $('<p>').text(c)
                            )
                            .addClass('list-customer-details')
                            .attr('data-name', res.data[key].name)
                            .attr('data-address', res.data[key].address)
                            .attr('data-contact', res.data[key].contact)
                        )
                    )
                }
                // show the list
                $('#alcc').addClass('d-block')
                $('#alcc').removeClass('d-none')
                // on click of anything on the list
                $('.list-customer-details').click(function(){
                    let d = $(this)
                    // set field value
                    field.customer_name.val(d.data('name'))
                    field.customer_address.val(d.data('address'))
                    field.customer_contact.val(d.data('contact'))

                    //set transaction details field
                    TransactionDetails.customer.name =  d.data('name');
                    TransactionDetails.customer.address =  d.data('address');
                    TransactionDetails.customer.contact = d.data('contact');

                    // clear list
                    $('#autocomplete-list-customer').empty()
                    // hide autocomplete list
                    $('#alcc').addClass('d-block')
                    $('#alcc').removeClass('d-none')
                })
            })
        })
    </script>

    {{-- Print on transaction success --}}
    <script src="/js/print.min.js"></script>
    <script>
        function generateReciept(res){
            let els = {
                wash: {
                    name: $('#wash-service-name')[0],
                    price: $('#wash-service-price')[0]
                },
                dry: {
                    name: $('#dry-service-name')[0],
                    price: $('#dry-service-price')[0]
                },
                additionals: $('#additionals')[0],
                customer: {
                    name: $('#customer-name')[0],
                },
                staff: {
                    name: $('#staff-name')[0],
                },
                details: {
                    // or : $('#or-number')[0],
                    total: $('#total')[0],
                    cash: $('#cash')[0],
                    change: $('#change')[0]
                }
            }
            //update fields
            els.wash.name.textContent = Services.wash.name
            els.wash.price.textContent = Services.wash.price
            els.dry.name.textContent = Services.dry.name
            els.dry.price.textContent = Services.dry.price
            additionalPrintables()
            els.customer.name.textContent = TransactionDetails.customer.name
            els.staff.name.textContent = res.data.staff.firstname + " " + res.data.staff.lastname
            // els.details.or.textContent = TransactionDetails.TotalCost
            els.details.total.textContent = TransactionDetails.TotalCost
            els.details.cash.textContent = TransactionDetails.customerCash
            els.details.change.textContent = TransactionDetails.change
        }

        // generate additional services printables
        function additionalPrintables(){
            for (const key in Services.additionals) {
                $('#additionals').append(
                    $('<div>').addClass('col').addClass('s6').append(
                        $('<b>').addClass('additional-service-name').text(Services.additionals[key].name)
                    )
                ).append(
                    $('<div>').addClass('col').addClass('s6').addClass('text-end').append(
                        $('<span>').addClass('additional-service-price').text(Services.additionals[key].price)
                    )
                )
            }
        }

        //setup printable element block
        function printReceipt(res){
            generateReciept(res)
            printJS({ 
                    printable: 'PrintableReciept', 
                    type: 'html',
                    css: ['/css/app.css','/css/receipt.css'],
                    maxWidth: 1000,
                    documentTitle: 'Official Receipt'
                })
        }
    </script>
@endpush