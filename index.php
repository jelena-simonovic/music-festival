<?php
session_start();
// PAGE TITLE
$page = 'index';

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
}

require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

try {
    $mostProducts = Product::getSixRandomProducts();
    $getTicket = Product::getTicket();
    $getVipTicket = Product::getVipTicket();
} catch (\Throwable $th) {
    die("ERROR");
}

// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-index.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
