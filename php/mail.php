<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = $_POST['name'];
$destinatario = $_POST['email'];
$assunto      = $_POST['assunto'];
$mensagem     = $_POST['menssagem'];


$email_local = 'odonto@centralclinicaodonto.com.br';
$senha_local = '32932485';
$host_local  = 'smtp.titan.email';
$porta_local = '465';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
try {
    //Configuração do servidor de conexão.
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP

    //Configurações de autenticação.
    // $mail->Encoding = 'base64';
    $mail->Host       = $host_local;                            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $email_local;                           //SMTP username
    $mail->Password   = $senha_local;                           //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = $porta_local;                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //informações do remetente
    $mail->setFrom('odonto@centralclinicaodonto.com.br', 'Central Clínica - Odonto & Estética');
    $mail->addReplyTo('jodonto@centralclinicaodonto.com.br', 'Central Clínica - Odonto & Estética');

    //Informação do destinatário.
    $mail->addAddress($email_local);

    //Configuração do email
    $mail->isHTML(true);                                  //Formato do email
    $mail->Subject = $assunto;
    $mail->Body    =  "
                    <h4>Olá, esse e-mail é referente ao sistema de contatos gerado pelo site www.centralclinicaodonto.com.br. </h4>    
                    <table border='1'>
                        <tr>
                            <td>Nome do Contato: </td>
                            <td>$nome</td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>$destinatario</td>
                        </tr>
                        <tr>
                            <td>Assunto:</td>
                            <td>$assunto</td>
                        </tr>
                        <tr>
                            <td>Mensagem:</td>
                            <td>$mensagem</td>
                        </tr>
                    </table>
                    <br><br><br><br><br><br>
                    <strong> Erros, problemas em qualquer tipo de comunicação, por favor, entre em contato com o </strong>
                    <a href='www.github.com/pedrowarlock'>Pedro Pinheiro.</a>";   
    
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Mensagem não pode ser enviada, por favor, tente novamente mais tarde.";
}