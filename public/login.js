$(document).ready(() => {
    $(document).on('click', '#btn-login', () => {
        if (checkLogin()) {
            console.log("what")
            if(!loginRequest()){
                adminLogin()
                ifFalse()
            }
            
        } else {
            ifFalse()
        }
    })
    $(document).on('click', '#btn-registerUser', () => {
        if (checkRegister()) {
            registerUser() 
        } else {
            ifFalseRegister()
        }
    })
})

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
                window.location.href = 'index.php'
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

var adminLogin = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data:{
            choice: 'adminLogin',
            email: $('#email-login').val(),
            password: $('#password-login').val()
        },
        success: (data) => {
            console.log(data)
            if (data == "200") {
                window.location.href = 'dashboard.php'
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

var checkLogin = () => {
    return ($('#email-login').val() != '' && $('#password-login').val() != '') ? true : false
}

const checkRegister = () => {
    return ($('#firstname_user').val() != '' && $('#lastname_user').val() != '' && $('#email_user').val() != '' && $('password_user') != '') ? true : false
}

function ifFalse() {
                let emailLogin = document.getElementById('email-login')
                let passwordLogin = document.getElementById('password-login')
                emailLogin.style.border = '1px solid';
                emailLogin.style.borderColor = 'red';
                passwordLogin.style.border = '1px solid'
                passwordLogin.style.borderColor = 'red'
                passwordLogin.style.borderColor = "red solid 5px";
}    

function ifFalseRegister() {
    let emailRegister = document.getElementById('email_user')
    let passwordRegister = document.getElementById('password_user')
    let firstnameRegister = document.getElementById('firstname_user')
    let lastnameRegister = document.getElementById('lastname_user')
    emailRegister.style.border = '1px solid';
    emailRegister.style.borderColor = 'red';
    passwordRegister.style.border = '1px solid'
    passwordRegister.style.borderColor = 'red'
    firstnameRegister.style.border = '1px solid'
    firstnameRegister.style.borderColor = 'red'
    lastnameRegister.style.border = '1px solid'
    lastnameRegister.style.borderColor = 'red'
}  