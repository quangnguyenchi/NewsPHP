<?php session_start();
ob_start();
 include 'incl/header.php'; 
 include 'connect/conn.php';
 include 'string/string.php';
 include 'function/function.php';
 							$id = $_GET['id'];
 							$ten = "";
 							$tenSlug = "";
 							$idTheLoai = "";
 							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								$errors = array();
								if (!empty($_POST['tenLT'])) {
									$ten = $_POST['tenLT'];
									$tenSlug =convert_vi_to_en($_POST['tenLT']);
									$idTheLoai = $_POST['idTheLoai'];
									$sql = "UPDATE `loaitin` SET `Ten`='$ten',`TenKhongDau`='$tenSlug',`idTheLoai`='$idTheLoai' WHERE id ='$id'";
									if (mysqli_query($conn,$sql)) {
										$mess = '<p class="alert alert-success">Chỉnh sửa thành công <a href="listLoaiTin.php">Tới trang danh sách thể loại</a></p>';
										header('location:ThemTheLoai.php?mess='.$mess);
									}else {
										echo 'Chỉnh sửa thất bại';
									}
								}else {
									$errors[] = $_POST['tenTL'];
								}
							}
 ?>	
	<div class="row">
		<div class="form">
			<?php if (!empty($errors)) {
					echo '<p class="alert alert-danger">Vui lòng điền đầy đủ thông tin</p>';
				}elseif (isset($_GET['mess'])) {
					echo $_GET['mess'];
				}

				 ?>
			<form action="" method="post">
				<div class="form-group">
					<label for="">Tên loại tin hiện tại: <?php echo get_LoaiTin($conn, $id); ?></label>
					<input type="text" name="tenLT" class="form-control" placeholder="Tên loại tin">
				</div>
				<div class="form-group">
					<select name="idTheLoai" class="form-control">
						<?php
							 $sql = "SELECT * FROM `theloai`";
							 $result = mysqli_query($conn,$sql);
							 if (mysqli_num_rows($result)>0) {
							 	while ($rows = mysqli_fetch_assoc($result)) {
							 	    ?>
							  <option value="<?php echo $rows['id']; ?>" select><?php echo $rows['Ten']; ?></option>
						<?php
							 	}
							 }
						 ?>
						
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info">
				</div>
			</form>
		</div>
	</div>
<?php include 'incl/footer.php'; ob_end_flush();?>	