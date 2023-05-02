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
            console.log("hello?")
            jsonData.forEach(room => {
                var imgArr = room.room_img.split(" ")
                str += 
                        
                            '<div class="room col-4 my-2">' +
                                '<div class="card">' +
                                    '<img class="card-img-top" src="../images/'+imgArr[0]+'" style="height: 212px" alt="Room Image">' +
                                    '<div class="card-body">'+ 
                                        ' <div class="room-name">'+ room.room_name +'</div>' +
                                        //  '<div class="room-desc">'+ room.room_details +'</div>' +
                                        '<div class="room-price d-flex justify-content-end"><a href="roomDetails.php?room_id='+room.room_id+'" style="text-decoration: none;" class="text-dark"><button class="btn btn-success"> ₱'+room.room_price+'</button></a></div>'+
                                    '</div>'+
                                '</div>' +
                            '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

