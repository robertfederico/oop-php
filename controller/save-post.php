<?php
session_start();
include '../autoloader/autoloader.php';
require '../vendor/autoload.php';

use Intervention\Image\ImageManager;

$manager = new ImageManager(array('driver' => 'gd'));

$postContr = new PostController();
$categoryContr = new CategoryController();

date_default_timezone_set('Asia/Manila');
$timeNow = time();

if (isset($_POST['postTitle'])) {
    $author = $_SESSION['user_id'];
    $postCategory = $_POST['postCategory'];
    $post_author =  $author;
    $postTitle =  $_POST['postTitle'];
    $slug = $categoryContr->createSlug($postTitle);

    $post_image = $_FILES['postImage']['name'];
    $post_image_temp = $_FILES['postImage']['tmp_name'];

    $post_content =  $_POST['post_content'];
    $dateAdded =  date('Y-m-d');

    $fileName = basename($_FILES["postImage"]["name"]);
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $targetDir = '../assets/bg-img/';
    $extensions_arr = array("jpg", "jpeg", "png");

    $imageName = $timeNow . "-" . $post_image;

    if (in_array($ext, $extensions_arr)) {

        if (($_FILES["postImage"]["size"] < 4000000)) {

            if (file_exists($targetDir)) {

                $image = $manager->make($post_image_temp)->resize(600, 400);
                $image->save('../assets/bg-img/' . $imageName);

                if ($image) {
                    $postContr->savePost($post_author, $postCategory, $postTitle, $slug, $imageName, $post_content, $dateAdded);
                    echo 'success';
                } else {
                    echo 'Something went wrong';
                }
            } else {
                mkdir('../assets/bg-img/', 0777, true);
            }
        } else {
            echo "Image size exceeds 4MB";
        }
    } else {
        echo 'Sorry, only JPG, JPEG and PNG files are allowed.';
    }
} else {
    echo 'empty inputs';
}

// if (move_uploaded_file($post_image_temp, $targetFilePath)) {
//     $postContr->savePost($post_author, $postCategory, $postTitle, $slug, $post_image, $post_content, $dateAdded);
//     echo 'success';
// } else {
//     echo "Sorry, there was an error uploading your file.";
// }