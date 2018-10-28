<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 27-10-2018
 * Time: 21:58
 */

require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');

/*//know if user can be here
$conn->isClientLoggedIn();*/


if(isset($_POST['pass'])){


    $conn->loginAdmin($_POST['username'], $_POST['pass']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username">
        <input type="password" name="pass">
        <input type="submit" value="Login">
    </form>
</body>
</html>
