<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task</title>
    @if($token)
    <script>
        sessionStorage.setItem("_token", "{{$token}}");
    </script>
    @endif
</head>

<body>
    <div class="container">
        <div class="card" id="logincard">
            <div class="card-header">
                Chat
            </div>
            <div class="card-body">
                <form method="get" id="chatform">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="msg" placeholder="Msg"></textarea>
                        <label for="email">Email address</label>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Send</button>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/chat.js')}}"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4daa1caa579dcb6bc1cc', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</body>

</html>