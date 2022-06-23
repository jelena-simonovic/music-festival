<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/theme/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./public/theme/css/style.scss">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Latin&display=swap" rel="stylesheet">
    <title>Shop</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container d-flex align-items-center">
                <a class="navbar-brand mt-2" href="./">
                    <img src="./public/theme/img/logo.png" alt="logo">
                </a>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="text-light fw-bold
                                nav-link
                                <?php if ($page == 'index') {
                                    echo htmlspecialchars('active');
                                } ?>
                                " href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-light fw-bold
                                nav-link
                                <?php if ($page == 'all-products-page') {
                                    echo htmlspecialchars('active');
                                } ?>
                                " href="./all-products-page.php">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light fw-bold">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-light nav-link fw-bold" href="<?php
                                                                            if (isset($_SESSION) && $_SESSION['login'] == true) {
                                                                                echo "./user-profile-page.php";
                                                                            } else if ($_SESSION['login'] == false) {
                                                                                echo "./login-page.php";
                                                                            }
                                                                            ?>">
                                <?php if (isset($_SESSION) && $_SESSION['login'] == true) {
                                    echo "Profile";
                                } else {
                                    echo "Login";
                                }
                                ?>
                            </a>
                        </li>
                        <?php if (isset($_SESSION) && $_SESSION['login'] == true) { ?>
                            <li class="nav-item">
                                <form action="./login-page.php" method="GET">
                                    <button class="nav-link text-light fw-bold" name="logout" type="submit">Log out</button>
                                </form>
                            </li>
                        <?php } ?>
                        <li>
                            <a class="text-light nav-link position-relative" href="./shopping-cart-page.php">
                                <img src="./public/theme/img/shopping-cart.png" class="cart_icon" alt=""> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                    <?php
                                    if (!empty($_SESSION['cart'])) {
                                        echo count($_SESSION['cart']);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>