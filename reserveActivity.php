<?php

require_once('data/SWTourism.class.php');
require_once('data/User.class.php');
require_once('data/Reservation.class.php');
require_once('data/Activity.class.php');
$conn=new SWTourism('data/config.ini');

//know if user can be here
$conn->isClientLoggedOff();

if (!isset($_GET['idActivity'])){
    header("location:home.php");
}

$idActivity=$conn->idActivity($_GET['idActivity']);


if ($idActivity==NULL){
    header("location:home.php");
}



if(isset($_GET['logout'])) {
   $_SESSION['user']->logout();
}

    //Know if data was sent by post
    if(isset($_POST['name'])){
            //filter special chars
            foreach ($_POST as $key => $value) {
                $_POST["$key"] = filter_var($value, FILTER_SANITIZE_STRING);
            }
            
            $conn->reserveActivity($_SESSION['user']->idUser(), $_GET['idActivity'],  $_POST['dateReservation'], $_POST['timeReservation'], $_POST['name'], $_POST['cardNumber'], $_POST['expiry'], $_POST['cardType'], $_POST['securityCode']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adventure</title>
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
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

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

<!--                        <li><a href="pricing.html">Preços</a></li>-->
                        <li><a href="contact.html">Contactos</a></li>
                        <li><a href="?logout">Logout</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_8_dark.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">


                    <div class="row row-mt-15em">

                        <div class="col-md-4 col-md-push-1-reg animate-box" data-animate-effect="fadeInRight">
                            <div class="form-wrap">
                                <div class="tab">

                                    <div class="tab-content">
                                        <div class="tab-content-inner active" data-content="signup">
                                            <h3>Reservar atividade</h3>
                                            <h4><?php echo $idActivity['name'];?></h4>

                                            <form class="login100-form validate-form" method="post">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="dateReservation">Data</label>
                                                        <input type="date" id="dateReservation" name="dateReservation" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="hourReservation">Hora</label>
                                                        <input type="time" id="timeReservation" name="timeReservation" class="form-control">
                                                    </div>
                                                </div>
                                                <br>
                                                <h4>Dados do cartão de crédito</h4>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="name">Nome</label>
                                                        <input type="text" id="name" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="cardNumber">Número</label>
                                                        <input type="text" id="cardNumber" name="cardNumber" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="expiry">Data de validade</label>
                                                        <input type="date" id="expiry" name="expiry" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="cardType">Tipo de cartão</label>
                                                        <select type="text" id="cardType" name="cardType" class="form-control">
                                                          <option value="Visa">Visa</option>
                                                          <option value="MasterCard">MasterCard</option>
                                                          <option value="American Express">American Express</option>
                                                          <option value="AirPlus">AirPlus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="securityCode">Código de segurança</label>
                                                        <input type="text" id="securityCode" name="securityCode" class="form-control">
                                                    </div>
                                                </div>
                                                

                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary btn-block">Reservar</button>
                                                    </div>
                                                </div>


                                            </form>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </header>


    <div id="gtco-counter" class="gtco-section">
        <div class="gtco-container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                    <h2>O nosso sucesso</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
                        <span class="counter-label">Atividades</span>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
                        <span class="counter-label">Visitas</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="feature-center">
                        <span class="counter js-counter" data-from="0" data-to="99" data-speed="5000" data-refresh-interval="50">1</span>
                        <span class="counter-label">Clientes Satisfeitos</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="gtco-container text-center">
            <div class="display-t">
                <div class="display-tc">
                    <h1>Embarque nesta aventura!</h1>
                </div>
            </div>
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
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<script src="js/bootstrap-datepicker.min.js"></script>


<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>
