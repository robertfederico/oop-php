<?php
$categoryCont = new CategoryController();
$postContr = new PostController();
$userContr = new UserController();

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $post =  $postContr->showPostBySlug($slug);
?>

<?php
    foreach ($post as $singlePost) :
        $author = $userContr->getUsers($singlePost['user_id']);
        $category = $categoryCont->getCategoryName($singlePost['category_id']);
    ?>

<div class="page-header">
    <div class="page-header-bg">
        <img src="./assets/bg-img/<?php echo $singlePost['image']; ?>" alt="">
    </div>
    <div class="header-description">
        <div class="post-category">
            <a href=""><?php echo $category; ?></a>
        </div>
        <h1><?php echo $singlePost['title']; ?></h1>
        <ul class="post-meta">
            <li><a href="#"><?php echo $author; ?></a>
            </li>
            <li><?php echo date("M j Y", strtotime($singlePost['created_at'])); ?></li>
        </ul>
    </div>
</div>

<section class="post-content">
    <div class="container">
        <div class="post-body">
            <?php echo str_replace('&', '&amp;', $singlePost['body']) ?>
        </div>
    </div>
</section>

<?php
    endforeach;
}

?>