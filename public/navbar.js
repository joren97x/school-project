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
                choice: 'viewReservation'
            },
            success: (data) => {
                var jsonData = JSON.parse(data)
                let str = ''
                if(jsonData == ''){
                    document.getElementById('num_reservation').innerHTML = "0"
                    str += '<li style="margin:20px">No Notifications</li>'
                }
                if(user_type == 'user') {
                    var count = 0
                    jsonData.forEach(res => {
                        if(res.user_id == user_id) {
                            count++
                            str +=  '<a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">You reserved a guest room.</li></a>'
                        }
                    })
                    document.getElementById('num_reservation').innerHTML = count
                }
                else {
                    document.getElementById('num_reservation').innerHTML = jsonData.length
                    jsonData.forEach(res => {
                        str +=  '<a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">'+res[3]+' reserved a guest room.</li></a>'
                    })
                }
                $('#notification-dropdown').append(str)
            },
            error: ( thrownError) => {console.log(thrownError)}
        })
}

