<?php

namespace Models\Register;

use Models\Model\Model;

class Register extends Model
{
    private $name;
    private $last_name;
    private $pass;
    private $email;
    private $gender;

    public function __construct($name, $last_name, $pass, $email, $gender)
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->pass = $pass;
        $this->email = $email;
        $this->gender = $gender;
    }

    public function Register($name, $last_name, $password, $email, $gender)
    {
        parent::connection('users');
        if (!empty($name) && !empty($last_name) && !empty($password) && !empty($email) && !empty($gender)) {
            $checkuser = parent::$connection->query("SELECT * FROM users WHERE email='$email';");
            $result = $checkuser->rowCount();
            if ($result == 0) {
                $st = parent::$connection->prepare("INSERT INTO users (users_name, last_name, pass, email, gender) VALUES (?,?,?,?,?);");
                $st->bindParam(1, $name);
                $st->bindParam(2, $last_name);
                $st->bindParam(3, $password);
                $st->bindParam(4, $email);
                $st->bindParam(5, $gender);
                $st->execute();
                header('Location: ./login-page.php');
            } else {
                echo "User already exists!";
            }
        }
    }
}
