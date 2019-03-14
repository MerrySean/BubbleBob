var Services = {
    wash : [],
    dry : [],
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
    wash: [],
    dry: [],
    additionals: [],
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

// reinit fields variable
var reInitFields = function () {
    field = {
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
}
// Clear all input fields
var InitFields = function (){  
    field.wash.val('')
    field.wash_price.val('')
    field.dry.val('')
    field.dry_price.val('')
    field.total_cost.val('')
    field.cash_on_hand.val('')
    field.change.val('')
    field.customer_name.val('')
    field.customer_address.val('')
    field.customer_contact.val('')
}
// clear validation error message or input red border
var clearValidations = function(){
    //wash
        field.wash.removeClass('invalid')
        field.wash.attr('placeholder', 'Wash')
    //dry 
        field.dry.removeClass('invalid')
        field.dry.attr('placeholder', 'Dry')
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
// add or remove input fields in category field list -> base data on variable Services
var UpdateFieldEntries = function (list){
    let a = $(`#${list}-lists`)
    a.empty()
    let s = Services[list]
    if(s.length > 0){
        for (const k in s) {
            a.append(
                $('<div>').addClass('input-group inline')
                    .append(
                        $('<input>').val(s[k].name).attr('readonly', true)
                    )
                    .append(
                        $('<input>').val(s[k].price).attr('readonly', true)
                    )
            )
        }
    }else{
        a.append(
            $('<div>').addClass('input-group inline')
                .append(
                    $('<input>').attr('placeholder', list).attr('readonly', true).attr('id', list)
                )
                .append(
                    $('<input>').attr('placeholder', 'Price').attr('readonly', true).attr('id', `${list}-price`)
                )
        )
    }
}
// compute total cost -> base data on variable Services
var ComputeTotalCost = function(){
    let total = 0
    // Add wash price
    for (const k in Services.wash) {
        total += Services.wash[k].price
    }
    // Add Dry price 
    for (const k in Services.dry) {
        total += Services.dry[k].price
    }
    // Add Additionals price
    for (const k in Services.additionals) {
        total += Services.additionals[k].price
    }
    return total
}
// update all input fields -> base data on variable Services & TransactionDetails
var updateFields = function(){
    // update wash data
    UpdateFieldEntries('wash')
    // update dry data
    UpdateFieldEntries('dry')
    // update Additional data
    UpdateFieldEntries('additionals')
    // compute total cost
    TransactionDetails.TotalCost = ComputeTotalCost()
    $('#total-cost').text(TransactionDetails.TotalCost)
    //Update Change
    TransactionDetails.change = TransactionDetails.customerCash - TransactionDetails.TotalCost
    $('#change').val(TransactionDetails.change)

    clearValidations()
    reInitFields()
}

// this function will check if a service already exist in a specific category
var ServiceExist = function(data, service){
    for (const key in Services[service]) {
        let i = Services[service][key].id === data.id
        let n = Services[service][key].name === data.name
        let p = Services[service][key].price === data.price
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

    let c1 = Services.wash.length > 0
    if(!c1){
        result.errors.wash = 'No selected wash service'
    }
    let c2 = Services.dry.length > 0
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
    console.log(i)
}

var clearActiveButtons = function(){
    ActiveButtons.wash.map(function (add){
        add.removeClass('red')
        add.addClass('blue-grey')
    })
    ActiveButtons.dry.map(function (add){
        add.removeClass('red')
        add.addClass('blue-grey')
    })
    ActiveButtons.additionals.map(function (add){
        add.removeClass('red')
        add.addClass('blue-grey')
    })
    Services = {
        wash : [],
        dry : [],
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
        wash: [],
        dry: [],
        additionals: [],
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
        let a = { 
            id: x.data('id'),
            name: x.data('name'),
            price: x.data('price')
        }
        if(!ServiceExist(a, 'wash')){
            Services.wash.push(a)
            ActiveButtons.wash.push(x)
            x.addClass('red')
            x.removeClass('blue-grey')
        }else{
            Services.wash = Services.wash.filter(d => d.id !== a.id);
            ActiveButtons.wash = ActiveButtons.wash.filter( d => d[0] !== x[0])
            x.removeClass('red')
            x.addClass('blue-grey')
        }
        updateFields()
    })
    //on click of any DRY button
    $('.btn-dry').click(function(){
        let x = $(this)
        let a = { 
            id: x.data('id'),
            name: x.data('name'),
            price: x.data('price')
        }
        if(!ServiceExist(a, 'dry')){
            Services.dry.push(a)
            ActiveButtons.dry.push(x)
            x.addClass('red')
            x.removeClass('blue-grey')
        }else{
            Services.dry = Services.dry.filter(d => d.id !== a.id);
            ActiveButtons.dry = ActiveButtons.dry.filter( d => d[0] !== x[0])
            x.removeClass('red')
            x.addClass('blue-grey')
        }
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
        if(!ServiceExist(a, 'additionals')){
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
    $('#coh').keyup(function() {
        TransactionDetails.customerCash = Number($(this).val());
        updateFields()
    });
    // customer name key press
    $('#cname').keyup(function(){
        TransactionDetails.customer.name = $(this).val()
    })
    // customer address key press
    $('#cAddress').keyup(function(){
        TransactionDetails.customer.address = $(this).val()
    })
    // customer mobile number input filter
    $('#cNumber').inputFilter(function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99999999999)
    });
    // customer mobile key press
    $('#cNumber').keyup(function(){
        TransactionDetails.customer.contact = $(this).val()
    })
    // transaction save
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
    // transaction cancel
    $('#btn-cancel').click(function(){
        InitFields()
        clearActiveButtons()
        updateFields()
    })
})