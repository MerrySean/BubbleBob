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
    field.wash.val(Services.wash.name);
    field.wash_price.val(Services.wash.price);
    field.dry.val(Services.dry.name);
    field.dry_price.val(Services.dry.price);
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
    let i = field[f]
    i.addClass('invalid')
    if(i.is('input')){
        i.attr('placeholder', e)
    }
}

var clearActiveButtons = function(){
    
    let w = ActiveButtons.wash
    let d = ActiveButtons.dry
    let a = ActiveButtons.additionals.map(function (add){
        add.removeClass('red')
        add.addClass('blue-grey')
    })
    if(w){
        w.addClass('blue-grey')
        w.removeClass('red')
    }
    if(d){
        d.removeClass('red')
        d.addClass('blue-grey')
    }
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

var toggleLoading = function(s){
    if(s == "show"){
        $('#bottom-row').removeClass('d-block')
        $('#bottom-row-loading').removeClass('d-none')
        $('#bottom-row').addClass('d-none')
        $('#bottom-row-loading').addClass('d-block')
    }else if(s == "hide"){
        $('#bottom-row').removeClass('d-none')
        $('#bottom-row-loading').removeClass('d-block')
        $('#bottom-row').addClass('d-block')
        $('#bottom-row-loading').addClass('d-none')
    }
}

var SubmitTransactionDetailsToserver = function (data, button) {
    button.prop('disabled', true);
    toggleLoading("show")
    M.toast(
        {
            html: 'Submitting Transaction Details', 
            classes: 'rounded',
            displayLength: 10000,
            completeCallback: function() { 
                InitFields()
                clearActiveButtons()
                updateFields()
            }
        }
    )
    axios.post('/user/transactions',data).then(function(res){
        printReceipt(res);
        button.prop('disabled', false);
        toggleLoading("hide")
        M.Toast.dismissAll();
        M.toast(
            {
                html: 'Submittion Success', 
                classes: 'rounded',
                displayLength: 5000,
            }
        )   
    })
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
            let d = {
                services : Services,
                Transaction :  TransactionDetails,
            }
            let b = $(this);
            SubmitTransactionDetailsToserver(d, b)
        }
    })
    $('#btn-cancel').click(function(){
        InitFields()
        clearActiveButtons()
        updateFields()
    })
})