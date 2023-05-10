$(document).ready(() => {
    console.log($('#user_id').val())
    console.log($('#userType').val())
    if($('#userType').val() == 'admin') {
        viewReservationsAdmin()
    }
    else if ($('#userType').val() == 'user'){
        viewReservationsUser()
    }
    else {
        alert("Login please")
        window.location.href = 'login.php'
    }

    $(document).on('click', '#btn-cancel', () => {

        console.log("clicked")

        console.log($('#btn-cancel').val())

        $.ajax({
            type: 'POST',
            url: '../src/router.php',
            data: {
                choice: 'deleteReservation',
                reservation_id: $('#btn-cancel').val()
            },
            success: (data) => {
               
                console.log(data)
                window.location.href = 'reservation.php'
    
            },
            error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
        })

    })

})

const viewReservationsAdmin = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewReservation'
        },
        success: (data) => {
            var jsonData = JSON.parse(data)
            if(jsonData == ''){
                console.log("waley")
                let s = ''
                s += '<div class="container"> <h1>NO RESERVATION FOUND</h1> </div>'
                $('#roomDiv').append(s)
            }
            jsonData.forEach(res => {

            var str = ''
                $.ajax({
                    type: 'POST',
                    url: '../src/router.php',
                    data: {
                        choice: 'viewRoomDetails',
                        roomId: res.room_id
                    },
                    success: (data) => {
                        var jsonData2 = JSON.parse(data)
                        var imgArr = jsonData2.room_img.split(" ")
                str += 
                    '<div class="card mx-3" style=" background-color: black; width: 18rem; box-shadow: 6px 5px 8px 2px #A9A9A9;">'+
                        '<img src="../images/'+imgArr[0]+'" class="card-img-top" alt="...">'+
                        '<div class="card-body text-center bg-white">'+
                            '<h5 class="card-title ">'+jsonData2.room_name+'</h5>'+
                            '<p class="card-text">'+res.name+'</p>'+
                            ' <p class="card-text">'+res.address+'</p>' +
                            ' <p class="card-text">'+res.contact_no+'</p>' +
                            '<p>'+res.payment_process+'</p>'+
                            '<a href="'+jsonData2.room_link+'"> <i class="bi bi-geo-alt"></i></a>'+jsonData2.room_location+''+
                            '<br><a href="#" class="btn btn-success">Reserved</a>' +
                            '<button class="btn btn-danger" id="btn-cancel" value="'+res.res_id+'"> Cancel </button>' +
                        '</div>' +
                        '</div>'
                $('#roomDiv').append(str)
                    },
                    error: ( thrownError) => {console.log(thrownError)}
                })
            }) 
        },
        error: ( thrownError) => {console.log(thrownError)}
    })
}

const viewReservationsUser = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewReservationUser',
            user_id : $('#user_id').val()
        },
        success: (data) => {
            var jsonData = JSON.parse(data)
            if(jsonData == ''){
                console.log("waley")
                let s = ''
                s += '<div class="container"> <h1>NO RESERVATION FOUND</h1> </div>'
                $('#roomDiv').append(s)
            }
            jsonData.forEach(res => {

            var str = ''
                $.ajax({
                    type: 'POST',
                    url: '../src/router.php',
                    data: {
                        choice: 'viewRoomDetails',
                        roomId: res.room_id
                    },
                    success: (data) => {
                        
                        var jsonData2 = JSON.parse(data)
                        var imgArr = jsonData2.room_img.split(" ")
                str += 
                    '<div class="card mx-3 bg-dark" style="width: 18rem; box-shadow: 6px 5px 8px 2px #A9A9A9;">'+
                        '<img src="../images/'+imgArr[0]+'" class="card-img-top" alt="...">'+
                        '<div class="card-body text-center bg-white">'+
                            '<h5 class="card-title ">'+jsonData2.room_name+'</h5>'+
                            '<p class="card-text">'+res.name+'</p>'+
                            ' <p class="card-text">'+res.address+'</p>' +
                            ' <p class="card-text">'+res.contact_no+'</p>' +
                            '<p>'+res.payment_process+'</p>'+
                            '<a href="'+jsonData2.room_link+'"> <i class="bi bi-geo-alt"></i></a>'+jsonData2.room_location+''+
                            '<br><a href="#" class="btn btn-success">Reserved</a>' +
                            '<button class="btn btn-danger" id="btn-cancel" value="'+res.res_id+'"> Cancel </button>' +
                        '</div>' +
                        '</div>'
                $('#roomDiv').append(str)
                    },
                    error: ( thrownError) => {console.log(thrownError)}
                })
            }) 
        },
        
        error: ( thrownError) => {console.log(thrownError)}
    })
    
}


