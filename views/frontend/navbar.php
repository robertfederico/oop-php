<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <a class="navbar-brand font-weight-bold" href="index.php">OOP PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                $categoryContr = new CategoryController();
                $categories = $categoryContr->showCategories();
                foreach ($categories as $category) :
                ?>

                <li class="nav-item">
                    <a class="nav-link"
                        href="categories.php/<?php echo $category['slug'] ?>"><?php echo $category['name'] ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            <form>
                <div class="searchbar">
                    <input class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon">
                        <i class="fas fa-search"></i></a>
                </div>
            </form>
            <ul class="navbar-nav ml-3">
                <li class="nav-item">
                    <a class=" nav-link" href="views/auth/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>