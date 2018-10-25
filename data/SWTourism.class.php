<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 25-10-2018
 * Time: 21:24
 */

require_once('Database.class.php');

class SWTourism extends Database
{
    public function loginClient($user, $pass)
    {
        $sql = 'SELECT * FROM user WHERE username = :username  AND password = :password';

        $fields=array('username'=> $user, 'password' => crypt ( $pass ,"salt" ));

        $pesquisa=$this->query($sql, $fields);

        if(isset($pesquisa[0]['idUser'])){
            $pesquisa=$pesquisa[0];
            $user= new User($pesquisa['idUser'], $pesquisa['user'], $pesquisa['pass'], $pesquisa['name']);

            session_start();
            $_SESSION['user']=$user;
            header("location:home.php");

        }else {
            echo "<script> alert('Não existe um utilizador com este email e password') </script>";
        }

    }

    public function signInClient($user, $pass, $name)
    {
        $sql = "INSERT INTO user (username, password, name) VALUES (:username, :password, :name)";

        $fields=array('username'=> $user, 'password' => crypt ( $pass ,"salt" ), 'name'=>$name );
        $this->query($sql, $fields);
        $this->loginClient($user, $pass);
    }

}