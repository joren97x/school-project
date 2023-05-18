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
                let s = '<div class="container text-center"> <h1>NO GUEST HOUSES FOUND</h1> </div>'
                $('#roomDiv').append(s)
            }
            const htmlElements = jsonData.map(room => {
                const imgArr = room.room_img.split(" ");
                const numericAmount = parseFloat(room.room_price);
                const formattedAmount = numericAmount.toLocaleString(undefined, { minimumFractionDigits: 0, style: 'currency', currency: 'PHP' });
              
                const carouselImg = imgArr.map((image, index) => {
                  const activeClass = (index === 0) ? 'active' : '';
                  return `
                    <div class="carousel-item ${activeClass}">
                      <img class="card-img-top" src="../images/${image}" style="height: 265px;" alt="Room Image">
                    </div>
                  `;
                }).join('');
              
                return `
                  <div class="room col-lg-3 col-md-4 col-sm-6 my-2">
                    <a href="roomDetails.php?room_id=${room.room_id}">
                      <div id="carouselExample${room.room_id}" class="carousel slide card" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          ${carouselImg}
                        </div>
                        <div class="card-body">
                          <div class="room-name">
                            <h5>${room.room_name}</h5>
                          </div>
                          <div class="room-desc">Lorem Ipsum Neque porro quisquam est qui dolorem ipsum</div>
                          <div>
                            <p>
                              <label class="fw-bold">${formattedAmount}</label> monthly
                            </p>
                          </div>
                        </div>
                        <button class="carousel-control-prev"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample${room.room_id}" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" style="border-radius: 50%" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next rounded"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample${room.room_id}" data-bs-slide="next">
                          <span class="carousel-control-next-icon " style="border-radius: 50%" aria-hidden="true"></span>
                          <span class="visually-hidden bg-dark">Next</span>
                        </button>
                      </div>
                    </a>
                  </div>
                `;
              });
              
              $('#roomDiv').append(htmlElements.join(''));
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

