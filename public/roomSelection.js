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
                str += '<a href="roomDetails.php?room_id='+room.room_id+'" style="text-decoration: none;" class="text-dark">'+
                        '<div class="container">' +
                            '<div class="room">' +
                                '<div class="room-card">' +
                                    '<img class="room-img" src="../images/'+room.room_img+'" alt="Room Image">' +
                                ' <div class="room-name">'+ room.room_name +'</div>' +
                                    '<div class="room-desc">'+ room.room_details +'</div>' +
                                     '<div class="room-price d-flex justify-content-end"><button class="btn btn-success"> ₱'+room.room_price+'</button></div>'+
                                '</div>' +
                            '</div>' +
                        '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

