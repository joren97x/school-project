$(document).ready(function() {
    console.log("hello giatay?")

    $(document).on('click', '#createRoom', ()=>{
        if (checkRoom()) {
            var fileName = document.getElementById('roomImg').files[0].name;
            const fileInput = document.getElementById('roomImg');
            const files = fileInput.files;
            var combinedFiles = ""
            for (let i = 0; i < files.length; i++) {
            console.log(files[i].name);
            combinedFiles += files[i].name + " ";
            }
            console.log(combinedFiles)
            createRoom(combinedFiles)
        } else {
            alert('Please fill up the missing credentials')
        }
    })
})

const createRoom = (combinedFiles) => {
    //console.log($('#roomImg').val())
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'createRoom',
            roomName: $('#roomName').val(),
            roomDetails: $('#roomDetails').val(),
            roomPrice: $('#roomPrice').val(),
            roomImg: combinedFiles
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#roomName').val('')
                $('#roomDetails').val('')
                $('#roomPrice').val('')
                $('#roomImg').val('')
                alert('Room successfully created!')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}

const checkRoom = () => {
    return($('#roomImg').val() != '' && $('#roomName').val() != '' && $('#roomDetails').val() != '' && $('#roomPrice').val() != '') ? true : false
}
