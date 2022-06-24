<?php

session_start();

// PAGE TITLE
$page = "create-design-page";

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
}
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Designs.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Designs\Designs;
use Lib\ShoppingCart\ShoppingCart;

try {
    $designs = Designs::getAllDesigns();
    if (isset($_GET['create'])) {
        $title = $_GET['create'];
        $design = Designs::getOneDesignByTitle($title);
    } else if (empty($_GET['create'])) {
        $title = "Monarch Butterfly";
    }
} catch (\Throwable $th) {
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-create-design.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
