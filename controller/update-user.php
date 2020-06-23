<?php
include '../autoloader/autoloader.php';
$userContr = new UserController();

if (isset($_POST['userId']) && isset($_POST['name'])) {

    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($userContr->checkEmail($email, $userId)) {
        echo 'duplicate';
    } else {
        $userContr->update($name, $email, $userId);
        echo "success";
    }
}