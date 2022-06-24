<?php
session_start();
// PAGE TITLE
$page = "all-products-page";

if (!empty($_GET['page'])) {
    $pagPage = $_GET['page'];
} else {
    $pagPage = 1;
}
// REQUIRE CLASSES
require_once __DIR__ . "/Models/Model.php";
require_once __DIR__ . "/Models/Product.php";
require_once __DIR__ . "/Lib/ShoppingCart.php";
require_once __DIR__ . "/Lib/ShoppingCartItem.php";

// USING MODELS
use Models\Product\Product;
use Lib\ShoppingCart\ShoppingCart;

try {
    // GET PRODUCTS
    $products = Product::getAvailableProducts($pagPage);
    $getTicket = Product::getTicket();
    $getVipTicket = Product::getVipTicket();
    // TERM AND SORT
    $term = "";
    $sort = "";
    if (!empty($_GET['term'])) {
        $term = $_GET['term'];
    }
    if (!empty($_GET['sort-by'])) {
        $sort = $_GET['sort-by'];
    }
    if ($term != "") {
        $products = Product::filteredProducts($term, $products);
    }
    if ($sort != "") {
        $products = Product::sortProductBy($sort, $products);
    }
    // SHOPPING CART (SESSION)
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $shoppingCart = new ShoppingCart($_SESSION['cart']);
    if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $shoppingCart->addToCart(Product::getOneProductById($_POST['product_id']));
        $shoppingCart->updateSession();
    }
} catch (\Throwable $th) {
    header("Location: ./");
}


// HEADER
require __DIR__ . "/views/_layout/v-header.php";
// PAGE
require __DIR__ . "/views/v-products.php";
// FOOTER
require __DIR__ . "/views/_layout/v-footer.php";
