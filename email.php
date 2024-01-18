<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'marcotestedesites@gmail.com';                    
        $mail->Password   = 'amarelo@2023';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('marcotestedesites@gmail.com', 'Mailer');
        $mail->addAddress('marcotestedesites@gmail.com', 'Joe User');    
        $mail->addReplyTo('marcotestedesites@gmail.com', 'Information');   
        $mail->isHTML(true);                                 
        $mail->Subject = 'Here is the subject';
        $body = "Mensagem enviada do e-mail, <br>
        Nome: ". $_POST['name']."<br> 
        E-mail: ". $_POST['email']. "<br>
        Assunto: ". $_POST['subject']."<br>
        Menssagem:<br>".$_POST['message'];
        
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'E-mail enviado com sucesso';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
