<?php 
include 'template/header.php';
include 'functions.php';



?>
<div id="col1"></div>
<div id="col2">
<?php

$obj = new Oopclass();
$cdata = $obj->select_category();
?>
<table border="1" width="100%" cellspacing="0" cellpadding="4">
<thead>
<tr>
		<th>SL</th>
		<th>Category Name</th>
		<th>Total Items</th>
	</tr>
</thead>
<tbody>
<?php
$i = 1;
foreach($cdata as $row){
	
	?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $row->Name; ?></td>
		<td><?php echo $row->ttl; ?></td>
	</tr>
	
<?php
}
?>
</tbody>
</table>
</div>
<div id="col3"></div>


<?php
include 'template/footer.php';
 ?>