<?php

session_start();
if (isset($_SESSION['email'])) {
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    echo 'logout';
}