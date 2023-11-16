<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include_once "../connexion.php";

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'guprojetmmi@gmail.com';
$mail->Password = 'zskgpnbfqqkuinyu';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->isHTML(true);

$mail->setFrom('guprojetmmi@gmail.com');

$mail->addAddress($row['mail']);
$mail->addCC('noahbuisson22.nb@gmail.com');
$mail->isHTML(true);

$message = file_get_contents('mail/index.html');
$message = str_replace('%nom%', $row['nom'], $message);
$message = str_replace('%prenom%', $row['prenom'], $message);
$message = str_replace('%date_emprunt%', $row['date_emprunt'], $message);
$message = str_replace('%date_retour%', $row['date_retour'], $message);
$message = str_replace('%id_article%', $row['id_objet'], $message);
$message = str_replace('%nom_objet%', $row['nom_stock'], $message);
$message = str_replace('%image%', $row['image'], $message);
$message = str_replace('%prenom%', $row['prenom'], $message);


$mail->Subject = 'Nouvel Emprunt';

$mail->MsgHTML($message);
$mail->AddEmbeddedImage('mail/images/image-1.png', 'logo_gu');

$mail->send();

echo "message envoyé";


?>