<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 28-10-2018
 * Time: 17:11
 */

require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');
session_start();

echo $_SESSION['admin']->getName();

foreach ($conn->listActivity() as $value) {
    echo $value['name'] . "<br>";
}
?>