<section class="section-main">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 p-0">
            <div class="row card-left">
                <?php
                $postContr = new PostController();
                $post = $postContr->singlePost();
                foreach ($post as $singlePost) :
                ?>
                <div class="col-md-12">
                    <img src="./assets/bg-img/<?php echo $singlePost['image']; ?>" alt="ocean" class="img-left">
                    <div class="description">
                        <a href="index.php?source=post&slug=<?php echo $singlePost['slug'] ?>">
                            <?php echo $singlePost['title']; ?>
                        </a>
                    </div>
                </div>
                <?php endforeach;  ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 p-0">
            <div class="row card-right">
                <?php
                $postContr = new PostController();
                $posts = $postContr->randomPosts();
                foreach ($posts as $randomPost) :
                ?>
                <div class="col-md-6 p-0">
                    <img src="./assets/bg-img/<?php echo $randomPost['image']; ?>" alt="office" class="img-right">
                    <div class="description">
                        <a href="index.php?source=post&slug=<?php echo $randomPost['slug'] ?>">
                            <?php echo $randomPost['title']; ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="section-stories">
    <div class="row">
        <div class="col-md-8 stories-panel shadow">
            <div class="stories-title">
                <h2 class="m-0">Recent Posts</h2>
            </div>
            <div class="row">
                <?php
                $postContr = new PostController();
                $posts = $postContr->latestPosts();
                foreach ($posts as $latestPost) :
                ?>
                <div class="col-md-6 feature-post">
                    <img src="./assets/bg-img/<?php echo $latestPost['image']; ?>" alt="reading" class="img-fluid">
                    <div class="stories-desc">
                        <a href="index.php?source=post&slug=<?php echo $latestPost['slug'] ?>">
                            <?php echo $latestPost['title'] ?>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="categories-panel shadow">
                <div class="panel-title">
                    <h2 class="">Categories</h2>
                </div>
                <div class="categories">
                    <ul class="list-group list-group-flush">
                        <?php
                        $categoryContr = new CategoryController();
                        $categories = $categoryContr->categories();
                        foreach ($categories as $category) :
                        ?>
                        <li class="list-group-item"><a
                                href="index.php?source=categories&slug=<?php echo $category['slug'] ?>"><?php echo $category['name'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>