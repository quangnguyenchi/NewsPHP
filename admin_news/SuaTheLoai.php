<?php session_start();
ob_start();
	 include 'incl/header.php'; 
	  include 'connect/conn.php';
	  include 'string/string.php';
	  include 'function/function.php';
?>
<div class="row">

	<?php 
	$tenTL = "";
	$id = $_GET['id'];
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errors = array();
			if (!empty($_POST['tenTL'])) {
				$tenTL = $_POST['tenTL'];
				$tenSlug =convert_vi_to_en($_POST['tenTL']);
				$sql = "UPDATE `theloai` SET `Ten`='$tenTL',`TenKhongDau`='$tenSlug' WHERE id = '$id'";
				if (mysqli_query($conn,$sql)) {
					$mess = '<p class="alert alert-success">Sửa thành công</p>';
					header('location:listTheLoai.php?mess='.$mess);
				}else {
					echo 'Sửa thất bại';
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
		 	<h2>Tên thể loại hiện tại: <?php echo get_idTheLoai($conn,$id) ?> </h2>
		 </div>
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