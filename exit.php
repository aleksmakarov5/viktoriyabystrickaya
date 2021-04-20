<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['sex']);
unset($_SESSION['bdate']);
unset($_SESSION['photo_big']);
unset($_SESSION['group']);
header('Location: /index.php');
