<?php
session_start();
if (!empty($_SESSION['name'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <section>
        <div class="auth-page">
            <div class="card-wrapper">
                <div class="text-right">
                    <a href="../../index.php" class="btn btn-sm btn-dark mb-2">
                        <i class=" fas fa-undo-alt"></i> Back to Blog
                    </a>
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form method="POST" class="needs-validation" id="loginForm" novalidate="">
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required
                                    autofocus>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" id="login" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have an account? <a href="./register.php">Create One</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="../../dist/main.js"></script>
</body>

</html>