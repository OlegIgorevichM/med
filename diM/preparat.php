<?php
// Подключение к базе данных MySQL
$mysqli = new mysqli('localhost', 'root', '', 'med');

// Проверка соединения
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    exit;
}

// Выполнение SQL-запроса
$result = $mysqli->query("SELECT * FROM Table_Group_of_medicines ");

// массив найденного пациента
$medArray = [];
$result->fetch_assoc();
while ($row = $result->fetch_assoc()) {
    $medArray[] = $row;
}

$result1 = $mysqli->query("SELECT * FROM Contraindications ");
$protivoArray = [];
while ($row = $result1->fetch_assoc()) {
    $protivoArray[] = $row;
}

if(isset($_GET['deleted'])) {
    if($_GET['deleted'] == 'success') {
        echo "<script>alert('Препарат успешно удален!');</script>";
        $_GET['deleted'] = 0;
    } elseif ($_GET['deleted'] == 'error') {
        echo "<script>alert('Такого препарата не существует!');</script>";
        $_GET['deleted'] = 0;
    }
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
    <title>Препарат</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/css/mdose.webflow.81c9b634d.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/css/mdose.webflow.030176a8a.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google: {families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic", "Bitter:400,700,400italic"]}});</script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>

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
            <nav role="navigation" class="menu w-nav-menu"><a href="/dannie.php" class="nav-link w-nav-link">новый
                    пациент</a><a
                    href="/index.php" class="nav-link w-nav-link">поиск пациента</a><a href="preparat.php"
                                                                                       class="nav-link w-nav-link">препарат</a><a
                    href="#" style="margin-left: 6px" class="nav-link w-nav-link">врач: <?php echo $username ?></a><a
                    href="/index.html" class="nav-link w-nav-link">Выход</a>
            </nav>
        </div>
    </div>
    <h1 class="home-page-heading">Введите данные о препарате</h1>
    <div class="hero-overlay"></div>
</div>
<div class="section wf-section">
    <div class="hero-container w-container">
        <div class="div-block-11">
            <div id="preparat" class="preparatd w-node-_23706b24-4560-a8db-b8ea-02857b60da92-aac01113">
                <div class="w-form">
                    <form action="./form-add-preparate.php" id="wf-form-FormAddPrep" name="wf-form-FormAddPrep" data-name="FormAddPrep" method="post">
                        <label for="name" class="field-label"> Добавить препарат</label>

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Противопоказания</label>
                        <select id="danger" name="danger"
                                                                             data-name="Protivo1" required=""
                                                                             class="w-select">
                            <option value="">Выберите нужную болезнь...</option>
                            <? foreach ($protivoArray as $preparatе): ?>
                                <option value="<?= $preparatе['id_contraindications']?>"><?= $preparatе['contraindication'] ?></option>
                            <? endforeach; ?>
                        </select>

                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Группа
                            препаратов</label>

                        <select id="PrepVse" name="id_table_group_of_medicines" data-name="PrepVse" required=""
                                                      class="w-select">
                            <option value="">Выбрать группу препаратов...</option>
                            <? foreach ($medArray as $preparat): ?>
                                <option
                                    value="<?= $preparat['id_table_group_of_medicines'] ?>"><?= $preparat['name_group_of_medicines'] ?></option>
                            <? endforeach; ?>



                        </select><label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Препарат</label>
                        <input  type="text" class="w-input"
                                                                                 maxlength="256" name="name_preparation"
                                                                                 data-name="NewNamePrep"
                                                                                 placeholder="Хиротип"
                                                                                 id="NewNamePrep" required=""/>
                        <label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Доза</label>
                        <input type="number"
                                                                 class="w-input" maxlength="256" name="dose_of_preparation"
                                                                 data-name="doseNewPrep"
                                                                 placeholder="20" id="doseNewPrep" required=""/>
                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Количество
                            приемов</label>
                        <input type="number" class="w-input" maxlength="256" name="number_of_times"
                                                  data-name="kolvopr" placeholder="2" id="kolvopr" required=""/>
                        <label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Форма
                            реализации</label>
                        <input type="text" class="w-input" maxlength="256" name="tabl"
                                                     data-name="tabl" placeholder="Таблетки" id="tabl"
                                                     required=""/>
                        <label
                            style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Форма выпуска</label>
                        <input type="number" class="w-input" maxlength="256"
                                                                     name="vipusk" data-name="vipusk" placeholder="100"
                                                                     id="vipusk" required=""/>
                        <input
                            type="submit" name="submit" value="Добавить препарат" data-wait="Please wait..." id="newPreparat"
                            class="submit-button-6 w-button"/>

                    </form>
                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                </div>
            </div>
            <div id="deletePrep" class="deleteprep w-node-_0cc924bb-a2fe-35fd-06ff-cd1af090a263-aac01113">
                <div class="w-form">
                    <form  action="./form-del-prep.php" id="email-form" name="email-form" data-name="Email Form" method="post"><label for="name"
                                                                                                       class="field-label">Удалить
                            препарат</label><label style="font-size: 18px; color: rgb(49, 49, 49); font-weight: bold; font-family: Arial;">Препарат</label><input
                            type="text" class="w-input" maxlength="256" name="name_preparation" data-name="delPrep"
                            placeholder="Хиротип" id="name_preparation" required=""/><input type="submit"
                                                                                   name="submit"
                                                                                   value="Удалить препарат"
                                                                                   data-wait="Please wait..."
                                                                                   id="delPreparat"
                                                                                   class="submit-button-7 w-button"/>



                        <label for="name"
                               class="field-label">Поиск препарата</label>
                        <tr>
                            <td colspan="2">
                                <a href="preparatSearch.php" ><input type="button" value="Поиск препарата" class="logout-btn btn-primary-soft btn"></a>
                            </td>
                        </tr>

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
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645500de3bd98b20d3d42f98"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="rab.js" type="text/javascript"></script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e255aea7561daaac0110f"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/js/webflow.b5f6862ac.js"
        type="text/javascript"></script>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e255aea7561daaac0110f"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="js/rab.js"
        type="text/javascript"></script>
</body>

</html>