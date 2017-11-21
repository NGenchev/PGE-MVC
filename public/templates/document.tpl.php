 <?php  
    $error = $this->data['error'];
    if($error == 404)
    	$obj = null;
    else
    	$obj = $this->data['document'];
?>
<div class='white-box'></div>
<?php if($obj->id == null) : ?>
<h2 class='alert-danger col-md-10'> Несъществуващ документ! Моля свържете се с администратор.</h2>
<?php else: ?>
<h2 class='text-uppercase'><?= $obj->fName ?></h2>

<img src='<?= $obj->directory ?>' alt='<?= $obj->fName . "/" . $obj->added?>'>

<?php endif; ?>