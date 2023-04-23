$(document).ready(function() {
    viewRooms()
})

var viewRooms = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewRooms'
        },
        success: (data) => {
            var jsonData = JSON.parse(data)
            var str = ''
            
            jsonData.forEach(room => {
                str += '<a href="roomDetails.html?room_id='+room.room_id+'" style="text-decoration: none;" class="text-dark">'+
                        '<div class="container">' +
                            '<div class="room">' +
                                '<div class="room-card">' +
                                    '<img class="room-img" src="'+ room.room_img +'" alt="Room Image">' +
                                ' <div class="room-name">'+ room.room_name +'</div>' +
                                    '<div class="room-desc">'+ room.room_details +'</div>' +
                                ' <div class="room-price">'+room.room_price+'</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

