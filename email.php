<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'w.manage.2021@gmail.com';                    
        $mail->Password   = 'emwfofiylpsyiile';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('suporte.copernicvs@gmail.com',);
        $mail->addAddress('suporte.copernicvs@gmail.com');
        $mail->addReplyTo('suporte.copernicvs@gmail.com',);   
        $mail->isHTML(true);                                 
        $mail->Subject = 'Cliente Corpernicvs';
        

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
