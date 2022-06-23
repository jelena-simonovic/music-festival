<?php

namespace Models\Contacts;

use Models\Model\Model;

class Contacts extends Model
{
    private $name;
    private $email;
    private $message;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getMessage()
    {
        return $this->message;
    }

    public function addContacts($name, $email, $message)
    {
        parent::connection('contacts');
        if (!empty($name) && !empty($email) && !empty($message)) {
            $st = parent::$connection->prepare("INSERT INTO contacts (users_name, email, user_message) VALUES (?,?,?);");
            $st->bindParam(1, $name);
            $st->bindParam(2, $email);
            $st->bindParam(3, $message);
            $st->execute();
            //header('Location: ./index-page.php');
        }
    }
}
