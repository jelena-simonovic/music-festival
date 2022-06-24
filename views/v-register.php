<?php
require_once __DIR__ . "./../Models/Model.php";
require_once __DIR__ . "./../Models/User.php";

use Models\User\User;

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
        $newUser = new User();
        $newUser->Register($name, $last_name, $password, $email, $gender);
    }
} catch (\Throwable $th) {
    echo "error";
}
?>
<main>
    <form class="register_form" action="./register-page.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            <?php if (!empty($systemErrors['name'])) { ?>
                <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
            <?php } ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
            <?php if (!empty($systemErrors['last_name'])) { ?>
                <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
            <?php } ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Enter Password">
            <?php if (!empty($systemErrors['name'])) { ?>
                <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small>
            <?php } ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="repassword" placeholder="Re-enter Password">
            <?php if (!empty($systemErrors['name'])) { ?>
                <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['repass']); ?></small>
            <?php } ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Enter E-mail">
            <?php if (!empty($systemErrors['name'])) { ?>
                <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
            <?php } ?>
        </div>
        <div class="form-group form-control">
            <label class="form-check-label"> Male</label> <br>
            <input type="radio" name="gender" value="male" class="form-check-input"><br>
            <label class="form-check-label"> Female</label><br>
            <input type="radio" name="gender" value="female" class="form-check-input"><br>
        </div>
        <?php if (!empty($systemErrors['gender'])) { ?>
            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['gender']); ?></small>
        <?php } ?>
        <button name="submit" type="submit" class="show mt-2"> SUBMIT </button>
    </form>
</main>