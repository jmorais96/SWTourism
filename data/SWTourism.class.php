<?php

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
    
    public function listActivity ()
    {
         $sql = 'SELECT * FROM activity';
         $pesquisa=$this->query($sql);   
         return $pesquisa;
    }
    
    public function idActivity ($idActivity)
    {
         $sql = 'SELECT * FROM activity where idActivity = :idActivity';
         $pesquisa=$this->query($sql, array("idActivity" => $idActivity));
         if (!isset($pesquisa[0]))
             return null;

         return $pesquisa[0];
    }
    
    public function reserveActivity($dateReservation, $time, $name, $cardNumber, $expiry, $cardType, $securityCode)
    {
        $sqlReservation = "INSERT INTO reservation (dateReservation, time) VALUES (:dateReservation, :time)";
        
        $fieldsReservation=array('dateReservation'=>$dateReservation, 'time'=>$time);
        
        $this->query($sqlReservation, $fieldsReservation);
        
        
        $sqlCard = "INSERT INTO creditCard (name, cardNumber, expiry, cardType, securityCode) VALUES (:name, :cardNumber, :expiry, :cardType, :securityCode)";
        
        $fieldsCard = array('name'=>$name, 'cardNumber'=>$cardNumber, 'expiry'=>$expiry, 'cardType'=>$cardType, 'securityCode'=>$securityCode);
        
        $this->query($sqlCard, $fieldsCard);
    }

    public function isClientLoggedIn(){
        session_start();

        if (isset($_SESSION['user'])) {
            header("location:home.php");
        }

    }

    public function isClientLoggedOff(){
        session_start();

        if (!isset($_SESSION['user'])) {
            header("location:index.php");
        }

    }



    public function loginAdmin($user, $pass)
    {
        $sql = 'SELECT * FROM admin WHERE username = :username  AND password = :password';

        //create array of fields to log in
        $fields=array('username'=> $user, 'password' => crypt ( $pass ,"salt" ));

        //put the fields and prepared query + execute query
        $pesquisa=$this->query($sql, $fields);

        //Know if there is anyone with thos credentials
        if(isset($pesquisa[0]['idAdmin'])){
            $pesquisa=$pesquisa[0];
            //create object admin with what was found in the database
            $admin= new Admin($pesquisa['idAdmin'], $pesquisa['user'], $pesquisa['pass'], $pesquisa['name']);

            //start session and put the object to a session variable so it can used on other pages
            session_start();
            $_SESSION['admin']=$admin;

            //direction to login
            header("location:administrator.php");

        }else {
            //since there wasn't anyone with those credentials send error message
            echo "<script> alert('Não existe um utilizador com este email e password') </script>";
        }

    }

}