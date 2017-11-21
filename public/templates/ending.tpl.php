
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