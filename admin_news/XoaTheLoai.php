<?php 
	include 'connect/conn.php';
	include 'function/function.php';
	$id = $_GET['id'];
	$table = 'theloai';
	$link = 'listTheLoai.php';
	delete($conn, $id, $table,$link);

	
 ?> 