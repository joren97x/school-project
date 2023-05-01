$(document).ready(() => {
    viewReservations()
})

const viewReservations = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewReservation'
        },
        success: (data) => {
            var jsonData = JSON.parse(data)
            jsonData.forEach(res => {

            var str = ''
                console.log(res.room_id)
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
                    '<div class="card mx-3" style="width: 18rem; box-shadow: none;">'+
                        '<img src="../images/'+imgArr[0]+'" class="card-img-top" alt="...">'+
                        '<div class="card-body text-center">'+
                            '<h5 class="card-title ">'+jsonData2.room_name+'</h5>'+
                            '<p class="card-text">'+res.name+'</p>'+
                            ' <p class="card-text">'+res.address+'</p>' +
                            ' <p class="card-text">'+res.contact_no+'</p>' +
                            '<p>'+res.payment_process+'</p>'+
                            '<a href="'+jsonData2.room_link+'"> <i class="bi bi-geo-alt"></i></a>'+jsonData2.room_location+''+
                            '<br><a href="#" class="btn btn-success">Reserved</a>' +
                            '<a href="#" class="btn btn-danger">Cancel</a>' +
                        '</div>' +
                        '</div>'
                $('#roomDiv').append(str)
                    },
                    error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
                })
                console.log(str)
            }) 
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}
