<!DOCTYPE html><!-- This site was created in Webflow. https://www.webflow.com --><!-- Last Published: Sat May 27 2023 12:06:37 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="mdose.webflow.io" data-wf-page="645e255aea7561daaac01113" data-wf-site="645e255aea7561daaac0110f">
<head>
    <meta charset="utf-8"/>
    <title>mdose</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Webflow" name="generator"/>
    <link href="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/css/mdose.webflow.030176a8a.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({google: {families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]}});</script>
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
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
            <nav role="navigation" class="menu w-nav-menu"><a href="#" class="nav-link w-nav-link">новый пациент</a><a
                    href="#" class="nav-link w-nav-link">поиск пациента</a><a href="#" class="nav-link w-nav-link">препарат</a><a
                    href="#" class="nav-link w-nav-link">врач: Качанова В.О.</a><a href="#" class="nav-link w-nav-link">Выход</a>
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
                    <form id="wf-form-FormAddPrep" name="wf-form-FormAddPrep" data-name="FormAddPrep" method="post">
                        <label for="name" class="field-label"> Добавить препарат</label><label for="PrepVse"
                                                                                               class="field-label-6">Группа
                            препаратов</label><select id="PrepVse" name="PrepVse" data-name="PrepVse" required=""
                                                      class="w-select">
                            <option value="">Select one...</option>
                            <option value="First">First choice</option>
                        </select><label for="NewNamePrep">Препарат</label><input type="text" class="w-input"
                                                                                 maxlength="256" name="NewNamePrep"
                                                                                 data-name="NewNamePrep"
                                                                                 placeholder="Хиротип" id="NewNamePrep"
                                                                                 required=""/><label for="doseNewPrep">Доза</label><input
                            type="number" class="w-input" maxlength="256" name="doseNewPrep" data-name="doseNewPrep"
                            placeholder="20" id="doseNewPrep" required=""/><label for="kolvopr">Количество
                            приемов</label><input type="number" class="w-input" maxlength="256" name="kolvopr"
                                                  data-name="kolvopr" placeholder="2" id="kolvopr" required=""/><label
                            for="tabl">Форма реализации</label><input type="text" class="w-input" maxlength="256"
                                                                      name="tabl" data-name="tabl"
                                                                      placeholder="Таблетки" id="tabl"
                                                                      required=""/><label for="vipusk">Форма
                            выпуска</label><input type="number" class="w-input" maxlength="256" name="vipusk"
                                                  data-name="vipusk" placeholder="100" id="vipusk" required=""/><input
                            type="submit" value="Добавить препарат" data-wait="Please wait..." id="newPreparat"
                            class="submit-button-6 w-button"/></form>
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
                    <form id="email-form" name="email-form" data-name="Email Form" method="get"><label for="name"
                                                                                                       class="field-label">Удалить
                            препарат</label><label for="delPrep">Препарат</label><input type="text" class="w-input"
                                                                                        maxlength="256" name="delPrep"
                                                                                        data-name="delPrep"
                                                                                        placeholder="Хиротип"
                                                                                        id="delPrep" required=""/><input
                            type="submit" value="Удалить препарат" data-wait="Please wait..." id="delPreparat"
                            class="submit-button-7 w-button"/></form>
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
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=645e255aea7561daaac0110f"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://uploads-ssl.webflow.com/645e255aea7561daaac0110f/js/webflow.b5f6862ac.js"
        type="text/javascript"></script>
</body>
</html>