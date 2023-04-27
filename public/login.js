$(document).ready(() => {
    $(document).on('click', '#btn-login', () => {
        if (checkLogin()) {
            loginRequest()
        } else {
            alert('Please login first')
        }
    })
    $(document).on('click', '#btn-registerUser', () => {
        console.log("clicked")
        if (checkRegister()) {
            registerUser()    
        } else {
            alert('Please fill the following credentials')
        }
    })
    $(document).on('click', '#btn-registerAdmin', ()=>{
        if (checkRegister()) {
            registerAdmin()
        } else {
            alert('Please fill up the missing credintials')
        }
    })
})

// var registerRequest = () => {
//     $.ajax({
//         type: 'POST',
//         url: '../src/router.php',
//         data: {
//             choice: 'register',
//             lastname: $('#lastname').val(),
//             firstname: $('#firstname').val(),
//             midname: $('#midname').val(),
//             birthdate: $('#birthdate').val(),
//             mailadd: $('#mailadd').val(),
//             region: $('#region').val(),
//             city: $('#city').val(),
//             municipality: $('#municipality').val(),
//             zipcode: $('#zipcode').val(),
//             streetname: $('#streetname').val(),
//             contact: $('#contact').val(),
//             fathername: $('#fathername').val(),
//             mothername: $('#mothername').val(),
//             gender: $('#gender').val(),
//             age: $('#age').val(),
//             username: $('#username').val(),
//             password: $('#password').val()
//         },
//         success: (data) => {
//             console.log(data);
//             if (data == "200") {
//                 $('#lastname').val('')
//                 $('#firstname').val('')
//                 $('#midname').val('')
//                 $('#birthdate').val('')
//                 $('#mailadd').val('')
//                 $('#region').val('')
//                 $('#city').val('')
//                 $('#municipality').val('')
//                 $('#zipcode').val('')
//                 $('#streetname').val('')
//                 $('#contact').val('')
//                 $('#fathername').val('')
//                 $('#mothername').val('')
//                 $('#gender').val('')
//                 $('#age').val('')
//                 $('#username').val('')
//                 $('#password').val('')
//                 alert('Registration success')
//             }
//         },
//         error: (xhr, ajaxOptions, thrownError) => {
//             console.log(thrownError)
//         }
//     })
// }

const registerAdmin = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'register',
            firstname: $('#firstname_admin').val(),
            lastname: $('#lastname_admin').val(),
            email: $('#email_admin').val(),
            password: $('#password_admin').val(),
            userType: $('#userType_admin').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#firstname_admin').val('')
                $('#lastname_admin').val('')
                $('#email_admin').val('')
                $('#password_admin').val('')
                $('userType_admin').val('')
                alert('Registration Success')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}

const registerUser = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'register',
            firstname: $('#firstname_user').val(),
            lastname: $('#lastname_user').val(),
            email: $('#email_user').val(),
            password: $('#password_user').val(),
            userType: $('#userType_user').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#firstname_user').val('')
                $('#lastname_user').val('')
                $('#email_user').val('')
                $('#password_user').val('')
                $('userType_user').val('')
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
            email: $('#email-login').val(),
            password: $('#password-login').val()
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
    return ($('#email-login').val() != '' && $('#password-login').val() != '') ? true : false
}

const checkRegister = () => {
    return($('#firstname').val() != '' && $('#lastname').val() != '' && $('#email').val() != '' && $('password') != '') ? true : false
}
