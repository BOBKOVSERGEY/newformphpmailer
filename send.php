<?php

if (mail('sergey_bobkov@inbox.ru', 'Тема письма', 'Текст сообщения')) {
  echo "Сообщение отправлено";
} else {
  echo "Сообщение не отправлено";
}
