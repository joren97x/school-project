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
            var img = jsonData.room_img
            var imgArr = img.split(" ")
            var carouselImg = ''
            var carousel = ''

            let s = '' 

            s += '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content ">'+
                    '<div class="modal-header ">'+
                        '<h1 class="modal-title fs-3 " id="exampleModalLabel">Edit Guest House</h1>'+
                    '</div>'+
                    '<div class="modal-body fs-5">'+
                        'Room Name: <input type="text" class="form-control" value="'+jsonData.room_name+'">'+
                        'Room Description: <textarea class="form-control" style="height: 100px">'+jsonData.room_details+'</textarea>'+
                        '<div class="row"> <div class="col-6">Room Price: <input type="number" class="form-control" value="'+jsonData.room_price+'"></div>'+
                        '<div class="col-6">Room Location: <input type="text" class="form-control" value="'+jsonData.room_location+'"></div></div>'+
                        '<div class="row"> <div class="col-6">Room Link: <input type="text" class="form-control" value="'+jsonData.room_link+'"></div>'+
                        ' <div class="col-6">Room No: <select value="'+jsonData.room_no+'" class="form-control"><option value="1">1</option><option value="2">2</option></select></div></div>'+
                    '</div>'+
                    '<div class="modal-footer">'+
                        '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>'+
                        '<button type="button" class="btn btn-primary" id="update_guest_house" name="update_guest_house">Save changes</button>'+
                    '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'

            $('#modal-div').append(s)

            if(imgArr.length == 1) {
                carouselImg += '<div class="carousel-item active">'+
                                    '<img src="../images/'+imgArr[0]+'" class="d-block w-100 img-thumbnail rounded" alt="...">'+
                                '</div>'
            }
            else {
                for(let i = 0; i < imgArr.length-1; i++) {
                    if(i == 0) {
                        carouselImg += '<div class="carousel-item active ">'+
                                            ' <img src="../images/'+imgArr[i]+'" class="d-block w-100 img-thumbnail rounded" style="height: 450px; background-size: auto;">'+
                                        '</div>'
                    }
                    else {
                        carouselImg += '<div class="carousel-item ">'+
                                            '<img src="../images/'+imgArr[i]+'" class="d-block w-100 img-thumbnail rounded" style="height: 450px">'+
                                        '</div>'
                    }
                }
            } 
          
                carousel += '<div class="container mt-5">' +
                '<div class="row">' +
                    '<div class="col-8  justify-content-around ">'+
                        '<div id="carouselExampleFade" class="carousel slide carousel-fade w-100 ">'+
                            '<div class="carousel-inner h-100">'+
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
                    '<div class="col-4 ">'+
                       '<div class="row "><div class="col-10"><h2>'+jsonData.room_name+'</h2></div><div class="col-2"><div class="dropdown"><button class="btn " role="button" data-bs-toggle="dropdown" aria-expanded="false"><h2><i class="bi bi-three-dots-vertical"></i></h2></button>'+
                       '<ul class="dropdown-menu">'+
                       
                        '<li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Edit Guest House</a></li>'+
                        '<li><a class="dropdown-item" href="#">Delete Guest House</a></li>'+
                    '</ul>'+
                    '</div></div></div>'+
                       
                       '<br>'+
                        jsonData.room_details+
                        '<br><hr>'+
                        'Monthly Payment <label style="margin-left: 180px;">₱' + jsonData.room_price + '</label>'+
                        '<a href="payment.php?room_id='+jsonData.room_id+'" value="Reserve Now"><button class="btn btn-success " > Reserve Now </button></a>'+
                    '</div>'+
               ' </div>'+
            '</div>'

            $('#roomDetails').append(carousel)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}