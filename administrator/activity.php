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

if ($idActivity==NULL){
    header("location:administrator.php");
}

?>




