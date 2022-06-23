<?php

namespace Models\Login;

use Models\Model\Model;

class Login extends Model
{
    private $email;
    private $pass;

    public function __construct($email, $pass)
    {
        $this->email = $email;
        $this->pass = $pass;
    }

    public function Login($email, $password)
    {
        parent::connection('users');
        if (!empty($email) && !empty($password)) {
            $checkuser = parent::$connection->query("SELECT * FROM users WHERE email='$email' and pass='$password';");
            $result = $checkuser->rowCount();
            if ($result == 1) {
                $_SESSION['login'] = true;
            } else {
                echo "Theri is no account with this email! <br>";
                echo "<a href='./register-page.php'> REGISTER NOW </a>";
            }
        }
    }
}
