<!DOCTYPE html><!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Wed May 24 2023 14:15:51 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="medical-dose.webflow.io" data-wf-page="645500de3bd98becbdd42f99"
      data-wf-site="645500de3bd98b20d3d42f98">
<head>
    <meta charset="utf-8"/>
    <title>Medical Dose</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Webflow" name="generator"/>
    <link href="https://uploads-ssl.webflow.com/645500de3bd98b20d3d42f98/css/medical-dose.webflow.b1c1b1a60.css"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({google: {families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic", "Bitter:400,700,400italic"]}});</script>
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
</head>
<body>
<div class="contact-overlay wf-section">
    <div class="w-container"><a href="#" class="close-link">CLOSE ✕</a>
        <div class="form-wrapper">
            <div class="contact-heading">Get in Touch</div>
            <div class="small-divider"></div>
            <div class="contact-text">Thank you for your interest! Please fill out the form below if you would like to
                work together.
            </div>
            <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form" method="get"><input type="text"
                                                                                                   class="text-field-2 w-input"
                                                                                                   maxlength="256"
                                                                                                   name="name"
                                                                                                   data-name="Name"
                                                                                                   placeholder="Enter your name"
                                                                                                   id="name"/><input
                        type="email" class="text-field-2 w-input" maxlength="256" name="email" data-name="Email"
                        placeholder="Enter your email address" id="email" required=""/><textarea id="Project-details"
                                                                                                 name="Project-details"
                                                                                                 placeholder="What are your project details..."
                                                                                                 maxlength="5000"
                                                                                                 data-name="Project details"
                                                                                                 class="text-field-2 text-area w-input"></textarea><input
                        type="submit" value="Send" data-wait="Please wait..." class="submit-button w-button"/></form>
                <div class="success-message w-form-done"><p class="success-text">Thank you! Your submission has been
                        received!</p></div>
                <div class="w-form-fail"><p>Oops! Something went wrong while submitting the form</p></div>
            </div>
        </div>
    </div>
</div>
<div class="hero-section home-page-hero wf-section">
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
         role="banner" class="nav w-nav"><a href="#" class="w-nav-brand">
            <div class="logo-text">MedicalDose<strong data-new-link="true"></strong></div>
        </a>
        <div class="w-container">
            <nav role="navigation" class="nav-menu w-nav-menu"><a href="#" class="nav-link w-nav-link">главная</a><a
                    href="/dannie" class="nav-link w-nav-link">новый пациент</a><a href="/" aria-current="page"
                                                                                   class="nav-link w-nav-link w--current">поиск
                    пациента</a><a href="#" class="nav-link w-nav-link">препарат</a><a href="#"
                                                                                       data-w-id="4e76b443-8317-7865-f5ef-1fd4925c8ac6"
                                                                                       class="nav-link contact w-nav-link">Администратор</a>
            </nav>
            <div class="menu-button w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
    <h1 class="home-page-heading">Работа с пациентом</h1>
    <div class="hero-overlay"></div>
</div>
<div class="section wf-section">
    <div class="hero-container w-container">
        <div class="div-block-13">
            <div id="poiskPats" class="w-form">
                <form id="FormPoiskP" name="wf-form-FormPoisk" data-name="FormPoisk" method="post" class="formpoiskp">
                    <label for="NamePoisk">Фамилия</label><input type="text" class="w-input" maxlength="256"
                                                                 name="NamePoisk" data-name="NamePoisk"
                                                                 placeholder="Мелешков" id="NamePoisk"
                                                                 required=""/><label for="imPoisk">Имя</label><input
                        type="text" class="w-input" maxlength="256" name="imPoisk" data-name="imPoisk"
                        placeholder="Олег" id="imPoisk" required=""/><input type="submit" value="Поиск"
                                                                            data-wait="Please wait..." id="poisk"
                                                                            class="submit-button-6 w-button"/></form>
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
                    <form id="formPatsientDB" name="email-form" data-name="Email Form" method="get"
                          class="formpatsientdb"><label for="Fam">Фамилия</label><textarea placeholder=""
                                                                                           maxlength="5000" id="Fam"
                                                                                           name="field"
                                                                                           data-name="Field"
                                                                                           class="textarea w-input"></textarea><label
                            for="Name">Имя</label><textarea placeholder="" maxlength="5000" id="Name" name="field"
                                                            data-name="Field" class="textarea w-input"></textarea><label
                            for="Otch">Отчество</label><textarea placeholder="" maxlength="5000" id="Otch" name="field"
                                                                 data-name="Field"
                                                                 class="textarea w-input"></textarea><label for="God">Год
                            рождения</label><textarea placeholder="" maxlength="5000" id="God" name="field"
                                                      data-name="Field" class="textarea w-input"></textarea><label
                            for="Rost">Рост</label><textarea placeholder="" maxlength="5000" id="Rost" name="field"
                                                             data-name="Field"
                                                             class="textarea w-input"></textarea><label
                            for="Ves">Вес</label><textarea placeholder="" maxlength="5000" id="Ves" name="field"
                                                           data-name="Field" class="textarea w-input"></textarea><label
                            for="Ind">Индекс массы тела</label><textarea placeholder="" maxlength="5000" id="Ind"
                                                                         name="field" data-name="Field"
                                                                         class="textarea w-input"></textarea><label
                            for="Protivo">Противопоказания</label><select id="Protivo" name="Protivo"
                                                                          data-name="Protivo" class="w-select">
                            <option value="">Выберите нужную болезнь...</option>
                            <option value="First">Астма</option>
                            <option value="Second">Аллергические риниты</option>
                            <option value="Third">Сахарный диабет</option>
                        </select><input type="submit" value="Изменить" data-wait="Please wait..." id="izm"
                                        class="button-6-izm w-button"/></form>
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
                    <form id="FormDose" name="wf-form-FormDose" data-name="FormDose" action="http://Dose" method="post">
                        <label for="GruppaZabolevanie-3">Группа заболеваний</label><select id="GruppaZabolevanie-3"
                                                                                           name="GruppaZabolevanie2"
                                                                                           data-name="GruppaZabolevanie2"
                                                                                           required="" class="w-select">
                            <option value="">Выберите...</option>
                            <option value="First">Сердечно-сосудистые</option>
                        </select><label for="Bolezn-3">Болезнь</label><select id="Bolezn-3" name="Bolezn2"
                                                                              data-name="Bolezn2" required=""
                                                                              class="w-select">
                            <option value="">Выберите...</option>
                            <option value="First">Аритмия</option>
                            <option value="Second">Артериальная гипертензия</option>
                            <option value="Third">Сердечная недостаточность</option>
                            <option value="Four">Стенокардия</option>
                        </select><label for="GruppaLek-3">Группа лекарств</label><select id="GruppaLek-3"
                                                                                         name="GruppaLek2"
                                                                                         data-name="GruppaLek2"
                                                                                         required="" class="w-select">
                            <option value="">Выберите...</option>
                            <option value="First">First choice</option>
                        </select><label for="Preparat-3">Препарат</label><select id="Preparat-3" name="Preparat2"
                                                                                 data-name="Preparat2" required=""
                                                                                 class="w-select">
                            <option value="">Выберите...</option>
                            <option value="First">First choice</option>
                        </select><label for="dozirovka">Дозировка</label><textarea placeholder="" maxlength="5000"
                                                                                   id="dozirovka" name="field"
                                                                                   data-name="Field"
                                                                                   class="textarea w-input"></textarea><input
                            type="submit" id="dose" value="Рассчитать дозировку" data-wait="Please wait..."
                            class="submit-button-4 w-button"/><input type="submit" id="savafile"
                                                                     value="Сохранить в файл" data-wait="Please wait..."
                                                                     class="submit-button-3 w-button"/></form>
                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                </div>
            </div>
            <div id="constr" class="constr w-node-f97e2420-4c08-8f96-3065-938b10c76189-bdd42f99">

                <?php

                $database= new mysqli("localhost","root","","med");
                if ($database->connect_error){
                    die("Connection failed:  ".$database->connect_error);
                }

                ?>



                <div class="div-block-11">
                    <div class="dash-body">
                        <table border="0" width="" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">


                            <tr >
                                <td colspan="2" style="padding-top:30px;">
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Добавление нового противопоказания</p>
                                </td>
                                <td colspan="2">
                                    <a href="?action=add&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('../img/icons/add.svg');">Добавить</font></button>
                                    </a></td>
                            </tr>

                            <?php
                            if($_POST){
                                $keyword=$_POST["search"];


                            }else{
                                $sqlmain= "select * from Contraindications_For_Patient order by id_contraindications_for_patient  desc";

                            }



                            ?>

                            <tr>
                                <td colspan="4">
                                    <center>
                                        <div class="">
                                            <table width="" class="sub-table scrolldown" border="0">
                                                <thead>
                                                <tr>
                                                    <th class="table-headin">


                                                        Дата поставления диагноза

                                                    </th>

                                                    <th class="table-headin">

                                                        Протовопоказание

                                                    </th>


                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php

                                                $result= $database->query($sqlmain);

                                                if($result->num_rows==0){


                                                }
                                                else{
                                                    for ( $x=0; $x<$result->num_rows;$x++){
                                                        $row=$result->fetch_assoc();
                                                        $docid=$row["id_contraindications_for_patient"];
                                                        $name=$row["year"];

                                                        $spe=$row["id_contraindications"];
                                                        $spcil_res= $database->query("select contraindication from Contraindications where id_contraindications='$spe'");
                                                        $spcil_array= $spcil_res->fetch_assoc();
                                                        $spcil_name=$spcil_array["contraindication"];
                                                        echo '<tr>
                                        <td> &nbsp;'.
                                                            substr($name,0,30)
                                                            .'</td>
                                      
                                        <td>
                                            '.substr($spcil_name,0,20).'
                                        </td>

                                       
                                    </tr>';

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




                    <?php
                    if($_GET){

                        $id=$_GET["id"];
                        $action=$_GET["action"];
                        if($action=='drop'){
                            $nameget=$_GET["name"];
                            echo '
           
            </div>
            ';
                        }elseif($action=='view'){
                            $sqlmain= "select * from doctor where docid='$id'";
                            $result= $database->query($sqlmain);
                            $row=$result->fetch_assoc();
                            $name=$row["docname"];
                            $email=$row["docemail"];
                            $spe=$row["specialties"];

                            $spcil_res= $database->query("select sname from specialties where id='$spe'");
                            $spcil_array= $spcil_res->fetch_assoc();
                            $spcil_name=$spcil_array["sname"];
                            $nic=$row['docnic'];
                            $tele=$row['doctel'];
                            echo '
            
            ';
                        }elseif($action=='add'){
                            $error_1=$_GET["error"];
                            $errorlist= array(
                                '1'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
                                '2'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
                                '3'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
                                '4'=>"",
                                '0'=>'',

                            );
                            if($error_1!='4'){
                                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                        <a class="close" href="form-send-mail.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">'.
                                    $errorlist[$error_1]
                                    .'</td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Добавление нового противопоказания.</p><br><br>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <form action="add-new-const.php" method="POST" class="add-new-form">
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Дата постановки противопоказания: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="year" class="input-text" placeholder="2023-05-14" required><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Выбор противопоказания: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="id_contraindications" id="" class="box" >';



                                $list11 = $database->query("select  * from  Contraindications order by contraindication asc;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $sn=$row00["contraindication"];
                                    $id00=$row00["id_contraindications"];
                                    echo "<option value=".$id00.">$sn</option><br/>";
                                };

                                echo     '       </select><br>
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

                            }else{
                                echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            <br><br><br><br>
                                <h2>Новая запись успешно добавлена!</h2>
                                <a class="close" href="form-send-mail.php">&times;</a>
                                <div class="content">
                                    
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                <a href="form-send-mail.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

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


                <h2 class="heading">Дополнительная информация</h2>
                <h3 class="heading-2">Доза жидкости</h3>
                <div id="dopInf" class="dopinf">
                    <div id="naMass" class="namass">
                        <div class="w-form">
                            <form id="email-form-2"><label
                                    for="inuzKap" class="field-label-2">На массу тела</label><label for="DosTrebM">Требуемая доза(мг)</label>
                                <input
                                    id="dose_of_patient"
                                    type="number"
                                    class="w-input"
                                    maxlength="256"
                                    name="DosTrebM"
                                    data-name="DosTrebM"
                                    placeholder="500"
                                />
                                <label
                                    for="massTel">Масса тела</label>
                                <input name="weight_of_patient" type="text" class="w-input" id="weight_of_patient"
                                       value="<?=(isset($patientSearchArray['weight_of_patient'])) ? $patientSearchArray['weight_of_patient'] : ''?>">
                                <label for="ml">Доза в миллилитрах</label>
                                <input
                                    id="vivodDos"
                                    type="text" class="w-input" maxlength="256" name="vivodDos"
                                    placeholder="Доза выведется при нажатии на кнопку"
                                />
                                <button type="button" class="obichinruzia w-button" onclick="setvivodDos();">Рассчитать</button>
                            </form>
                            <script>
                                function setvivodDos() {
                                    let dose = Number(document.getElementById('dose_of_patient').value);
                                    let mass = Number(document.getElementById('weight_of_patient').value);


                                    let ind = ((mass / dose) * 1000).toFixed(0);

                                    if(!isNaN(ind)) {
                                        document.getElementById('vivodDos').value = ind;
                                    }
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
                    <div id="obichn" class="obichn">
                        <div class="w-form">
                            <form id="email-form-2" name="email-form-2" data-name="Email Form 2" method="get"><label
                                    for="inuzKap2" class="field-label-2">Обычная</label>
                                <label for="DosTrebO">Требуемая доза(мг)</label><input type="number"
                                                                                       class="w-input"
                                                                                       maxlength="256"
                                                                                       name="DosTrebO"
                                                                                       data-name="DosTrebO"
                                                                                       placeholder="500"
                                                                                       id="DosTrebO"
                                                                                       required=""/><label
                                    for="vAmp">Доза в ампуле(мг)</label>
                                <input
                                    type="number" class="w-input" maxlength="256" name="vAmp" data-name="vAmp"
                                    placeholder="100" id="vAmp" required=""/>
                                <label for="gAmp">Жидкости в
                                    ампуле(мл)</label>
                                <input type="number" class="w-input" maxlength="256" name="gAmp"
                                       data-name="gAmp" placeholder="100" id="gAmp" required=""/>
                                <label for="ml">Доза в миллилитрах</label>
                                <input
                                    type="text"
                                    class="w-input" maxlength="256" name="VivodDosO" data-name="VivodDosO"
                                    placeholder="Доза выведется при нажатии на кнопку" id="vivodDosO"/>
                                <button type="button" class="obichinruzia w-button" onclick="setvivodDosO();">Рассчитать</button>
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
        </div>
        <div class="section-2 wf-section">
            <div class="container-2 w-container">
                <div class="columns w-row">
                    <div class="column w-col w-col-3"><a href="#" class="logo-footer w-nav-brand">
                            <div class="logo-text-2 footer-logo">MedicalDose<strong data-new-link="true"
                                                                                    class="bold-text"></strong></div>
                        </a></div>
                    <div class="footer-link-col w-clearfix w-col w-col-9"><a href="#"
                                                                             class="nav-link footer-link contact">администратор</a><a href="#"
                                                                                                                                      class="nav-link footer-link">препарат</a><a href="#" class="nav-link footer-link">поиск
                            пациента</a><a href="#" class="nav-link footer-link">новый пациент</a><a href="#"
                                                                                                     class="nav-link footer-link">Главная</a></div>
                </div>
            </div>
        </div>
        <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645500de3bd98b20d3d42f98"
                type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script src="rab.js" type="text/javascript"></script>

            </div>
        </div>
        <div id="formDiet" class="formdiet">
            <div id="EmailFormDieta" class="w-form">
                <form id="EmailFormDieta" name="wf-form-EmailFormDieta" data-name="EmailFormDieta" method="post"
                      class="form"><label for="name-2" class="field-label-3">Диета</label><label
                        for="emailD">Email </label><input type="email" class="text-field-3 w-input" maxlength="256"
                                                          name="email-2" data-name="Email 2"
                                                          placeholder="meleshckov.oleg@yandex.ru" id="emailD"
                                                          required=""/><input type="submit" value="Отправить на почту"
                                                                              data-wait="Please wait..."
                                                                              id="dietaButton" class="dieta w-button"/>
                </form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
        </div>
        <h2 class="heading">Дополнительная информация</h2>
        <h3 class="heading-2">Доза жидкости</h3>
        <div id="dopInf" class="dopinf">
            <div id="naMass" class="namass w-node-_375ef952-f752-557a-209f-0e2c10f4d142-bdd42f99">
                <div class="w-form">
                    <form id="formMT" name="email-form-2" data-name="Email Form 2" method="get" class="formmt"><label
                            for="inuzKap" class="field-label-2">На массе тела</label><select id="inuzKap" name="field"
                                                                                             data-name="Field"
                                                                                             class="w-select">
                            <option value="">Инфузия/капельницы</option>
                            <option value="First">Часы</option>
                            <option value="Second">Минуты</option>
                            <option value="Third">Непрерывное вливание</option>
                        </select><label for="DosTrebM">Требуемая доза(мг)</label><input type="number" class="w-input"
                                                                                        maxlength="256" name="DosTrebM"
                                                                                        data-name="DosTrebM"
                                                                                        placeholder="500"
                                                                                        id="DosTrebM"/><label for="Ves">Масса
                            тела</label><textarea placeholder="" maxlength="5000" id="Ves" name="field"
                                                  data-name="Field" class="textarea w-input"></textarea><input
                            type="submit" value="Рассчитать" data-wait="Please wait..." id="otMassTela"
                            class="obichinruzia w-button"/></form>
                    <div class="w-form-done">
                        <div>Thank you! Your submission has been received!</div>
                    </div>
                    <div class="w-form-fail">
                        <div>Oops! Something went wrong while submitting the form.</div>
                    </div>
                </div>
            </div>
            <div class="w-form">
                <form id="formO" name="email-form-2" data-name="Email Form 2" method="get" class="formo"><label
                        for="inuzKap-3" class="field-label-2">Обычная</label><select id="inuzKap2" name="field-2"
                                                                                     data-name="Field 2"
                                                                                     class="w-select">
                        <option value="">Инфузия/капельницы</option>
                        <option value="First">Часы</option>
                        <option value="Second">Минуты</option>
                        <option value="Third">Непрерывное вливание</option>
                    </select><label for="DosTrebO-2">Требуемая доза(мг)</label><input type="number" class="w-input"
                                                                                      maxlength="256" name="DosTrebO-2"
                                                                                      data-name="Dos Treb O 2"
                                                                                      placeholder="500" id="DosTrebO-2"
                                                                                      required=""/><label for="vAmp-2">Доза
                        в ампуле(мг)</label><input type="number" class="w-input" maxlength="256" name="vAmp-2"
                                                   data-name="V Amp 2" placeholder="100" id="vAmp-2" required=""/><label
                        for="gAmp-2">Жидкости в ампуле</label><input type="number" class="w-input" maxlength="256"
                                                                     name="gAmp-2" data-name="G Amp 2" placeholder="100"
                                                                     id="gAmp-2" required=""/><input type="text"
                                                                                                     class="w-input"
                                                                                                     maxlength="256"
                                                                                                     name="VivodDosO-2"
                                                                                                     data-name="Vivod Dos O 2"
                                                                                                     placeholder="Доза выведется при нажатии на кнопку"
                                                                                                     id="VivodDosO-2"/><input
                        type="submit" value="Рассчитать" data-wait="Please wait..." id="obichInfuzia"
                        class="obichinruzia w-button"/></form>
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
<div class="section-2 wf-section">
    <div class="container-2 w-container">
        <div class="columns w-row">
            <div class="column w-col w-col-3"><a href="#" class="logo-footer w-nav-brand">
                    <div class="logo-text-2 footer-logo">MedicalDose<strong data-new-link="true"
                                                                            class="bold-text"></strong></div>
                </a></div>
            <div class="footer-link-col w-clearfix w-col w-col-9"><a href="#" class="nav-link footer-link contact">администратор</a><a
                    href="#" class="nav-link footer-link">препарат</a><a href="#" class="nav-link footer-link">поиск
                    пациента</a><a href="#" class="nav-link footer-link">новый пациент</a><a href="#"
                                                                                             class="nav-link footer-link">Главная</a>
            </div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645500de3bd98b20d3d42f98"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://uploads-ssl.webflow.com/645500de3bd98b20d3d42f98/js/webflow.47f95fb4e.js"
        type="text/javascript"></script>
</body>
</html>