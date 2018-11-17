<?php

require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');
session_start();


$idActivity=$conn->idActivity($_GET['id']);


if ($idActivity==NULL){
    header("location:administrator.php");
}

$conn->deleteActivity($idActivity['idActivity']);

header("location:administrator.php?deleted");

?>