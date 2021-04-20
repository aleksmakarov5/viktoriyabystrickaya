<?php

session_start();
?>

<div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Профиль</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
    <table>
    <!-- bradcam_area_end  -->
<?php
 echo "<tr><td>ID пользователя:</td><td> " . $_SESSION['user_id'] . '</td>';
 echo '<td rowspan=3><img src="' . $_SESSION['photo_big'] . '" />'; echo "</td></tr>";
        echo "<tr><td>Имя пользователя: </td><td>" . $_SESSION['first_name'] . '</td></tr>';
        echo "<tr><td>Фамилия пользователя: </td><td>" . $_SESSION['last_name'] . '</td></tr>';
        echo "<tr><td>Пол: </td><td>" . $_SESSION['sex'] . '</td>';
        echo '<td rowspan=2><a href="exit.php" class="boxed-btn4"> </i>&nbsp Выход</a></td></tr>';
        echo "<tr><td>День Рождения: </td><td>" . $_SESSION['bdate'] . '</td></tr> </table><hr>';
        
        
        ?>
       </center>
      