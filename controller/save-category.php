<?php
include '../autoloader/autoloader.php';

$categoryContr = new CategoryController();
date_default_timezone_set('Asia/Manila');

if (!empty(isset($_POST['category']))) {

    $categoryTitle =  $_POST['category'];
    $slug = $categoryContr->createSlug($categoryTitle);
    $dateAdded =  date('Y-m-d');

    if ($categoryContr->getDuplicateCategory($categoryTitle)) {
        echo 'duplicate';
    } else {
        $categoryContr->saveCategory($categoryTitle, $slug, $dateAdded);
        echo 'success';
    }
} else {
    echo 'empty inputs';
}