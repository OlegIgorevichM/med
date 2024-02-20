<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";
$file = 'dose.txt';
// Открываем файл для получения существующего содержимого
$current = file_get_contents($file);
// Добавляем нового человека в файл
$current .= "Препарат:\n"."Доза: \n"."Количествоприемов:\n";
// Пишем содержимое обратно в файл
file_put_contents($file, $current);

