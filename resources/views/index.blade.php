<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task</title>
</head>

<body>
<div class="container">
        <div class="row align-items-center" style="margin-top: 150px;">
            <div class="col-6 offset-2" id="swapper">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card" id="logincard">
                            <div class="card-header">
                                Login
                            </div>
                            <div class="card-body">
                                <form method="post" id="loginform">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="loginemail" placeholder="name@example.com">
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="loginpassword" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">Login</button>

                                </form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="http://localhost:8000/api/login/google/redirect" class="btn btn-danger btn-block mt-4">Google</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="http://localhost:8000/login/facebook/redirect" class="btn btn-primary btn-block mt-4">Facebook</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card" id="regcard">
                            <div class="card-header">
                                Register
                            </div>
                            <div class="card-body">
                                <form method="post" id="registerform">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="name" id="registername" placeholder="Enter name">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="registeremail" placeholder="name@example.com">
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="registerpassword" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</body>

</html>