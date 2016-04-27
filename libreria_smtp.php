<?php
function send_smtp_email( $phpmailer )
{
    // Define que estamos enviando por SMTP
    $phpmailer->isSMTP();
 
    // La direcci�n del HOST del servidor de correo SMTP p.e. smtp.midominio.com
    $phpmailer->Host = "your server smtp address";
 
    // Uso autenticaci�n por SMTP (true|false)
    $phpmailer->SMTPAuth = true;
 
    // Puerto SMTP - Suele ser el 25, 465 o 587
    $phpmailer->Port = "587";
 
    // Usuario de la cuenta de correo
    $phpmailer->Username = "user name";
 
    // Contrase�a para la autenticaci�n SMTP
    $phpmailer->Password = "password";
 
    // El tipo de encriptaci�n que usamos al conectar - ssl (deprecated) o tls
    $phpmailer->SMTPSecure = "tls";
 
    $phpmailer->From = "tucuenta@decorreo.com";
    $phpmailer->FromName = "Tu nombre";
}
?>