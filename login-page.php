<?php
session_start();

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Login.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-login.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";

use Models\Login\Login;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loggedInUser = new Login($username, $password);
    $loggedInUser->Login($username, $password);
    $_SESSION['login'] = true;
}
if (isset($_GET['logout'])) {
    $_SESSION['login'] = false;
}
