<?php
/**
 * Created by PhpStorm.
 * User: Jose_Morais
 * Date: 05-11-2018
 * Time: 11:27
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
if(isset($_POST['name'])){


    $conn->updateActivity($_POST['name'], $_POST['desc'], $_POST['location'], $_POST['time'], $idActivity['idActivity']);
}

?>



<form method="post">

    <input type="text" name="name" value="<?php echo $idActivity['name'] ?>">
    <textarea name="desc" id="" cols="30" rows="10" ><?php echo $idActivity['desc'] ?></textarea>
    <input type="text" name="location" value="<?php echo $idActivity['location'] ?>">
    <input type="time" id="time" name="time" value="<?php echo $idActivity['time'] ?>">
    <input type="submit" value="Editar">
</form>
