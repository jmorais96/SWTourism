<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 05-11-2018
 * Time: 15:06
 */


require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');

session_start();
//know if user can be here
/*$conn->isClientLoggedIn();*/

$idActivity=$conn->idActivity($_GET['id']);

if (isset($_POST['state'])){
    $conn->changeState($_POST['state'], $idActivity['idActivity'], $_POST['idUser']);
}


if ($idActivity==NULL){
    header("location:administrator.php");
}

foreach ($conn->listReservationsAdmin($idActivity['idActivity']) as $value){
    echo $value['name']." <br> <form method='post' action='activity.php?id=".$value['idActivity']."' > <select name='state'> <option value ='reservada'>Reservada</option> <option value ='adiada' >Adiada</option> <option value ='cancelada'>Cancelada</option> </select> <input type='hidden' name='idUser' value='".$value['idUser']."' >   <input type='submit' value='Mudar'> </form>";
}

if (isset($_GET['acao'])){
    if ($_GET['acao']=='logout'){
        $_SESSION['admin']->logout();
    }
}

?>




