<main>

    <div class="main_text">
        <div class="glitch" data-text="ARE YOU READY?"> ARE YOU READY?
        </div>
    </div>
    <div class="countdown">
        <span id="days"></span>
        <span id="hours"></span>
        <span id="mins"></span>
        <span id="secs"></span>
    </div>

    <a href="./login-page.php" class="cta"> GET YOUR VIP PASS </a>
    <div class="second"></div>
    <div class="container bg-secondary">
        <section class="my-5">
            <div class="mb-5">
                <h2>Most popular merch</h2>
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
                        <a href="./login-page.php" class="cta"> CREATE DESIGN </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</main>