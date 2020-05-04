<?php 
	include 'connect/conn.php';
	include 'function/function.php';
	$id = $_GET['id'];
	$table = 'tintuc';
	$link = 'listTinTuc.php';
	delete($conn, $id, $table,$link);
	$sql = "SELECT * FROM `tintuc` WHERE $id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	unlink('imagePage/'.$row['HinhAnh']);
 ?>