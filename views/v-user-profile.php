<main>
    <form class="p-4" action="./user-profile-page.php" method="POST">
        <div class="col-3">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['users_name']); ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="last_name" value="<?php echo htmlspecialchars($_SESSION['last_name']); ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="city">Gender</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($_SESSION['gender']); ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="phone">Password</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['pass']); ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-secondary mb-1" name="change" value="change"> Change information </button>
        <button type="submit" class="btn btn-secondary mb-1" name="save" value="save"> SAVE </button>
    </form>

</main>