<?php 
	include 'connect/conn.php';
	include 'function/function.php';
	$id = $_GET['id'];
	$table = 'loaitin';
	$link = 'listLoaiTin.php';
	delete($conn, $id, $table,$link);
	$mess = "<p class='alert alert-success'>Xóa thành công</p>";	
	header('location:listLoaiTin.php?mess='.$mess);
 ?>