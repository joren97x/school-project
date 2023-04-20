$(document).ready(() => {
    $(document).on('click', '#btn-login', () => {
        if (checkLogin()) {
            loginRequest()
        } else {
            alert('Please login first')
        }
    })
})

var loginRequest = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data:{
            choice: 'login',
            username: $('#username').val(),
            password: $('#password').val()
        },
        success: (data) => {
            console.log(data)
            if (data == "200") {
                window.location.href = './dashboard.html'
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}

var checkLogin = () => {
    return ($('#username').val() != '' && $('#password').val() != '') ? true : false
}