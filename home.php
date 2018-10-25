<?php
require_once('data/SWTourism.class.php');
require_once('data/User.class.php');
$conn=new SWTourism('data/config.ini');

//know if user can be here
$conn->isClientLoggedOff();

echo( $_SESSION['user']->getName());

?>