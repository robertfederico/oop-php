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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-icon">
                                    <i class="fas fa-users-cog fa-2x"></i>
                                </div>
                                <h4 class="card-title">Categories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-hover"
                                        id="categoriesTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Category Title</th>
                                                <th>Date Added</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-form-title card-icon">
                                    <h4>Add Category</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal needs-validation" id="addCategory" novalidate>
                                    <div class="row">
                                        <label class="col-md-3 col-form-label" for="category">Title :</label>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="form-input" name="category" id="category"
                                                    required>
                                                <span class="border"></span>
                                                <div class="invalid-feedback">
                                                    Category title is required
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="saveCategory" class="btn btn-submit">Save
                                            Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="categoryModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="fas fa-user-alt fa-2x"></i>
                    </div>
                    <h4 class="modal-title">Update Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation" id="updateCategory" novalidate>
                        <div class="row">
                            <label class="col-md-3 col-form-label" for="name">Name :</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" class="form-input" name="title" id="title" required>
                                    <span class="border"></span>
                                    <div class="invalid-feedback">
                                        Category Title is required.
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="categoryId" name="categoryId">
                            <button type="submit" id="updateCategory" class="btn btn-submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/main.js"></script>
</body>

</html>