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
    <form method="get">
        <input type="text" name="search">
        <button>Pesquisar</button>
    </form>
    <br>
    <br>
    <br>
    <br>

    <?php
        if (isset($_GET['search'])){
         foreach ($conn->searchAdmin($_GET['search']) as $value ){
             echo "<a href='activity.php?id=" . $value['idActivity'] . "'>" . $value['name'] . "</a>" . "<a href='delete_activity.php?id=" . $value['idActivity'] . "'>Eliminar</><br>" . "<a href='update_activity.php?id=" . $value['idActivity'] . "'>Editar</a><br>";
         }
        }else {
            foreach ($conn->listActivity() as $value) {
                echo "<a href='activity.php?id=" . $value['idActivity'] . "'>" . $value['name'] . "</a>" . "<a href='delete_activity.php?id=" . $value['idActivity'] . "'>Eliminar</><br>" . "<a href='update_activity.php?id=" . $value['idActivity'] . "'>Editar</a><br>";
            }
        }
    ?>

    <a href="criar_atividade.php"><button>Criar atividade</button></a>
</body>
</html>

