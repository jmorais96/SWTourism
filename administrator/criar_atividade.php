<?php


require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');

session_start();
//know if user can be here
/*$conn->isClientLoggedIn();*/


if(isset($_POST['name'])){

    $folderPath = "../images/";

    $destino = $folderPath.$_FILES['image']['name'];
    //var_dump($_FILES);
    $arquivo_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file( $arquivo_tmp, $destino );
    if (move_uploaded_file( $arquivo_tmp, $destino ) == true){
        echo "ok";
    }else{
        echo "false";
    }

    $conn->addActivity($_POST['name'], $_POST['desc'], $_SESSION['admin']->getIdAdmin(), $_POST['location'], $_FILES['image']['name']);
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
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name">
        <textarea name="desc" id="" cols="30" rows="10">

        </textarea>
        <input type="text" name="location">
        <input type="file" name="image">
        <input type="submit" value="Criar atividade">
        
    </form>
</body>
</html>