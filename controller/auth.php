<?php
include '../autoloader/autoloader.php';
$userContr = new UserController();
if (!empty(isset($_POST['email'])) && !empty(isset($_POST['password']))) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $userContr->getAuthUser($email);
    if ($result > 0) {
        if (password_verify($password, $result['user_password'])) {
            echo 'success';

            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['name'] = $result['user_name'];
            $_SESSION['email'] = $result['user_email'];
            $_SESSION['role'] = $result['user_role'];
        } else {
            echo 'invalid';
        }
    } else {
        echo 'no_user';
    }
}