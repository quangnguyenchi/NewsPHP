<?php session_start();
	ob_start();
 include 'incl/header.php';
	  include 'connect/conn.php';
	  $id = $_GET['id'];
	  $check = "";
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  	if (!empty($_POST['check'])) {
	  		$check = $_POST['check'];
	  		$sql = "UPDATE `quangcao` SET `TrangThai`='$check' WHERE id = $id";
	  		$result = mysqli_query($conn,$sql);
	  		 if ($result) {
					  	$mess ='<p class="alert alert-success">Chỉnh sửa thành công</p>';
					  	header('location:listQuangCao.php?mess='.$mess);
					  }else {
					  	echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
					  }
 			}else {
 				$danger = '<p class="alert alert-danger">Vui lòng điền đầy đủ thông tin</p>';
 				echo $danger;
 			}	
	  	}
	  
 ?>
	<div class="row">
		<div class="card-title col-12"><h3>Chỉnh sửa trạng thái quảng cáo:</h3></div>
		<div class="form col">
			<form action="" method="post">
				<div class="form-group">
					<label for="" class="col">Trạng thái:</label>
					<div class="col">
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="check">
					  <label class="form-check-label" for="inlineCheckbox1">Banner</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="check">
					  <label class="form-check-label" for="inlineCheckbox2">Ảnh quảng cáo nhỏ</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="check">
					  <label class="form-check-label" for="inlineCheckbox2">Ẩn</label>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info">
				</div>
				</div>
			</form>
		</div>
	</div>
 <?php include 'incl/footer.php'; ob_end_flush();?>