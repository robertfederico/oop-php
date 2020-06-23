<?php
include '../autoloader/autoloader.php';

$userContr = new UserController();
date_default_timezone_set('Asia/Manila');

if (!empty(isset($_POST['email'])) && !empty(isset($_POST['password']))) {

    $name =  $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'author';
    $dateRegistered =  date('Y-m-d');

    if ($userContr->getDuplicateEmail($email)) {
        echo 'duplicate';
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userContr->createUser($name, $email, $passwordHash, $role, $dateRegistered);
        echo 'success';
    }
} else {
    echo 'empty inputs';
}


// if (isset($_POST['id'])) {
//     $id = $_POST['id'];
//     $userContr->deleteUser($id);
//     echo "success";
// }