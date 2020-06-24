<?php
include "./autoloader/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include "./views/frontend/navbar.php"; ?>

    <div class="container-fluid" id="main-content">
        <?php
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }
        switch ($source) {
            case "post":
                include "./views/frontend/post.php";
                break;
            case "categories":
                include "./views/frontend/categories.php";
                break;
            case "search":
                include "./views/frontend/search.php";
                break;
            default:
                include "./views/frontend/main.php";
                break;
        }
        ?>

    </div>
    <footer>
        <div class="container-fluid bg-light">
            <div class="text-center p-lg-5">
                <h6 class="text-muted">All rigts reserved. <?php echo date("Y"); ?></h6>
            </div>
        </div>
    </footer>
    <script src="./dist/main.js"></script>
</body>

</html>