<?php
date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])){
    $name = !empty($_POST['name']) ? $_POST['name'] : 'Não informado';
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $data = date('d/m/Y H:i:s', time());

    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'email.example';                     //SMTP username
        $mail->Password   = 'SENHAEXAMPLE';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
     
        $mail->setFrom('email.exaple', 'Mailer');
        $mail->addAddress('email.exaple', 'Joe User');     //Add a recipient
           
        $mail->addReplyTo('email.exaple', 'Information');
    
      
       
    
        //Content
        $mail->isHTML(true);  
        $mail->Body = "Nome: {$name}<br>
                       Email: {$email}<br><br>
                       Dúvida: {$subject}<br>
                       Menssagem: {$message}<br><br>
                       Data/hora: {$data}";
                                    //Set email format to HTML
        // $mail->Subject = 'Here is the subject';
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "erro encotrado: {$mail->ErrorInfo}";
    }
}else{
    echo "ERRO AO ENVFIAR E-MAIL";
}
