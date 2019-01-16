@extends('layouts.admin')

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
                    <div id="product_quantity_wrapper" class="input-field col s4">
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
        <table id="products_table" class="responsive-table highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- rows added by javascript --}}
            </tbody>
        </table>
        <!-- Modal Structure -->
        <div id="modal_update" class="modal">
            <div class="modal-content">
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
                        <label for="product_name">Product Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="m_product_price" type="text" class="validate">
                        <label for="product_price">Product Price</label>
                    </div>
                    <div id="product_quantity_wrapper" class="input-field col s4">
                        <input id="m_product_quantity" type="text" class="validate">
                        <label for="product_quantity">Product Quantity</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Update</a>
            </div>
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
    </style>
@endpush

@push('scripts')
    <script>

        var product = {
            type: '',
            name: '',
            price: '',
            quantity: ''
        }

        var ToUpdateProduct = {
            type: '',
            name: '',
            price: '',
            quantity: ''
        }

        var initProduct = function(){
            product.type = $('#product_type').val()
            product.name = $('#product_name').val()
            product.price = $('#product_price').val()
            product.quantity = $('#product_quantity').val()
        }

        var handleQuantityWrapper = function(){
            if(product.type == 'Additional'){
                $('#product_quantity_wrapper').show()
            }else{
                $('#product_quantity_wrapper').hide()
            }
        }

        var UpdateModalOpen = function (id){
            const s = $("#products_table").find('tbody').find('#'+id)
            console.log(s)
        }

        var TableAddRow = function (data){
            $("#products_table").find('tbody')
                .append($('<tr>').attr('id', data.id)
                    .append($('<td>')
                        .text('')
                    ).append($('<td>')
                        .text(data.name)
                    ).append($('<td>')
                        .text(data.type_of_product)
                    ).append($('<td>')
                        .text(data.price)
                    ).append($('<td>')
                        .text(data.quantity)
                    ).append($('<td>')
                        .append($('<a>')
                            .addClass('waves-effect waves-light btn modal-trigger')
                            .text('Update')
                            .attr("href", "#modal_update")
                            .attr("data-id" , data.id)
                        ).append($('<button>')
                            .addClass('btn red darken-2')
                            .text('Delete')
                        )
                    )
                );
        }

        var updateTable = function (){
            axios.get('/admin/getProducts',product).then(function(res){
                for (const x in res.data) {
                    if (res.data.hasOwnProperty(x)) {
                        TableAddRow(res.data[x])
                    }
                }
            })
        }

        $(document).ready(function(){
            $('.modal').modal({
                onOpenStart: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
                    UpdateModalOpen($(trigger).data('id'))
                },
            });
            initProduct()
            handleQuantityWrapper()
            updateTable()
            //handle type change
            $('#product_type').change(function(){
                product.type = $(this).val()
                handleQuantityWrapper();
            })
            //handle price change
            $("#product_name").change(function(){
                product.name = $(this).val()
            });
            //handle price change
            $("#product_price").change(function(){
                product.price = $(this).val()
            });
            //handle quantity change
            $("#product_quantity").change(function(){
                product.quantity = $(this).val()
            });

            // set input filter
            $("#product_price").inputFilter(function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value);
            });
            $("#product_quantity").inputFilter(function(value) {
                return /^\d*$/.test(value)
            });

            // Save Product
            $("#product_save").click(function(){
                axios.post('/admin/product',product).then(function(res){
                    TableAddRow(res.data)
                })
            })

        })
    </script>
@endpush