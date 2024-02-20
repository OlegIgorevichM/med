
<?php
 $connect = mysqli_connect('localhost', 'root', '', 'med');
$Patient = mysqli_query($connect, "SELECT * FROM `Patient`");
 if(!$connect) {
    die('Ошибка подключения БД');
 }
?>



