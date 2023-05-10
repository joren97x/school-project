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
                str += 
                                '<div class=" col-4 card shadow " id="card">' +
                                    '<img class="card-img-top my-2" src="../images/'+imgArr[0]+'" style="height: 212px;" alt="Room Image">' +
                                    '<div class="card-body bg-white">'+ 
                                        ' <div "class="room-name">'+ room.room_name +'</div>' +
                                        '<div class="row">'+
                                            '<div class="col-6"></div> '+
                                            '<div class="col-3 justify-content-end d-flex"> <button type="button" value="'+room.room_id+'" id="btn-edit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</button></div>'+
                                            '<div class="col-3 justify-content-end d-flex"> <button type="button" onclick="deleteFunction('+room.room_id+')" value="'+room.room_id+'" id="btn-delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">DELETE</button></div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}

function deleteFunction(id) {

            // let btn = document.querySelectorAll('#btn-delete')
            // let btnValue = id
            // console.log(btn.value)
            // let selectedButton = null
            // btn.forEach(button => {
            //     if(button.value === btnValue) {
            //         selectedButton = btn.value
            //     }
            // })
            // let parent = selectedButton.closest('.card')
            // parent.remove()

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewRoomDetails',
            roomId : id
        },
        success: (data) => {
            room = JSON.parse(data)      
            console.log(room)      
            document.getElementById("room_name").innerHTML = room.room_name
            $('#btn-delete-house').val(room.room_id)
            console.log($('#btn-delete-house').val())
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}

function deleteGuestHouse(){

    let id = $('#btn-delete-house').val()
   
    $.ajax({

        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'deleteGuestHouse',
            room_id: id
        },
        success: (data) => {

            window.location.href = 'houseManagement.php'

            

        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}

    })

}