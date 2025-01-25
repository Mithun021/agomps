<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title>AGOMPS - <?= $title ?? '' ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>public/admin/img/core-img/favicon.png">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/default-assets/new/sweetalert-2.min.css">

</head>

<body class="login-area">

    <!-- Preloader -->
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="hero">
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body p-4">

                                <!-- Logo -->
                                <h4 class="font-24 mb-30">Login.</h4>

                                <form id="adminLoginForm">
                                    <div class="form-group">
                                        <input class="form-control login" type="text" id="username" name="username" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group">
                                        <a href="forget-password.html" class="text-dark float-right"></a>
                                        <input class="form-control login" type="password" name="password" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                        <div class="checkbox d-inline mb-0">
                                            <!-- <input type="checkbox" name="checkbox-1" id="checkbox-8"> -->
                                            <!-- <label for="checkbox-8" class="cr mb-0 font-13">Remember me</label> -->
                                        </div>
                                        <span><a class="font-12 text-success" href="forget-password.html">Forgot your password?</a></span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit" id="submit_btn"> Log In </button>
                                    </div>

                                </form>

                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Plugins Js -->
    <script src="<?= base_url() ?>public/admin/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/admin/js/popper.min.js"></script>
    <script src="<?= base_url() ?>public/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/admin/js/bundle.js"></script>

    <!-- Active JS -->
    <script src="<?= base_url() ?>public/admin/js/default-assets/active.js"></script>
    <!-- Sweet Alert  -->
    <!-- Inject JS -->
    <script src="<?= base_url() ?>public/admin/js/default-assets/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>public/admin/js/default-assets/sweetalert-init.js"></script>
    <!-- Jquery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#adminLoginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 6 // Minimum length for password
                    }
                },
                messages: {
                    username: {
                        required: "Required User ID",
                        minlength: "Your ID must be at least 3 characters long"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 6 characters"
                    }
                },
                submitHandler: function(form) {
                    var requestedData = {
                        userId: $('#username').val(),
                        userPassword: $('#password').val()
                    }
                    // console.log(requestedData);
                    $.ajax({
                        type: "post",
                        url: "<?= base_url() ?>admin/login",
                        data: requestedData,
                        success: function(response) {
                            if (response == "dataMatch") {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Account Successfully Login",
                                    showConfirmButton: false,
                                    timer: 2500
                                }).then(function() {
                                    window.location.href = "<?= base_url() ?>admin";
                                });

                            } else {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: response,
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>