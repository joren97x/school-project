$(document).ready(function() {
    $(document).on('click', '#btn-reg', ()=>{
        if (checkRegister()) {
            register()
        } else {
            alert('Please fill up the missing credintials')
        }
    })
})

const register = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'registeradmin',
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val()
        },
        success: (data) => {
            console.log(data);
            if (data == "200") {
                $('#username').val('')
                $('#email').val('')
                $('#password').val('')
                alert('Registration Success')
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}

const checkRegister = () => {
    return($('#username').val() != '' && $('#email').val() != '' && $('#password').val() != '') ? true : false
}