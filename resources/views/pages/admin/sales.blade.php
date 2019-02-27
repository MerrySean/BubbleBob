@extends('layouts.admin')

@section('Auth.Content')
    <div class="container-fluid">
        <div class="row">
            @isset ($MinDate->created_at)
                <div class="col s12">
                    <div class="card blue darken-4">
                        <div class="card-content white-text">
                        <span class="card-title">Filter</span>
                            <div class="row">
                                <div class="col s6">
                                    <div class="form-control">
                                        <label for="from" class="header-1">From</label>
                                        <input id="from" type="text" data-min="{{ $MinDate->created_at }}">
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="form-control">
                                        <label for="to" class="header-1">To</label>
                                        <input id="to" type="text" data-max="{{ $MaxDate->created_at }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action d-flex justify-content-between">
                            <a href="javascript:sortByDate()">Apply Filter</a>
                            <a href="javascript:printReceipt()">Print</a>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
        <table id="sales" class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Cash</th>
                    <th>Total Cost</th>
                    <th>Change</th>
                    <th>Transacted On</th>
                    <th>Transacted By</th>
                </tr>
            </thead>
            <tbody id="sales_table_body">
                @foreach ($sales as $sale)
                    <tr class="sale_single_row" id="{{$sale['id']}}">
                        <td></td>
                        <td>{{ $sale['Customer']['Name'] }}</td>
                        <td>{{ $sale['Details']['Cash'] }}</td>
                        <td>{{ $sale['Details']['Cost'] }}</td>
                        <td>{{ $sale['Details']['Change'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($sale['Details']['transaction_date'])->toDayDateTimeString() }}</td>
                        <td>{{ $sale['Details']['transaction_by'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('pages.admin.Salesreports')

    <div id="transactionDetailsModal" class="modal">
        <div class="modal-content">
            <h4 id='Transaction-Title'>Transaction Title</h4>
            <hr>
            <div id="products">
                <ul>
                    <li> 
                        <p class="product-title">WASH</p>
                        <ol>
                            <li>
                                <div class="d-flex justify-content-between w-25">
                                    <span id="wash-product-name"></span>
                                    <span>&#8369; <span id="wash-product-price"></span></span>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <p class="product-title">DRY</p>
                        <ol>
                            <li>
                                <div class="d-flex justify-content-between w-25">
                                    <span id="dry-product-name"></span>
                                    <span>&#8369; <span id="dry-product-price"></span></span>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <p class="product-title">ADDITIONALS</p>
                        <ol id="additionals">
                        </ol>
                    </li>
                    <li>
                        <p class="product-title">Transaction Details</p>
                        <ol class="t-details">
                            <li>
                                <div class="d-flex justify-content-between w-25">
                                    <span>TOTAL</span>
                                    <span>&#8369; <span id="total-price"></span></span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between w-25">
                                    <span>Customer Cash</span>
                                    <span>&#8369; <span id="customer-cash"></span></span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between w-25" style="border-top:1px solid black;">
                                    <span>Change</span>
                                    <span>&#8369; <span id="customer-change"></span></span>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
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
        table#sales,table#sales_report {
            counter-reset: rowNumber;
        }
        table#sales tbody tr ,table#sales_report tbody tr {
            counter-increment: rowNumber;
        }
        table#sales tbody tr td:first-child::before, table#sales_report tbody tr td:first-child::before{
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }
        /* modals */
        .modal .product-title {
            font-weight: bold;
            border-bottom: 1px solid black;
        }  
        .modal #additionals li div {
            display: flex;
            justify-content: space-between;
            width: 25%; 
        }
        .modal ol {
            list-style-type: none;
        }
    </style>
    {{-- Printing receipt styles --}}
    <link rel="stylesheet" href="/css/print.min.css">
    <link rel="stylesheet" href="/css/receipt.css">
@endpush

@push('scripts')
    <script>
        var from = ''
        var to = ''
        var ModalElem = ''
        var modalItems = {
            title : $('#Transaction-Title'),
            total: $('#total-price'),
            cash: $('#customer-cash'),
            change: $('#customer-change'),
            wash: {
                title: $('#wash-product-name'),
                price: $('#wash-product-price')
            },
            dry: {
                title: $('#dry-product-name'),
                price: $('#dry-product-price')
            },
            additionals : $('#additionals'),
        }

        // sort table
        var sortByDate = function (){
            // console.log(from.toString('YYYY-MM-DD'))
            let f = from.toString('YYYY-MM-DD')
            let t = to.toString('YYYY-MM-DD')
            if(f == '' || t == ''){
                console.log(f == '')
                console.log(t == '')
            }else{
                let model = 'Transaction'
                let query = '';
                if(f != ''){
                    query += `From=${f}&`;
                }
                if(t != ''){
                    query += `To=${t}`;
                }
                axios.get(`/admin/filter/${model}?${query}`).then(function(res){
                    // make sure that all rows on table is showing
                    ShowAllRowOnTable()
                    // then hide it all
                    HideAllRowOnTable()
                    // finally show only rows that is between filtered dates
                    for(const x of res.data){
                        $('#'+x.id).removeClass('d-none');
                    }
                    $.notify.defaults({ className: "success" });
                    $.notify("Filter Done",{ position:"right" });
                })
            }
        }

        // hide all rows on table
        var HideAllRowOnTable = function(){
            $('.sale_single_row').each(function(t){
                $(this).addClass('d-none')
            })
        }

        // shows all rows on table
        var ShowAllRowOnTable = function(){
            $('.sale_single_row').each(function(t){
                $(this).removeClass('d-none')
            })
        }

        // get transaction details by id
        var GetTransactionDetails = async function (id){
            return axios.get(`/admin/Sales/${id}`).then(function(res){
                // handle Success
                return res.data;
            })
        }

        // Make modal ready to be shown with new data
        var FormatModal = function (d) {
            console.log(d);
            let date = moment(d.Details.transaction_date.date).format('MMMM Do YYYY');
            modalItems.title.text(`${d.Customer.Name} - ${date}`)
            // Wash
            modalItems.wash.title.text(d.transactions.Wash.name)
            modalItems.wash.price.text(d.transactions.Wash.price)
            // Dry
            modalItems.dry.title.text(d.transactions.Dry.name)
            modalItems.dry.price.text(d.transactions.Dry.price)
            // Additionals
            modalItems.additionals.html('')
            d.transactions.Additional.forEach(element => {
                modalItems.additionals.append(
                    $('<li>').append(
                        $('<div>').append(
                            $('<span>').text(element.name)
                        ).append(
                            $('<span>').html('&#8369; ').append(
                                $('<span>').text(element.price)
                            )
                        )
                    )
                )
            });
            // Total
            modalItems.total.text(d.Details.Cost)
            modalItems.cash.text(d.Details.Cash)
            modalItems.change.text(d.Details.Change)
        }

        $(document).ready(function(){
            // init datetime pickers
            // global variable var
            from = new Pikaday({ 
                field: $('#from')[0],
                format: 'MMM D YYYY'
            });            
            // global variable var
            to = new Pikaday({
                field: $('#to')[0],
                format: 'MMM D YYYY'
            });

            // get min / max dates base on data
            min = moment($('#from').attr('data-min')).toDate()
            max = moment($('#to').attr('data-max')).toDate()

            // set minimum / maximum date for From & To datepicker
            from.setMinDate(min);
            from.setMaxDate(max);
            to.setMinDate(min);
            to.setMaxDate(max);

            // Set default dates for both filters
            from.setDate(min)
            to.setDate(max)

            // Save Modal Instance Globally .. this modal will be used to show Products under each transactions
            ModalElem = M.Modal.init($('#transactionDetailsModal')[0]);

            // when user click on a table row
            $('.sale_single_row').click(async function(){
                let id = $(this).attr('id')
                // get transaction Details
                let Details = await GetTransactionDetails(id)
                // check if wash exist in object context
                if(Details.transactions.Wash){
                    // format the modal with data from server
                    FormatModal(Details);
                    // Show Modal
                    ModalElem.open();
                }else{
                    $.notify("No Transaction Details found",{ position:"right" ,className: "error"});
                }
            })
        })

        
    </script>

    {{-- Print Transactions --}}
    <script src="/js/print.min.js"></script>
    <script>
        var generateReport = function (){
            $('#reports_table_body').html($('#sales_table_body').html())
        }
        //setup printable element block
        function printReceipt(){
            generateReport()
            printJS({ 
                    printable: 'PrintableReport', 
                    type: 'html',
                    css: ['/css/app.css','/css/receipt.css'],
                    maxWidth: 1000,
                    documentTitle: 'Sales Report'
                })
        }
    </script>
@endpush