<main>
    </form>
    <div class="row">
        <?php foreach ($designs as $design) { ?>
            <article class="single-product col-4 row mb-5">
                <form action="./v-create-design-page.php" method="POST">
                    <button type="submit" name="design_value" value="<?php echo htmlspecialchars($design->title); ?>">
                        <div class='col-12 text-center'>
                            <img src="<?php echo htmlspecialchars($design->img); ?>" alt="" width="200" height="200">
                        </div>
                        <div class='col-12 text-center'>
                            <h6><?php echo htmlspecialchars($design->title); ?></h6>
                        </div>
                    </button>
                </form>
            </article>
        <?php } ?>
    </div>
    <h2> Preview T-shirt </h2>
    <div class="preview">
        <img src="./public/theme/img/shirt.jpg" alt="">
        <div class="overlay_design">
            <img src="<?php echo htmlspecialchars($design->img); ?>" alt="" width="200" height="200">
        </div>
    </div>
    <button form="add-to-cart-<?php echo htmlspecialchars($design->title); ?>" class="btn btn-success">Create</button>
</main>