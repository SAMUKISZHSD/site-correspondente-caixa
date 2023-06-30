<?php
date_default_timezone_set('America/Sao_Paulo');
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Não informado';
$serviço = isset($_POST['serviço']) ? $_POST['serviço'] : 'Não informado';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
$texto = isset($_POST['texto']) ? $_POST['texto'] : 'Não informado';
$data = date('d/m/y H:i:s');

$mail = new PHPMailer();

if ($email && $texto){
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'samuelallannunesdacunha@gmail.com';
	$mail->Password = '123';
	$mail->Port = 587;
	
	$mail->setFrom('samuelallannunesdacunha@gmail.com');
	$mail->addAddress('samuelallannunesdacunha@gmail.com');
	
	
	$mail->isHTML(true);
	$mail->Subject = '$serviço';
	$mail->Body = "Nome: {$nome} <br>
	               Email: {$email} <br>
				   Mensagem: {$texto} <br>
				   Data/Hora: {$data}";
	
	
	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	} 
} else {
	echo 'Email não enviado: informar o email e mensagem';
}

