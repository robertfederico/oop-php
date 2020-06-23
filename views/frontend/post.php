<?php
$categoryCont = new CategoryController();
$postContr = new PostController();

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $post =  $postContr->showPostBySlug($slug);
?>

<?php
    foreach ($post as $singlePost) :


    ?>

<div class="page-header">
    <div class="page-header-bg">
        <img src="./assets/bg-img/<?php echo $singlePost['image']; ?>" alt="">
    </div>
    <div class="header-description">
        <div class="post-category">
            <a href="">Animals</a>
        </div>
        <h1><?php echo $singlePost['title']; ?></h1>
        <ul class="post-meta">
            <li><a href="#">Jacquie Smith</a></li>
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