$(document).ready(() => {
    $('#requestMenu').hide()

    $(document).on('click', '#btn-submit', () => {
        if (checkForm()) {
            registerRequest()    
        } else {
            alert('Please fill the following credentials')
        }
    })
})

var registerRequest = () => {
    $.ajax({
        type: 'POST',
        url: 'src/router.php',
        data: {
            choice: 'register',
            lastname: $('#lastname').val(),
            firstname: $('#firstname').val(),
            midname: $('#midname').val(),
            birthdate: $('#birthdate').val(),
            mailadd: $('#mailadd').val(),
            region: $('#region').val(),
            city: $('#city').val(),
            municipality: $('#municipality').val(),
            zipcode: $('#zipcode').val(),
            streetname: $('#streetname').val(),
            contact: $('#contact').val(),
            fathername: $('#fathername').val(),
            mothername: $('#mothername').val(),
            gender: $('#gender').val(),
            age: $('#age').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#lastname').val('')
                $('#firstname').val('')
                $('#midname').val('')
                $('#birthdate').val('')
                $('#mailadd').val('')
                $('#region').val('')
                $('#city').val('')
                $('#municipality').val('')
                $('#zipcode').val('')
                $('#streetname').val('')
                $('#contact').val('')
                $('#fathername').val('')
                $('#mothername').val('')
                $('#gender').val('')
                $('#age').val('')
                alert('Registration success')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {
            console.log(thrownError)
        }
    })
}

var checkForm = () => {
    if ($('#lastname').val() != '' && $('#firstname').val() != '' && $('#midname').val() != '' && $('#birthdate').val() != '' && $('#mailadd').val() != '' && $('#region').val() != '' && $('#city').val() != '' && $('#municipality').val() != '' && $('#zipcode').val() != '' && $('#streetname').val() != '' && $('#contact').val() != '' && $('#fathername').val() != '' && $('#mothername').val() != '' && $('#gender').val() != '' && $('#age').val() != '') {
        return true
    } else {
        return false
    }
}