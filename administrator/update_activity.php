<?php

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
    
  //  $folderPath = "../images/";

 //   $destino = $folderPath.$_FILES['image']['name'];
 //   $arquivo_tmp = $_FILES['image']['tmp_name'];

  //  move_uploaded_file( $arquivo_tmp, $destino );
    $conn->updateActivity($idActivity['idActivity'], $_POST['name'], $_POST['desc'], $_SESSION['admin']->getIdAdmin(), $_POST['location']); //$_FILES['image']['name']
}

if (isset($_GET['acao'])){
    if ($_GET['acao']=='logout'){
        $_SESSION['admin']->logout();
    }
}

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/styleListActivity.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">Adventure <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
					    <li><a href="administrator.php">Atividades</a></li>
						<li><a href="?acao=logout">Logout</a></li>
					</ul>		
                    <!--
                        <form method="get">
                            <input type="text" name="search">
                            <button>Pesquisar</button>
                        </form>
                    -->	
					<form method="get" class="example" style="display:flex;margin:auto;max-width:300px">
                        <input type="text" placeholder="Pesquisar.." name="search">
                      <button class="buttonAdmin" type="submit"><i class="fa fa-search"></i></button>
                    </form>
					
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(../images/img_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
<!--                            <h1>Lista de atividades</h1>-->
                            <h2><?php echo( $_SESSION['admin']->getName()); ?></h2>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

    
<div class="gtco-section">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Editar Atividade <?php echo $idActivity['name'] ?></h2>
            </div>
        </div>
        <div class="row">
         
                           <!--
                    <form method="post">

                        <input type="text" name="name" value="<?php //echo $idActivity['name'] ?>">
                        <textarea name="desc" id="" cols="30" rows="10" ><?php //echo $idActivity['desc'] ?></textarea>
                        <input type="text" name="location" value="<?php //echo $idActivity['location'] ?>">
                        <input type="time" id="time" name="time" value="<?php //echo $idActivity['time'] ?>">
                        <input type="submit" value="Editar">
                    </form>
                    -->
                                           
                                           
                    <form class="login100-form validate-form" method="post">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $idActivity['name'] ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="desc">Descrição</label>
                                <textarea name="desc" id="" cols="30" rows="10" class="form-control"  placeholder=""><?php echo $idActivity['desc'] ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="location">Localização</label>
                                <input type="text" id="location" name="location" class="form-control" value="<?php echo $idActivity['location'] ?>">
                            </div>
                        </div>
<!--
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="image">Imagem</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
-->
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Editar</button>
                            </div>
                        </div>


                    </form>
        
            
        </div>
    </div>
</div>
    

<footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">

        <div class="row copyright">
            <div class="col-md-12">
                <p class="pull-left">
                    <small class="block">&copy; Adventure </small>

                </p>
                <p class="pull-right">
                <ul class="gtco-social-icons pull-right">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
                </p>
            </div>
        </div>

    </div>
</footer>
<!-- </div> -->

</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="../js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="../js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="../js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="../js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="../js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<script src="../js/bootstrap-datepicker.min.js"></script>


<!-- Main -->
<script src="../js/main.js"></script>

</body>
</html>