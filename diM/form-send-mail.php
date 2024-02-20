<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Рецепты</title>
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
<?php

//learn from w3schools.com


//import id_resbase

$database= new mysqli("localhost","root","","med");
if ($database->connect_error){
    die("Connection failed:  ".$database->connect_error);
}

?>
<div class="container">

    <div class="dash-body">
        <table border="0" width="90%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; margin-left:44px; ">
            <tr>
                <td width="13%">

                </td>
                <td>

                    <form action="" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar" placeholder="ФИО пациента или врача" list="resepts">&nbsp;&nbsp;

                        <?php
                        echo '<datalist id="resepts">';
                        $list11 = $database->query("select  fio_p,fio_d from  resept;");

                        for ($y=0;$y<$list11->num_rows;$y++){
                            $row00=$list11->fetch_assoc();
                            $d=$row00["fio_p"];
                            $c=$row00["fio_d"];
                            echo "<option value='$d'><br/>";
                            echo "<option value='$c'><br/>";
                        };

                        echo ' </datalist>';
                        ?>


                        <input type="Submit" value="Поиск" class=" btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </td>

            </tr>

            <?php
            if($_POST){
                $keyword=$_POST["search"];

                $sqlmain= "select * from resept where fio_d='$keyword' or fio_p='$keyword' or fio_p like '$keyword%' or fio_p like '%$keyword' or fio_p like '%$keyword%'";
            }else{
                $sqlmain= "select * from resept order by id_res desc";

            }



            ?>

            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc scroll">
                            <table width="93%" class="sub-table scrolldown" border="0">
                                <thead>
                                <tr>
                                    <th class="table-headin">


                                        ФИО пациента

                                    </th>
                                    <th class="table-headin">
                                        ФИО врача
                                    </th>
                                    <th class="table-headin">

                                        Препарат

                                    </th>
                                    <th class="table-headin">

                                        Дата выписки рецепта

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
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Мы не смогли найти ничего, связанного с вашим запросом!</p>
                                    <a class="non-style-link" href="doctors.php.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Показать все рецепты &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';

                                }
                                else{
                                    for ( $x=0; $x<$result->num_rows;$x++){
                                        $row=$result->fetch_assoc();
                                        $id_res=$row["prep"];
                                        $name=$row["fio_p"];
                                        $email=$row["fio_d"];
                                        $data=$row["data"];

                                        echo '<tr>
                                        <td> &nbsp;'.
                                            substr($name,0,30)
                                            .'</td>
                                        <td>
                                        '.substr($email,0,30).'
                                        </td>
                                     
                                        <td>
                                            '.substr($id_res,0,20).'
                                        </td>
                                        <td>
                                            '.substr($data,0,20).'
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

</body>
</html>