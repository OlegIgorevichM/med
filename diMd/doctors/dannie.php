<?php
// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');
// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}
// Выполнение SQL-запроса
$result1 = $mysqli->query("SELECT * FROM Table_Malady ");

$medArray1 = [];
while ($row = $result1->fetch_assoc()) {
    $medArray1[] = $row;
}
// Выполнение SQL-запроса
$result2 = $mysqli->query("SELECT * FROM Table_Disease ");

$medArray2 = [];
while ($row = $result2->fetch_assoc()) {
    $medArray2[$row['id_table_malady']][] = $row;
}
// Выполнение SQL-запроса
$result3 = $mysqli->query("SELECT * FROM Table_Group_of_medicines ");
$medArray3 = [];
while ($row = $result3->fetch_assoc()) {
    $medArray3[$row['id_table_disease']][] = $row;
}
// Выполнение SQL-запроса
$result4 = $mysqli->query("SELECT * FROM Table_Preparation ");

$medArray4 = [];
while ($row = $result4->fetch_assoc()) {
    $medArray4[$row['id_table_group_of_medicines']][] = $row;
}

$result1 = $mysqli->query("SELECT * FROM Contraindications ");

$protivoArray = [];
while ($row = $result1->fetch_assoc()) {
    $protivoArray[] = $row;
}
session_start();
if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
        header("location: ../login.php");
    }else{
        $useremail=$_SESSION["user"];
    }
}else{
    header("location: ../login.php");
}
//import database
include("connection.php");
$userrow = $database->query("select * from doctor where docemail='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["docid"];
$username=$userfetch["docname"];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Новый пациент</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<div class="hero-section home-page-hero wf-section">
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
         role="banner" class="navv w-nav"><a href="#" class="w-nav-brand">
            <div class="logo-text">MedicalDose<strong data-new-link="true"></strong></div>
        </a>
        <div class="menu-button w-nav-button">
            <div class="icon w-icon-nav-menu"></div>
        </div>
        <div class="container-3 w-container">
            <nav role="navigation" class="menu w-nav-menu"><a href="/doctors/dannie.php" class="nav-link w-nav-link">новый
                    пациент</a><a
                    href="/doctors/index.php" class="nav-link w-nav-link">поиск пациента</a><a href="preparat.php"
                                                                                               class="nav-link w-nav-link">препарат</a><a
                    href="#" style="margin-left: 6px" class="nav-link w-nav-link">врач: <?php echo $username ?></a><a
                    href="/index.html" class="nav-link w-nav-link">Выход</a>
            </nav>
        </div>
    </div>
    <h1 class="home-page-heading">Введите данные о пациенте</h1>
    <div class="hero-overlay"></div>
</div>
<div class="section wf-section">
    <div class="hero-container w-container">
        <div class="div-block-13">
            <div class="div-block-14">
                <div class="form-block w-form">
                    <div class="w-form">
                        <form action="../form/form-add-patient.php" id="FormDannie" name="wf-form-FormDannie"
                              data-name="FormDannie"
                              method="post" class="formvvv"><label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Фамилия</label>
                            <input type="text"
                                   class="w-input"
                                   maxlength="256"
                                   name="last_name_patient"
                                   data-name="Fam1"
                                   placeholder="Иванов"
                                   id="Fam-2"
                                   required/><label
                                style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Имя</label>
                            <input type="text"
                                   class="w-input" maxlength="256" name="name_patient"
                                   data-name="Name1" placeholder="Иван"
                                   id="Name-2" required/><label
                                style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Отчество</label>
                            <input type="text"
                                   class="w-input" maxlength="256"
                                   name="patronymic_patient"
                                   data-name="Otch1" placeholder="Иванович"
                                   id="Otch-2" required/><label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Год
                                рождения</label>
                            <input type="number"
                                   class="w-input" maxlength="256" name="year_of_birth" data-name="God1"
                                   placeholder="2001"
                                   id="God-2" required/>
                            <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Рост</label>
                            <input
                                type="number"
                                class="w-input" id="height" maxlength="256" name="growth" data-name="Rost1"
                                placeholder="178"
                                required/>

                            <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Вес</label>
                            <input type="number" id="weight"
                                   class="w-input"
                                   maxlength="256"
                                   name="weight_of_patient"
                                   data-name="Ves1"
                                   placeholder="78"

                                   required=""/><label
                                style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Индекс массы тела</label><input type="number" id="index"
                                                                          class="w-input"
                                                                          maxlength="256"
                                                                          name="body_mass_index"
                                                                          data-name="Ves1"


                                                                          required=""/>
                            <button type="button" class="submit-button-4 w-button" onclick="setIndex();">Рассчитать</button>
                            <script>
                                function setIndex() {
                                    let weight = Number(document.getElementById('weight').value);
                                    let height = Number(document.getElementById('height').value);
                                    index = weight / ((height * height));
                                    let ind = index.toFixed(0);
                                    document.getElementById('index').value = ind;
                                    document.getElementById('save').removeAttribute("disabled");
                                }
                            </script>


                            <input disabled id="save" type="submit" class="button-sohr w-button" name="submit"
                                   value="Сохранить">
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aaa wf-section">
        <div class="container-2 w-container">
            <div class="columns w-row">
                <div class="column w-col w-col-3">
                    <div class="asdd">Copyright 2019. All Rights Reserved</div>
                </div>
                <div class="footer-link-col w-col w-col-9">
                    <div class="text-block">Частное медицинское унитарное предприятие «МОКардио», УНП 56151581111111, г.
                        Могилев, пер. Карпинской Т., д. № 10а-3.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>