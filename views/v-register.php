<main>
    <?php
    require_once __DIR__ . "./../Models/Model.php";
    require_once __DIR__ . "./../Models/Register.php";

    use Models\Register\Register;

    $systemErrors = [
        'name' => '',
        'last_name' => '',
        'password' => '',
        'repass' => '',
        'email' => '',
        'gender' => ''
    ];
    $name = null;
    $last_name = null;
    $password = null;
    $repass = null;
    $email = null;
    $gender = null;

    try {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['name']) && is_string($_POST['name'])) {
                $name = $_POST['name'];
                $name = trim($name);
            } else if (empty($name)) {
                $systemErrors['name'] = "Field name is required!";
            }
            if (!empty($_POST['last_name']) && is_string($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
                $last_name = trim($last_name);
            } else if (empty($last_name)) {
                $systemErrors['last_name'] = "Field last name is required!";
            }
            if (
                !empty($_POST['password'])
                && is_string($_POST['password'])
                && (strlen($_POST['password']) > 8)
                && (strtolower($_POST['password']) != $_POST['password'])
                && preg_match('~[0-9]+~', $_POST['password'])
            ) {
                $password = $_POST['password'];
                $password = trim($password);
            } else if (empty($name)) {
                $systemErrors['password'] = "Yor password must be at least 8 characters long, contain one uppercase letter, and one number!";
            }
            if (!empty($_POST['repass']) && $_POST['repass'] == trim($_POST['password'])) {
                $repass = $_POST['repass'];
            } else if (empty($repass)) {
                $systemErrors['repass'] = "Not the same password value!";
            }
            if (!empty($_POST['email']) && str_contains($_POST['email'], '@')) {
                $email = $_POST['email'];
                $email = trim($email);
            } else if (empty($email)) {
                $systemErrors['email'] = "Email must contain @!";
            }
            if (!empty($_POST['gender']) && ($_POST['gender'] == 'male' || $_POST['gender'] == 'female')) {
                $gender = $_POST['gender'];
                $gender = trim($gender);
            } else if (empty($gender)) {
                $systemErrors['gender'] = "Select your gender!";
            }
            $newUser = new Register($name, $last_name, $password, $email, $gender);
            $newUser->Register($name, $last_name, $password, $email, $gender);
        }
    } catch (\Throwable $th) {
        echo "error";
    }
    ?>

    <form action="./register-page.php" method="POST">
        <input type="text" id="name" name="name"> <br> <br>
        <?php if (!empty($systemErrors['name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
        <?php } ?>
        <input type="text" name="last_name" placeholder="LAST NAME"> <br><br>
        <?php if (!empty($systemErrors['last_name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
        <?php } ?>
        <input type="text" name="password" placeholder="PASSWORD"> <br><br>
        <?php if (!empty($systemErrors['name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small>
        <?php } ?>
        <input type="text" name="repassword" placeholder="REPEAT PASSWORD"> <br><br>
        <?php if (!empty($systemErrors['name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['repass']); ?></small>
        <?php } ?>
        <input type="text" name="email" placeholder="EMAIL"> <br><br>
        <?php if (!empty($systemErrors['name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
        <?php } ?>
        <label> Male</label>
        <input type="radio" name="gender" value="male"> <br><br>
        <label> Female</label>
        <input type="radio" name="gender" value="female"> <br><br>
        <?php if (!empty($systemErrors['name'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['gender']); ?></small>
        <?php } ?>
        <button name="submit" type="submit"> SUBMIT </button>
    </form>
</main>