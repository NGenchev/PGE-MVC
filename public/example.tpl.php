<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <?php 
        $dbh   = (new DBConnection())->pdo_conn();

        $setup = $this->data['meta']; //meta setup
        $data  = $this->data['content']; //footer + poll
        $news  = $this->data['news'];
        $events= $this->data['events'];

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
                                        <a href='?page=acception&grade=7'>След 7ми клас</a>
                                    </li>
                                    <li>
                                        <a href='?page=acception&grade=8'>След 8ми клас</a>
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
                        <!-- Your code goes here.. -->
                    </div><!-- /.main -->
                </div><!-- /.row -->
                <div class='row footer' style='display: none;'>
                    <div class='col-md-3 col-sm-6'>
                        <h4 class='text-uppercase'>За Нас</h4>
                        <p><a href='?page=documents&name=history'>История</a></p>
                        <p><a href='?page=documents&name=schoolarships'>Стипендии</a></p>
                        <p><a href='?page=documents&name=exams'>Изпити</a></p>
                        <p><a href='?page=documents&name=reviews'>Другите За Нас</a></p>
                        <p><a href='?page=documents&name=regulations'>Нормативни документи</a></p>
                        <p><a href='?page=contacts'>Контакти</a></p>
                    </div><!-- /.col-md-3 -->
                    <div class='col-md-3 col-sm-6'>
                        <h4 class='text-uppercase'>Специалности</h4>
                        <?php foreach($data['specialties'] as $spec) : ?>
                            <p>
                                <a href='?page=acception&id=<?= $spec[0] ?>'><?= $spec[1] ?></a>
                            </p>

                        <?php endforeach; ?>
                    </div><!-- /.col-md-3 -->
                    <div class='col-md-3 col-sm-6'>
                        <h4 class='text-uppercase'>Проекти</h4>
                        <?php foreach($data['projects'] as $proj) : ?>
                            <p>
                                <a href='?page=projects&type=<?= $proj[2] ?>#<?= $proj[0] ?>'>Проект 
                                <span class='text-uppercase'>'<?= $proj[1] ?>'</span></a>
                            </p>

                        <?php endforeach; ?>
                    </div><!-- /.col-md-3 -->
                    <div class='col-md-3 col-sm-6'>
                        <h4 class='text-uppercase'>Клубове</h4>
                        <?php foreach($data['clubs'] as $club) : ?>
                            <p>
                                <a href='?page=clubs&id=<?= $club[0] ?>'><?= $club[1] ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div><!-- /.col-md-3 -->
                </div><!-- /.footer -->
            </div><!-- /.col-md-9 -->
            <div class='col-md-3 col-sm-12 sidenav'>
                <div class='row first-row text-uppercase'>
                    <div class='col-md-6 col-sm-6 col-xs-6 first-box'>
                        <a href='?page=teachers'>
                            <h2><span class='fa fa-users'></span></h2>
                            <p>Учители</p>
                        </a>
                    </div><!-- /.first-box -->
                    <div class='col-md-6 col-sm-6 col-xs-6 sec-box'>
                        <a href='?page=contacts.php'>
                            <h2><span class='fa fa-envelope-o'></span></h2>
                            <p>Училищна поща</p>
                        </a>
                    </div><!-- /.sec-box -->
                </div><!-- /.row -->
                <div class='row text-uppercase'>
                    <div class='col-md-6 col-sm-6 col-xs-6 first-box'>
                        <a href='http://vlibrary.pgevarna.com'>
                            <h2><span class='fa fa-book'></span></h2>
                            <p>Виртуална библиотека</p>
                        </a>
                    </div><!-- /.first-box -->
                    <div class='col-md-6 col-sm-6 col-xs-6 sec-box'>
                        <a href='?page=documents&name=education'>
                        <h2><span class='fa fa-graduation-cap'></span></h2>
                        <p>Обучение</p></a>
                    </div><!-- /.sec-box -->
                </div><!-- /.row -->
                <div class='row text-uppercase'>
                    <div class='col-md-6 col-sm-6 col-xs-6 first-box'>
                        <a href='?page=documents&name=calendar'>
                            <h2><span class='fa fa-calendar'></span></h2>
                            <p>Ваканции и почивки</p>
                        </a>
                    </div><!-- /.first-box -->
                    <div class='col-md-6 col-sm-6 col-xs-6 sec-box'>
                        <a href='https://www.facebook.com/groups/218366416757/'>
                        <h2><span class='fa fa-facebook-square'></span></h2>
                        <p>Фейсбук група</p></a>
                    </div><!-- /.sec-box -->
                </div><!-- /.row -->
                <div class='row text-uppercase'>
                    <div class='col-md-6 col-sm-6 col-xs-6 first-box'>
                        <a href='?page=newspaper'>
                            <h2><span class='fa fa-newspaper-o'></span></h2>
                            <p>Медия</p>
                        </a>
                    </div><!-- /.first-box -->
                    <div class='col-md-6 col-sm-6 col-xs-6 sec-box'>
                        <a href='?page=partners'>
                        <h2><span class='fa fa-briefcase'></span></h2>
                        <p>Партньори</p></a>
                    </div><!-- /.sec-box -->
                </div><!-- /.row -->
                <div class='row text-uppercase'>
                    <div class='col-md-6 col-sm-6 col-xs-6 first-box'>
                        <a href='#'>
                            <h2><span class='fa fa-globe'></span></h2>
                            <p>Еразъм+</p>
                        </a>
                    </div><!-- /.first-box -->
                    <div class='col-md-6 col-sm-6 col-xs-6 sec-box'>
                        <a href='http://drivegal.com/pge-gallery/album/main-directory/'>
                        <h2><span class='fa fa-picture-o'></span></h2>
                        <p>Галерия</p></a>
                    </div><!-- /.sec-box -->
                </div><!-- /.row -->
                <div class='row anket' id='anketka'>
                    <div class='col-md-12'>
                        <h4 class='text-uppercase'><strong>Анкета</strong></h4>
                        <div class='row'>
                            <div class='col-md-2 col-sm-2 col-xs-2 question-mark'>
                                <p>?</p>
                            </div><!-- /.question-mark -->
                            <div class='col-md-10 col-sm-10 col-xs-10 question'>
                                <p><?= $data['poll']['question'] ?></p>
                            </div><!-- /.question -->
                        </div><!--  question /.row -->
                    <?php $ansCounter = 1; $pID = $data['poll']['id']; ?>
                    <?php foreach($data['poll']['answers'] as $ans) : ?> 
                      <?php if($data['poll']['voted'] === FALSE) : ?>
                        <div class='row answer'>
                        <div class='col-md-2 col-sm-2 col-xs-2'><div class='color'></div></div>
                        <div class='col-md-10 col-sm-10 col-xs-10'>
                            <div class='radio'>
                              <label><input type='radio' class='radioBtnClass' value='<?= $ansCounter ?>' name='answer'><?= $ans ?></label>
                            </div>
                        </div>
                        </div><!-- /.answer -->
                      <?php else : ?>
                        <?php 
                        $sql = "SELECT * FROM polls_votes WHERE vote_pID = '$pID'";
                        $get_voted_t = $dbh->prepare($sql);
                        $get_voted_t->execute();
                        $total = $get_voted_t->rowCount();

                        $sql = "SELECT * FROM polls_votes WHERE vote_pID = '$pID' AND vote_answer = '$ansCounter'";
                        $get_voted = $dbh->prepare($sql);
                        $get_voted->execute();
                        $voteded = $get_voted->rowCount();

                        $pcn = $total > 0 ? round((($voteded/$total)*100), 2) : 0;
                        $pcn .= "%";
                        $voteded .= " гласувал";

                        if($voteded > 1)
                            $voteded .= "и";
                        ?>
                        <div class='row answer'>
                        <div class='col-md-2 col-sm-2 col-xs-2'><div class='color'></div></div>
                        <div class='col-md-10 col-sm-10 col-xs-10'>
                            <div class='radio'>
                                <label><?= $ans ?> <br> <i><?= $voteded . "(" . $pcn . ")" ?></i></label>
                            </div>
                        </div>
                        </div><!-- /.answer -->
                     <?php endif; ?>
                    <?php $ansCounter++; endforeach; ?>    
                        <div class='row actions col-md-12 text-justify'>
                         <?php if($data['poll']['voted'] == false) : ?>
                            <div class='input-group' style='margin: 0 auto;'>
                                <button class='form-control btn btn-primary' id='vote'>Гласувай!!</button>
                            </div> 
                            <BR><BR>
                         <?php endif; ?>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.anket -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
        <footer style='display: none;'>
            <br>
            <p>Дизайн: <a href='https://www.facebook.com/just.increase1337'>Стефан Колев</a> | Код: <a href='https://www.facebook.com/nGeorgi3v'>Николай Георгиев</a> и <a href='skype:just0nlin3_?add'>Николай Генчев</a></p>
            <p>Всички права запазени! &nbsp;<span aria-hidden='true' class='fa fa-copyright'></span> 2017</p>
        </footer>
    </div><!-- /.main-cont -->

    <!-- JS Libs -->
    <script type='text/javascript' src='./public/scripts/jquery.js'></script>
    <script type='text/javascript' src='./public/scripts/poll_vote.js'></script>
    <script type='text/javascript' src='./public/scripts/jquery.nicescroll.js'></script>
    <script type='text/javascript' src='./public/scripts/bootstrap.min.js'></script>
    <script type='text/javascript' src='./public/scripts/main.js'></script>
</body>
</html>