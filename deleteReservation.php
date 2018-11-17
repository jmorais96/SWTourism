<?php

require_once('data/SWTourism.class.php');
require_once('data/Admin.class.php');

$conn=new SWTourism('data/config.ini');
session_start();

$conn->deleteReservation($_GET['idReservation']);

header("location:listActivity.php?deleted");

?>