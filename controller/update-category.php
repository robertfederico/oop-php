<?php
include '../autoloader/autoloader.php';
$categoryContr = new CategoryController();

if (isset($_POST['categoryId']) && isset($_POST['title'])) {
    $categoryId = $_POST['categoryId'];
    $title = $_POST['title'];
    $slug = $categoryContr->createSlug($title);

    if ($categoryContr->checkCategoryTitle($title, $categoryId)) {
        echo 'duplicate';
    } else {
        $categoryContr->update($title, $slug, $categoryId);
        echo "success";
    }
}