<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" id="navbar">

    <?php
    $role = $_SESSION['role'];
    $showBars = $role == 'Admin' ? '<button class="" id="menu-toggle">
                                        <i class="fas fa-bars"></i>
                                    </button>' : '<a href="index.php" class="btn"><i class="fas fa-home fa-2x"></i></a>';
    echo $showBars;
    ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./profile.php"><?php echo $_SESSION['name']; ?></span></a>
            </li>
            <li class="nav-item dropdown">
                <?php
                $role = $_SESSION['role'];

                if ($role == "Admin") {
                }
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./profile.php">Profile</a>
                    <a class="dropdown-item" type="button" data-id="<?php echo $_SESSION['user_id'] ?>" id="logout">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>