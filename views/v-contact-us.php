<?php

use Models\Contacts\Contacts;

$systemErrors = [
    'name' => '',
    'email' => '',
    'message' => ''
];

$name = null;
$email = null;
$message = null;


if (isset($_POST['contact'])) {
    if (!empty($_POST['name']) && is_string($_POST['name'])) {
        $name = $_POST['name'];
        $name = trim($name);
    } else if (empty($name)) {
        $systemErrors['name'] = "Field name is required!";
    }

    if (!empty($_POST['email']) && str_contains($_POST['email'], '@')) {
        $email = $_POST['email'];
        $email = trim($email);
    } else if (empty($email)) {
        $systemErrors['email'] = "Email must contain @!";
    }
    if (!empty($_POST['message']) && is_string($_POST['message'])) {
        $message = $_POST['message'];
        $message = trim($message);
    } else if (empty($message)) {
        $systemErrors['message'] = "Field name is required!";
    }
    $newContact = new Contacts();
    $newContact->setName($name);
    $newContact->getName($name);
    $newContact->setEmail($email);
    $newContact->getEmail($email);
    $newContact->setMessage($message);
    $newContact->getMessage($message);
    $newContact->addContacts($name, $email, $message);
}
?>
<main>
    <form class="p-4" action="./contact-us-page.php" method="POST">
        <div class="col-4">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                <?php if ($systemErrors['name']) { ?>
                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                <?php if ($systemErrors['email']) { ?>
                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Enter message" name="message"> </textarea>
                <?php if ($systemErrors['message']) { ?>
                    <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['message']); ?></small>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <button type="submit" class="add mb-1" name="contact" value="contact">Send Message</button>
            </div>
        </div>
    </form>

</main>