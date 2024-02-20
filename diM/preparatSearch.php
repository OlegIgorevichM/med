

<!DOCTYPE html><!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Tue May 16 2023 11:03:13 GMT+0000 (Coordinated Universal Time) -->
<html  data-wf-page="645500de3bd98becbdd42f99"
       data-wf-site="645500de3bd98b20d3d42f98">
<head>
    <meta charset="utf-8"/>
    <title>Medical Dose</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/css/mdose.webflow.030176a8a.css"
          rel="stylesheet" type="text/css"/>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="anonymous" href="https://fonts.gstatic.com" rel="preconnect"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({google: {families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic", "Bitter:400,700,400italic"]}});</script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script>
    <![endif]-->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
</head>
<body>
<?php
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
    <h1 class="home-page-heading">Поиск препарата</h1>
    <div class="hero-overlay"></div>
</div>





<div class="section wf-section">
    <div class="hero-container w-container">


        <?php

        //learn from w3schools.com






        $database= new mysqli("localhost","root","","med");
        if ($database->connect_error){
            die("Connection failed:  ".$database->connect_error);
        }


        ?>
        <div class="container">

            <div class="dash-body">
                <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                    <tr >

                        <td>

                            <form action="" method="post" class="header-search">

                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Название препарата" list="patient">&nbsp;&nbsp;

                                <?php
                                echo '<datalist id="patient">';

                                $list11 = $database->query("select  name_preparation from Table_Preparation order by name_preparation desc;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["name_preparation"];

                                    echo "<option value='$d'><br/>";

                                };

                                echo ' </datalist>';
                                ?>


                                <input type="Submit" value="Поиск" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                            </form>

                        </td>



                    </tr>


                    <tr>
                        <td colspan="4" style="padding-top:10px;">
                            <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Все препараты (<?php echo $list11->num_rows; ?>)</p>
                        </td>

                    </tr>
                    <?php
                    if($_POST){
                        $keyword=$_POST["search"];

                        $sqlmain= "select * from Table_Preparation where name_preparation ='$keyword' or name_preparation like '$keyword%' or name_preparation like '%$keyword' or name_preparation like '%$keyword%' order by name_preparation";
                    }else{
                        $sqlmain= "select * from Table_Preparation order by name_preparation asc";

                    }



                    ?>

                    <tr>
                        <td colspan="4">
                            <center>
                                <div class="abc scroll">
                                    <table width="93%" class="sub-table scrolldown"  style="border-spacing:0;">
                                        <thead>
                                        <tr>
                                            <th class="table-headin">


                                                Название препарата

                                            </th>


                                            <th class="table-headin">

                                                Действие

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php


                                        $result= $database->query($sqlmain);

                                        if($result->num_rows==0){
                                            echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Мы не смогли найти ничего, связанного с вашими ключевыми словами !</p>
                                    <a class="non-style-link" href="preparatSearch.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Показать все препараты &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';

                                        }
                                        else{
                                            for ( $x=0; $x<$result->num_rows;$x++){
                                                $row=$result->fetch_assoc();
                                                $pid=$row["id_table_preparation"];
                                                $name=$row["name_preparation"];

                                                echo '<tr>
                                        <td> &nbsp;'.
                                                    substr($name,0,35)
                                                    .'</td>
                                        
                                        
                                        
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=view&id='.$pid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Просмотр</font></button></a>
                                       
                                        </div>
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
        </div>
        <?php
        if($_GET){

            $id=$_GET["id"];
            $action=$_GET["action"];
            $sqlmain= "select * from Table_Preparation where id_table_preparation='$id' order by name_preparation";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["name_preparation"];
            $address=$row["id_table_group_of_medicines"];
            $nic=$row["dose_of_preparation"];
            $dob=$row["number_of_times"];
            $tele=$row["constrain"];

            echo '
            <div id="popup1" class="overlay" style="z-index: 10">
                    <div class="popup">
                    <center>
                        <a class="close" href="preparatSearch.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Просмотреть подробную информацию.</p><br><br>
                                </td>
                            </tr>
                           
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Название препарата: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                           
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Доза: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$nic.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Количество приемов в день: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                           
                           
                                
                           
                            <tr>
                                <td colspan="2">
                                    <a href="preparatSearch.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';

        };

        ?>


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
<script crossorigin="anonymous"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645500de3bd98b20d3d42f98"
        type="text/javascript"></script>
<script src="https://uploads-ssl.webflow.com/645500de3bd98b20d3d42f98/js/webflow.47f95fb4e.js"
        type="text/javascript"></script>
</body>
</html>