@extends('layouts.admin')

@section('Auth.Content')
    <div class="container-fluid">
        <div class="row">
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
                    <div class="card-action">
                        <a href="javascript:sortByDate()">Apply Filter</a>
                    </div>
                </div>
            </div>
        </div>
        <table id="sales" class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Cash</th>
                    <th>Total Cost</th>
                    <th>Change</th>
                    <th>Transaction DateTime</th>
                    <th>Transacted By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="sale_single_row" id="{{$sale['id']}}">
                        <td></td>
                        <td>{{ $sale['Customer']['Name'] }}</td>
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
    <div id="modal" class="modal">
        <div class="modal-content">
            <h4 id='Transaction-Title'>Transaction Title</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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
        table#sales {
            counter-reset: rowNumber;
        }
        table#sales tbody tr {
            counter-increment: rowNumber;
        }
        table#sales tbody tr td:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }
    </style>
@endpush

@push('scripts')
    <script>
        var from = ''
        var to = ''
        var ModalElem = ''
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

        var HideAllRowOnTable = function(){
            $('.sale_single_row').each(function(t){
                $(this).addClass('d-none')
            })
        }

        var ShowAllRowOnTable = function(){
            $('.sale_single_row').each(function(t){
                $(this).removeClass('d-none')
            })
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
            ModalElem = M.Modal.init($('#modal')[0]);

            // when user click on a table row
            $('.sale_single_row').click(function(){
                let id = $(this).attr('id')
                ModalElem.open();
            })
        })
    </script>
@endpush