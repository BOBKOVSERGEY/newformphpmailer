<?php

if ($_POST) {
  require_once __DIR__ . '/vendor/autoload.php';

  $mail = new \PHPMailer\PHPMailer\PHPMailer();

  $mail->isSMTP();

  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = "";
  $mail->Password = "";
  $mail->SMTPSecure = 'ssl';
  $mail->Port = '465';
// от кого отправляем
  $mail->From = 'bobkovsergeyarkadevich@gmail.com';
  $mail->FromName  = 'Бобков Сергей';
// кому отправляем
  $mail->addAddress('sergey_bobkov@inbox.ru', 'Сергей');

// письмо в формате html
  $mail->isHTML(true);
  $mail->CharSet = 'UTF-8';

  // собираем параметры
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $company = $_POST['company'];
  $comment = $_POST['comment'];

  $file = "attachment/" . basename($_FILES['attachment']['name']);
  //перемещаем загруженный файл в новое место
  move_uploaded_file($_FILES['attachment']['tmp_name'], $file);

  $body = "Имя: {$name}<br> Email: {$email}<br> Телефон: {$phone}<br> Компания: {$company}<br> Комментарий: " . nl2br($comment);
  $bodyAlt = "Имя: {$name}\r\n Email: {$email}\r\n Телефон: {$phone}\r\n Компания: {$company}\r\n Комментарий: " . nl2br($comment);

// тема письма
  $mail->Subject = 'Заявка с сайта';
// тело письма
  $mail->Body = $body;
  // альтернатива body
  $mail->AltBody = $bodyAlt;

  // прикрепленный файл
  $mail->addAttachment($file);


  if ($mail->send()) {
    echo 'Письмо отправлено!';
  } else {
    echo 'Ошибка! Письмо не отправлено!';

    // текст ошибки
    echo $mail->ErrorInfo;

  }

}


