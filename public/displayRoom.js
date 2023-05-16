$(document).ready(function() {
    viewRooms()
    console.log("BOANG?")
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
                var numericAmount = parseFloat(room.room_price);
                var formattedAmount = numericAmount.toLocaleString(undefined, { minimumFractionDigits: 0, style: 'currency', currency: 'PHP' });
                str += 
                        
                            '<div class="room  col-3  my-2"><a href="roomDetails.php?room_id='+room.room_id+'">' +
                                '<div class="card ">'  +
                                    '<img class="card-img-top" src="../images/'+imgArr[0]+'" style="height: 265px;" alt="Room Image">' +
                                    '<div class="card-body  ">'+ 
                                        ' <div "class="room-name "><h5>'+ room.room_name +'</h5></div>' +
                                        '<div class="room-desc">Lorem Ipsum Neque porro quisquam est qui dolorem ipsum</div>' +
                                        '<div><p><label class="fw-bold">'+formattedAmount+'</label> monthly</p></div>'+
                                    '</div>'+
                                '</div></a>' +
                            '</div>'
            }) 
            $('#roomDiv').append(str)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

// const app = Vue.createApp({

//   data() {
//     return {
//         rooms: [
//             {room_name: "Guest House 1", room_id: 1, room_price: 1000},
//             {room_name: "Guest House 2", room_id: 2, room_price: 1000},
//             {room_name: "Guest House 3", room_id: 3, room_price: 1000}
//         ]
//     };
//   },
//   methods: {
//     viewRooms() {
//       axios
//         .post("../src/router.php", { choice: "viewRooms" })
//         .then((response) => {
//           console.log(response)
//         })
//         .catch((error) => {
//           console.log(error);
//         });
//     },
//   },
// })
// app.mount('#app')

