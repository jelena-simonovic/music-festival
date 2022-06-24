<?php
session_start();

$page = "contact-us-page";
// PAGE TITLE

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Contacts.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-contact-us.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
/*

$systemErrors = [
    'name' => '',
    'email' => '',
    'message' => ''
];

$name = null;
$email = null;
$message = null;


if (isset($_POST['contact'])) {
    if (!empty($_POST['name']) && is_string($_POST['name'])) {
        $name = $_POST['name'];
        $name = trim($name);
    } else if (empty($name)) {
        $systemErrors['name'] = "Field name is required!";
    }

    if (!empty($_POST['email']) && str_contains($_POST['email'], '@')) {
        $email = $_POST['email'];
        $email = trim($email);
    } else if (empty($email)) {
        $systemErrors['email'] = "Email must contain @!";
    }
    if (!empty($_POST['message']) && is_string($_POST['message'])) {
        $message = $_POST['message'];
        $message = trim($message);
    } else if (empty($message)) {
        $systemErrors['message'] = "Field name is required!";
    }
    $newContact = new Contacts();
    $newContact->setName($name);
    $newContact->getName($name);
    $newContact->setEmail($email);
    $newContact->getEmail($email);
    $newContact->setMessage($message);
    $newContact->getMessage($message);
    $newContact->addContacts($name, $email, $message);
}

*/