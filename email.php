<?php
// date_default_timezone_set('America/Sao_Paulo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$envite = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($envite['name'])){

  $success = ['status' => false, 'msg' => "Erro: Necessário preencher o campo Nome"];

}elseif (empty($envite['email'])){

  $success = ['status' => false, 'msg' => "Erro: Necessário preencher o camnpo E-mail"];

}else{

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
    $body = "Voce recebeu uma nova mensagem,  <br>        
        Nome: " . $_POST['name'] . "<br> 
        E-mail: " . $_POST['email'] . "<br>
        Assunto: " . $_POST['subject'] . "<br>
        <p>Este e-mail foi enviado em <b>
        Menssagem:<br>" . $_POST['message'];

    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  
    

   
    $mail->send();      
      
    $success = ['status' => true, 'msg' => "E-mail enviada com sucesso, por favor aguarde nosso contato!"];
      
  }
   catch (Exception $e) {

    $success = ['status' => false, 'msg' => "Erro ao enviar o e-mail: {$mail->ErrorInfo}"];
    
   
  }
}

echo json_encode($success);
?>