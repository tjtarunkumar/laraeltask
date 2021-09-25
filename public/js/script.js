$(document).ready(function () {
    if (sessionStorage.getItem('_token') != null && sessionStorage.getItem('_token') != 'undefined') {
        window.location.href ="http://localhost:8000/chat";
    } 

    $("#loginform").submit(function (e) {
        e.preventDefault();

        //Login request
        $.ajax({
            url: 'http://127.0.0.1:8000/api/login',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: $("#loginform").serialize(),
            beforeSend: function () {
                $(`<div class="alert alert-warning" role="alert">
                Authenticating.......
            </div>`).insertAfter("#logincard");
            },
            success: function (data) {
                console.log(data);
                $(".alert-warning").remove();
                if (data.errors == null) {
                    
                    $(`<div class="alert alert-success" role="alert">
                Authentication Successful
            </div>`).insertAfter("#logincard");
            sessionStorage.setItem("_token", data.token);
            window.location.href ="http://localhost:8000/chat";
                }

            },
            error: function (err) {
                $(".alert-warning").remove();
                $(`<div class="alert alert-danger" role="alert">
                ${err.responseJSON['message'][0]}
            </div>`).insertAfter("#logincard");
            }
        });

    });

    $("#registerform").submit(function (e) {
        e.preventDefault();

        //Register request
        $.ajax({
            url: 'http://127.0.0.1:8000/api/register',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: $("#registerform").serialize(),
            success: function (data) {
                alert(data);
            },
            error: function (err) {
                console.log(err);
            }
        });

    });
});