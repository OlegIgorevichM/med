<?php


// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}


echo "<pre>";
print_r($_POST);
echo "</pre>";

$query = "
INSERT INTO `resept`(`fio_p`, `fio_d`, `prep`, `data`, `bol`, `dose`)
VALUES ('".$_POST['fio_p']."',
        '".$_POST['fio_d']."',
         '".$_POST['prep']."',
        '".date('Y-m-d')."',
         '".$_POST['myregion']."',
         '".$_POST['field']."')";


// Выполнение SQL-запроса
$result = $mysqli->query($query);
header("Location: ./index.php?id=".$_POST['id_patient']);