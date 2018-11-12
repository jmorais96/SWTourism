<?php

class User
{
    private $idUser;
    private $user;
    private $pass;
    private $name;

    public function __construct($idUser, $user, $pass, $name)
    {
        $this->idUser=$idUser;
        $this->user=$user;
        $this->pass=$pass;
        $this->name=$name;
    }
    
    public function idUser()
    {
        return $this->idUser;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function logout()
    {
            session_destroy();
           // unset($_SESSION['username']);
            header('location:index.php');
    }

}