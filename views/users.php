<?php
include "partials/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "partials/sidebar.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php include "partials/topnav.php"; ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fas fa-users-cog fa-2x"></i>
                                </div>
                                <h4 class="card-title">Registered Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-hover" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Date Registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="fas fa-user-alt fa-2x"></i>
                    </div>
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation" id="updateUser" novalidate>
                        <div class="row">
                            <label class="col-md-3 col-form-label" for="name">Name :</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-input" name="name" id="name" required>
                                    <span class="border"></span>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-3 col-form-label" for="email">Email :</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" class="form-input" name="email" id="email" required>
                                    <span class="border"></span>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="userId" name="userId">
                            <button type="submit" id="updateUser" class="btn btn-submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/main.js"></script>
</body>

</html>