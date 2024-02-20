<?php
require_once 'config/connect.php';

//$Patient = mysqli_fetch_all($Patient);

// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}


// массив найденного пациента
$patientSearchArray = [];

if (isset($_GET['id'])) {
    if ($_GET['id'] != 0) {
        // Выполнение SQL-запроса
        $result = $mysqli->query("SELECT * FROM Patient WHERE id_patient = '" . $_GET['id'] . "'");
        $patientSearchArray = $result->fetch_assoc();
    } else if ($_GET['id'] == 0) {
        echo "<script>alert('Такого пациента не существует!');</script>";
    }
}


//вставка дозы
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


?>

<!DOCTYPE html>
<html data-wf-site="645e255aea7561daaac0110f">

<head>
    <meta charset="utf-8"/>
    <title>Работа с пациентом</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/styleRab.css">
    <link href="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/css/mdose.webflow.030176a8a.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
</head>

<body>
<?php

//learn from w3schools.com

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'd') {
        header("location: ../login.php");
    } else {
        $useremail = $_SESSION["user"];
    }

} else {
    header("location: ../login.php");
}


//import database
include("connection.php");
$userrow = $database->query("select * from doctor where docemail='$useremail'");
$userfetch = $userrow->fetch_assoc();
$userid = $userfetch["docid"];
$username = $userfetch["docname"];


//echo $userid;
//echo $username;

?>
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
    <h1 class="home-page-heading">Работа с пациентом</h1>
    <div class="hero-overlay"></div>
</div>


<div class="section wf-section">
    <div class="hero-container w-container">
        <tr>

            <td width="25%">

            </td>
            <td width="15%">
                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align:left;">
                    Сегодняшняя дата
                </p>
                <p class="heading-sub12" style="padding: 0;margin: 0;">
                    <?php
                    date_default_timezone_set('Europe/Moscow');

                    $today = date('d.m.Y');
                    echo $today;

                    ?>
                </p>
            </td>

        </tr>
        <div class="div-block-13">
            <div id="poiskPats" class="w-form">
                <form action="../form/form-search.php" id="FormPoiskP" name="wf-form-FormPoisk" data-name="FormPoisk"
                      method="post"
                      class="FormPoiskP">
                    <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Фамилия</label>
                    <input type="text" class="w-input"
                           maxlength="256"
                           name="lastname_search"
                           data-name="NamePoisk"
                           placeholder="Иванов"
                           id="NamePoisk"
                           required=""/>
                    <label
                        style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Имя</label>
                    <input type="text" class="w-input"
                           maxlength="256" name="name_search" data-name="imPoisk"
                           placeholder="Иван" id="imPoisk"
                           required=""/>
                    <input type="submit" name="submit" value="Поиск"
                           data-wait="Please wait..." id="poisk"
                           class="submit-button-4 w-button"/>
                </form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
        </div>

        <div class="div-rab">
            <div>
                <div class="w-form">

                    <form action="../form/form-update-petient.php" id="email-form" name="email-form" data-name="Email Form"
                          method="post">
                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Фамилия</label>
                        <input hidden name="id_patient" type="text"
                               value="<?= (isset($patientSearchArray['id_patient'])) ? $patientSearchArray['id_patient'] : '' ?>">
                        <input name="last_name_patient" id="lastname_p" type="text" class="w-input"
                               value="<?= (isset($patientSearchArray['last_name_patient'])) ? $patientSearchArray['last_name_patient'] : '' ?>">

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Имя</label>
                        <input name="name_patient" id="name_p" type="text" class="w-input"
                               value="<?= (isset($patientSearchArray['name_patient'])) ? $patientSearchArray['name_patient'] : '' ?>">

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Отчество</label>
                        <input name="patronymic_patient" id="otc_p" type="text" class="w-input"
                               value="<?= (isset($patientSearchArray['patronymic_patient'])) ? $patientSearchArray['patronymic_patient'] : '' ?>">

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Год
                            рождения</label>
                        <input name="year_of_birth" type="text" class="w-input"
                               value="<?= (isset($patientSearchArray['year_of_birth'])) ? $patientSearchArray['year_of_birth'] : '' ?>">


                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Рост</label>
                        <input name="growth" type="text" class="w-input" id="growth"
                               value="<?= (isset($patientSearchArray['growth'])) ? $patientSearchArray['growth'] : '' ?>">


                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Вес</label>
                        <input name="weight_of_patient" type="text" class="w-input" id="weight_of_patient"
                               value="<?= (isset($patientSearchArray['weight_of_patient'])) ? $patientSearchArray['weight_of_patient'] : '' ?>">

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Индекс
                            массы тела </label>
                        <input name="body_mass_index" type="text" class="w-input"
                               value="<?= (isset($patientSearchArray['body_mass_index'])) ? $patientSearchArray['body_mass_index'] : '' ?>">


                        <input name="update" type="submit" value="Изменить" data-wait="Please wait..." id="izm"
                               class="submit-button-4 w-button"/>
                    </form>

                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>


                </div>
            </div>
            <div id="raschDo" class="raschdo">
                <div class="w-form">
                    <div id="dopInf" class="w-form">
                        <div id="naMass" class="w-form">
                            <div class="w-form">
                                <?php

                                $database = new mysqli("localhost", "root", "", "med");
                                if ($database->connect_error) {
                                    die("Connection failed:  " . $database->connect_error);
                                }

                                ?>


                                <div class="">
                                    <table border="0" width="0"
                                           style=" border-spacing: 0;margin:0;padding:0;margin-top:0; ">


                                        <tr>
                                            <td colspan="2" style="padding-top:0;">
                                                <p class=""
                                                   style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">
                                                    Добавление </p>

                                                <p class=""
                                                   style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">
                                                    противопоказания</p>
                                            </td>
                                            <?
                                            $id_url = '';
                                            if (isset($_GET['id'])) {
                                                $id_url = '&id=' . $_GET['id'];
                                            }
                                            ?>
                                            <td colspan="2">
                                                <a href="?action=add&id=none&error=0<?= $id_url ?>"
                                                   class="non-style-link">
                                                    <button class="login-btn btn-primary btn button-icon"
                                                            style="display: flex;justify-content: center; align-items:
                                                                            center;margin-left:75px;background-image: url('../img/icons/add.svg');">
                                                        Добавить

                                                    </button>
                                                </a></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                <center>
                                                    <div class="">
                                                        <table width="" style="border-spacing: 10px;" border="0">
                                                            <thead>
                                                            <tr>
                                                                <th class="table-headin">


                                                                    Дата поставления диагноза

                                                                </th>

                                                                <th class="table-headin">

                                                                    Протовопоказания

                                                                </th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                                            if (isset($_GET['id'])) {
                                                                $sqlmain = "SELECT * FROM Contraindications_For_Patient LEFT JOIN Contraindications on Contraindications_For_Patient.id_contraindications=Contraindications.id_contraindications where id_patient='" . $_GET['id'] . "'";
                                                                $result = $database->query($sqlmain);
                                                                $dangerPrep = [];

                                                                if ($result->num_rows != 0) {
                                                                    for ($x = 0; $x < $result->num_rows; $x++) {
                                                                        $row = $result->fetch_assoc();

                                                                        $dangerPrep[$row['id_contraindications']] = $row['id_contraindications'];


                                                                        $docid = $row["id_contraindications_for_patient"];
                                                                        $name = $row["year"];

                                                                        $id_patient = $row["id_patient"];
                                                                        $spe = $row["id_contraindications"];
                                                                        $spcil_res = $database->query("select contraindication from Contraindications where id_contraindications='$spe'");
                                                                        $spcil_array = $spcil_res->fetch_assoc();
                                                                        $spcil_name = $spcil_array["contraindication"];
                                                                        echo

                                                                            '<tr>
                                                                                <td style="padding: 4px 0;"> &nbsp;' .
                                                                            substr($name, 0, 30)
                                                                            . '</td>
                                      
                                                                                <td style="padding: 4px 0;">
                                                                                    ' . $spcil_name . '
                                                                                </td>
                                                                                </tr>
                                                                                ';

                                                                    }
                                                                }
                                                            }

                                                            ?>

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>


                                    </table>
                                </div>
                                <script>
                                    var array5 = <?php echo json_encode($dangerPrep) ?>;

                                </script>


                                <?php


                                if (isset($_GET['action'])) {

                                    $id = $_GET["id"];
                                    $action = $_GET["action"];
                                    if ($action == 'drop') {
                                        $nameget = $_GET["name"];
                                        echo '
           
            </div>
            ';

                                    } elseif ($action == 'add') {
                                        $error_1 = $_GET["error"];
                                        $errorlist = array(
                                            '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
                                            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
                                            '3' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                                            '4' => "",
                                            '0' => '',

                                        );
                                        if ($error_1 != '4') {
                                            echo '
            <div id="popup1" class="overlay" style="z-index: 10">
                    <div class="popup">
                    <center>
                    
                        <a class="close" href="index.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="">
                        <table>
                        <tr>
                                <td class="label-td" colspan="2">' .
                                                $errorlist[$error_1]
                                                . '</td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Добавление нового противопоказания.</p><br><br>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <form action="../add-new-const.php" method="POST" class="add-new-form">
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Дата постановки противопоказания: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="year" class="input-text" placeholder="2023-05-14" required><br>
                                     <input hidden="hidden" type="text" name="id" class="input-text" value="' . $_GET['id'] . '"><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Выбор противопоказания: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" >
                                    <select name="id_contraindications" id="" class="box" >';


                                            $list11 = $database->query("select  * from  Contraindications order by contraindication asc;");

                                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                                $row00 = $list11->fetch_assoc();
                                                $sn = $row00["contraindication"];
                                                $id00 = $row00["id_contraindications"];
                                                echo "<option value=" . $id00 . ">$sn</option><br/>";
                                            };

                                            echo '       </select><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                            </tr>
                            
                
                            <tr>
                                <td colspan="2">
                                    
                                   <input
                            type="submit" name="submit" value="Добавить" data-wait="Please wait..." id="newPreparat"
                            class="submit-button-6 w-button"/>
                                </td>
                
                            </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';

                                        } else {
                                            echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            <br><br><br><br>
                                <h2>Новая запись успешно добавлена!</h2>
                                <a class="close" href="index.php">&times;</a>
                                <div class="content">
                                    
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                <a href="index.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                                </div>
                                <br><br>
                            </center>
                    </div>
                    </div>
        ';
                                        }


                                    };
                                };

                                ?>


                            </div>
                        </div>
                    </div>
                    <form action="../admin/resept.php" method="post">
                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">
                            Группа заболеваний</label><select id="s1" name="GruppaZabolevanie2"
                                                              data-name="GruppaZabolevanie2" required=""
                                                              class="w-select">
                            <option value="">Выберите...</option>
                            <? foreach ($medArray1 as $preparat): ?>
                                <option value="<?= $preparat['id_table_malady'] ?>"><?= $preparat['malady'] ?></option>
                            <? endforeach; ?>
                        </select><label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Болезнь</label><select
                            id="s2" name="Bolezn2"
                            data-name="Bolezn2" required=""
                            class="w-select">
                            <option value="">Выберите группу заболеваний...</option>
                        </select><label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Группа
                            лекарств</label>


                        <select id="s3"
                                name="GruppaLek2"
                                data-name="GruppaLek2"
                                required="" class="w-select">
                            <option value="">Выберите из предыдущего пункта...</option>
                        </select><label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Препарат</label><select
                            id="s4" name="preparat"
                            data-name="Preparat2" required=""
                            class="w-select">
                            <option value="">Выберите из предыдущего пункта...</option>

                        </select><label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Дозировка
                            в миллиграммах</label>
                        <textarea placeholder="" maxlength="20" id="dozirovka" name="field" data-name="Field"
                                  class="textarea w-input" style="height: 40px;"></textarea>


                        <input
                            type="button" value="Рассчитать дозировку" onclick="setDose()" data-wait="Please wait..."
                            id="dose"
                            class="submit-button-4 w-button"/>
                        <script>
                            function setDose() {
                                let weight_of_patient = Number(document.getElementById('weight_of_patient').value);
                                let growth = Number(document.getElementById('growth').value);
                                let n = Number(number_time);
                                let c = Number(count_dose);


                                let kor = Number((growth * weight_of_patient) / 3600);
                                let coren = (Math.sqrt(kor));
                                let dose = Number(coren * c).toFixed(0);
                                document.getElementById('dozirovka').value = dose;
                            }

                            function saveFile() {
                                let dose = Number(document.getElementById('dozirovka').value);
                                let name_p = document.getElementById('lastname_p').value + ' ' +
                                    document.getElementById('name_p').value + ' ' + document.getElementById('otc_p').value;
                                let name_d = <?php echo json_encode($username) ?>;
                                let date = new Date().toLocaleString();
                                let prep = $('#s4 option:selected').text();
                                document.getElementById('prep').value = prep;

                                let bol = $('#s2 option:selected').text();
                                document.getElementById('myregion').value = bol;


                                let n = Number(number_time);
                                let c = Number(count_dose);
                                let blob = new Blob([
                                        '\nФИО пациента: ' + name_p +
                                        '\nФИО врача: ' + name_d +
                                        '\nДата: ' + date +
                                        '\nПрепарат: ' + prep +
                                        "\nДоза: " + dose + " мг" +
                                        "\nКоличество приемов в день: " + n],
                                    {type: "text/plain"});
                                let link = document.createElement("a");
                                link.setAttribute("href", URL.createObjectURL(blob));
                                link.setAttribute("download", Date.now() + "");
                                link.click();
                            }
                        </script>

                        <input hidden name="id_patient" type="text"
                               value="<?= (isset($patientSearchArray['id_patient'])) ? $patientSearchArray['id_patient'] : '' ?>">

                        <input hidden name="fio_p" id="fio_p" type="text"
                               value="<?= (isset($patientSearchArray['name_patient'])) ? $patientSearchArray['last_name_patient'] . ' ' . $patientSearchArray['name_patient'] . ' ' . $patientSearchArray['patronymic_patient'] : '' ?>">

                        <input hidden name="dozirovka" id="dozirovka" type="text"
                               value="">
                        <input hidden name="fio_d" id="fio_d" type="text"
                               value="<?= $username ?>">
                        <input hidden name="prot" id="prot" type="text"
                               value="">
                        <input hidden name="bol" id="bol" type="text"
                               value="<?= $spcil_name ?>">
                        <input hidden name="prep" id="prep" type="text"
                               value="">
                        <input name="send_file" type="submit" onclick="saveFile()" value="Сохранить в файл"
                               data-wait="Please wait..." id="savafile"
                               class="submit-button-3 w-button"/>
                    </form>

                </div>
                <script>
                    var array1 = <?php echo json_encode($medArray1) ?>;
                    var array2 = <?php echo json_encode($medArray2) ?>;
                    var array3 = <?php echo json_encode($medArray3) ?>;
                    var array4 = <?php echo json_encode($medArray4) ?>;
                    s1.onchange = function () {
                        s2.disabled = false;
                        s2.innerHTML = "<option value='0'>Выберите болезнь</option>";
                        grzab = this.value;
                        if (grzab != -1) {
                            for (var i = 0; i < (array2[grzab].length); i++) {
                                s2.innerHTML += '<option value="' + (i + 1) + '">' + array2[grzab][i]['disease'] + '</option>';
                            }
                        } else {
                            s2.disabled = true;
                            s3.disabled = true;
                        }
                    }
                    s2.onchange = function () {
                        s3.disabled = false;
                        s3.innerHTML = "<option value='v'>Выберите группу лекарств</option>";
                        var bol = this.value;
                        if (bol != -1) {
                            for (var i = 0; i < array3[bol].length; i++) {
                                s3.innerHTML += '<option value="' + (array3[bol][i]['id_table_group_of_medicines']) + '">' + array3[bol][i]['name_group_of_medicines'] + '</option>';
                            }
                        } else {
                            s3.disabled = true;
                        }
                    }
                    let number_time = 0;
                    let count_dose = 0;
                    var grprep = 0;
                    s3.onchange = function () {
                        s4.disabled = false;
                        s4.innerHTML = "<option value='99'>Выберите препарат</option>";
                        grprep = this.value;
                        if (myp != -1) {
                            for (var i = 0; i < array4[grprep].length; i++) {
                                if (array5[array4[grprep][i]['constrain']])
                                    s4.innerHTML += '<option disabled value="' + (i) + '">' + array4[grprep][i]['name_preparation'] + '</option>';
                                else
                                    s4.innerHTML += '<option value="' + (i) + '">' + array4[grprep][i]['name_preparation'] + '</option>';
                            }
                        } else {
                            s4.disabled = true;
                        }
                    }
                    s4.onchange = function () {
                        s4.disabled = false;
                        var prep = this.value;
                        count_dose = array4[myp][prep]['dose_of_preparation'];
                        number_time = array4[myp][prep]['number_of_times'];
                    }
                    function setvivodDosO() {
                        let DosTrebO = Number(document.getElementById('DosTrebO').value);
                        let vAmp = Number(document.getElementById('vAmp').value);
                        let gAmp = Number(document.getElementById('gAmp').value);


                        let DoseO = (DosTrebO / vAmp * gAmp).toFixed(0);

                        document.getElementById('vivodDosO').value = DoseO;
                        document.getElementById('save').removeAttribute("disabled");
                </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            </div>
        </div>


        <h2 class="heading">Дополнительная информация</h2>

        <div class="div-block-13">
            <div id="poiskPats" class="w-form">

                <form id="FormPoiskP" name="wf-form-FormPoisk" data-name="FormPoisk" method="post"
                      class="formpoiskp">
                    <label
                        for="inuzKap2" class="field-label-2" style=" color: rgb(49, 49, 49); font-weight: bold; font-family: Arial; margin: 20px;">Доза жидкости для инфузии</label>
                    <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Требуемая
                        доза(мг)</label><input type="number"
                                               class="w-input"
                                               maxlength="256"
                                               name="DosTrebO"
                                               data-name="DosTrebO"
                                               placeholder="500"
                                               id="DosTrebO"
                                               required=""/><label
                        style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Доза в
                        ампуле(мг)</label>
                    <input
                        type="number" class="w-input" maxlength="256" name="vAmp" data-name="vAmp"
                        placeholder="100" id="vAmp" required=""/>
                    <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Жидкости
                        в
                        ампуле(мл)</label>
                    <input type="number" class="w-input" maxlength="256" name="gAmp"
                           data-name="gAmp" placeholder="100" id="gAmp" required=""/>
                    <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Доза
                        в миллилитрах</label>
                    <input
                        type="text"
                        class="w-input" maxlength="256" name="VivodDosO" data-name="VivodDosO"
                        placeholder="Доза выведется при нажатии на кнопку" id="vivodDosO"/>
                    <button type="button" class="submit-button-4 w-button" onclick="setvivodDosO();">Рассчитать</button>
                </form>

                <script>
                    function setvivodDosO() {
                        let DosTrebO = Number(document.getElementById('DosTrebO').value);
                        let vAmp = Number(document.getElementById('vAmp').value);
                        let gAmp = Number(document.getElementById('gAmp').value);


                        let DoseO = (DosTrebO / vAmp * gAmp).toFixed(0);

                        document.getElementById('vivodDosO').value = DoseO;
                        document.getElementById('save').removeAttribute("disabled");
                    }
                </script>

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
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645500de3bd98b20d3d42f98"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="rab.js" type="text/javascript"></script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e255aea7561daaac0110f"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/js/webflow.b5f6862ac.js"
        type="text/javascript"></script>
</body>

</html>