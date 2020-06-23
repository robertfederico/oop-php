<?php
include '../autoloader/autoloader.php';
require '../vendor/autoload.php';

use Intervention\Image\ImageManager;

$manager = new ImageManager(array('driver' => 'gd'));
$categoryContr = new CategoryController();
$postContr = new PostController();

date_default_timezone_set('Asia/Manila');
$timeNow = time();

if (isset($_POST['postCategory']) && isset($_POST['post_content']) && isset($_POST['postTitle'])) {

    $postId = $_POST['postId'];
    $postCategory = $_POST['postCategory'];
    $post_content = $_POST['post_content'];
    $postTitle = $_POST['postTitle'];

    $slug = $categoryContr->createSlug($postTitle);
    $image = $postContr->postImage($postId);

    // check if image is not empty
    if (!empty($_FILES['postImage']['name'])) {
        $imageName = $timeNow . "-" . $_FILES['postImage']['name'];

        $postImage = $_FILES['postImage']['name'];
        $post_image_temp = $_FILES['postImage']['tmp_name'];
        $fileName = basename($postImage);
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetDir = '../assets/bg-img/';
        $extensions_arr = array("jpg", "jpeg", "png");

        if (in_array($ext, $extensions_arr)) {
            if (($_FILES["postImage"]["size"] < 5000000)) {
                // delete image from the folder
                unlink($targetDir . $image);

                $makeImage = $manager->make($post_image_temp)->resize(600, 400);
                $makeImage->save('../assets/bg-img/' . $imageName);
            } else {
                echo "Image size exceeds 5MB";
            }
        } else {
            echo 'Sorry, only JPG, JPEG and PNG files are allowed.';
        }
    } else {

        $imageName = $image;
    }

    $update = $postContr->update($postCategory, $postTitle, $slug, $imageName, $post_content, $postId);

    if ($update) {
        echo 'success';
    } else {
        echo "error.";
    }
}