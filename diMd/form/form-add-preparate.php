<?php


// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}
$query = "
INSERT INTO `Table_Preparation`(`id_table_group_of_medicines`, `name_preparation`, `dose_of_preparation`, `number_of_times`, `constrain`)
VALUES ('".$_POST['id_table_group_of_medicines']."',
        '".$_POST['name_preparation']."',
        '".$_POST['dose_of_preparation']."',
        '".$_POST['number_of_times']."',
        '".$_POST['danger']."')";



if($_POST['submit']) {
    // Выполнение SQL-запроса
    $result = $mysqli->query($query);
    header("Location: ./preparat.php");
}