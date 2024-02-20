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
$query =
    "INSERT INTO `Contraindications_For_Patient`( `id_patient`, `id_contraindications`, `year`) 
VALUES (
        '".$_POST['id']."',
        '".$_POST['id_contraindications']."',
        '".$_POST['year']."')";

if($_POST['submit']) {
    // Выполнение SQL-запроса
    $result = $mysqli->query($query);
    header("Location: ./index.php?id=".$_POST['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Администратор</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>

</body>
</html>
