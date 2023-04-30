$(document).ready(function() {

    $(document).on('click', '#btn-confirm', ()=>{
        console.log("clicked")
        if(checkForm()) {
            confirmReservation()
            console.log("true")
        }
        else {
            console.log("false")

            alert("Fill in the blanks")
        }

    })
})

const confirmReservation = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'confirmRes',
            room_id: $('#room_id').val(),
            firstname: $('#firstname').val(),
            middlename: $('#middlename').val(),
            lastname: $('#lastname').val(),
            address: $('#address').val(),
            contact_no: $('#contact_no').val(),
            payment_process: $('#payment_process').val()
        }, 
        success: (data) => {
            console.log(data)
            if(data == '200') {
                alert("Confirmed Reservation")
                window.location.href = 'dashboard.php'
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })

}


const checkForm = () => {
    return $('#firstname').val() != '' && $('#middlename').val() != '' && $('#lastname').val() != '' && $('#address').val() != '' && $('#contact_no').val() != '' && $('#payment_process').val() != '' ? true : false
} 