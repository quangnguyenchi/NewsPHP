<?php session_start();
ob_start();
	 include 'incl/header.php'; 
	  include 'connect/conn.php';
	  include 'string/string.php';
?>
<div class="row">
		<?php 
	$tenTL = "";
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (!empty($_POST['tenTL'])) {
				$tenTL = $_POST['tenTL'];
				$tenSlug =convert_vi_to_en($_POST['tenTL']);
				$sql = "INSERT INTO `theloai`( `Ten`, `TenKhongDau`) VALUES ('$tenTL','$tenSlug')";
				if (mysqli_query($conn,$sql)) {
					$mess = '<p class="alert alert-success">Thêm thành công <a href="listTheLoai.php">Tới trang danh sách thể loại</a></p>';
					header('location:ThemTheLoai.php?mess='.$mess);
				}else {
					echo 'them that bai';
				}
			}else {
				$errors[] = $_POST['tenTL'];
			}
		}
	 ?>
	<form action="" method="post">
		<?php if (!empty($errors)) {
			echo '<p class="alert alert-danger">Vui lòng điền đầy đủ thông tin</p>';
		}elseif (isset($_GET['mess'])) {
			echo $_GET['mess'];
		}

		 ?>
		<div class="form-group">
			<label for="">Tên thể loại:</label>
			<input type="text" name="tenTL" class="form-control">
		</div>
		<div class="form-group">
			<input class="btn btn-info" type="submit" name="submit">
		</div>
		
	</form>
</div>
<?php include 'incl/footer.php'; ob_end_flush();?>