<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 25-10-2018
 * Time: 21:31
 */

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

}