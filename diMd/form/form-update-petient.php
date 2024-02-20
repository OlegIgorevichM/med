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
UPDATE `Patient` SET 
                     `name_patient`='".$_POST['name_patient']."',
                     `last_name_patient`='".$_POST['last_name_patient']."',
                     `patronymic_patient`='".$_POST['patronymic_patient']."',
                     `year_of_birth`='".$_POST['year_of_birth']."',
                     `growth`='".$_POST['growth']."',
                     `weight_of_patient`='".$_POST['weight_of_patient']."',
                     `body_mass_index`='".$_POST['body_mass_index']."' WHERE id_patient = '".$_POST['id_patient']."'";

if($_POST['update']) {
    // Выполнение SQL-запроса
    $result = $mysqli->query($query);
    header("Location: ./index.php?id=".$_POST['id_patient']);
}