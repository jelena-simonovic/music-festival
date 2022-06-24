<main class="mt-5">
    <div class="container">
        <h2>GET TICKETS</h2>
        <div class="row">
            <?php foreach ($getTicket as $ticket) { ?>
                <article class="single-product col-6 row mb-5 mt-5">
                    <div class='col-12 text-center'>
                        <img src="<?php echo htmlspecialchars($ticket->img); ?>" alt="" width="" height="200" class="col-12">
                    </div>
                    <div class='col-12 text-center'>
                        <h6><?php echo htmlspecialchars($ticket->title); ?></h6>
                        <p>PRICE: <?php echo htmlspecialchars($ticket->price); ?> $</p>
                        <a class="show" href="./single-product-page.php?product=<?php echo htmlspecialchars($ticket->id) ?>">Show Product</a>
                        <button form="add-to-cart-<?php echo htmlspecialchars($ticket->id); ?>" class="add">Add to Cart</button>
                        <form id="add-to-cart-<?php echo htmlspecialchars($ticket->id); ?>" action="./all-products-page.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($ticket->id); ?>">
                        </form>
                    </div>
                </article>
            <?php } ?>
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                foreach ($getVipTicket as $vipTicket) { ?>
                    <article class="single-product col-6 row mb-5 mt-5">
                        <div class='col-12 text-center'>
                            <img src="<?php echo htmlspecialchars($vipTicket->img); ?>" alt="" width="" height="200" class="col-12">
                        </div>
                        <div class='col-12 text-center'>
                            <h6><?php echo htmlspecialchars($vipTicket->title); ?></h6>
                            <p>PRICE: <?php echo htmlspecialchars($vipTicket->price); ?> $</p>
                            <a class="show" href="./single-product-page.php?product=<?php echo htmlspecialchars($vipTicket->id) ?>">Show Product</a>
                            <button form="add-to-cart-<?php echo htmlspecialchars($vipTicket->id); ?>" class="add">Add to Cart</button>
                            <form id="add-to-cart-<?php echo htmlspecialchars($vipTicket->id); ?>" action="./all-products-page.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($vipTicket->id); ?>">
                            </form>
                        </div>
                    </article>
            <?php }
            } ?>
            <?php if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
                foreach ($getVipTicket as $vipTicket) { ?>
                    <article class="single-product col-6 row mb-5 mt-5">
                        <div class="text-center">
                            <img src="<?php echo htmlspecialchars($vipTicket->img); ?>" alt="" width="" height="200" class="col-12">
                            <div class="mt-5">
                                <a class="cta col-5" href="<?php
                                                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                                                echo "./user-profile-page.php";
                                                            } else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
                                                                echo "./login-page.php";
                                                            }
                                                            ?>"> GET YOUR VIP PASS</a>
                            </div>
                        </div>
                    </article>
            <?php }
            } ?>
        </div>
        <h2 class="mt-5 mb-5">ALL PRODUCTS</h2>
        <div class="row mt-5">
            <form class="row col-4" action="./all-products-page.php" method="get">
                <select name="sort-by" id="" class="col-4">
                    <option value=""> Filter by price </option>
                    <option value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_ASC) ?>"> Lower to higher </option>
                    <option value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_DESC) ?>"> Higher to lower </option>
                </select> <br>
                <button type="submit" class="btn btn-warning col-4">Search</button>
            </form>
            <form class="row col-8" action="./all-products-page.php" method="get">
                <input class="col-5" type="text" name="term" value="<?php echo htmlspecialchars($term); ?>">
                <button type="submit" class="btn btn-warning col-2">Search</button>
            </form>
            <hr class="mt-3">
        </div>
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <article class="single-product col-4 row mb-5 mt-5">
                    <div class='col-12 text-center'>
                        <img src="<?php echo htmlspecialchars($product->img); ?>" alt="" width="200" height="200">
                    </div>
                    <div class='col-12 text-center'>
                        <h6><?php echo htmlspecialchars($product->title); ?></h6>
                        <p>PRICE: <?php echo htmlspecialchars($product->price); ?> $</p>
                        <a class="show" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id) ?>">Show Product</a>
                        <button form="add-to-cart-<?php echo htmlspecialchars($product->id); ?>" class="add">Add to Cart</button>
                        <form id="add-to-cart-<?php echo htmlspecialchars($product->id); ?>" action="./all-products-page.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id); ?>">
                        </form>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
</main>