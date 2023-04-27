var room_id;
$(document).ready(function() {

    room_id = $('#room_id').val()
    console.log(room_id)
    viewRoomDetails()
    viewRoomDetails2()
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

var viewRoomDetails2 = () => {
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
            console.log(imgArr)
            var str2 = ''
                str2 += '<div class="container">' +
                '<div class="row ">' +
                    '<div class="col-8 shadow  justify-content-around d-flex">'+
                        '<div id="carouselExampleFade" class="carousel slide carousel-fade w-100">'+
                            '<div class="carousel-inner">'+
                                '<div class="carousel-item active ">'+
                                    '<img src="../images/wowRoom.png" class="d-block w-100" alt="...">'+
                                '</div>'+
                                '<div class="carousel-item">'+
                                    '<img src="../images/room3.png" class="d-block w-100" alt="...">'+
                               ' </div>'+
                                '<div class="carousel-item">'+
                                  '  <img src="../images/myRoom.png" class="d-block w-100" alt="...">'+
                                '</div>'+
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
                       ' HEllo world?'+
                    '</div>'+
               ' </div>'+
            '</div>'

            $('#roomDetails').append(str2)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

{/* <div class="container">
		<div class="row ">
			<div class="col-8 shadow  justify-content-around d-flex">
				<div id="carouselExampleFade" class="carousel slide carousel-fade w-100">
					<div class="carousel-inner">
						<div class="carousel-item active ">
							<img src="../images/wowRoom.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../images/room3.png" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="../images/myRoom.png" class="d-block w-100" alt="...">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="col-4">
				HEllo world?
			</div>
		</div>
	</div> */}