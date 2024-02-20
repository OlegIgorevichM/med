<?php


// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}
echo '<datalist id="name_patient">';
// Выполнение SQL-запроса
$result = $mysqli->query("SELECT * FROM Patient 
         WHERE name_patient = '".$_POST['name_search']."' AND last_name_patient = '".$_POST['lastname_search']."'");
echo ' </datalist>';

if($_POST['submit']) {
    $id = $result->fetch_assoc()['id_patient'];
    echo '<pre>';
    print_r($id);
    echo '</pre>';
    if($id) {
        header("Location: ./index.php?id=".$id);
    } else {
        header("Location: ./index.php?id=0");
    }

}

