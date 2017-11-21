<?php
    $news  = $this->data['news'];
    $events= $this->data['events'];
?>

<div class='col-md-4 col-sm-4 events'>
<h3>Събития</h3>
<?php foreach($events as $event): ?>
<p>
	<?= $event[0] ?><br>
	<a><?= $event[1] ?></a>
</p>
<?php endforeach; ?>
</div>
<div class='col-md-8 col-sm-8 news'>
<h3 class='text-uppercase'>Новини…</h3>
<section>
 <?php foreach($news['content'] as $new): ?>
	<article>
	 <h3><?= $new['title'] ?></h3>
	 <p><?= $new['content'] ?></p>
	 <?php if($new['file'] != null && $new['fileName'] != ''): ?>
		<p>
		  <a target='_blank' href='<?= $new['file'] ?>'><button class='btn btn-link'>
			<span class='glyphicon glyphicon-file'></span> <?= $new['fileName'] ?></button>
		  </a>
		</p>
	 <?php endif; ?>
	</article>
 <?php endforeach; ?>
 <hr />
	<center>
	 <nav aria-label='Page navigation' class='pull-right'>
		  <ul class='pagination'>
		<?= $news['pagination'] ?>
		  </ul>
		 </nav>
		</center>
</section>
</div>    