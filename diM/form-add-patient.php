<?php


// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}
$query = "
INSERT INTO `Patient`(`name_patient`, `last_name_patient`, `patronymic_patient`, `year_of_birth`, `growth`, `weight_of_patient`, `body_mass_index`) 
VALUES ('".$_POST['name_patient']."',
        '".$_POST['last_name_patient']."',
        '".$_POST['patronymic_patient']."',
        '".$_POST['year_of_birth']."',
        '".$_POST['growth']."',
        '".$_POST['weight_of_patient']."',
         '".$_POST['body_mass_index']."')";



if($_POST['submit']) {
    // Выполнение SQL-запроса
    $result = $mysqli->query($query);
    header("Location: ./dannie.php");
}