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
                                    <i class="fas fa-newspaper fa-2x"></i>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Posts</h4>
                                    <a href="create.post.php" class="btn btn-right">Create Post</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-hover" id="postsTable">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Author</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Date Added</th>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="postModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="fas fa-newspaper fa-2x"></i>
                    </div>
                    <h4 class="modal-title">Update Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal needs-validation" id="updatePost" novalidate
                        enctype="multipart/form-data">
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="name">Author :</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" class="form-input" id="authorName" readonly>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label" for="postCategory">Category :</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <select name="postCategory" id="postCategory" class="form-input" required>
                                        <option value="">Select</option>
                                        <?php
                                        $categoriesContr = new CategoryController();
                                        $categories = $categoriesContr->getCategories();
                                        foreach ($categories as $category) :
                                            $categoryId = $category['id'];
                                            $categoryName = $category['name'];
                                        ?>
                                        <option value="<?php echo $categoryId ?>">
                                            <?php echo $categoryName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="border"></span>
                                    <div class="invalid-feedback">
                                        Post Category is required
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-2 col-form-label" for="postTitle">Title :</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <textarea class="form-input" name="postTitle" id="postTitle" required></textarea>
                                    <span class="border"></span>
                                    <div class="invalid-feedback">
                                        Post title is required
                                    </div>
                                </div>
                            </div>
                            <label for="image">Post Image :</label>
                            <div class="col-md-12">
                                <div class="picture-container">
                                    <div class="picture-wrapper">
                                        <div class="image">
                                            <img src alt="" id="image">
                                        </div>
                                        <div class="content">
                                            <div class="icon">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                            </div>
                                            <div class="text">
                                                No file Chosen, yet.
                                            </div>
                                        </div>
                                        <div id="cancel-button"><i class="fas fa-times"></i></div>
                                        <div class="file-name">File name here</div>
                                    </div>
                                    <input type="file" name="postImage" id="default-btn" hidden>
                                    <button type=" button" id="custom-btn">Choose a
                                        file</button>
                                </div>
                            </div>
                            <label for="" class="col-md-12 col-form-label">Post Content :</label>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="post_content" id="update_post_content" required></textarea>
                                    <div class="invalid-feedback">
                                        Post Content is required
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="postId" name="postId">
                            <button type="submit" id="updatePost" class="btn btn-submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/main.js"></script>
</body>

</html>