var room_id;
$(document).ready(function() {
    room_id = $('#room_id').val()
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
            console.log(jsonData)
            var img = jsonData.room_img
            var imgArr = img.split(" ")
            var carouselImg = ''
            var carousel = ''

            if(imgArr.length == 1) {
                carouselImg += '<div class="carousel-item active">'+
                                    '<img src="../images/'+imgArr[0]+'" class="d-block w-100 img-thumbnail rounded" alt="...">'+
                                '</div>'
            }
            else {
                for(let i = 0; i < imgArr.length-1; i++) {
                    if(i == 0) {
                        carouselImg += '<div class="carousel-item active">'+
                                            ' <img src="../images/'+imgArr[i]+'" class="d-block w-100 img-thumbnail rounded" alt="...">'+
                                        '</div>'
                    }
                    else {
                        carouselImg += '<div class="carousel-item ">'+
                                            '<img src="../images/'+imgArr[i]+'" class="d-block w-100 img-thumbnail rounded" alt="...">'+
                                        '</div>'
                    }
                }
            } 

          
                carousel += '<div class="container">' +
                '<div class="row">' +
                    '<div class="col-8  justify-content-around ">'+
                        '<div id="carouselExampleFade" class="carousel slide carousel-fade w-100 ">'+
                            '<div class="carousel-inner">'+
                                carouselImg +
                            '</div>'+
                            '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"'+
                                'data-bs-slide="prev">'+
                                '<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
                                '<span class="visually-hidden">Previous</span>'+
                            '</button>'+
                            '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"'+
                                'data-bs-slide="next">'+
                                '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
                                '<span class="visually-hidden">Next</span>'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-4">'+
                       '<h3>'+jsonData.room_name+'</h3>'+
                        '<br>'+
                        jsonData.room_details+
                        '<br>'+
                        '<a href="payment.php?room_id='+jsonData.room_id+'" value="Reserve Now"><button class="btn btn-success" > Reserve Now </button></a>'+
                    '</div>'+
               ' </div>'+
            '</div>'

            $('#roomDetails').append(carousel)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}
