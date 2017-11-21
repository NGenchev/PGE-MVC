<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <?php 
        $dbh   = (new DBConnection())->pdo_conn();
        $setup = $this->data['meta']; //meta setup
        $data  = $this->data['content']; //footer + poll
    ?>
    <title><?= $setup['title'] ?></title>
    <!-- SEO -->
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Stefan Kolev, Nikolay Georgiev and Nikolay Genchev'>
    <meta name='description' content='<?= $setup['description'] ?>' />
    <meta name='robots' content='follow, all' />
    <meta name='keywords' content='<?= $setup['keywords'] ?>' />
    <meta name='google-site-verification' content=''>
    <link rel='icon' href='<?= $setup['logo'] ?>'>
    <meta property='og:title' content='<?= $setup['title'] ?>' />
    <meta property='og:type' content='website' />
    <meta property='og:description' content ='<?= $setup['description'] ?>' />
    <meta property='og:locale' content='bg_BG' />
    <meta property='og:url' content='<?= $setup['cURL'] ?>' />
    <meta property='og:image' content='<?= $setup['logo'] ?>' />
    <meta property='og:site_name' content='ПГ по електротехника - гр. Варна' />

    <!-- CSS Libs -->
    <link rel='stylesheet' type='text/css' href='./public/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='./public/css/custom.css'>
    <link rel='stylesheet' type='text/css' href='./public/css/font-awesome.css'>
</head>
<body>
    <div class='spinner-cont' id='msg'>
        <div class='spinner'></div>
    </div>
    <div class='container navigation' style='display: none;'>
        <div class='row'>
            <nav class='navbar navbar-inverse text-uppercase'>
                <div class='container'>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class='navbar-header'>
                        <button class='navbar-toggle collapsed' data-target='#navigation' data-toggle='collapse' type='button'><span class='icon-bar'></span> <span class='icon-bar'></span> <span class='icon-bar'></span> <span class='sr-only'>Toggle navigation</span></button> <a class='navbar-brand' href='index.php'><img height='316' id='logo' src='./public/imgs/logo.png' width='316' alt='LOGO' /></a>
                    </div><!-- /.navbar-header -->
                    <div aria-expanded='false' class='navbar-collapse collapse' id='navigation'>
                        <ul class='nav navbar-nav'>
                            <li class='active'>
                                <a href='?page=homepage'>Начало <span class='sr-only'>(current)</span></a>
                            </li>
                            <li class='dropdown'>
                                <a aria-expanded='false' aria-haspopup='true' class='dropdown-toggle' data-toggle='dropdown' href='#' role='button'>Прием <span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='?page=acceptions&grade=7'>След 7ми клас</a>
                                    </li>
                                    <li>
                                        <a href='?page=acceptions&grade=8'>След 8ми клас</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=advantages'>Защо да избера ПГЕ?</a>
                                    </li>
                                </ul>
                            </li>
                            <li class='dropdown'>
                                <a aria-expanded='false' aria-haspopup='true' class='dropdown-toggle' data-toggle='dropdown' href='#' role='button'>Програми и Проекти <span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='?page=projects&type=school'>Училищни</a>
                                    </li>
                                    <li>
                                        <a href='?page=projects&type=national'>Национални</a>
                                    </li>
                                    <li>
                                        <a href='?page=projects&type=international'>Международни</a>
                                    </li>
                                </ul>
                            </li>
                            <li class='dropdown'>
                                <a aria-expanded='false' aria-haspopup='true' class='dropdown-toggle' data-toggle='dropdown' href='#' role='button'>За Нас<span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='?page=documents&name=regulations'>Нормативни документи</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=schollarships'>Стипендии</a>
                                    </li>
                                    <li>
                                        <a href='?page=teachers'>Учители</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=budget'>Бюджет</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=exams'>Изпити</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=sport_callendar'>Спортен Календар</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=self_as'>Самооценка</a>
                                    </li>
                                </ul>
                            </li>
                            <li class='dropdown'>
                                <a aria-expanded='false' aria-haspopup='true' class='dropdown-toggle' data-toggle='dropdown' href='#' role='button'>Профил на купувача<span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='?page=documents&name=procurement'>Обществени поръчки</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=zop'>ЗОП</a>
                                    </li>
                                    <li>
                                        <a href='?page=documents&name=auction'>Търг за наем</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class='container main-cont' style='display: none;'>
        <div class='row'>
            <div class='col-md-12 search'>
                <div id='custom-search-input'>
                    <div class='input-group col-md-12'>
                        <input class='form-control input-lg' placeholder='Въведете текст за търсене...' type='text'> <span class='input-group-btn'><button class='btn btn-info btn-lg' type='button'><span class='input-group-btn'><i class='glyphicon glyphicon-search'></i></span></button></span>
                    </div><!-- /.input-group -->
                </div><!-- /.custom-search-input -->
            </div><!-- /.search -->
        </div><!-- /.row search-row -->
        <div class='row'>
            <div class='col-md-9'>
                <div class='row'>
                    <div class="col-md-12 col-sm-12 main">