<?php
$categoryCont = new CategoryController();
$postContr = new PostController();

if (isset($_GET['query'])) :
    $query = $_GET['query'];
    $searchPost =  $postContr->searchPost($query);
?>

<div class="page-category">
    <div class="category-description">
        <h1><?php echo count($searchPost); ?> result(s) found for <span
                class="text text-warning"><?php echo $query; ?></span> </h1>
    </div>
</div>

<section class="section-stories">
    <div class="row">
        <div class="col-md-12 stories-panel shadow">
            <div class="row">
                <?php
                    if (count($searchPost) > 0) {

                        foreach ($searchPost as $post) :
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
                <div class="col-md-12 feature-post">
                    <div class="text-center">
                        <h1 class="font-weight-normal"><span class="fas fa-frown text-primary"></span> Sorry, no results
                            found.</h1>
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