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

        //create array of fields to log in
        $fields=array('username'=> $user, 'password' => crypt ( $pass ,"salt" ));

        //put the fields and prepared query + execute query
        $pesquisa=$this->query($sql, $fields);

        //Know if there is anyone with thos credentials
        if(isset($pesquisa[0]['idUser'])){
            $pesquisa=$pesquisa[0];
            //create object user with what was found in the database
            $user= new User($pesquisa['idUser'], $pesquisa['user'], $pesquisa['pass'], $pesquisa['name']);

            //start session and put the object to a session variable so it can used on other pages
            session_start();
            $_SESSION['user']=$user;

            //direction to login
            header("location:home.php");

        }else {
            //since there wasn't anyone with those credentials send error message
            echo "<script> alert('Não existe um utilizador com este email e password') </script>";
        }

    }

    public function signUpClient($user, $pass, $name)
    {
        //sql
        $sql = "INSERT INTO user (username, password, name) VALUES (:username, :password, :name)";

        //create array of fields for query
        $fields=array('username'=> $user, 'password' => crypt ( $pass ,"salt" ), 'name'=>$name );
        //put the fields and prepared query + execute query
        $this->query($sql, $fields);

        //login using the information for the signup
        $this->loginClient($user, $pass);
    }

}