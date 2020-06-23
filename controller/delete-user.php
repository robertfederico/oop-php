<?php

include '../autoloader/autoloader.php';
$userContr = new UserController();

if (isset($_POST['userId'])) {

    $userId = $_POST['userId'];
    $userContr->delete($userId);
    $userContr->deletePost($userId);
    echo "success";
}