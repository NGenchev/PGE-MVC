<?php  
    $acceptions = $this->data['acceptions'];
?>
<div class='white-box'></div>
<h3 class='text-uppercase'>Прием</h3>

<?php foreach($acceptions as $acpts): ?>
<div class='bs-callout bs-callout-<?= $acpts['bscl'] ?>'>
  <h4>
  	<?= $acpts['name'] ?> (професия <?= $acpts['title'] ?>)
  </h4>
  <p> 
  	<?= $acpts['desc'] ?> <br> 
  	<a href='courses.php?id=<?= $acpts['id'] ?>'>Прочети повече</a> 
  </p>
</div>
<?php endforeach; ?>