<?php
session_start();

require_once __DIR__ . "/Models/Model.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-user-profile.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
