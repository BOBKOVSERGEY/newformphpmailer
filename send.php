<?php
$headers = "Content-type: text/html; Charset=utf-8";


if (mail('sergey_bobkov@inbox.ru', 'Тема письма', 'Текст сообщения', $headers)) {
  echo "Сообщение успешно отправлено";
} else {
  echo "Ощибка, сообщение не отправлено";
}
