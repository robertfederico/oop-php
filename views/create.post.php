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
                                <div class="card-form-title card-icon">
                                    <h4>Add Post</h4>
                                </div>
                                <a href="posts.php" class="btn btn-right float-right">Back to posts</a>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal needs-validation" enctype="multipart/form-data"
                                    id="addPost" novalidate>
                                    <div class="row">
                                        <div class="col-md-7 ml-auto mr-auto mb-3">
                                            <div class="row">
                                                <label class="col-md-2 col-form-label" for="postTitle">Post Title
                                                    :</label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <textarea class="form-input" name="postTitle" id="postTitle"
                                                            required></textarea>
                                                        <span class="border"></span>
                                                        <div class="invalid-feedback">
                                                            Post title is required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-2 col-form-label" for="postCategory">Category
                                                    :</label>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <select name="postCategory" id="postCategory" class="form-input"
                                                            required>
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
                                            </div>
                                            <div class="picture-container">
                                                <div class="picture-wrapper">
                                                    <div class="image">
                                                        <img src alt="">
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
                                                <input type="file" name="postImage" id="default-btn" hidden required>
                                                <button type="button" id="custom-btn">Choose a
                                                    file</button>
                                                <div class="invalid-feedback">
                                                    Post Image is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="col-form-label">Post Content :</label>
                                            <div class="form-group">
                                                <textarea name="post_content" id="post_content" required></textarea>
                                                <div class="invalid-feedback">
                                                    Post Content is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="savePost" class="btn btn-submit">Save
                                        Post</button>
                                </form>
                            </div>
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