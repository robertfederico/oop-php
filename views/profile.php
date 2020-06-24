<?php
include "partials/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "partials/sidebar.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php include "partials/topnav.php"; ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fas fa-user-edit fa-2x"></i>
                                </div>
                                <h4 class="card-title">Profile</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal needs-validation" id="updateUserProfile" novalidate>
                                    <div class="row  mb-3">
                                        <label class="col-md-2 col-form-label" for="profileName">Name
                                            :</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="profileName"
                                                    id="profileName" value="<?php echo $_SESSION['name']; ?>" required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    Name is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-md-2 col-form-label" for="profileEmail">Email
                                            :</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="email" class="form-input" name="profileEmail"
                                                    id="profileEmail" value="<?php echo $_SESSION['email']; ?>"
                                                    required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    Email is invalid
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="updateProfile" class="btn btn-submit float-right">Update
                                        Profile</button>
                                </form>
                            </div>
                        </div>

                        <div class="card mt-5">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fas fa-user-lock fa-2x"></i>
                                </div>
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal needs-validation" id="changePassword" novalidate>
                                    <div class="row  mb-3">
                                        <label class="col-md-3 col-form-label" for="oldPassword">Old Password
                                            :</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="form-input" name="oldPassword"
                                                    id="oldPassword" required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    Old Password is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-md-3 col-form-label" for="newPassword">New Password
                                            :</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="form-input" id="newPassword"
                                                    name="newPassword" required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    New Password is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-md-3 col-form-label" for="confirmPassword">Confirm Password
                                            :</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="form-input" id="confirmPassword"
                                                    name="confirmPassword" required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    The two passwords are not equal.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="updatePassword" class="btn btn-submit float-right">Save
                                        Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/main.js"></script>
</body>

</html>