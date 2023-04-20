$(document).ready(()=>{
    $('#printCard').hide()

    $(document).on('click', '#sendReq', () => {
        if ($('#contact').val() != '' && $('#mail').val() != '') {
            viewRequest()
        } else {
            alert('Please enter credentials')
        }
    })
})

var viewRequest = () => {
    $.ajax({
        type: 'POST',
        url: '../src/router.php',
        data: {
            choice: 'displayCard',
            contact: $('#contact').val(),
            email: $('#mail').val()
        },
        success: (data) => {
            $('#contact').val('')
            $('#mail').val('')
            var jsonData = JSON.parse(data)
            var display = ''

            jsonData.forEach(element => {
                display += '<div class="padding">'+
                            '<div class="font">'+
                                '<div class="top">'+
                                    '<img src="./id-card/download.png">'+
                                '</div>'+
                                '<div class="bottom">'+
                                    '<p>'+element.lastname+', '+element.firstname+' '+element.midname[0]+'.</p>'+
                                    '<p class="desi">'+element.date_registered+'</p>'+
                                    '<br>'+
                                    '<p class="no">'+element.contact+'</p>'+
                                    '<p class="no">'+element.region+'</p>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="back">'+
                            '<h1 class="Details">Information</h1>'+
                            '<hr class="hr">'+
                            '<div class="details-info">'+
                                '<p><b>Email : </b></p>'+
                                '<p>'+element.mailadd+'</p>'+
                                '<p><b>Mobile No: </b></p>'+
                                '<p>'+element.contact+'</p>'+
                                '<p><b>Office Address:</b></p>'+
                                '<p>'+element.city+', '+element.municipality+', '+element.streetname+', '+element.zipcode+'</p>'+
                                '</div>'+
                                '<hr>'+
                            '</div>'+
                        '</div>'
            })
            $('#request').fadeOut(500)
            $('#printCard').fadeIn()
            $('#idcard').append(display).fadeIn('slow')
        }
    })
}