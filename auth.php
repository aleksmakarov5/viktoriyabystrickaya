<?php
session_start();
if (isset($_POST['type'])) {
	$_SESSION['type'] = $_POST['type'];
}
$client_id = '7808918'; // ID приложения
$client_secret = 'iHvCoE89WAsmB74NUUUU'; // Защищённый ключ
$redirect_uri = 'http://xn--80abcyabld6auclif6d1d4cj.xn--p1ai/auth.php'; // Адрес сайта

$url = 'http://oauth.vk.com/authorize'; // Ссылка для авторизации на стороне ВК

$params = ['client_id' => $client_id, 'redirect_uri'  => $redirect_uri, 'response_type' => 'code']; // Массив данных, который нужно передать для ВК содержит ИД приложения код, ссылку для редиректа и запрос code для дальнейшей авторизации токеном

if (!isset($_GET['code'])) {
	header('Location: ' . $url . '?' . urldecode(http_build_query($params)));
} else {
	$result = true;
	$params = [
		'client_id' => $client_id,
		'client_secret' => $client_secret,
		'code' => $_GET['code'],
		'redirect_uri' => $redirect_uri
	];

	$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

	if (isset($token['access_token'])) {
		$params = [
			'uids' => $token['user_id'],
			'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
			'access_token' => $token['access_token'],
			'v' => '5.101'
		];

		$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
		if (isset($userInfo['response'][0]['id'])) {
			$userInfo = $userInfo['response'][0];
			$result = true;
		}
	}

	if ($result) {
		$_SESSION['login'] =  $userInfo['id'];
		$_SESSION['first_name'] = $userInfo['first_name'];
		$_SESSION['last_name'] = $userInfo['last_name'];
		$_SESSION['bdate'] =  $userInfo['bdate'];
		$_SESSION['photo_big'] =  $userInfo['photo_big'];
	}
	if (isset($_SESSION['type'])) {
		unset($_SESSION['type']);
		header('Location: /index.php?face=registr');
	} else {
		header('Location: /index.php?face=autentif');
	}
}
