<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-icon">
                <i class="fas fa-newspaper fa-2x"></i>
            </div>
            <div class="d-flex justify-content-between">
                <h4 class="card-title">My Posts</h4>
                <a href="create.post.php" class="btn btn-right">Create Post</a>
            </div>
        </div>
        <div class="card-body">
            <section class="section-stories">
                <div class="row">
                    <div class="col-md-12 stories-panel">
                        <div class="row">
                            <?php
                            $userId = $_SESSION['user_id'];

                            $categoryCont = new CategoryController();
                            $postContr = new PostController();
                            $userContr = new UserController();

                            $user = $userContr->getUsers($userId);
                            $posts = $postContr->showPostByUser($userId);

                            if (count($posts) > 0) {

                                foreach ($posts as $post) :

                                    $postContent = str_replace('&', '&amp;', $post['body']);
                            ?>
                            <div class="col-md-4 feature-post border-right">
                                <img src="../assets/bg-img/<?php echo $post['image']; ?>" alt="reading"
                                    class="img-fluid">
                                <div class="stories-desc">
                                    <?php echo $post['title'] ?>
                                </div>
                                <div class="actions text-center mt-3">
                                    <button class="btn btn-danger deleteMyPost" data-id="<?php echo $post['id'] ?>"
                                        id="deleteMyPost">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary editMyPost"
                                        data-id="<?php echo $post['id'] ?>" data-id="<?php echo $post['id'] ?>"
                                        data-user="<?php echo $user ?>"
                                        data-category="<?php echo $post['category_id'] ?>"
                                        data-title="<?php echo $post['title'] ?>"
                                        data-image="<?php echo $post['image'] ?>"
                                        data-content="<?php echo $postContent ?>" id="editMyPost">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                            <?php endforeach;
                            } else {
                                ?>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h1 class="font-weight-normal"><span class="fas fa-frown text-primary"></span>
                                        You have no post.</h1>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
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
                <form class="form-horizontal needs-validation" id="updateMyPost" novalidate
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
                                        <img src alt="" id="image" class="img">
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
                        <button type="submit" id="updatePost" class="btn btn-submit updateMyPost">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>