var room_id;
$(document).ready(function() {

    room_id = $('#room_id').val()
    console.log(room_id)
    viewRoomDetails()
})

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
            var str = ''
                str += '<div class="container">'+
                            '<div class="room-details">'+
                                '<div class="room-details-card">'+
                                     '<img class="room-details-img" src="../images/'+jsonData.room_img+'" alt="Room Image">'+
                               '</div>'+
                               '<div class="room-details-info">'+
                                    '<div class="room-details-name">'+jsonData.room_name+'</div>'+
                                    '<div class="room-details-desc">'+jsonData.room_details+'</div>'+
                                    '<button class="btn btn-success">'+jsonData.room_price+'</button>'+
                               ' </div>'+
                           ' </div>'+
                      '  </div>'

            $('#roomDetails').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}