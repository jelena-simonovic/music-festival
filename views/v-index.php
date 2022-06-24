<main>

    <div class="main_text">
        <div class="glitch" data-text="ARE YOU READY?"> ARE YOU READY?
        </div>
    </div>
    <p> This year's SONUS Music Fest is set to open in: </p>
    <div class="countdown">
        <span id="days"></span>
        <span id="hours"></span>
        <span id="mins"></span>
        <span id="secs"></span>
    </div>

    <a href="<?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    echo "./user-profile-page.php";
                } else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
                    echo "./login-page.php";
                }
                ?>" class="cta"> GET YOUR VIP PASS </a>
    <div class="second">
        <h2>SONOS MUSIC FEST LINEUP</h2>
        <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto quibusdam, minima rerum aspernatur molestias quam ad earum mollitia at porro. Et ipsum doloribus eum quis unde officiis, aspernatur qui. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, tenetur recusandae excepturi modi ipsam totam sed repellendus sapiente nihil officiis quidem nesciunt itaque sequi voluptatum accusamus culpa voluptas aliquid. Ipsa? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam recusandae sapiente atque eveniet praesentium, magni saepe neque. Quod, nihil cum quasi dignissimos, repudiandae ad voluptatibus voluptatem ipsum illum repellendus nemo.</p>
        <img src="./public/theme/img/banner.jpg" alt="">
    </div>
    <div class="tickets">
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
                            <a class="btn btn-success" href="./single-product-page.php?product=<?php echo htmlspecialchars($vipTicket->id) ?>">Show Product</a>
                            <button form="add-to-cart-<?php echo htmlspecialchars($vipTicket->id); ?>" class="btn btn-secondary">Add to Cart</button>
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
    </div>
    <div class="container">
        <section class="my-5">
            <div class="mb-5">
                <h2 class="pop">POPULAR MERCH</h2>
            </div>
            <div class="row d-flex align-baseline">
                <?php foreach ($mostProducts as $product) { ?>
                    <div class="col-2 p-2r">
                        <a href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id); ?>">
                            <div class="row">
                                <img src="<?php echo htmlspecialchars($product->img); ?>" class="col-12" height="200px" alt="<?php echo htmlspecialchars($product->title); ?>">
                                <div class="col-12 mt-4">
                                    <h5><?php echo htmlspecialchars($product->title); ?></h5>
                                    <p>$ <?php echo htmlspecialchars($product->price); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <div class="col-4 p-2r">
                    <h4 class="pb-3"> Create your own T-shirt design!</h4>
                    <div class="mt-2">
                        <p class="pb-3"> Release your inner artist and order a T-shit that is just right for you.</p>
                        <a href="<?php
                                    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                        echo "./create-design-page.php";
                                    } else if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
                                        echo "./login-page.php";
                                    }
                                    ?>" class="cta"> CREATE DESIGN </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>