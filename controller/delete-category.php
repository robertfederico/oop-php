<?php

include '../autoloader/autoloader.php';
$categoryContr = new CategoryController();

if (isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];

    if (!$categoryContr->categoryHasPost($categoryId)) {
        $categoryContr->deleteCategory($categoryId);
        echo "success";
    } else {
        echo "";
    }
}