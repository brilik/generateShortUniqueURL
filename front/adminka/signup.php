<?php
if(is_user_logged_in()){
    header('Location: /admin');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp | Short Unique URL</title>
    <link rel="stylesheet" href="<?= admin_url(); ?>/assets/css/bootstrap.min.css">
</head>
<body>
<section class="form-sign min-vh-100">
    <div class="form-wrap">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Sign Up</h1>
                    <div class="px-2">
                        <form id="signup" method="post" class="justify-content-center">
                            <div class="form-group">
                                <label class="sr-only">Name</label>
                                <input type="text" name="login" class="form-control" placeholder="Enter login">
<!--                                <small class="form-text text-danger">We'll never share your email with anyone else.</small>-->
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <input type="password" name="repassword" class="form-control mt-2" placeholder="Re-password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                <a href="/signin">Login</a>
                            </div>
                            <div style="display: none">
                                <input type="hidden" name="action" id="action" value="singup">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= admin_url(); ?>/assets/css/custom.css">
<script src="<?= admin_url(); ?>/assets/js/custom.js"></script>
</body>
</html>