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
        <div id="bottom-row" class="row w-100">
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
                        <div class="input-simple">
                            <label class="white-text" for="cname"> Customer Name </label>
                            <input id="cname" type="text" placeholder="Name">
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
@endpush

@push('scripts')
    <script>
        var Services = {
            wash : {
                id: 0,
                name: '',
                price: 0
            },
            dry : {
                id: 0,
                name: '',
                price: 0
            },
            additionals: []
        }

        var TransactionDetails = {
            TotalCost: 0,
            customerCash: 0,
            change: 0,
            customer: {
                name: '',
                address: '',
                contact: '',
            }
        }

        var ActiveButtons = {
            additionals: []
        }

        var field = {
            wash : $('#wash'),
            wash_price : $('#wash-price'),
            dry : $('#dry'),
            dry_price : $('#dry-price'),
            total_cost : $('#total-cost'),
            cash_on_hand : $('#coh'),
            change : $('#change'),
            customer_name : $('#cname'),
            customer_address : $('#cAddress'),
            customer_contact : $('#cNumber'),
        }

        var InitFields = function (){   
            $('#wash').val('')
            $('#wash-price').val('')
            $('#dry').val('')
            $('#dry-price').val('')
            $('#total-cost').val('')
            $('#coh').val('')
            $('#change').val('')
            $('#cname').val('')
            $('#cAddress').val('')
            $('#cNumber').val('')
        }

        var clearValidations = function(){
            // Wash
                field.wash.removeClass('invalid')
                field.wash.attr('placeholder', 'WASH')
            // Dry
                field.dry.removeClass('invalid')
                field.dry.attr('placeholder', 'DRY')
            // total Cost
                field.total_cost.removeClass('invalid')
            // Cash On Hand
                field.cash_on_hand.removeClass('invalid')
                field.cash_on_hand.attr('placeholder', '')
            // Change
                field.change.removeClass('invalid')
                field.change.attr('placeholder', '0')
            // Customer Name
                field.customer_name.removeClass('invalid')
                field.customer_name.attr('placeholder', 'Name')
            // Customer Address
                field.customer_address.removeClass('invalid')
                field.customer_address.attr('placeholder', 'Address')
            // Customer Contact
                field.customer_contact.removeClass('invalid')
                field.customer_contact.attr('placeholder', 'Contact')

        }
        var UpdateFieldAdditional = function (){
            let a = $('#Additional-lists')
            a.empty()
            if(Services.additionals.length > 0){
                for (const k in Services.additionals) {
                    a.append(
                        $('<div>').addClass('input-group inline')
                            .append(
                                $('<input>').val(Services.additionals[k].name).attr('readonly', true)
                            )
                            .append(
                                $('<input>').val(Services.additionals[k].price).attr('readonly', true)
                            )
                    )
                }
            }else{
                a.append(
                    $('<div>').addClass('input-group inline')
                        .append(
                            $('<input>').attr('placeholder', 'Additional').attr('readonly', true)
                        )
                        .append(
                            $('<input>').attr('placeholder', 'Price').attr('readonly', true)
                        )
                )
            }
        }
        var ComputeTotalCost = function(){
            let total = 0
            // Add wash price
            total += Services.wash.price
            // Add Dry price 
            total += Services.dry.price
            // Add Additionals price
            let a = $('#Additional-lists')
            for (const k in Services.additionals) {
                total += Services.additionals[k].price
            }
            return total
        }
        var updateFields = function(){
            // update wash data
            let w = $('#wash')
            let wp = $('#wash-price')
            w.val(Services.wash.name);
            wp.val(Services.wash.price);
            // update Dry data
            let d = $('#dry')
            let dp = $('#dry-price')
            d.val(Services.dry.name);
            dp.val(Services.dry.price);
            // update Additional data
            UpdateFieldAdditional()
            // compute total cost
            TransactionDetails.TotalCost = ComputeTotalCost()
            $('#total-cost').text(TransactionDetails.TotalCost)
            //Update Change
            TransactionDetails.change = TransactionDetails.customerCash - TransactionDetails.TotalCost
            $('#change').val(TransactionDetails.change)

            clearValidations()
        }
        var AdditonalServiceExist = function(data){
            for (const key in Services.additionals) {
                let i = Services.additionals[key].id === data.id
                let n = Services.additionals[key].name === data.name
                let p = Services.additionals[key].price === data.price
                if (i && n && p) {
                    return true;
                }
            }
            return false;
        }
        var AllFieldsHasValue = function (){

            let result = {
                errors: {}
            }

            let c1 = Services.wash.name != ''
            if(!c1){
                result.errors.wash = 'No selected wash service'
            }
            let c2 = Services.dry.name != ''
            if(!c2){
                result.errors.dry = 'No selected dry service'
            }
            // uncomment if additional services is neccessary
            // don't forget to include c3 in result.success
            // let c3 = Services.additionals.length > 0
            // if(!c3){
            //     // TODO: ask sir maghanoy if Additional Services is neccesary...
            //     result.errors.additionals = 'No selected Additional service'
            // }
            let c4 = TransactionDetails.TotalCost > 0
            if(!c4){
                result.errors.total_cost = 'No selected Services'
            }
            let c5 = TransactionDetails.customerCash > 0
            if(!c5){
                result.errors.cash_on_hand = 'No customer cash entered'
            }
            let c6 = TransactionDetails.change >= 0
            if(!c6){
                result.errors.change = 'Customer cash is not enough'
            }
            let c7 = TransactionDetails.customer.name != ''
            if(!c7){
                result.errors.customer_name = 'No Customer Name'
            }
            let c8 = TransactionDetails.customer.address != ''
            if(!c8){
                result.errors.customer_address = 'No Customer Address'
            }
            let c9 = TransactionDetails.customer.contact != ''
            if(!c9){
                result.errors.customer_contact = 'No Customer Contact'
            }

            result.success = c1 && c2 && c4 && c5 && c6 && c7 && c8 && c9

            return result
        }
        var displayFieldErrors = function(f, e){
            // console.log(f + " : " + e) 
            let i = field[f]
            i.addClass('invalid')
            if(i.is('input')){
                i.attr('placeholder', e)
            }
        }

        var clearActiveButtons = function(){
            let w = ActiveButtons.wash
                w.removeClass('red')
                w.addClass('blue-grey')
            let d = ActiveButtons.dry
                d.removeClass('red')
                d.addClass('blue-grey')
            let a = ActiveButtons.additionals.map(function (add){
                add.removeClass('red')
                add.addClass('blue-grey')
            }) 
            Services = {
                    wash : {
                        id: 0,
                        name: '',
                        price: 0
                    },
                    dry : {
                        id: 0,
                        name: '',
                        price: 0
                    },
                    additionals: []
                }
            TransactionDetails = {
                        TotalCost: 0,
                        customerCash: 0,
                        change: 0,
                        customer: {
                            name: '',
                            address: '',
                            contact: '',
                        }
                    }
            ActiveButtons = {
                additionals: []
            }
        }  
        
        

        $(document).ready(function () {
            InitFields()
            //on click of any WASH button
            $('.btn-wash').click(function(){
                let x = $(this)
                // check if a wash button is active
                // if there was no active wash button
                if(!ActiveButtons.wash){
                    x.addClass('red')
                    x.removeClass('blue-grey')
                } else {
                    // if button pressed is not current active
                    if( x.data('id') !== Services.wash.id ) {
                        // remove button color red of old active
                        let o = ActiveButtons.wash
                        o.removeClass('red')
                        o.addClass('blue-grey')
                        // add button color red of current active
                        x.addClass('red')
                        x.removeClass('blue-grey')
                    }
                }
                // update services
                Services.wash.id = x.data('id')
                Services.wash.name = x.data('name')
                Services.wash.price = x.data('price')
                // update ActiveButton
                ActiveButtons.wash = x
                updateFields()
            })
            //on click of any DRY button
            $('.btn-dry').click(function(){
                let x = $(this)
                // check if a wash button is active
                // if there was no active wash button
                if(!ActiveButtons.dry){
                    x.addClass('red')
                    x.removeClass('blue-grey')
                } else {
                    // if button pressed is not current active
                    if( x.data('id') !== Services.dry.id ) {
                        // remove button color red of old active
                        let o = ActiveButtons.dry
                        o.removeClass('red')
                        o.addClass('blue-grey')
                        // add button color red of current active
                        x.addClass('red')
                        x.removeClass('blue-grey')
                    }
                }
                // update services
                Services.dry.id = x.data('id')
                Services.dry.name = x.data('name')
                Services.dry.price = x.data('price')
                // update ActiveButton
                ActiveButtons.dry = x
                updateFields()
            })
            //on click of any Additional button
            $('.btn-additionals').click(function(){
                let x = $(this)
                let a = { 
                    id: x.data('id'),
                    name: x.data('name'),
                    price: x.data('price')
                }
                if(!AdditonalServiceExist(a)){
                    Services.additionals.push(a)
                    ActiveButtons.additionals.push(x)
                    x.addClass('red')
                    x.removeClass('blue-grey')
                }else{
                    Services.additionals = Services.additionals.filter(d => d.id !== a.id);
                    ActiveButtons.additionals = ActiveButtons.additionals.filter( d => d[0] !== x[0])
                    x.removeClass('red')
                    x.addClass('blue-grey')
                }
                updateFields()
            })
            //cash on hand input change
            $('#coh').inputFilter(function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value)
            });
            $('#coh').keyup(function(value) {
                TransactionDetails.customerCash = Number($(this).val());
                updateFields()
            });
            $('#cname').keyup(function(){
                TransactionDetails.customer.name = $(this).val()
            })
            $('#cAddress').keyup(function(){
                TransactionDetails.customer.address = $(this).val()
            })
            $('#cNumber').inputFilter(function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99999999999)
            });
            $('#cNumber').keyup(function(){
                TransactionDetails.customer.contact = $(this).val()
            })
            $('#btn-save').click(function(){
                let check = AllFieldsHasValue()
                if(!check.success){
                    for (const key in check.errors) {
                        if (check.errors.hasOwnProperty(key)) {
                            const e = check.errors[key];
                            displayFieldErrors(key, e)
                        }
                    }
                } else {
                    M.toast(
                        {
                            html: 'Transaction Success', 
                            classes: 'rounded',
                            displayLength: 2000,
                            completeCallback: function() { 
                                InitFields()
                                clearActiveButtons()
                                updateFields()
                            }
                        }
                    )
                }
            })
        })
    </script>
@endpush