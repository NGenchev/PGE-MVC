<?php  
    $projects = $this->data['projects'];
    //$gDocs = "http://docs.google.com/viewer?embedded=true&url=";
    $gDocs = '';
?>
	<div class='col-md-12'>
		<div class='row'>
			<div class='col-md-12 col-sm-12 main'>
				<div class='white-box'></div>
				<h3 class='text-uppercase'>Проекти…</h3>
					<div class='container col-md-12'>	
					<ul  class='nav nav-pills'>
					 <?php for($i = 1; $i <= count($projects); $i++): ?>
						<li<?= $i == 1 ? " class='active'" : "" ?>> 
							<a href='#<?= $i ?>p' data-toggle='tab'><?= $projects[$i-1]["name"] ?></a> 
						</li>
					 <?php endfor; ?>
					</ul><!-- /.nav-pills -->

					<div class='tab-content clearfix'>
					 <?php for($i = 1; $i <= count($projects); $i++): ?>
						<div class='tab-pane<?= $i == 1 ? " active" : "" ?>' id='<?= $i ?>p'>
							<h4 style='color: #2980b9;'>
								Проект <sub>&rdquo;</sub>
									<strong><?= $projects[$i-1]['name'] ?></strong>
								<sup>&ldquo;</sup> |
								Продължителност <?= $projects[$i-1]['duration'] ?></h4>
							<?php if ($projects[$i-1]['type'] === 0) : ?>
							 <p>
								За съжаление няма прикачен файл към този проект.
								<?= $projects[$i-1]['type'] . " == ? 0 " . (bool)($projects[$i-1]['type']==0) ?>
							 </p>
							<?php else: ?>
							 <iframe border='0' outline='0' src='<?= $projects[$i-1]['type'] == "document" ? $gDocs : "" ?><?= $projects[$i-1]['directory'] ?>' alt='<?= $projects[$i-1]['name'] ?>'>
								Проект: <?= $projects[$i-1]['name'] ?> <BR>
								Съжаляваме за неудобството, но вашият уеб браузър не поддържа HTML тагът &lt;iframe&gt;.
							 </iframe>
								
							<?php endif; ?>
						</div> <!-- /.tab-pane <?= $i ?> -->
					 <?php endfor; ?>
					</div> <!-- /.tab-content -->
					</div> <!-- /.container tab -->
			</div><!-- /.main -->
		</div><!-- /.row -->
	</div><!-- /.col-md-12 -->