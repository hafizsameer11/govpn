<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>GO VPN Login</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
</head>

<body class="bg-theme bg-theme1">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <img src="assets/images/logo-icon.png" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                    </div>


                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter your email address" name="email" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control"
                                                placeholder="Enter your password" name="password" />
                                        </div>
                                        <div class="form-row">


                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <button type="submit" class="btn btn-light btn-block">Log In</button>
                                            <button type="button" class="btn btn-light"><i
                                                    class="lni lni-arrow-right"></i>
                                            </button>
                                        </div>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/images/login-images/login-frent-img.jpg"
                                    class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>
