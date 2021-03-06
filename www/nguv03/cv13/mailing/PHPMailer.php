<?php
require_once 'class.phpmailer.php';
const recipient = 'nguv03@vse.cz';
$mailer=new PHPMailer();
$mailer->isSendmail();//nastavení, že se mail má odeslat přes sendmail
//přidání adres (obdobně jdou přidat adresy do polí CC a BCC
$mailer->addAddress(recipient);
$mailer->setFrom(recipient);
//nastavíme předmět
$mailer->CharSet='utf-8';
$mailer->Subject='Ukázkový e-mail z webovek';
//přidáme HTML obsah (může jim být celý HTML dokument, nebo jen kousek body)
$mailer->msgHTML('
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Ukázkový e-mail odeslaný z <a href="http://webovky.vse.cz">webovek</a>...</h2>
  </body>
</html>');
//volitelně lze přidat alternativní obsah (pokud nemá být vytvořen z HTML obsahu)
//$mailer->AltBody='alternativní obsah';
//přidáme přílohu
$mailer->addAttachment(__DIR__.'/madrid.jpg', 'madrid.jpg');
if ($mailer->send()) {
    echo 'E-mail byl odeslán.';
} else {
    echo "Vyskytla se chyba: " . $mailer->ErrorInfo;
}