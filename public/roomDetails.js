let x=15;

$(document).ready(function() {


    viewRoomDetails()
})

var viewRoomDetails = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewRoomDetails',
            roomId: x
        },
        success: (data) => {
            console.log(data)
            var jsonData = JSON.parse(data)
            var str = ''
            
            jsonData.forEach(room => {
                str += '<div class="container">'+
                            '<div class="room-details">'+
                                '<div class="room-details-card">'+
                                     '<img class="room-details-img" src="https://via.placeholder.com/800x500.png?text=Room+Image" alt="Room Image">'+
                               '</div>'+
                               '<div class="room-details-info">'+
                                    '<div class="room-details-name"></div>'+
                                    '<div class="room-details-desc">Lorem ipsum doloaseldodales, urna</div>'+
                                    '<button class="btn btn-success">Reserve now</button>'+
                               ' </div>'+
                           ' </div>'+
                      '  </div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}