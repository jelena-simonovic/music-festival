<?php
/*
session_start();
// PAGE TITLE

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-create-design.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";

use Models\Product\Product;


$pagPage = 1;
$all = Product::getAvailableProducts($pagPage);
*/

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
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Models/Designs.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Models\Designs\Designs;
use Lib\ShoppingCart\ShoppingCart;

try {
    $designs = Designs::getAllDesigns();
} catch (\Throwable $th) {
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-create-design.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
