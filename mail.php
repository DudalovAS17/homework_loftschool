<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

class Mailer
{
    protected $mail;

    public function __construct($email)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mail.ru';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'dudalov.3apycb@mail.ru';
        $this->mail->Password = 'DscjwTctyby3';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
        $this->mail->setFrom('dudalov.3apycb@mail.ru', 'E-mail с сайта');
        $this->mail->addAddress($email, 'Получатель');
        $this->mail->addReplyTo('dudalov.3apycb@mail.ru', 'Sasha');
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Письмо с сайта';
    }

    public function setMessage($message)
    {
        $this->mail->Body = $message;
        $this->mail->AltBody = $message;
    }

    public function send()
    {
        $result=$this->mail->send();
        if  ($result) {
            echo 'Вам отправлено письмо на Ваш майл';
        } else {
            echo 'Сожалеем, но письмо не отправилось. <br/>';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}
