<?php

if(!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['mensagem'])) {
    echo "<script>
                alert('Dados imcompletos!');
                window.location.href = 'contato.php';
            </script>";
    exit();
}

require_once 'conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : 'Sem Assunto';
$mensagem = $_POST['mensagem'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ingrid.solique@gmail.com';                     //SMTP username
    $mail->Password   = 'kvel pvlc zdrv totw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom($mail->Username, 'Loja');
    $mail->addAddress($email, $nome);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = 'Olá ' . $nome . ',<br><br>' .
                     'Recebemos sua mensagem:<br><br>' .
                     nl2br(htmlspecialchars($mensagem)) .
                     '<br><br>Responderemos em breve.';

    $mail->send();
    header('Location: agradecimentoContato.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}