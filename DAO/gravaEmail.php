<?php
require "autoload.php";
include_once 'BO/iGravaPonto.php';
require "lib/vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class gravaEmail implements iGravaPonto
{
    public function geraPonto($ponto)
    {

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPAutoTLS = false;
            $mail->isSMTP();
            $mail->Host = gethostbyname('smtp.gmail.com');
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Username   = 'enviaemailphp6@gmail.com';
            $mail->Password   = $GLOBALS['senhaEmail'];
            $mail->Port       = 587;
            //Recipients
            $mail->setFrom('enviaemailphp6@gmail.com', 'Empresa');
            $mail->addAddress($ponto->getFuncionario()->getEmail(), $ponto->getFuncionario()->getNome());


            $mail->Subject = 'Ponto emetido';
            $mail->Body    = $ponto->getMomento() . " " . $ponto->getFuncionario()->getNome();


            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
