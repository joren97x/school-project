$(document).ready(() => {
    $(document).on('click', '#btn-login-user', () => {
        if (checkLogin()) {
            loginRequest()
        } else {
            alert('Please enter texts')
        }
    })
})

var loginRequest = () => {
    $.ajax({
        type: 'POST',
        url: '/alexis/src/router.php',
        data:{
            choice: 'login-user',
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val()
        },
        success: (data) => {
            console.log(data)
            if (data == "200") {
                window.location.href = 'public/dashboard.html'
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
        
    })

}

var checkLogin = () => {
    return ($('#firstName').val() != '' && $('#lastName').val() != '') ? true : false
}