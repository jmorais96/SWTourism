<?php

require_once('Database.class.php');

class SWTourism extends Database
{
    public function loginClient($user, $pass)
    {
        $sql = 'SELECT * FROM user WHERE username = :username  AND password = :password';

        //create array of fields to log in
        $fields=array('username'=> $user, 'password' => hash('sha256', $pass));

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
        $fields=array('username'=> $user, 'password' => hash('sha256', $pass), 'name'=>$name );

        //put the fields and prepared query + execute query
        $this->query($sql, $fields);

        //login using the information for the signup
        $this->loginClient($user, $pass);
    }
    
    public function listActivity ($idAdmin=null)
    {
        if ($idAdmin){
            $sql = 'SELECT * FROM activity where idAdmin = :idAdmin';
            $pesquisa=$this->query($sql, array('idAdmin' => $idAdmin ));
        }else {
            $sql = 'SELECT * FROM activity';
            $pesquisa = $this->query($sql);
        }
        return $pesquisa;
    }
    
       public function listActivityUser ($idUser)
    {
        $sql = 'SELECT * FROM reservation INNER JOIN activity USING (idActivity) where idUser = :idUser';        
        $fields=array('idUser'=> $idUser);
        $userReservations=$this->query($sql, $fields);
        return $userReservations;
    }
    
    public function idActivity ($idActivity)
    {
         $sql = 'SELECT * FROM activity where idActivity = :idActivity';
         $pesquisa=$this->query($sql, array("idActivity" => $idActivity));
         if (!isset($pesquisa[0]))
             return null;

         return $pesquisa[0];
    }

    public function reserveActivity($idUser, $idActivity, $dateReservation, $timeReservation, $name, $cardNumber, $expiry, $cardType, $securityCode)
    {

        $sqlReservation = "INSERT INTO reservation (idUser, idActivity, dateReservation, state, timeReservation) VALUES (:idUser, :idActivity, :dateReservation, :state, :timeReservation)";
        //INSERT INTO reservation ( idUser, idActivity, dateReservation,  	state  ) VALUES (1, 2, "2008-11-11", "reservada")
        
        $fieldsReservation=array('idUser'=>$idUser, 'idActivity'=>$idActivity, 'dateReservation'=>$dateReservation, 'state'=>'reservada', 'timeReservation'=>$timeReservation);
        //var_dump($fieldsReservation);
        
        $this->query($sqlReservation, $fieldsReservation);
        
        
        $sqlCard = "INSERT INTO creditCard (name, cardNumber, expiry, cardType, securityCode, idUser) VALUES (:name, :cardNumber, :expiry, :cardType, :securityCode, :idUser)";
        
        $fieldsCard = array('name'=>$name, 'cardNumber'=>$cardNumber, 'expiry'=>$expiry, 'cardType'=>$cardType, 'securityCode'=>$securityCode, 'idUser'=>$idUser);
        
        $this->query($sqlCard, $fieldsCard);
    }
    
    public function commentActivity($idUser, $idActivity, $comment)
    {
        $dateComment = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comments (idUser, idActivity, comment, dateComment) VALUES (:idUser, :idActivity, :comment, :dateComment)"; 
        
        $fields = array ('idUser'=>$idUser, 'idActivity'=>$idActivity, 'comment'=>$comment, 'dateComment'=>$dateComment);
        
        $this->query($sql, $fields);
    }
    
    public function listComments ()
    {
        $sql = "SELECT * FROM comments INNER JOIN user USING (idUser);";
        $comments = $this->query($sql);
        return $comments;
    }

    public function imageActivity($idImage){

        $sql = 'SELECT * FROM image where idImage = :idImage';
        $pesquisa=$this->query($sql, array("idImage" => $idImage));
        return $pesquisa[0]['imagePath'].$pesquisa[0]['name'];

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
        $fields=array('username'=> $user, 'password' => hash('sha256', $pass));

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
            echo "<script> alert('Não existe um administrador com este email e password') </script>";
        }

    }

    public function addActivity($name, $desc, $idAdmin, $location, $image)
    {

        $sql='INSERT into image (name, imagePath) VALUES ( :name, "images/")';
        $this->query($sql, array('name' =>trim($image, " ")));
        $sql="SELECT * FROM image ORDER BY idImage DESC LIMIT 1";
        $image=$this->query($sql);
        $sql = "INSERT INTO activity (name, activity.desc, idAdmin, location, idImage) VALUES (:name, :desc, :idAdmin, :location, :image)";
        $fields=array('name' => $name, 'desc'=> $desc, 'idAdmin' => $idAdmin, 'location'=> $location, 'image'=> $image[0]['idImage']);
     //   var_dump($fields);
        $this->query($sql, $fields);
      }
    
    public function countUser()
    {
       $sql='SELECT COUNT(*) FROM user';
       $result = $this->query($sql);
       return $result[0]['COUNT(*)'];
       //var_dump($result);
    }

    public function deleteActivity($id)
    {
        $sql = 'DELETE from activity where idActivity = :idActivity';
        $this->query($sql, array('idActivity' => $id));
    }
    
    public function updateActivity($idActivity, $name, $desc, $idAdmin, $location) //$image
    {
//        $sql='INSERT into image (name, imagePath) VALUES ( :name, "images/")';
//        $this->query($sql, array('name' =>trim($image, " ")));
//        $sql="SELECT * FROM image ORDER BY idImage DESC LIMIT 1";
//        $image=$this->query($sql);
        $sql="UPDATE activity set activity.name = :name, activity.desc = :desc, activity.idAdmin = :idAdmin, activity.location = :location where activity.idActivity = :idActivity";
        $fields=array('name' => $name, 'desc'=> $desc, 'idAdmin' => $idAdmin,'location'=> $location, 'idActivity' => $idActivity);
        //var_dump($fields);
        $this->query($sql, $fields);

    }
    
     public function search()
    {
        //selecao do select
        $activityOption = isset($_GET['activityOption']) ? $_GET['activityOption'] : ''; 
     
        //
        if ($search = (!empty($_GET['search'])) ? $_GET['search'] : "") 
        {
             if ($activityOption == "name") {
                    $sql = 'SELECT * FROM activity WHERE name LIKE :search';
                   
             } else if ($activityOption == "location"){
                $sql = 'SELECT * FROM activity WHERE location LIKE :search';
             } else {
                 echo "Não tem resultados";
                 return [];
             }
                $fields=array('search'=> $search."%");
                $pesquisa=$this->query($sql, $fields);

                $rows = count($pesquisa);
                if($rows <= 0){
                    echo "Não tem resultados";
                    return [];
                }
                else{
                    return $pesquisa;
                }

        } else if (empty($_GET['search']))
        {
             echo "Não tem resultados";
             return [];
        }
     }
    
    
    
//    public function search()
//    {
//         if ($search = (!empty($_GET['search'])) ? $_GET['search'] : "") 
//            {
//                $sql = 'SELECT * FROM activity WHERE name LIKE :search';
//                $fields=array('search'=> $search."%");
//                $pesquisa=$this->query($sql, $fields);
//             
//                    $rows = count($pesquisa);
//                    if($rows <= 0){
//                        echo "Não tem resultados";
//                        return [];
//                    }
//                    else{
//                        return $pesquisa;
//                    }
//
//            } else if (empty($_GET['search']))
//            {
//                 echo "Não tem resultados";
//                 return [];
//            }
//    }
    
//     public function search()
//    {
//         if(!empty($_GET['search'])){
//             echo "Não tem resultados";
//             return [];
//         }else{
//             $sql = 'SELECT * FROM activity WHERE name LIKE :search';
//             $fields=array('search'=> $_GET['search']."%");
//             $pesquisa=$this->query($sql, $fields);
//             
//             if(isset($pesquisa[0]['idActivity'])){
//                return $pesquisa; 
//             }else{
//                 echo "Não tem resultados";
//                 return [];
//             }
//         }
//         
//     }

    public function listReservationsAdmin($idActivity)
    {
        $sql="SELECT * from reservation INNER JOIN user using (idUser) where idActivity= :idActivity";
        $fields=array('idActivity' => $idActivity);
        return $this->query($sql, $fields);

    }

    public function changeState($state, $idActivity, $idUser)
    {
        $sql="UPDATE reservation set state = :state where idActivity = :idActivity and idUser =:idUser";
        $fields=array('state' => $state, 'idActivity' => $idActivity, 'idUser' => $idUser);
        //var_dump($fields);
        $this->query($sql, $fields);

    }


    public function searchAdmin($search)
    {
        $sql = 'SELECT * FROM activity WHERE name LIKE :search';
        $fields=array('search'=> $search."%");
        $pesquisa=$this->query($sql, $fields);
        $rows = count($pesquisa);
        if($rows <= 0){
            echo "Não tem resultados";
            return [];
        }
        else{
            return $pesquisa;
        }
    }

}