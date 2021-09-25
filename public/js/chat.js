$(document).ready(function () {
    if (sessionStorage.getItem('_token') == null) {
        window.location.href ="http://localhost:8000/";
    } 
    $("#chatform").submit(function (e) {
        e.preventDefault();
        var token = sessionStorage.getItem('_token');
        $.ajax({
            url: 'http://127.0.0.1:8000/api/chat',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+token
            },
            dataType: 'json',
            data: $("#chatform").serialize(),
            success: function (data) {
                //console.log(data);
            },
            error: function (err){
                console.log(err);
            }
        });
    });
});