<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'OAuth.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
/*
Enable SMTP debugging
0 = off (for production use)
1 = client messages
2 = client and server messages
*/
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "EFRAGRANT@GMAIL.COM";
$mail->Password = "ABCDEFRA01";
$mail->setFrom('18307090@utcgg.edu.mx', 'GRANADOS');
$mail->addAddress('EFRAGRANT@GMAIL.COM', 'DESTINO-CORREO');
$mail->Subject = 'CONFIRMA TU CORREO';
$mail->Body = "Contenido con o sin HTML   O HTML";
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);

if (!$mail->send())
{
	echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
	echo "E-Mail enviado";
}
?>