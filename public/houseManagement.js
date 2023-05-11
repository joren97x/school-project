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
            if(jsonData == ''){
                let s = ''
                s += '<div class="container text-center"> <h1>NO GUEST HOUSES FOUND</h1> </div>'
                $('#roomDiv').append(s)
            }
            jsonData.forEach(room => {
                var imgArr = room.room_img.split(" ")
                console.log("hello giatay?")
                str += 
                                '<div class=" col-4 card shadow " id="card">' +
                                    '<img class="card-img-top my-2" src="../images/'+imgArr[0]+'" style="height: 212px;" alt="Room Image">' +
                                    '<div class="card-body bg-white">'+ 
                                        ' <div "class="room-name">'+ room.room_name +'</div>' +
                                        '<div class="row">'+
                                            '<div class="col-6"></div> '+
                                            '<div class="col-6 justify-content-end d-flex"> <a href="roomDetails.php?room_id='+room.room_id+'"><button type="button" id="btn-edit" class="btn btn-success" style="background-color: #ff7f50; border-color: #ff7f50">view details</button></a></div>'+
                                            //'<div class="col-3 justify-content-end d-flex"> <button type="button" onclick="deleteFunction('+room.room_id+')" value="'+room.room_id+'" id="btn-delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">DELETE</button></div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}


