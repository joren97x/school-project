console.log($('#room_id').val())

$(document).ready(function() {
    seeRoomInfo()
    $(document).on('click', '#btn-confirm', ()=>{
        if(checkForm()) {
            confirmReservation()
        }
        else {
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
const seeRoomInfo = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewRoomDetails',
            roomId: $('#room_id').val()
        },
        success: (data) => {

            var jsonData = JSON.parse(data)
            console.log(jsonData)
            let str = ''

            str += '<img src="../images/'+jsonData.room_img+'" class="rounded m-4" style="width: 150px; height: 150px;">'+
                        jsonData.room_name +
                    '<div class="row m-3">'+
                    '<hr>'+
                        '<h5>Price Details</h5>'+
                        '<h6>'+jsonData.room_price+'</h6>'+
                    '</div>'

            $('#paymentDetailDiv').append(str)

        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}

const checkForm = () => {
    return $('#firstname').val() != '' && $('#middlename').val() != '' && $('#lastname').val() != '' && $('#address').val() != '' && $('#contact_no').val() != '' && $('#payment_process').val() != '' ? true : false
} 
