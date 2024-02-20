<?php


// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}

if($_POST['submit']) {

    $flag = $mysqli->query("SELECT * FROM Table_Preparation WHERE name_preparation = '".$_POST['name_preparation']."'")->num_rows;

    echo "f - ".$flag;
    if ($flag == 1) {
        // Выполнение SQL-запроса
        $result = $mysqli->query("DELETE FROM Table_Preparation WHERE name_preparation = '" . $_POST['name_preparation'] . "'");
        $deleted = 'success';
    } else
        $deleted = 'error';

    header("Location: ./preparat.php?deleted=".$deleted);
}


