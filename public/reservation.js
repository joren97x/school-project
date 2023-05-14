$(document).ready(() => {
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

        $.ajax({
            type: 'POST',
            url: '../src/router.php',
            data: {
                choice: 'cancelRes',
                reservation_id: $('#btn-cancel').val()
            },
            success: (data) => {
               
                console.log(data)
                //window.location.href = 'reservation.php'
    
            },
            error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
        })

    })

    $(document).on('click', '#btn-delete', () => {

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

    $(document).on('click', '#btn-approve', () => {

        $.ajax({
            type: 'POST',
            url: '../src/router.php',
            data: {
                choice: 'approveRes',
                reservation_id: $('#btn-approve').val()
            },
            success: (data) => {
               
                console.log(data)
               //window.location.href = 'reservation.php'
    
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
                        console.log("BOANG?")
                str += 
                    '<div class="card mx-3" id="cardXD" style="width: 18rem; box-shadow: 6px 5px 8px 2px #A9A9A9;">'+
                        '<img src="../images/'+imgArr[0]+'" class="card-img-top" style="height: 180px">'+
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
                        let tbl = ''
                        tbl += '<tr><td scope="row">'+ res.res_id +'</td>'+
                                '<td>'+ jsonData2.room_name +'</td>'+
                                '<td>'+ res.name +'</td>'+
                                '<td >'+ res.address +'</td>'+
                                '<td>'+ res.contact_no +'</td>'+
                                '<td>'+ res.payment_process +'</td>'+
                                '<td>'+ jsonData2.room_location +'</td>'+
                                '<td ><span class="bg-warning" id="status_span">'+res.status+'</span></td>'+
                                '<td >'+
                                '<button class="btn btn-success" id="btn-approve" value="'+ res.res_id +'"> <i class="bi bi-check2-circle"></i> </button>'+
                                '<button class="btn btn-danger" id="btn-cancel" value="'+ res.res_id +'"> <i class="bi bi-x-circle"></i> </button>'+
                                '<button class="btn btn-danger" id="btn-delete" value="'+ res.res_id +'"> <i class="bi bi-trash2"></i> </button></td></tr>'

                        $('#tbl').append(tbl)
                        
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
                let s = '<div class="container"> <h1>NO RESERVATION FOUND</h1> </div>'
                let tbl2 = '<tr><td scope="row" colspan="10" class="fs-1">NO RESERVATION FOUND </td></tr>'
                $('#roomDiv').append(s)
                $('#tbl').append(tbl2)
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
                let tbl = ''
                        tbl += '<tr><td scope="row">'+ res.res_id +'</td>'+
                                '<td>'+ jsonData2.room_name +'</td>'+
                                '<td>'+ res.name +'</td>'+
                                '<td >'+ res.address +'</td>'+
                                '<td>'+ res.contact_no +'</td>'+
                                '<td>'+ res.payment_process +'</td>'+
                                '<td>'+ jsonData2.room_location +'</td>'+
                                '<td ><span class="bg-warning" id="status_span">'+res.status+'</span></td>'+
                                '<td >'+
                                '<button class="btn btn-success" id="btn-approve" value="'+ res.res_id +'"> <i class="bi bi-check2-circle"></i> </button>'+
                                '<button class="btn btn-danger" id="btn-cancel" value="'+ res.res_id +'"> <i class="bi bi-x-circle"></i> </button>'+
                                '<button class="btn btn-danger" id="btn-delete" value="'+ res.res_id +'"> <i class="bi bi-trash2"></i> </button></td></tr>'

                        $('#tbl').append(tbl)
                    },
                    error: ( thrownError) => {console.log(thrownError)}
                })
            }) 
        },
        
        error: ( thrownError) => {console.log(thrownError)}
    })
    
}


