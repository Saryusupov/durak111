<?php
/* ============================= */
/* ОТПРАВКА ПИСЬМА ЗАКАЗА В TELEGRAM */
/*функция для создания запроса на сервер Telegram */
/* ============================= */
function parser($url){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	if($result == false){     
		echo "Ошибка отправки запроса: " . curl_error($curl);
		return false;
	}
	else{
		return true;
	}
}
/* ============================= */
/* ============================= */

/* ============================= */
/* ОТПРАВКА СООБЩЕНИЕ В ТЕЛЕГРАММ */
/* ============================= */
function orderSendTelegram($message) {
	/*токен который выдаётся при регистрации бота */
	$token ="5249581733:AAGkh-zDvZ8pVSUknA7K6K_DJnBnoCpSG6k";
	/*идентификатор группы*/
	$chat_id = "-1001603482833";

	$message = urlencode($message);
echo("here");
	/*делаем запрос*/
	$tmp = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}";
	parser($tmp);
}
/* ============================= */
/* ============================= */

/* ============================= */
/* ОБРАБОТЧИК ДЛЯ ФОРМЫ В НИЖНЕЙ ЧАСТИ ЭКРАНА */
/* ============================= */
if($_POST) {
	
}

$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["phone"]);
$message = htmlspecialchars($_POST["message"]);

$textMessage = "СООБЩЕНИЕ ИЗ ФОРМЫ GOLDEN-LINK\n";
$textMessage .= "Имя:  ".$name."\n";
$textMessage .= "Телефон:  ".$phone."\n";
$textMessage .= "Сообщение:  ".$message."\n";
echo("$textMessage");
orderSendTelegram($textMessage);