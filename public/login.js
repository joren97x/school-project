$(document).ready(() => {
    $(document).on('click', '#btn-login', () => {
        if (checkLogin()) {
            loginRequest()
        } else {
            alert('Please login first')
        }
    })
    $(document).on('click', '#btn-submit', () => {
        if (checkForm()) {
            registerRequest()    
        } else {
            alert('Please fill the following credentials')
        }
    })
    $(document).on('click', '#btn-registerAdmin', ()=>{
        if (checkRegister()) {
            register()
        } else {
            alert('Please fill up the missing credintials')
        }
    })
})

var registerRequest = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
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
            age: $('#age').val(),
            username: $('#username').val(),
            password: $('#password').val()
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
                $('#username').val('')
                $('#password').val('')
                alert('Registration success')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {
            console.log(thrownError)
        }
    })
}

const register = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'registeradmin',
            username_admin: $('#username_admin').val(),
            email_admin: $('#email_admin').val(),
            password_admin: $('#password_admin').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#username_admin').val('')
                $('#email_admin').val('')
                $('#password_admin').val('')
                alert('Registration Success')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}



var loginRequest = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data:{
            choice: 'login',
            username: $('#usernameLogin').val(),
            password: $('#passwordLogin').val()
        },
        success: (data) => {
            console.log(data)
            if (data == "200") {
                window.location.href = 'index.php'
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

var checkLogin = () => {
    return ($('#usernameLogin').val() != '' && $('#passwordLogin').val() != '') ? true : false
}

const checkRegister = () => {
    return($('#username_admin').val() != '' && $('#email_admin').val() != '' && $('#password_admin').val() != '') ? true : false
}

var checkForm = () => {
    if ($('#lastname').val() != '' && $('#username').val() != '' && $('#password').val() != '' && $('#firstname').val() != '' && $('#midname').val() != '' && $('#birthdate').val() != '' && $('#mailadd').val() != '' && $('#region').val() != '' && $('#city').val() != '' && $('#municipality').val() != '' && $('#zipcode').val() != '' && $('#streetname').val() != '' && $('#contact').val() != '' && $('#fathername').val() != '' && $('#mothername').val() != '' && $('#gender').val() != '' && $('#age').val() != '') {
        return true
    } else {
        return false
    }
}