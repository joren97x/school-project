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
        choice: 'viewReservationAdmin',
        user_id: $('#user_id').val()
      },
      success: (data) => {
        const jsonData = JSON.parse(data);
        if (jsonData == '') {
          const tbl2 = '<tr><td scope="row" colspan="10" class="fs-1 text-center">NO RESERVATION FOUND </td></tr>';
          $('#tbl').append(tbl2);
          return;
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
              const jsonData2 = JSON.parse(data);
              const statusMap = {
                'pending': 'bg-warning',
                'approved': 'bg-success',
                'cancelled': 'bg-danger'
              };

              const status = `<span class="${statusMap[res.status]}" id="status_span">${res.status}</span>`;
              const currentDate = new Date();
              const formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');
              const disabled = formattedDate > res.expire_time ? 'disabled' : '';

              const buttonStatusMap = {
                'pending': `<button class="btn btn-danger" ${disabled} id="btn-cancel" onclick="cancelReservation(${res.res_id})"><i class="bi bi-x-circle"></i></button>`,
                'approved': `<button class="btn btn-danger" disabled id="btn-cancel"><i class="bi bi-x-circle"></i></button>`,
                'cancelled': `<button class="btn btn-danger" disabled id="btn-cancel"><i class="bi bi-x-circle"></i></button>`
              }
              
              const tbl = `
                <tr id="${res.res_id}">
                  <td scope="row">${res.res_id}</td>
                  <td>${jsonData2.room_name}</td>
                  <td>${res.name}</td>
                  <td>${res.address}</td>
                  <td>${res.contact_no}</td>
                  <td>${res.payment_process}</td>
                  <td>${jsonData2.room_location}</td>
                  <td>${res.res_date}</td>
                  <td>${status}</td>
                  <td>
                    ${buttonStatusMap[res.status]}
                    <button class="btn btn-danger" id="btn-delete" onclick="deleteReservation(${res.res_id})"><i class="bi bi-trash2"></i></button>
                  </td>
                </tr>`;
              $('#tbl').append(tbl);
            },
            error: (thrownError) => {
              console.log(thrownError);
            }
          });
        });
      },
      error: (thrownError) => {
        console.log(thrownError);
      }
    });
  };

const viewReservationsUser = () => {
    $.ajax({
      type: 'POST',
      url: '../src/router.php',
      data: {
        choice: 'viewReservationUser',
        user_id: $('#user_id').val()
      },
      success: (data) => {
        const jsonData = JSON.parse(data);
        if (jsonData == '') {
          const tbl2 = '<tr><td scope="row" colspan="10" class="fs-1 text-center">NO RESERVATION FOUND </td></tr>';
          $('#tbl').append(tbl2);
          return;
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
              const jsonData2 = JSON.parse(data);
              const statusMap = {
                'pending': 'bg-warning',
                'approved': 'bg-success',
                'cancelled': 'bg-danger'
              };

              const status = `<span class="${statusMap[res.status]}" id="status_span">${res.status}</span>`;
              const currentDate = new Date();
              const formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');
              const disabled = formattedDate > res.expire_time ? 'disabled' : '';
              console.log("EXPIREY TIME: "+res.expire_time)
              console.log("DATE TODAY: " +formattedDate)

              const buttonStatusMap = {
                'pending': `<button class="btn btn-danger" ${disabled} id="btn-cancel" onclick="cancelReservation(${res.res_id})"><i class="bi bi-x-circle"></i></button>`,
                'approved': `<button class="btn btn-danger" disabled id="btn-cancel"><i class="bi bi-x-circle"></i></button>`,
                'cancelled': `<button class="btn btn-danger" disabled id="btn-cancel"><i class="bi bi-x-circle"></i></button>`
              }
              
              const tbl = `
                <tr>
                  <td scope="row">${res.res_id}</td>
                  <td>${jsonData2.room_name}</td>
                  <td>${res.name}</td>
                  <td>${res.address}</td>
                  <td>${res.contact_no}</td>
                  <td>${res.payment_process}</td>
                  <td>${jsonData2.room_location}</td>
                  <td>${res.res_date}</td>
                  <td>${status}</td>
                  <td>
                    ${buttonStatusMap[res.status]}
                    <button class="btn btn-danger" id="btn-delete" value="${res.res_id}"><i class="bi bi-trash2"></i></button>
                  </td>
                </tr>`;
              $('#tbl').append(tbl);
            },
            error: (thrownError) => {
              console.log(thrownError);
            }
          });
        });
      },
      error: (thrownError) => {
        console.log(thrownError);
      }
    });
  };

function cancelReservation(res_id) {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'cancelRes',
            reservation_id: res_id
        },
        success: (data) => {
            console.log(data)
            window.location.href = 'reservation.php'
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })

}

function deleteReservation(res_id) {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'deleteReservation',
            reservation_id: res_id
        },
        success: (data) => {
            console.log(data)
            console.log(document.getElementById(res_id))
            $('#'+res_id).remove()
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}
