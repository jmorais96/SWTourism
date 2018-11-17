<?php
require_once('data/SWTourism.class.php');
require_once('data/User.class.php');
//require_once('data/Comment.class.php');
$conn=new SWTourism('data/config.ini');

//know if user can be here
$conn->isClientLoggedOff();
$conn->listActivity(); 
$conn->listComments(); 
$conn->countUser();


if(isset($_GET['logout'])) {
   $_SESSION['user']->logout();
}

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Adventure | Home</title>
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
	<link rel="stylesheet" href="css/styleListActivity.css">
	
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
					    <li><a href="listActivity.php">Reservas</a></li>
						<li><a href="contact.html">Contactos</a></li>
						<li><a href="?logout">Logout</a></li>
					</ul>
					<form class="example" action="search.php" style="display:flex;margin-right:0;max-width:300px">
                        <select name="activityOption"> 
                            <option value="name">Nome</option>
                            <option value="location">Localização</option>
                        </select>
                        <input type="text" placeholder="Pesquisar.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
					
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h2>Bem vindo(a), <?php echo( $_SESSION['user']->getName()); ?></h2>
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
                <h2>Atividades</h2>
                <p>Consulte aqui as atividades que temos disponíveis e faça a sua reserva!</p>
            </div>
        </div>
        <div class="row">

           <?php foreach ($conn->listActivity() as $value) {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a class="fh5co-card-item">
                    <figure>
                        <div class="overlay"></i>
                            <img src="<?php echo $conn->imageActivity($value['idImage']) ;?>" alt="Image" class="img-responsive">
                        </div>
                    </figure>
                    <div class="fh5co-text">
                        <h2><?php echo $value['name']?></h2><!-- observacao de cetaceos -->
                        <p><?php echo $value['location']?></p>
                        <?php
                            if(strlen($value['desc'])> 120 ){
                        ?>
                                <p><?php echo substr($value['desc'], 0, 120) . "..." ?></p>
                        <?php
                            }else{
                        ?>
                        <p><?php echo $value['desc']?></p>
                        <?php
                            }
                        ?>
                  </div>
                    <a class="btn btn-primary" href="reserveActivity.php?idActivity=<?php echo $value['idActivity']?>">Reservar atividade</a> 
<!--                    <a class="btn btn-primary" href="commentActivity.php?idActivity=<?php //echo $value['idActivity']?>">Deixar comentário</a>  -->
                </a>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>


<div id="gtco-features">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>Clientes felizes</h2>

            </div>

        </div>
        <div class="row">
           <?php foreach ($conn->listComments() as $value) { ?>
                <div class="col-md-4_3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <h1><strong><?php echo $value['username']; ?></strong></h1>
                        <h2><?php echo $value['comment']; ?></h2>
                        <h4>Atividade <strong><?php echo $value['name']; ?></strong><br> realizada em <strong><?php echo $value['dateComment']; ?></strong></h4>
                    </div>
                </div>    
         <?php } ?>
        </div>
    </div>
</div>



<div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                <h2>O nosso sucesso</h2>
                <p>O nosso sucesso é o reflexo da determinação de cada um de vós. <br>Seja bem vindo, e divirta-se!</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="<?php echo $conn->countActivity(); ?>" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Atividades</span>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="<?php echo $conn->countVisit(); ?>" data-speed="5000" data-refresh-interval="50">1</span>
                    <span class="counter-label">Visitas</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                <div class="feature-center">
                    <span class="counter js-counter" data-from="0" data-to="<?php echo $conn->countUser(); ?>" data-speed="5000" data-refresh-interval="50">1</span>
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