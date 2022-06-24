<main>
    <form class="row mt-5" action="./create-design-page.php" method="get">
        <div class="container col-6">
            <div class="row">
                <?php foreach ($designs as $design) { ?>
                    <article id="designs_cont" class="single-product col-4 row mb-5">
                        <div class='col-12 text-center'>
                            <img src="<?php echo htmlspecialchars($design->img); ?>" alt="" width="100" height="100">
                        </div>
                        <div class='col-12 text-center'>
                            <h6><?php echo htmlspecialchars($design->title); ?></h6>
                        </div>
                        <input type="radio" name="create" value="<?php echo htmlspecialchars($design->title); ?>">
                    </article>
                <?php } ?>
                <div class="row">
                    <button type="submit" class="btn btn-success col-4" value="<?php echo htmlspecialchars($design->title); ?>">Create Design</button>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="preview">
                <div class="overlay_design">
                    <img src="<?php echo htmlspecialchars($design->getOneDesignByTitle($title)->img); ?>" alt="" width="120" height="120">
                </div>
                <img src="./public/theme/img/shirt.jpg" alt="" width="400px">
            </div>
        </div>
    </form>
</main>