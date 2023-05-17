var room_id;
$(document).ready(function() {
    var amount = 5400;
    var formattedAmount = amount.toLocaleString(undefined, { style: 'currency', currency: 'PHP' });
    room_id = $('#room_id').val()
    viewRoomDetails()

    $(document).on('click', '#delete_guest_house', () => {
        deleteGuestHouse()
    })

    $(document).on('click', '#update_guest_house', () => {
        updateGuestHouse()
    })

})

let updateGuestHouse = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'updateGuestHouse',
            room_id: room_id,
            room_name:  $('#room_name').val(),
            room_details:  $('#room_details').val(),
            room_price:  $('#room_price').val(),
            room_location:  $('#room_location').val(),
            room_link:  $('#room_link').val(),
            room_no:  $('#room_no').val()
        },
        success: (data) => {
            console.log(data)
            window.location.href = 'roomDetails.php?room_id='+room_id+''
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

let deleteGuestHouse = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'deleteGuestHouse',
            room_id: room_id
        },
        success: (data) => {
            window.location.href = 'houseManagement.php'
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

var checkLogin = () => {
    return ($('#roomName').val() != '' && $('#room_price').val() != '' && $('#room_details').val() != '' && $('#room_link').val() != '' && $('#room_no').val() != '' && $('#room_location').val() != '') ? true : false
}



var viewRoomDetails = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewRoomDetails',
            roomId: room_id
        },
        success: (data) => {

            var jsonData = JSON.parse(data)
            var img = jsonData.room_img
            var imgArr = img.split(" ")
            var price = jsonData.room_price

            var numericAmount = parseFloat(jsonData.room_price);
            var formattedAmount = numericAmount.toLocaleString(undefined, { style: 'currency', currency: 'PHP' });

            document.getElementById('house_title').innerHTML = jsonData.room_name
            document.getElementById('house_desc').innerHTML = jsonData.room_details
            document.getElementById('house_price').innerHTML = formattedAmount

            for(let i = 0; i < imgArr.length; i++) {
                document.getElementById('img'+i).src = '../images/'+imgArr[i]
            }

        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}