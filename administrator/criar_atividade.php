<?php


require_once('data/SWTourism.class.php');
require_once('data/User.class.php');

$conn=new SWTourism('data/config.ini');

//know if user can be here
$conn->isClientLoggedIn();


if(isset($_GET['name'])){


    $conn->loginClient($_GET['name'], $_GET['desc'], $_SESSION['admin']->getId(), $_GET['location'], $_GET['image']);
}
    

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="name">
        <textarea name="desc" id="" cols="30" rows="10">

        </textarea>
        <input type="text" name="location">
        <input type="file" name="image">
    </form>
</body>
</html>