<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="bradcam_text">
					<h3>Анкета</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bradcam_area_end  -->

<?php


if ($_POST['send']) {

	$tmp_name = $_FILES["myimage"]["tmp_name"];
	$name = 'img/check/' . date(date("YmdHis") . substr(microtime(FALSE), 2, 3)) . '-' . $_FILES['myimage']['name'];
	$filename = $_FILES['myimage']['name'];
	if (move_uploaded_file($tmp_name, $name)) {
		$imagename = $name;
	} else {
		$imagename = '';
	}

	addAnketa($_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['p6'], $_POST['p7'], $_POST['p8'], $_POST['p9'], $_POST['p10'], $_POST['p11'], $_POST['p12'], $_POST['p13'], $_POST['p14'], $_POST['p15'], $_POST['p16'], $_POST['p17'], $_POST['p18'], $_POST['p19'], $_POST['p20'], $_POST['p21'], $_POST['p22'], $_POST['p23'], $_POST['p24'], $_POST['p24'], $imagename, $connect);


?>

	<div class="container">
		<div class="justify-content-center">

			<p class="sample-text">
				<?php echo "<p style='color: darkgreen; font-size: 18px;'>" . $sysMessages . "</p>"; ?>
			</p>
		</div>
	</div>

	<?php
} else {
	if (($_SESSION['group']) > 4) {
		$query = "SELECT * FROM anketa $query_fin";
		$anketa = $connect->query($query);
		$num_all = $anketa->num_rows;
		$query = "SELECT * FROM anketa $query_fin where date_look is NULL";
		$anketa = $connect->query($query);
		$num_notread = $anketa->num_rows;
		$query = "SELECT * FROM anketa $query_fin where date_exec is NULL";
		$anketa = $connect->query($query);
		$num_notexec = $anketa->num_rows;

	?>
		<br>
		<div class="row">
			<p>
			<form action="index.php?face=anketa" method="post">
				<input type="hidden" name="show" value="all">
				<input type="submit" name="del" class="boxed-btn<?php if ($_POST['show'] == 'all') echo 4;
																else echo 3; ?>" value="Все анкеты (<?php echo $num_all; ?>)">
			</form>
			</p>
			<p>
			<form action="index.php?face=anketa" method="post">
				<input type="hidden" name="show" value="notread">
				<input type="submit" name="del" class="boxed-btn<?php if ($_POST['show'] == 'notread') echo 4;
																else echo 3; ?>" value="Непрочитанные (<?php echo $num_notread; ?>)">
			</form>
			</p>
			<p>
			<form action="index.php?face=anketa" method="post">
				<input type="hidden" name="show" value="notexec">
				<input type="submit" name="del" class="boxed-btn<?php if ($_POST['show'] == 'notexec') echo 4;
																else echo 3; ?>" value="Невыполненные (<?php echo $num_notexec; ?>)">
			</form>
			</p>
		</div>
		<br>
		<br>
		<?php
		if (isset($_POST['made'])) {
			if ($_POST['made'] == 'show') {
				if ($_POST['notread'] == 'yes') {
					anketaReaded($_POST['id'], $connect);
				}
				anketaShow($_POST['id'], $connect);
			}

			if ($_POST['made'] == 'del') {
				anketaDel($_POST['id'], $_POST['fpath'], $connect);
			}
			if ($_POST['made'] == 'comment') {
				anketaComment($_POST['id'], $_POST['comment'], $connect);
			}
			if ($_POST['made'] == 'exec') {
				anketaExecuted($_POST['id'], $connect);
			}
		} else {

			if ($_POST['show'] == 'all') {
				anketaList($connect, '');
			}
			if ($_POST['show'] == 'notread') {
				anketaList($connect, ' where date_look is NULL');
			}
			if ($_POST['show'] == 'notexec') {
				anketaList($connect, ' where date_exec is NULL');
			}
		}
	} else {
		?>


		<br>
		<div class="container">
			<div class="justify-content-center">

				<p class="sample-text">
					Чтобы принять участие в марафоне, нужно ответить на парочку вопросов, чтобы я могла быть для Вас максимально полезна и смогла более детально подобрать для вас уходовые средства, учитывая ваш тип и состояние кожи 😉
				</p>
				<form action="index.php?face=anketa" method="post" enctype="multipart/form-data">
					<div class="mt-10">
						<p>Что беспокоит? Что хотелось бы улучшить? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p1" placeholder="Что беспокоит? Что хотелось бы улучшить?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Что беспокоит? Что хотелось бы улучшить?'" required></textarea>
						</div>
						<p>Чем пользуетесь? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p2" placeholder="Чем пользуетесь? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Чем пользуетесь? '" required></textarea>
						</div>

						<p>Как долго проблема? Как часто появляется? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p3" placeholder="Как долго проблема? Как часто появляется? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Как долго проблема? Как часто появляется? '" required></textarea>
						</div>

						<p>Что нравится из того, чем пользуетесь? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p4" placeholder="Что нравится из того, чем пользуетесь? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Что нравится из того, чем пользуетесь? '" required></textarea>
						</div>

						<p>Какая область на лице беспокоит более всего? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p5" placeholder="Какая область на лице беспокоит более всего? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Какая область на лице беспокоит более всего?  '" required></textarea>
						</div>
						<p>Что есть из ухода в этой области? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p6" placeholder="Что есть из ухода в этой области?  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Что есть из ухода в этой области? '" required></textarea>
						</div>
						<p>Какой уход утром/вечером/маски, пилинги как часто? Всё поэтапно и подробно. </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p7" placeholder="Какой уход утром/вечером/маски, пилинги как часто? Всё поэтапно и подробно.  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Какой уход утром/вечером/маски, пилинги как часто? Всё поэтапно и подробно. '" required></textarea>
						</div>

						<p>Как Вы понимаете, что косметика Вам подходит? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p8" placeholder="Как Вы понимаете, что косметика Вам подходит? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Как Вы понимаете, что косметика Вам подходит? '" required></textarea>
						</div>

						<p>Где и когда пользуетесь косметикой? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p9" placeholder="Где и когда пользуетесь косметикой? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Где и когда пользуетесь косметикой? '" required></textarea>
						</div>

						<p>Аллергия. Если была, то как проявлялась, на что, как часто, через какое время появилась? </p>
						<div class="mt-10">
							<textarea class="single-textarea" name="p10" placeholder="Аллергия. Если была, то как проявлялась, на что, как часто, через какое время появилась? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Аллергия. Если была, то как проявлялась, на что, как часто, через какое время появилась? '" required></textarea>
						</div>

						<p>Ваш Возраст </p>
						<input type="text" name="p11" placeholder="Ваш Возраст" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш Возраст'" required class="single-input">
					</div>

					<p>Тип вашей кожи (на ваш взгляд: сухая/жирная/комбинированная)? </p>
					<input type="text" name="p12" placeholder="Тип вашей кожи (на ваш взгляд: сухая/жирная/комбинированная)?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Тип вашей кожи (на ваш взгляд: сухая/жирная/комбинированная)?'" required class="single-input">
			</div>

			<p>Бывает ли у Вас ощущение стянутости?Если да, то когда? После умывания или всегда? </p>
			<input type="text" name="p13" placeholder="Бывает ли у Вас ощущение стянутости?Если да, то когда? После умывания или всегда?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Бывает ли у Вас ощущение стянутости?Если да, то когда? После умывания или всегда?'" required class="single-input">

			<p>Просыпаясь утром, есть ли у Вас ощущение излишков кожного сала в «Т-зоне»? (Лоб, нос) (да/нет) </p>
			<input type="text" name="p14" placeholder="да/нет" onfocus="this.placeholder = ''" onblur="this.placeholder = 'да/нет'" required class="single-input">

			<p>Есть ли у Вас расширенные поры в «Т-зоне»? (да/нет) </p>
			<input type="text" name="p15" placeholder="да/нет" onfocus="this.placeholder = ''" onblur="this.placeholder = 'да/нет'" required class="single-input">

			<p>Есть ли у Вас «чёрные точки» в области носа? (да/нет) </p>
			<input type="text" name="p16" placeholder="да/нет" onfocus="this.placeholder = ''" onblur="this.placeholder = 'да/нет'" required class="single-input">

			<p>Меняется ли ваша кожа в период обезвоженности кожи с ноября по май? (да/нет) </p>
			<input type="text" name="p17" placeholder="да/нет" onfocus="this.placeholder = ''" onblur="this.placeholder = 'да/нет'" required class="single-input">

			<p>Есть ли в вашем уходе маски, скрабы, пилинги. Как часто используются? </p>
			<input type="text" name="p18" placeholder="Есть ли в вашем уходе маски, скрабы, пилинги. Как часто используются?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Есть ли в вашем уходе маски, скрабы, пилинги. Как часто используются?'" required class="single-input">


			<p>Чем сейчас пользуетесь? (Если можно по порядку, например, умылась водой, дальше тоник, крем и так далее- порядок действий) </p>
			<div class="mt-10">
				<textarea class="single-textarea" name="p19" placeholder="Чем сейчас пользуетесь? (Если можно по порядку, например, умылась водой, дальше тоник, крем и так далее- порядок действий) " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Чем сейчас пользуетесь? (Если можно по порядку, например, умылась водой, дальше тоник, крем и так далее- порядок действий) '" required></textarea>
			</div>
			<p>Что хотелось бы улучшить в состоянии вашей кожи? </p>
			<div class="mt-10">
				<textarea class="single-textarea" name="p20" placeholder="Что хотелось бы улучшить в состоянии вашей кожи?  " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Что хотелось бы улучшить в состоянии вашей кожи?  '" required></textarea>
			</div>

			<p>Бывают ли какие то реакции на коже от косметики? </p>
			<div class="mt-10">
				<textarea class="single-textarea" name="p21" placeholder="Бывают ли какие то реакции на коже от косметики? " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Бывают ли какие то реакции на коже от косметики? '" required></textarea>
			</div>
			<p>Какую обычно сумму вы тратите на уход за кожей/ на косметику в целом в месяц? Какая сумма для Вас комфортна? </p>
			<input type="text" name="p22" placeholder="Какую обычно сумму вы тратите на уход за кожей/ на косметику в целом в месяц?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Какую обычно сумму вы тратите на уход за кожей/ на косметику в целом в месяц?'" required class="single-input">



			<p>Ваше ФИО </p>
			<input type="text" name="p23" placeholder="ФИО" onfocus="this.placeholder = ''" onblur="this.placeholder = 'ФИО'" required class="single-input">


			<p>Ваш адрес (с почтовым индексом)</p>
			<div class="mt-10">
				<textarea class="single-textarea" name="p24" placeholder="Ваш адрес (с почтовым индексом)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш адрес (с почтовым индексом) '" required></textarea>
			</div>


			<p>Ваш номер телефона </p>
			<input type="text" name="p25" placeholder="Ваш номер телефона" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш номер телефона'" required class="single-input">
			<p>Приложите фото чека </p>
			<input type="file" name="myimage" class="single-input">
			<input name="send" type="hidden" value="true">
			<br>
			<input type="submit" class="boxed-btn3" value="Отправить">

		</div>

		</div>

		</form>


<?php
	}
}
?>

<br><br>