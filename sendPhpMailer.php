<?php

require_once __DIR__ . '/vendor/autoload.php';

$mail = new \PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "bobkovsergeyarkadevich@gmail.com";
$mail->Password = "1987kira1954";
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';
// от кого отправляем
$mail->From = 'bobkovsergeyarkadevich@gmail.com';
$mail->FromName  = 'Бобков Сергей';
// кому отправляем
$mail->addAddress('sergey_bobkov@inbox.ru', 'Сергей');
$mail->addAddress('info@sitesdevelopment.ru');

// копия
$mail->addCC('info@sitesdevelopment.ru');

// скрытая копия
$mail->addBCC('info@sitesdevelopment.ru');

// письмо в формате html
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';

// тема письма
$mail->Subject = 'Тема письма';
// тело письма
$mail->Body = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut magna consequat, pulvinar felis ut, ultricies orci. Sed eu imperdiet velit. Aliquam est tellus, dapibus eu mi nec, porta efficitur elit. Vestibulum vestibulum elit ultricies sollicitudin lacinia. Aliquam ac odio sit amet nibh sagittis pretium. Aliquam justo sapien, molestie eget tristique in, commodo eget augue. Curabitur a tortor risus. Nunc vitae consequat nibh. Nunc fermentum arcu eu augue lobortis pharetra. Vestibulum non turpis augue. Nunc faucibus velit a vehicula efficitur. Vivamus arcu ante, condimentum nec commodo sit amet, venenatis id est.';
// альтернатива body
$mail->AltBody = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut magna consequat, pulvinar felis ut, ultricies orci. Sed eu imperdiet velit. Aliquam est tellus, dapibus eu mi nec, porta efficitur elit. Vestibulum vestibulum elit ultricies sollicitudin lacinia. Aliquam ac odio sit amet nibh sagittis pretium. Aliquam justo sapien, molestie eget tristique in, commodo eget augue. Curabitur a tortor risus. Nunc vitae consequat nibh. Nunc fermentum arcu eu augue lobortis pharetra. Vestibulum non turpis augue. Nunc faucibus velit a vehicula efficitur. Vivamus arcu ante, condimentum nec commodo sit amet, venenatis id est.';

// отправляем письмо с вложением
$mail->addAttachment(__DIR__ . '/attachment/background-01-1920x950.jpg');

if ($mail->send()) {
  echo 'Письмо отправлено!';
} else {
  echo 'Ошибка! Письмо не отправлено!';

  // текст ошибки
  echo $mail->ErrorInfo;

}

