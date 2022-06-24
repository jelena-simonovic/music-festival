<?php
session_start();

$page = 'thank-you-page';

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-thank-you.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
