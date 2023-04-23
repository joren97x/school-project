$(document).ready(function() {
    $(document).on('click', '#createRoom', ()=>{
        if (checkRoom()) {
            createRoom()
        } else {
            alert('Please fill up the missing credentials')
        }
    })
})

const createRoom = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'createRoom',
            roomName: $('#roomName').val(),
            roomDetails: $('#roomDetails').val(),
            roomPrice: $('#roomPrice').val(),
            roomImg: $('#roomImg').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#roomName').val('')
                $('#roomDetails').val('')
                $('#roomPrice').val('')
                $('#roomImg').val('')
                alert('Room successfully created!')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}

const checkRoom = () => {
    return($('#roomImg').val() != '' && $('#roomName').val() != '' && $('#roomDetails').val() != '' && $('#roomPrice').val() != '') ? true : false
}
