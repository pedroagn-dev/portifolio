<?php

namespace Providers;

use PHPMailer\PHPMailer\PHPMailer;

class SMTPMailProvider
{
    private $mailer;
    public $from, $to, $subject, $body;
    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->loadEnv();
        $this->mailer->isSMTP();
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPSecure = 'tls';
    }
    private function loadEnv()
    {
        $envData = parse_ini_file("../../.env");
        $this->mailer->Password = $envData["mail"]["SMTP_PASSWORD"];
        $this->mailer->Username = $envData["mail"]["SMTP_USERNAME"];
        $this->mailer->Host = $envData["mail"]["SMTP_HOST"];
        $this->mailer->Port = $envData["mail"]["SMTP_PORT"];
    }
    public function send()
    {
        $this->mailer->setFrom($this->from);
        $this->mailer->addAddress($this->to);
        $this->mailer->Subject = $this->subject;
        $this->mailer->Body = $this->body;
        $this->mailer->send();
    }
}
