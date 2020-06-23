<?php
include '../autoloader/autoloader.php';
session_start();
if (empty($_SESSION['name'])) {
    header("Location: ./auth/login.php");
}