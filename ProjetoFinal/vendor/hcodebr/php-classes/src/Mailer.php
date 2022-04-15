<?php

namespace Hcode;

use Rain\Tpl;

class Mailer
{

    const USERNAME = 'MEU EMAIL';
    const PASSWORD = 'senha';
    const NAME_FROM = 'HCODE Store';

    private $mail;

    public function __construct($toAdress, $toName, $subject, $tplName, $data = [])
    {
        $config = array(
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR,
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."views-cache".DIRECTORY_SEPARATOR,
            "debug"         => false
        );

        Tpl::configure( $config);

        $tpl = new Tpl;

        foreach ($data as $key => $value)
        {
            $tpl->assign($key,$value);
        }

        $html = $tpl->draw($tplName, true);

        $this->mail = new \PHPMailer();

        $this->mail->isSMTP();

        $this->mail->SMTPDebug = 0;
        $this->mail->Debugoutput = 'html';

        $this->mail->Host = 'smtp.gmail.com';

        $this->mail->Port = 465;

        $this->mail->SMTPSecure = 'tls';

        $this->mail->SMTPAuth = true;

        $this->mail->Username = Mailer::USERNAME;

        $this->mail->Password = Mailer::PASSWORD;

        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

        $this->mail->addAddress($toAdress, $toName);

        $this->mail->Subject = $subject;

        $this->mail->msgHTML($html);

        $this->mail->AltBody = 'This is a plain-text message body';

        $this->mail->addAttachment('images/phpmailer_mini.png');

    }

    public function send()
    {

        return $this->mail->send();

    }
}
