<?php

include '../autoloader/autoloader.php';
$postContr = new PostController();

if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];
    $postContr->deletePost($postId);
    echo "success";
}