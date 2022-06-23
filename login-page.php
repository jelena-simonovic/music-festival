<?php
session_start();

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/User.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-login.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";

use Models\User\User;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loggedInUser = new User();
    $loggedInUser->Login($username, $password);
    $_SESSION['login'] = true;
}
if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
}
