var product = {
    type: '',
    name: '',
    price: '',
    quantity: ''
}

var ToUpdateProduct = {
    id: '',
    type: '',
    name: '',
    price: '',
    quantity: ''
}

var fields = {
    update: {
        type: $('#m_product_type'),
        name: $('#m_product_name'),
        price: $('#m_product_price'),
        quantity: $('#m_product_quantity')
    }
}

var initProduct = function(){
    product.type    = $('#product_type').val()
    product.name    = $('#product_name').val()
    product.price   = $('#product_price').val()
    product.quantity = $('#product_quantity').val()
}

var handleQuantityWrapper = function(){
    if(product.type == 'Additional'){
        $('#pqw').show()
    }else{
        $('#pqw').hide()
    }
}

var handleQuantityWrapperUpdate = function () {
    if(ToUpdateProduct.type == 'Additional'){
        $('#pqwu').show()
    }else{
        $('#pqwu').hide()
    }
}

var UpdateModalOpen = function (type , id){
    // find row in table
    const s = $("#"+type).find('tbody').find('#'+id)
    // get data from row
    ToUpdateProduct.id = id
    ToUpdateProduct.type = type
    ToUpdateProduct.name = $(s[0]).data('name')
    ToUpdateProduct.price = $(s[0]).data('price')
    if(type == "Additional") {
        ToUpdateProduct.quantity = $(s[0]).data('quantity')
    }

}

var TableAddRow = function (data, id){
    if(id !== 'Additional'){
        $("#"+id).find('tbody')
        .append($('<tr>').attr('id', data.id)
            .append($('<td>')
                .text('')
            ).append($('<td>')
                .text(data.name)
                .addClass('cell-name')
            ).append($('<td>')
                .text(data.price)
                .addClass('cell-price')
            ).append($('<td>')
                .append($('<a>')
                    .addClass('waves-effect waves-light btn modal-trigger')
                    .text('Update')
                    .attr("href", "#modal_update")
                    .attr("data-id" , data.id)
                    .attr("data-type" , data.type_of_product)
                ).append($('<a>')
                    .addClass('product-delete btn red waves-effect waves-light darken-2')
                    .attr("data-id" , data.id)
                    .attr("data-type" , data.type_of_product)
                    .attr("data-name" , data.name)
                    .attr("onclick" , "DeleteProduct(this)")
                    .text('Delete')
                )
                .addClass('cell-action')
            )
            .attr("data-name" , data.name)
            .attr("data-price" , data.price)
        );
    } else {
        $("#"+id).find('tbody')
            .append($('<tr>').attr('id', data.id)
                .append($('<td>')
                    .text('')
                ).append($('<td>')
                    .text(data.name)
                    .addClass('cell-name')
                ).append($('<td>')
                    .text(data.price)
                    .addClass('cell-price')
                ).append($('<td>')
                    .text(data.quantity)
                    .addClass('cell-quantity')
                ).append($('<td>')
                    .append($('<a>')
                        .addClass('waves-effect waves-light btn modal-trigger')
                        .text('Update')
                        .attr("href", "#modal_update")
                        .attr("data-id" , data.id)
                        .attr("data-type" , 'Additional')
                    ).append($('<button>')
                        .addClass('product-delete btn red darken-2')
                        .text('Delete')
                    )
                    .addClass('cell-action')
                )
                .attr("data-name" , data.name)
                .attr("data-price" , data.price)
                .attr("data-quantity" , data.quantity)
            );
    }
}

var TableUpdateRow = function (p){
    console.log(p)
    const s = $("#"+p.type_of_product).find('tbody').find('#'+p.id)
    s.find('.cell-name').text(p.name)
    s.find('.cell-price').text(p.price)
    if(p.type_of_product == 'Additional'){
        s.find('.cell-quantity').text(p.quantity)
    }
}

var TableRemoveRow = function (p){
    $("#"+p.type).find('tbody').find('#'+p.id).remove();
}

var updateTable = function (table_id){
    let r = '';
    if(table_id == 'Wash'){
        r = '/admin/getProducts/wash';
    }else if (table_id == 'Dry'){
        r = '/admin/getProducts/dry';
    }else if (table_id == 'Additional') {
        r = '/admin/getProducts/additional';
    }
    axios.get(r,product).then(function(res){
        for (const x in res.data) {
            if (res.data.hasOwnProperty(x)) {
                TableAddRow(res.data[x], table_id)
            }
        }
    })
}

var initUpdateFields = function() {
    fields.update.type.val(ToUpdateProduct.type)
    fields.update.name.val(ToUpdateProduct.name)
    fields.update.price.val(ToUpdateProduct.price)
    fields.update.quantity.val(ToUpdateProduct.quantity)

    fields.update.type.change(function(){
        ToUpdateProduct.type = $(this).val()
        handleQuantityWrapperUpdate()
    })
    fields.update.name.change(function(){
        ToUpdateProduct.name = $(this).val()
    })
    fields.update.price.change(function(){
        ToUpdateProduct.price = $(this).val()
    })
    fields.update.quantity.change(function(){
        ToUpdateProduct.quantity = $(this).val()                
    })
    fields.update.type.formSelect()
    M.updateTextFields();
    handleQuantityWrapperUpdate()
}

var DeleteProduct = function(th){
    let b = $(th)
    const f = confirm("Are you sure you want to delete "+ b.data('name') + " ?")
    if(f){
        let i = b.data('id')
        let t = b.data('type')
        axios.post('/admin/delete/product',{ id: i }).then(function(res){
            TableRemoveRow({ type: t, id: i })
        })
    }
}

$(document).ready(function(){
    $('.modal').modal({
        onOpenEnd: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            let t = $(trigger).data('type')
            let id= $(trigger).data('id')
            UpdateModalOpen(t , id)
            initUpdateFields()
        },
    });
    handleQuantityWrapper()
    updateTable('Wash')
    updateTable('Dry')
    updateTable('Additional')
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
        product.type = $('#product_type').val();
        product.name = $('#product_name').val();
        product.price = $('#product_price').val();
        product.quantity = $('#product_quantity').val();

        axios.post('/admin/product',product).then(function(res){
            TableAddRow(res.data, res.data.type_of_product)
        })

        product = {
            type: '',
            name: '',
            price: '',
            quantity: ''
        }
    })
    $('#product_update').click(function(){
        ToUpdateProduct.type     = fields.update.type.val();
        ToUpdateProduct.name     = fields.update.name.val();
        ToUpdateProduct.price    = fields.update.price.val();
        ToUpdateProduct.quantity = fields.update.quantity.val();

        axios.post('/admin/update/product',ToUpdateProduct).then(function(res){
            TableUpdateRow(res.data)
        })
        // console.log(ToUpdateProduct)
        ToUpdateProduct = {
            id: '',
            type: '',
            name: '',
            price: '',
            quantity: ''
        }
    })
    $('.product-delete').click(function(){
        DeleteProduct($(this))
    })
    $("#product_cancel").click(function(){
        let v = M.modal.getInstance($("#modal_update"))
        v.close();
    })
})