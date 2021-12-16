<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('tatarcnenko.04@mail.ru', 'Тестик');
	//Кому отправить
	$mail->addAddress('указать!');
	//Тема письма
	$mail->Subject = 'Новая заявка"';

	//Рука

	//Тело письма
	$body = '<h1>Встречайте супер письмо!</h1>';
	
	if(trim(!empty($_POST['user_name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['user_name'].'</p>';
	}
	if(trim(!empty($_POST['user_mail']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['user_mail'].'</p>';
	}
	if(trim(!empty($_POST['user_inn']))){
		$body.='<p><strong>Инн:</strong> '.$_POST['user_inn'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>