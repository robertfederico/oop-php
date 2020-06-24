<?php
$categoryCont = new CategoryController();
$postContr = new PostController();
$userContr = new UserController();

if (isset($_GET['slug'])) :
    $slug = $_GET['slug'];
    $categoryCont =  $categoryCont->showCategoryBySlug($slug);

?>

<div class="page-category">
    <div class="category-description">
        <h1><?php echo $categoryCont[0]['name']; ?></h1>
    </div>
</div>

<section class="section-stories">
    <div class="row">
        <div class="col-md-12 stories-panel shadow">
            <div class="row">
                <?php
                    $categoryId = $categoryCont[0]['id'];
                    $posts = $postContr->showPostByCategory($categoryId);

                    if (count($posts) > 0) {

                        foreach ($posts as $post) :
                    ?>
                <div class="col-md-4 feature-post border-right">
                    <img src="./assets/bg-img/<?php echo $post['image']; ?>" alt="reading" class="img-fluid">
                    <div class="stories-desc">
                        <a href="index.php?source=post&slug=<?php echo $post['slug'] ?>">
                            <?php echo $post['title'] ?>
                        </a>
                    </div>
                </div>
                <?php endforeach;
                    } else {
                        ?>
                <div class="col-md-12 feature-post result-bx">
                    <div class="text-center">
                        <h1 class="font-weight-normal"><span class="fas fa-frown text-primary"></span> Sorry, no posts
                            yet.</h1>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
endif;
?>