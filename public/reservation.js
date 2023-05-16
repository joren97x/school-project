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
                let tbl2 = '<tr><td scope="row" colspan="10" class="fs-1">NO RESERVATION FOUND </td></tr>'
                $('#tbl').append(tbl2)
            }
            jsonData.forEach(res => {

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
                
                        let tbl = ''
                        tbl += '<tr><td scope="row">'+ res.res_id +'</td>'+
                                '<td>'+ jsonData2.room_name +'</td>'+
                                '<td>'+ res.name +'</td>'+
                                '<td >'+ res.address +'</td>'+
                                '<td>'+ res.contact_no +'</td>'+
                                '<td>'+ res.payment_process +'</td>'+
                                '<td>'+ jsonData2.room_location +'</td>'+
                                '<td>'+ res.res_date +'</td>'+
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
                let tbl2 = '<tr><td scope="row" colspan="10" class="fs-1">NO RESERVATION FOUND </td></tr>'
                $('#tbl').append(tbl2)
            }
            jsonData.forEach(res => {

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
                let tbl = ''
                        tbl += '<tr><td scope="row">'+ res.res_id +'</td>'+
                                '<td>'+ jsonData2.room_name +'</td>'+
                                '<td>'+ res.name +'</td>'+
                                '<td >'+ res.address +'</td>'+
                                '<td>'+ res.contact_no +'</td>'+
                                '<td>'+ res.payment_process +'</td>'+
                                '<td>'+ jsonData2.room_location +'</td>'+
                                '<td>'+ res.res_date +'</td>'+
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


