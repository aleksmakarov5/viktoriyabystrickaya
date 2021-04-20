
	<!-- bradcam_area_start  -->
	<div class="bradcam_area breadcam_bg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="bradcam_text">
						<h3 class="mb-30">Регистрация</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- bradcam_area_end  -->
<?php

if((isset($_SESSION['login']))||(isset($_POST['login'])))
{
if(isset($_SESSION['login']))
{
addUser($_SESSION['login'],'social',$_SESSION['first_name'],$_SESSION['last_name'],$_SESSION['bdate'] ,$_SESSION['photo_big'] ,$connect);
}
else
{
addUser($_POST['login'],$_POST['password'],$_POST['first_name'],$_POST['last_name'],$_POST['bdate'] ,$_POST['photo_big'] ,$connect);
}
}
else
{
?>

		<center>	
				<div class="section-top-border">
				
						
						<form action="index.php?face=registr" method="post">
							<div class="mt-10">
								<input type="text" name="login" placeholder="Логин"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Логин'" required
									class="single-input">
							</div>
							<div class="mt-10">
								<input type="password" name="password" placeholder="Пароль"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'" required
									class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="first_name" placeholder="Имя"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Имя'" required
									class="single-input">
							</div>
							<div class="mt-10">
								<input type="text" name="last_name" placeholder="Фамилия"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Фамилия'" required
									class="single-input">
							</div>
							<div class="mt-10">
								<input type="data" name="bdate" placeholder="Дата рождения"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Дата рождения'" required
									class="single-input">
							</div>
							<div class="mt-10">
								<input type="data" name="photo_big'" placeholder="Фото"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Дата рождения'" required
									class="single-input">
							</div>

						<div class="mt-10">
								<input type="submit" class="boxed-btn3" value="Зарегистрироваться">
								</form>
							</div>
					
							<hr>
							<form action='auth.php' method='post'>
					<input type="hidden" name="type" value=1>		
		 <input type="submit" class="boxed-btn3" value="Зарегистрироваться c помощью ВК">
		 </form>
				</div>
		
		 <br>
		 <br>
		 <?php
		 
		 }
		 ?>
</center>