<?php
error_reporting(0);

include 'DBconfig.php';
$connect = new mysqli($HostName, $UserName, $Password, $DBName);


//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");

$sysMessages = "Нет системных сообщений";






function addUser($login, $pass, $fname, $lname, $birth, $photo, $connect)
{
	$add = $connect->query("insert into users values  (NULL,'$login', '$pass','$fname', '$lname', '$birth','$photo',0)");
	if ($add) {
		echo 'Вы успешно зарегистрированы, пожалуйста авторизуйтесь!';
		unset($_SESSION['login']);
	} else {
		echo 'Пользователь с таким логином уже существует!';
		unset($_SESSION['login']);
	}
}

function addAnketa($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17, $p18, $p19, $p20, $p21, $p22, $p23, $p24, $p25, $imgname, $connect)
{

	$today = date("y.m.d");
	$query = "insert into anketa values (NULL, '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9',  '$p10', '$p11', '$p12', '$p13', '$p14', '$p15', '$p16', '$p17', '$p18', '$p19', '$p20', '$p21', '$p22', '$p23', '$p24', '$p25','$imgname', '$today', NULL, NULL,NULL)";
	$add = $connect->query($query);
	if ($add) {
		$GLOBALS['sysMessages'] = "Добавлена новая анкета";
	} else {
		$GLOBALS['sysMessages'] = $query;
	}
}

function anketaList($connect, $query_fin)
{
	$query = "SELECT * FROM anketa $query_fin";
	$anketa = $connect->query($query);
?>
	<div class="container">
		<div class="mt-12">
			<div class="col-6">
				<?php
				//    $anketa->num_rows;
				$num = 0;
				//засовываем все записи в ассоциативный массив и перебираем их
				echo '<table border=1 width=80%><tr><td>&nbsp</td><td>Имя</td><td>Дата</td><td>&nbsp</td></tr>';
				while (($row = $anketa->fetch_assoc()) != FALSE) {
					$num++;
					$id = $row['id'];
					//выводим список на экран

					echo "<tr><td>" . $num . "</td><td> " . $row['23'] . "</td><td> " . $row['date_create'] . "</td><td>";


					echo '
              <form action="index.php?face=anketa" method="post">
                <input type="hidden" name="id" value="' . $id . '">';
					if ($row['date_look'] == NULL)
						echo '<input type="hidden" name="notread" value="yes">';
					echo '
                <input type="hidden" name="made" value="show">
                <input type="submit" class="boxed-btn3" value="Подробнее" >
              </form>
              </td>
              </tr>
        ';
				}
				echo '</table> </div></div> </div> ';
			}

			function anketaShow($id, $connect)
			{
				$anketa = $connect->query("SELECT * FROM anketa where id=$id");
				$num = 0;
				while (($row = $anketa->fetch_assoc()) != FALSE) {
					$num++;
					$id = $row['id'];
					//выводим список на экран
				?>
					<br>

					<div class="container">




						<div class="mt-10">
							<p>Что беспокоит? Что хотелось бы улучшить? </p>
							<div class="mt-10">
								<?php
								echo $row['1'];
								?>
							</div>
							<p>Чем пользуетесь? </p>
							<div class="mt-10">
								<?php
								echo $row['2'];
								?>
							</div>

							<p>Как долго проблема? Как часто появляется? </p>
							<div class="mt-10">
								<?php
								echo $row['3'];
								?>
							</div>

							<p>Что нравится из того, чем пользуетесь? </p>
							<div class="mt-10">
								<?php
								echo $row['4'];
								?>
							</div>

							<p>Какая область на лице беспокоит более всего? </p>
							<div class="mt-10">
								<?php
								echo $row['5'];
								?>
							</div>
							<p>Что есть из ухода в этой области? </p>
							<div class="mt-10">
								<?php
								echo $row['6'];
								?>
							</div>
							<p>Какой уход утром/вечером/маски, пилинги как часто? Всё поэтапно и подробно. </p>
							<div class="mt-10">
								<?php
								echo $row['7'];
								?>
							</div>

							<p>Как Вы понимаете, что косметика Вам подходит? </p>
							<div class="mt-10">
								<?php
								echo $row['8'];
								?>
							</div>

							<p>Где и когда пользуетесь косметикой? </p>
							<div class="mt-10">
								<?php
								echo $row['9'];
								?>
							</div>

							<p>Аллергия. Если была, то как проявлялась, на что, как часто, через какое время появилась? </p>
							<div class="mt-10">
								<?php
								echo $row['10'];
								?>
							</div>

							<p>Ваш Возраст </p>
							<div class="mt-10">
								<?php
								echo $row['11'];
								?>
							</div>

							<p>Тип вашей кожи (на ваш взгляд: сухая/жирная/комбинированная)? </p>
							<div class="mt-10">
								<?php
								echo $row['12'];
								?>
							</div>

							<p>Бывает ли у Вас ощущение стянутости?Если да, то когда? После умывания или всегда? </p>
							<div class="mt-10">
								<?php
								echo $row['13'];
								?>
							</div>

							<p>Просыпаясь утром, есть ли у Вас ощущение излишков кожного сала в «Т-зоне»? (Лоб, нос) (да/нет) </p>
							<div class="mt-10">
								<?php
								echo $row['14'];
								?>
							</div>

							<p>Есть ли у Вас расширенные поры в «Т-зоне»? (да/нет) </p>
							<div class="mt-10">
								<?php
								echo $row['15'];
								?>
							</div>

							<p>Есть ли у Вас «чёрные точки» в области носа? (да/нет) </p>
							<div class="mt-10">
								<?php
								echo $row['16'];
								?>
							</div>

							<p>Меняется ли ваша кожа в период обезвоженности кожи с ноября по май? (да/нет) </p>
							<div class="mt-10">
								<?php
								echo $row['17'];
								?>
							</div>

							<p>Есть ли в вашем уходе маски, скрабы, пилинги. Как часто используются? </p>
							<div class="mt-10">
								<?php
								echo $row['18'];
								?>
							</div>


							<p>Чем сейчас пользуетесь? (Если можно по порядку, например, умылась водой, дальше тоник, крем и так далее- порядок действий) </p>
							<div class="mt-10">
								<?php
								echo $row['19'];
								?>
							</div>
							<p>Что хотелось бы улучшить в состоянии вашей кожи? </p>
							<div class="mt-10">
								<?php
								echo $row['20'];
								?>
							</div>

							<p>Бывают ли какие то реакции на коже от косметики? </p>
							<p class="samle text">
								<?php
								echo $row['21'];
								?>
							</p>
							<p>Какую обычно сумму вы тратите на уход за кожей/ на косметику в целом в месяц? Какая сумма для Вас комфортна? </p>
							<div class="mt-10">
								<?php
								echo $row['22'];
								?>
							</div>



							<p>Ваше ФИО </p>
							<div class="mt-10">
								<?php
								echo $row['23'];
								?>
							</div>


							<p>Ваш адрес (с почтовым индексом)</p>
							<div class="mt-10">
								<?php
								echo $row['24'];
								?>
							</div>


							<p>Ваш номер телефона </p>
							<div class="mt-10">
								<?php
								echo 	$row['25'];
								?>
							</div>
							<p>Дата создания анкеты </p>
							<div class="mt-10">
								<?php
								echo $row['date_create'];
								?>
							</div>
							<p>Дата просмотра анкеты </p>
							<div class="mt-10">
								<?php
								echo $row['date_look'];
								?>
							</div>
							<p>Дата исполнения </p>
							<div class="mt-10">
								<?php
								echo $row['date_exec'];

								?>
							</div>
							<p>Фото чека</p>
							<div class="mt-10">
								<?php
								$fpath = $row['img_name'];
								$comment = $row['comment'];
								echo '<img src="' . $fpath . '" width=40%>';
								//echo $fpath;
								?>
							</div>




							<?php
							//изменение комментария
							echo '
              <form action="index.php?face=anketa" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="show" value="all">
                <input type="hidden" name="made" value="comment">
                <br>
                <p>Комментарий</p>
							<div class="mt-10">
								<textarea class="single-textarea" name="comment" required>' . $comment . '</textarea>
							</div>
                <input type="submit" class="boxed-btn3"  value="Изменить комментарий">
              </form>
              <br>
        ';
							//кнопка удаления анкеты
							?>
							<form action="index.php?face=anketa" method="post" onsubmit="return confirm('Вы уверены?');">
								<input type="hidden" name="id" value="<?php echo $id ?>">
								<input type="hidden" name="fpath" value="<?php echo $fpath; ?>">
								<input type="hidden" name="made" value="del">
								<input type="submit" name="del" class="boxed-btn3" value="Удалить анкету">
							</form>
							<br>
					<?php
					//кнопка исполнения анкеты
					echo '
              <form action="index.php?face=anketa" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="made" value="exec">
                <input type="submit" name="del" class="boxed-btn3"  value="Исполнено" >
              </form>
        ';
				}
			}

			function anketaDel($id, $fpath, $connect)
			{
				$del = $connect->query("delete from anketa where id='$id'");

				unlink($fpath);
				// echo $fpath;
				if ($del) {
					echo 'Анкета успешно удалена';
					anketaList($connect, '');
				} else {
					echo 'Ошибка удаления';
				}
			}

			function anketaComment($id, $comment, $connect)
			{
				$update = $connect->query("update anketa set comment='$comment' where id='$id'");
				if ($update) {
					anketaShow($id, $connect);
				} else {
					echo 'Ошибка изменения';
				}
			}

			function anketaReaded($id, $connect)
			{
				$today = date("y.m.d");
				$update = $connect->query("update anketa set date_look='$today' where id='$id'");
				if ($update) {
					echo 'Анкета прочитана впервые';
				} else {
					echo 'Ошибка изменения';
				}
			}

			function anketaExecuted($id, $connect)
			{
				$today = date("y.m.d");
				$update = $connect->query("update anketa set date_exec='$today' where id='$id'");
				if ($update) {
					anketaShow($id, $connect);
				} else {
					echo 'Ошибка изменения';
				}
			}
			// --------------------------------- Вывод информации и удаление

			function autentificate($login, $password, $connect)
			{
				//echo "SELECT * FROM users where login='$login'";
				$users = $connect->query("SELECT * FROM users where login='$login'");
				if ($users->num_rows) {
					$num = 0;
					//засовываем все записи в ассоциативный массив и перебираем их
					while (($row = $users->fetch_assoc()) != FALSE) {
						$num++;
						if ($row['pass'] == $password) {
							$_SESSION['user_id'] = $row['id'];
							$_SESSION['first_name'] = $row['fname'];
							$_SESSION['last_name'] = $row['lname'];
							$_SESSION['bdate'] =  $row['birth'];
							$_SESSION['photo_big'] =  $row['photo'];
							$_SESSION['group'] =  $row['group_id'];
							unset($_SESSION['login']);
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
						} else {
							echo 'Неверный пароль';
							unset($_SESSION['login']);
						}
					}
				} else {
					echo 'Пользователя не существует. Пожалуйста проверьте правильность введенных данных или зарегистрируйтесь';
					unset($_SESSION['login']);
				}
			}



			function userList($connect)
			{
				$users = $connect->query("SELECT * FROM users");
				echo "<p>Всего пользователей в базе: " . $users->num_rows . "</p>";
				$num = 0;
				//засовываем все записи в ассоциативный массив и перебираем их
				while (($row = $users->fetch_assoc()) != FALSE) {
					$num++;
					$id = $row['id'];
					//выводим список на экран
					echo "<p>" . $num . ") Имя: " . $row['fname'] . " Фамилия: " . $row['lname'] . " </p>";

					//кнопка удаления пользователя
					echo '
              <form method="get">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" name="del" class="boxed-btn3"  value="Удалить пользователя" >
              </form>
        ';
				}
			}



					?>