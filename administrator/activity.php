<?php

require_once('../data/SWTourism.class.php');
require_once('../data/Admin.class.php');

$conn=new SWTourism('../data/config.ini');

$conn->isAdminLoggedOff();

$idActivity=$conn->idActivity($_GET['id']);

$success = "";
if (isset($_POST['state'])){
//    var_dump($_POST['state']);
    $conn->changeState($_POST['state'], $idActivity['idActivity'], $_POST['idUser']);
    
    $success =  "<div class='alert alert-success'>
    <strong>Sucesso!</strong> O estado da sua atividade foi alterado com sucesso.
    </div>";
}

if ($idActivity==NULL){
    header("location:administrator.php");
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
	<title>Administrator | Estado da atividade</title>
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
					<div id="gtco-logo"><a href="administrator.php">Adventure <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
					    <li><a href="administrator.php">Atividades</a></li>
						<li><a href="?logout">Logout</a></li>
					</ul>		
					<form method="get" class="example" style="display:flex;margin-right:0;max-width:300px">
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
                            <h2>Bem vindo administrador(a), <?php echo( $_SESSION['admin']->getName()); ?></h2>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>



<div class="gtco-section">
<?php if($conn->listReservationsAdmin($idActivity['idActivity']) != null){;?>
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                <h2>Atividade <strong><?php echo $idActivity['name']?></strong></h2>
            </div>
        </div>
        <div class="row">
           
        <?php
        echo $success;
        ?>
    
<!--      $activityOption = $_GET['activityOption'];                                        -->
        <table>
             <tr style="width:100%;">
                <th style="width:20%;" colspan="2">Cliente</th>
                <th style="width:80%;" colspan="3">Cartão de crédito</th>
            </tr>
              <tr>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Número</th>
                <th>Tipo</th>
                <th>Código</th>
              </tr>
        <?php foreach ($conn->listReservationsAdmin($idActivity['idActivity']) as $value){ ?>
                <tr>
                    <td> <?php
                        $password = '3sc3RLrpd17';
                        $method = 'aes-256-cbc';

                        // Must be exact 32 chars (256 bit)
                        $password = substr(hash('sha256', $password, true), 0, 32);

                        // IV must be exact 16 chars (128 bit)
                        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

                        echo openssl_decrypt(base64_decode($value['name']), $method, $password, OPENSSL_RAW_DATA, $iv); ?>
                    </td>
                    <td>
                       <form class='formOption' method='post' action='activity.php?id=<?php echo $value['idActivity']; ?>'>
                            <select name='state'> 
                                <option value ='reservada' <?php if ($value['state'] == 'reservada'){echo "selected";}?>>reservada</option>
                                <option value ='adiada' <?php if ($value['state'] == 'adiada'){echo "selected";}?>>adiada</option> 
                                <option value ='cancelada' <?php if ($value['state'] == 'cancelada'){echo "selected";}?>>cancelada</option> 
                            </select> <input type='hidden' name='idUser' value='<?php echo $value['idUser'];?>'>  
                            <input class='submitOption' type='submit' value='Mudar'> 
                        </form>
                     </td> 
                     <?php           
//                         $ccNum = $value['cardNumber'];
//
//                         // decript
//                         $ccNum = openssl_decrypt(base64_decode($ccNum), $method, $password, OPENSSL_RAW_DATA, $iv);
//
//                         $last4Digits = preg_replace( "#(.*?)(\d{4})$#", "$2", $ccNum);
//                         $firstDigits = preg_replace( "#(.*?)(\d{4})$#", "$1", $ccNum);
//                         $ccX = preg_replace("#(\d)#", "*", $firstDigits);
//                         $ccX .= $last4Digits;
                    ?>
                     <td class="sectionValue" id='account_changed'><?php 
                        echo /*$ccX;*/ openssl_decrypt(base64_decode($value['cardNumber']), $method, $password, OPENSSL_RAW_DATA, $iv);?></td>
                    <td class="sectionValue" id='account_changed'><?php 
                        echo /*$ccX;*/ openssl_decrypt(base64_decode($value['cardType']), $method, $password, OPENSSL_RAW_DATA, $iv);?></td>
                    <td class="sectionValue" id='account_changed'><?php 
                        echo /*$ccX;*/ openssl_decrypt(base64_decode($value['securityCode']), $method, $password, OPENSSL_RAW_DATA, $iv);?></td>
                 </tr>
                 <?php } ?>
            </table>
        </div>
    </div>
<?php } else {; ?>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                    <h3>Sem atividades <?php echo $idActivity['name']?> reservadas </h3>
                </div>
            </div>
        </div>
<?php }; ?>   
        
</div>

</div>


</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!--

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
-->
<!-- </div> -->

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

<!-- fade out do alert ao fim de 15 segundos -->
<script> $(function() {
    		$(".alert").delay(1500).fadeOut(1500);
	});
</script>