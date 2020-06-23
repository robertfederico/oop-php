<?php
session_start();
include '../autoloader/autoloader.php';
$userContr = new UserController();

if (isset($_POST['profileEmail']) && isset($_POST['profileName'])) {

    $userId = $_SESSION['user_id'];
    $name = $_POST['profileName'];
    $email = $_POST['profileEmail'];

    if ($userContr->checkEmail($email, $userId)) {
        echo 'duplicate';
    } else {
        $userContr->update($name, $email, $userId);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        echo "success";
    }
}

if (isset($_POST['oldPassword']) && isset($_POST['newPassword'])) {

    $userId = $_SESSION['user_id'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $result = $userContr->checkPassword($userId);
    if ($result > 0) {
        if (password_verify($oldPassword, $result['user_password'])) {
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $userContr->updateUserPass($passwordHash, $userId);
            echo "success";
        } else {
            echo 'invalid';
        }
    } else {
        echo 'no_user';
    }
}