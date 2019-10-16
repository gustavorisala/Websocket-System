<?php

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'suporte.copytraderbrasil@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'mt@brasil@01');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $assunto, $corpo)
{
    $de="suporte.copytraderbrasil@gmail.com";
    $de_nome="MT BRASIL"; 
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Ativar SMTP
    $mail->SMTPDebug = 1; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true; // Autenticaчуo ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465; // A porta 587 deverс estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->IsHTML(true);
    $mail->CharSet="utf-8";
    $mail->AddAddress($para);
    if (! $mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

?>