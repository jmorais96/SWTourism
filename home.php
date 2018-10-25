<?php
require_once('data/SWTourism.class.php');
require_once('data/User.class.php');
session_start();
echo( $_SESSION['user']->getName());

?>