<?php
session_start();
include 'msconect.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Портал Виктории Быстрицкой</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="manifest" href="site.webmanifest"> -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- CSS here -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/gijgo.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/slicknav.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="https://browsehappy.com/">обновите ваш браузер</a> для улучшения работы с сайтом и вашей безопасности.</p>
        <![endif]-->

	<!-- header-start -->

	<header>
		<div class="header-area ">
			<div class="header-top_area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="header_top_wrap d-flex justify-content-between align-items-center">
								<div class="text_wrap">
									<p><span>+7(960)000-36-36</span></p>
								</div>
								<div class="text_wrap">
									<?php

									if (!isset($_SESSION['user_id'])) {

										echo '<p><a href="index.php?face=autentif"> <i class="ti-user"></i>&nbsp Авторизация</a></p>';
										echo '<p><a href="index.php?face=registr"> Регистрация</a></p>';
									} else {

										echo '<p><a href="index.php?face=info"> <i class="ti-user"></i>&nbsp' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . ' <img src="' . $_SESSION['photo_big'] . '"width=50 heigt=50></a></p>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sticky-header" class="main-header-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="header_wrap d-flex justify-content-between align-items-center">
								<div class="header_left">
									<div class="logo">
										<a href="/">
											<img src="img/logo.png" alt="">
										</a>
									</div>
								</div>
								<div class="header_right d-flex align-items-center">
									<div class="main-menu  d-none d-lg-block">
										<nav>
											<ul id="navigation">
												<li><a href="/">На главную</a></li>
												<?php if ($_SESSION['group'] > 1) { ?>
													<li><a href="#">Курсы<i class="ti-angle-down"></i></a>
														<ul class="submenu">
															<li><a href=#>Школа макияжа</a></li>
															<li><a href=#>Школа бизнеса</a></li>
														</ul>
													</li>

													<li><a href="index.php?face=anketa">Анкета</a></li>
												<?php } ?>
												<?php if ($_SESSION['group'] > 4) { ?>
													<li><a href="index.php?face=users">Пользователи</a></li>
												<?php } ?>
												<li><a href="index.php?face=contact">Контакты</a></li>
											</ul>
										</nav>
									</div>

								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="mobile_menu d-block d-lg-none"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header-end -->
	<?php

	if (isset($_GET['face'])) {


		include $_GET['face'] . '.php';
	} else {
	?>
		<!-- slider_area_start -->
		<div class="slider_area">
			<div class="slider_active owl-carousel">
				<!-- single_carouse -->
				<div class="single_slider  d-flex align-items-center slider_bg_1">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<div class="slider_text ">
									<h2>Ты знаешь <br>
										что можешь </h2>
									<a href="#" class="boxed-btn3">Курсы</a>
									<a href="#" class="boxed-btn4">Анкета</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ single_carouse -->
				<!-- single_carouse -->
				<div class="single_slider  d-flex align-items-center slider_bg_2">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<div class="slider_text ">
									<h2>Ты знаешь <br>
										что можешь </h2>
									<a href="#" class="boxed-btn3">Курсы</a>
									<a href="#" class="boxed-btn4">Анкета</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ single_carouse -->
				<!-- single_carouse -->
				<div class="single_slider  d-flex align-items-center slider_bg_1">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<div class="slider_text ">
									<h2>Ты знаешь <br>
										что можешь </h2>
									<a href="#" class="boxed-btn3">Курсы</a>
									<a href="#" class="boxed-btn4">Анкета</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ single_carouse -->
			</div>
		</div>
		<!-- slider_area_end -->

		<!-- service_area_start  -->

		<!-- latest_coures_area_start  -->
		<div class="latest_coures_area">
			<div class="latest_coures_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="coures_info">
								<div class="section_title white_text">
									<h3>Информация на главной</h3>
									<p>Здесь будет размещен какой-то текст</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ latest_coures_area_end -->

		<!-- recent_event_area_strat  -->
		<div class="recent_event_area section__padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-10">
						<div class="section_title text-center mb-70">
							<h3 class="mb-45">Еще информация</h3>
							<p>Еще какой-то текст</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- recent_event_area_end  -->

	<?php } ?>

	<!-- footer start -->
	<footer class="footer">

		<div class="container">
			<div class="copy-right_text">
				<div class="container">
					<div class="footer_border"></div>
					<div class="row">
						<div class="col-xl-12">
							<p class="copy_right text-center">
							<p>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> Быстрицкая Виктория Валерьевна | <i class="ti-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</p>
							</p>
						</div>
					</div>

				</div>
	</footer>
	<!-- footer end  -->


	<!-- JS here -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/ajax-form.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/scrollIt.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/nice-select.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/gijgo.min.js"></script>

	<!--contact js-->
	<script src="js/contact.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/mail-script.js"></script>

	<script src="js/main.js"></script>

</body>

</html>