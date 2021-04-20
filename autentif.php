<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text">
					<h3 class="mb-30">Авторизация</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bradcam_area_end  -->
<center>
	<?php

	if ((isset($_SESSION['login'])) || (isset($_POST['login']))) {
		if (isset($_SESSION['login'])) {
			autentificate($_SESSION['login'], 'social', $connect);
		} else {
			autentificate($_POST['login'], $_POST['password'], $connect);
		}
	} else {
	?>
		<div class="section-top-border">


			<form action="index.php?face=autentif" method='post'>
				<div class="mt-10">
					<input type="text" name="login" placeholder="Логин" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Логин'" required class="single-input">
				</div>
				<div class="mt-10">
					<input type="password" name="password" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'" required class="single-input">
				</div>
				<div class="mt-10">
					<input type="submit" class="boxed-btn3" value="Авторизоваться">
			</form>
		</div>
		</div>


		<hr>
		<a href="auth.php" class="boxed-btn3">Авторизация с помощью ВК</a>
		<br>
		<br>

	<?php
	}

	?>

</center>