<?php
date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['subject']) && !empty($_POST['subject'] && isset($_POST['message']) && !empty($_POST['message']))){
  $mail = new PHPMailer(true);
  $date = date('d/m/Y H:i:s');
  
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

    $hora_envio = date('H:i:s');

    $mail->Subject = 'Cliente Corpernicvs';
    $body = "Voce recebeu uma nova mensagem, Data/hora: {$date} <br>        
        Nome: " . $_POST['name'] . "<br> 
        E-mail: " . $_POST['email'] . "<br>
        Assunto: " . $_POST['subject'] . "<br>
        <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
        Menssagem:<br>" . $_POST['message'];


    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
    

    $message = "Mensagem enviada com sucesso, por favor aguarde nosso contato";
    $mail->send();      
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<meta http-equiv='refresh' content='1;URL=../index.html'>";
    header("Location: index.html");  
      
  }
   catch (Exception $e) {
    echo "<script type='text/javascript'>alert('Erro ao encaminhar a mensagem, por favor contactar via e-mail: suporte.copernicvs@gmail.com');</script>";
    echo "<meta http-equiv='refresh' content='1;URL=../index.html'>";
    header("Location: index.html");  
   
  }
}else{
  echo "<script type='text/javascript'>alert('Erro ao encaminhar a mensagem, por favor contactar via e-mail: suporte.copernicvs@gmail.com');</script>";
  echo "<meta http-equiv='refresh' content='1;URL=../index.html'>";
  header("Location: index.html"); 
  
  
  

}
?>