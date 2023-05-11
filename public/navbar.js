$(document).ready(() => {

    getReservation()

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
                document.getElementById('num_reservation').innerHTML = jsonData.length
                jsonData.forEach(res => {
                    str +=  '<a href="reservation.php" style="text-decoration: none;"> <li style="margin:20px">'+res[3]+' reserved a guest room.</li></a>'
                }) 
                $('#notification-dropdown').append(str)
            },
            error: ( thrownError) => {console.log(thrownError)}
        })
}

