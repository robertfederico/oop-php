<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <section>
        <div class="auth-page">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Register</h4>
                        <form method="POST" class="my-login-validation needs-validation" id="registerForm"
                            novalidate="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="" required
                                    autofocus>
                                <div class="invalid-feedback">
                                    Name is invalid
                                </div>
                            </div>

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
                                    <input type="checkbox" name="agree" id="agree" class="custom-control-input"
                                        required="">
                                    <label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and
                                            Conditions</a></label>
                                    <div class="invalid-feedback">
                                        You must agree with our Terms and Conditions
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" id="register" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Already have an account? <a href="./login.php">Login</a>
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