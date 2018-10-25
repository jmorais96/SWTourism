<?php

//requesting the classes needed for sign in
require_once('data/SWTourism.class.php');
require_once('data/User.class.php');

//connect do database
$conn=new SWTourism('data/config.ini');
//know if user can be here
$conn->isClientLoggedIn();

    //Know if data was sent by post
    if(isset($_POST['pass'])){
        //know if password equals confirmation
        if ($_POST['pass']==$_POST['retype']){

            //filter special chars
            foreach ($_POST as $key => $value) {
                $_POST["$key"] = filter_var($value, FILTER_SANITIZE_STRING);
            }

            //call method to log in
            $conn->signUpClient($_POST['username'], $_POST['pass'],$_POST['name']);

        }

    }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo/icone.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/image02.jpg');">
			<div class="wrap-login100grey">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-logo">
						<img src="images/logo/logo.png">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registar
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter name">
						<input class="input100" type="text" name="name" placeholder="Nome">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Confirm password">
						<input class="input100" type="password" name="retype" placeholder="Confirmar password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
<!--
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
-->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registar
						</button>
					</div>
<!--
					<div class="text-center p-t-90">
						<a class="txt1" href="register.php">
							Registar
						</a>
					</div>
-->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
