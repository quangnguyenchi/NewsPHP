<?php 
	$serverName ='localhost';
	$userName = 'root';
	$password = '';
	$dbName = 'admin_news';
	$conn = new mysqli($serverName,$userName,$password,$dbName) or die('Kết nối thất bại');

	mysqli_set_charset($conn,'utf8');
 ?>