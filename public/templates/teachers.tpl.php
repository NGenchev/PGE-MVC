<?php  
    $teachers = $this->data['teachers'];
?>
<div class='white-box'></div>
<h3 class='text-uppercase'>Учители на ПГ по електротехника</h3>
<div class='box-body table-responsive no-padding'>
<table class='table table-hover'>
    <thead>
      <tr>
       	<th>№ на учител</th>
        <th>Име на учител</th>
    	<th>Имейл на учител</th>
    	<th>Класен на</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($teachers as $teacher): ?>	
      <tr>
        <td><?= $teacher['id'] ?></td>
        <td><?= $teacher['name'] ?></td>
        <td><?= $teacher['email'] ?></td>
        <td><?= $teacher['grade'] ?><sup><?= $teacher['class'] ?></sup></td>
      </tr>
    <?php endforeach; ?>
	</tbody>
  </table>
</div>