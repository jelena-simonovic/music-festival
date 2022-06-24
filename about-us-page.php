<?php
session_start();
$page = "about-us-page";
// PAGE TITLE

require_once __DIR__ . "/Models/Model.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-about-us.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
