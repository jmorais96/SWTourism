<?php

class Admin
{

    private $idAdmin;
    private $username;
    private $password;
    private $name;

    public function __construct($idAdmin, $username, $password, $name)
    {

        $this->idAdmin=$idAdmin;
        $this->username=$username;
        $this->password=$password;
        $this->name=$name;

    }

    public function getIdAdmin()
    {
        return $this->idAdmin;
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