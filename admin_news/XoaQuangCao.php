<?php 
	include 'connect/conn.php';
	include 'function/function.php';
	$id = $_GET['id'];
	$table = 'quangcao';
	$link = 'listQuangCao.php';
	delete($conn, $id, $table,$link);

 ?>