$(document).ready(function() {
    viewApplicants()
    
    var i = 0
    $(document).on('click', '#changepass', ()=>{
        i++
        if (i == 1) {
            $('#inputpass').fadeIn('slow')
        } 
        if(i == 2) {
            $('#inputpass').fadeOut('slow')
            $('#newpass').prop('type', 'password')
            $('#flexCheckDefault').prop("checked", false)
            $('#newpass').val('')
            i = 0
        }
    })

    $(document).on('click', '#flexCheckDefault', () => {
        if(document.getElementById('flexCheckDefault').checked){
            $('#newpass').prop('type', 'text')
        } else {
            $('#newpass').prop('type', 'password')
        }
    })

    $(document).on('click', '#navburger', ()=>{
        $('#inputpass').fadeOut('slow')
        $('#newpass').prop('type', 'password')
        $('#flexCheckDefault').prop("checked", false)
        $('#newpass').val('')
    })

    $(document).on('click', '#logout', () => {
        logout()
    })

    $(document).on('click', '#btn-changepass', () => {
        if (checkNewPass()) {
            changePassword()
        } else {
            alert('Enter your new password')
        }
    })
})

var deleteRecord = (id) => {
    if (confirm('Are you sure you want to delete this record?')) {
        deleteThis(id)
    } else {
        alert('Keeping is secure')
    }
}

var deleteThis = (id) => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'removeapplicant',
            id: id
        },
        success: (data) => {
            if (data == "200") {
                alert('Successfully Removed')
                $('#profilecard').load(location.href + ' #profilecard')
                viewApplicants()
            }
        },
        error: (xhr, ajaxOptions, err) => {console.log(err);}
    })
}

var changePassword = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'changepassword',
            newpassword: $('#newpass').val()
        },
        success: (data) => {
            console.log(data);
            if (data == '200') {
                $('#newpass').prop('type', 'password')
                $('#flexCheckDefault').prop("checked", false)
                $('#newpass').val('')
                alert('Password change successfully')
            }
        },
        error: (xhr, ajaxOptions, err) => {console.log(err);}
    })
}

var logout = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'logout'
        },
        success: (data) => {
            window.location.href = './login.html'
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
    })
}

var viewApplicants = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'view'
        },
        success: (data) => {
            $('#inputpass').hide()
            var jsonData = JSON.parse(data)
            var applicants = ''
            
            jsonData.forEach(element => {
                applicants += '<div class="col-md-4 col-md-4 col-lg-6 mt-4">'+
                                '<div class="card">' +
                                '<img class="card-img-top" src="">'+ 
                                '<div class="card-block">' +
                                '<h4 class="card-title">'+ element.lastname.toUpperCase() +' ' + element.firstname.toUpperCase() +'</h4>'+
                                '<div class="meta" id="gender">' +
                                '<a href="#">'+element.gender.toUpperCase()+'</a>' +
                                '</div>' +
                                '<div class="card-text">'+ element.region.toUpperCase() + ' '+ element.city.toUpperCase() + '" "'+ element.municipality.toUpperCase() + '" "'+ element.streetname.toUpperCase() +'" "'+ element.zipcode +'</div>' +
                                '</div>'+
                                '<div class="card-footer">' +
                                '<span class="float-right">'+ element.date_registered +'</span>' +
                                '<span class="float-end">'+
                                '<abbr title="Delete"><a role="button" onclick="deleteRecord('+element.id+');" id="'+ element.id +'" class="me-2 "><i class="fa fa-trash"></i></i></a></abbr>'+
                                '</span>' +
                                '</div>'+
                                '</div>'+
                                '</div>'
            })
            $('#profilecard').append(applicants)
        },
        error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError)}
    })
}


var checkNewPass = () => {
    return ($('#newpass').val() != '') ? true : false
}