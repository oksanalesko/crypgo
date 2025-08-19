<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('uk', 'phpmailer/language/');
	$mail->IsHTML(true);


	//Від кого лист
$mail->setFrom('', 'SankaLskDev'); // Вказати потрібний E-mail
//Кому відправити
$mail->addAddress(''); // Вказати потрібний E-mail
//Тема листа
$mail->Subject = 'Вітання! Це лист з сайту Crypgo';

//Тіло листа
$body = '<h1>Тобі надійшов контакт!</h1>';

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$messageText = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

$body .= "<p><strong>Ім'я:</strong> {$name}</p>";
$body .= "<p><strong>Email:</strong> {$email}</p>";
$body .= "<p><strong>Повідомлення:</strong> {$messageText}</p>";	


	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Помилка';
	} else {
		$message = 'Дані надіслані!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>
