<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Магазин-компьютеров</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.jpg" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.html">Домой</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Магазин</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.html">Категории</a></li>
                  
                </ul>
							</li>
							<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Личный кабинет</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.php">Вход</a></li>
                  
       
                </ul>
              </li>

            
              <li class="nav-item"><a class="nav-link" href="contact.html">Контакты</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
              <li class="nav-item"><a class="button button-header" href="#">Купить сейчас</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	
  

	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Личный кабинет</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Для менеджера</a></li>
              <li class="breadcrumb-item active" aria-current="page">Для бухгалтера</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
  

	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Вы один из администраторов?</h4>
							<p>Тогда войдите в ваш личный кабинет, использовав ваши данные для входа.</p>
							
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					
					<div class="login_form_inner">
						<h3>Вход</h3>
						<form class="row login_form" method="POST"  id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="emailIn" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="passIn" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="signIn" value="submit" class="button button-login w-100">Вход</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<?php
if(ISSET($_POST['signIn'])){
	$email = $_POST['emailIn'];
	$passw = $_POST['passIn'];
 
	if(empty($email) or empty($passw)){
		exit("Вы ввели не всю информацию");
	}
	include("db.php");
$query = "SELECT * FROM `user` WHERE Login ='$email'";
$result = mysqli_query($db, $query);
$myrow = mysqli_fetch_array($result);

  if ($myrow['Password']==$passw){
	  $_SESSION['Login'] =$myrow['Login'];
	  $_SESSION['ID_user'] =$myrow['ID_user'];
	  if($email == "buhalter"){
	  echo"<script> document.location.href = 'buhgalter.php'</script>";}
	  if($email == "manager"){
		echo"<script> document.location.href = 'manager.php'</script>";}
  }
  else{
	  exit("Пароль неверный");
  }
}

?>