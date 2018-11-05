<?php
/**
 * Created by PhpStorm.
 * User: Jose_Morais
 * Date: 04-11-2018
 * Time: 23:31
 */


require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');
session_start();


$idActivity=$conn->idActivity($_GET['id']);


if ($idActivity==NULL){
    header("location:administrator.php");
}

$conn->deleteActivity($idActivity['idActivity']);

header("location:administrator.php");

?>