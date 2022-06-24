<?php
$page = 'register-page';


require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/User.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-register.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";

use Models\User\User;
/*
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


try {
    if (isset($_POST['submit'])) {
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
        if (!empty($_POST['repass']) && $_POST['repass'] == trim($_POST['password'])) {
            $repass = $_POST['repass'];
        } else if (empty($repass)) {
            $systemErrors['repass'] = "Not the same password value!";
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
        $newUser = new Register($name, $last_name, $password, $email, $gender);
        $newUser->Register($name, $last_name, $password, $email, $gender, $systemErrors);
    }
} catch (\Throwable $th) {
    echo "error";
}
 
*/
/*

     gender (options: male, female).
       Ispisivati greske pri validaciji.
 Ako validacija prodje upisati usera u bazi i redirektovati se na stranicu login-page.php.*/