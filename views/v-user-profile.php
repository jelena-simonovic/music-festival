<main>
    <form class="p-4" action="./user-profile-page.php" method="POST">
        <div class="col-3">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($_POST['save'])) {
                                                                                            echo $_POST['name'];
                                                                                        } else {
                                                                                            echo htmlspecialchars($_SESSION['users_name']);
                                                                                        } ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="last_name" value="<?php if (isset($_POST['save'])) {
                                                                                                    echo $_POST['last_name'];
                                                                                                } else {
                                                                                                    echo htmlspecialchars($_SESSION['last_name']);
                                                                                                } ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_POST['save'])) {
                                                                                            echo $_POST['email'];
                                                                                        } else {
                                                                                            echo htmlspecialchars($_SESSION['email']);
                                                                                        } ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?php if (isset($_POST['save'])) {
                                                                                                echo $_POST['gender'];
                                                                                            } else {
                                                                                                echo htmlspecialchars($_SESSION['gender']);
                                                                                            } ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_POST['save']) && isset($_POST['password'])) {
                                                                                                        echo  htmlspecialchars($_POST['password']);
                                                                                                    } else {
                                                                                                        echo htmlspecialchars($_SESSION['pass']);
                                                                                                    }; ?>" <?php if (!isset($_POST['change'])) echo "disabled" ?>>
            </div>
        </div>
        <button type="submit" class="show mb-1 mr-5" name="change" value="change"> Change information </button>
        <button type="submit" class="add mb-1" name="save" value="save"> SAVE </button>
    </form>
</main>