$(document).ready(() => {

    getReservation()

    user_type = document.getElementById('user_type').value;
    user_id = document.getElementById('user_id').value;

    $(document).on('click', '#btn-bell', () => {
        $('#num_reservation').remove()
    })

})

const getReservation = () => {

    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'viewReservationAdmin'
        },
        success: (data) => {
            var jsonData = JSON.parse(data)
            let str = ''
            if (user_type == 'user') {
                var count = 0
                jsonData.forEach(res => {
                    if (res.user_id == user_id) {
                        count++
                        switch(res.status) {
                            case 'approved':
                                str += '<div class="row"><a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">Your reservation has been approved.</li></a></div>'
                                break
                            case 'cancelled':
                                str += '<div class="row"><a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">You reservation has been cancelled.</li></a></div>'
                                break
                            case 'pending':
                                str += '<div class="row"><a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">You have a pending reservation.</li></a></div>'
                                break
                        }
                    }
                })
                if (count === 0) {
                    document.getElementById('num_reservation').innerHTML = "0"
                    str += '<div class="row text-center"> <li style=""> No notifications :( </li></div>'
                }
                document.getElementById('num_reservation').innerHTML = count
            } else {
                document.getElementById('num_reservation').innerHTML = jsonData.length
                jsonData.forEach(res => {
                    str += '<div class="row"><a href="reservation.php" style="text-decoration: none;"> <li style="margin: 10px">' + res[3] + ' reserved a guest room.</li></a></div>'
                })
            }
            $('#notification-dropdown').append(str)
        },
        error: (thrownError) => {
            console.log(thrownError)
        }
    })
}