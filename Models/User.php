<?php

namespace Models\User;

use Models\Model\Model;

class User extends Model
{
    private $name;
    private $last_name;
    private $pass;
    private $email;
    private $gender;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }

    public function setPassword($pass)
    {
        $this->pass = $pass;
    }
    public function getPassword()
    {
        return $this->pass;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function getGender()
    {
        return $this->gender;
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
    public function Login($email, $password)
    {
        parent::connection('users');
        if (!empty($email) && !empty($password)) {
            $checkuser = parent::$connection->query("SELECT * FROM users WHERE email='$email' and pass='$password';");
            $result = $checkuser->rowCount();
            if ($result == 1) {
                $userInfo = $checkuser->fetchAll();
                $_SESSION['login'] = true;
                foreach ($userInfo as $info) {
                    $_SESSION['users_name'] = $info['users_name'];
                    $_SESSION['last_name'] = $info['last_name'];
                    $_SESSION['email'] = $info['email'];
                    $_SESSION['pass'] = $info['pass'];
                    $_SESSION['gender'] = $info['gender'];
                }
                //header('Location: ./user-profile-page.php');
            } else {
                echo "There is no account with this email! <br>";
                echo "<a href='./register-page.php'> REGISTER NOW </a>";
            }
        }
    }
}
