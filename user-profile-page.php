<?php
session_start();
// PAGE TITLE
$page = "user-profile-page";

// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/User.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-user-profile.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";

// USING MODELS
use Lib\ShoppingCart\ShoppingCart;
use Models\Model\Model;
use Models\User\User;


$systemErrors = [
    'name' => '',
    'last_name' => '',
    'password' => '',
    'repass' => '',
    'email' => '',
    'gender' => ''
];
$name = null;
$last_name = null;
$password = null;
$repass = null;
$email = null;
$gender = null;


if (isset($_POST['save'])) {
    if (!empty($_POST['name']) && is_string($_POST['name'])) {
        $name = $_POST['name'];
        $name = trim($name);
    } else if (empty($name)) {
        $systemErrors['name'] = "Field name is required!";
    }
    if (!empty($_POST['last_name']) && is_string($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
        $last_name = trim($last_name);
    } else if (empty($last_name)) {
        $systemErrors['last_name'] = "Field last name is required!";
    }
    if (
        !empty($_POST['password'])
        && is_string($_POST['password'])
        && (strlen($_POST['password']) > 8)
        && (strtolower($_POST['password']) != $_POST['password'])
        && preg_match('~[0-9]+~', $_POST['password'])
    ) {
        $password = $_POST['password'];
        $password = trim($password);
    } else if (empty($name)) {
        $systemErrors['password'] = "Yor password must be at least 8 characters long, contain one uppercase letter, and one number!";
    }
    if (!empty($_POST['email']) && str_contains($_POST['email'], '@')) {
        $email = $_POST['email'];
        $email = trim($email);
    } else if (empty($email)) {
        $systemErrors['email'] = "Email must contain @!";
    }
    if (!empty($_POST['gender']) && ($_POST['gender'] == 'male' || $_POST['gender'] == 'female')) {
        $gender = $_POST['gender'];
        $gender = trim($gender);
    } else if (empty($gender)) {
        $systemErrors['gender'] = "Select your gender!";
    }
    $newUser = new User();
    $newUser->setName($name);
    $newUser->getName($name);
    $newUser->setLastName($last_name);
    $newUser->getLastName($last_name);
    $newUser->setEmail($email);
    $newUser->getEmail($email);
    $newUser->setPassword($password);
    $newUser->getPassword($password);
    $newUser->setGender($gender);
    $newUser->getGender($gender);
    $newUser->UpdateUserInformation($name, $last_name, $password, $email, $gender);
}
