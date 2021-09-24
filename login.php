<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web application for visualisation data for arduino">
    <meta name="keywords" content="login, signin">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="assets/css/core.min.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet">

    <!-- Favicons -->
    <!--  <link rel="apple-touch-icon" href="./img/apple-touch-icon.png">-->
    <!--  <link rel="icon" href="./img/favicon.png">-->
</head>

<body>



<div class="row min-h-fullscreen center-vh p-20 m-0">
    <div class="col-12">
        <div class="card card-shadowed px-50 py-30 w-400px mx-auto text-center" style="max-width: 100%">
            <h5 class="text-uppercase text-center">Sign In</h5>
            <br>

            <form class="form-type-material rounded" method="POST" action="config/login_action.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username">
                    <label for="username">Username</label>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="form-group">
                <input type="submit" name="submit" value="Login" class="btn btn-bold btn-block btn-brown">
                </div>
            </form>
            <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a class="text-success fw-500" href="signup.php">Sign up</a></p>
        </div>


        <!--  <footer class="col-12 align-self-end text-center fs-13">-->
        <!--    <p class="mb-0"><small>Copyright © 2019 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</small></p>-->
        <!--  </footer>-->
    </div>

</div>


<!-- Scripts -->
<script src="assets/js/core.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/script.min.js"></script>

</body>
</html>
