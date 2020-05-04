<?php session_start();
 include 'incl/header.php'; 
 include 'connect/conn.php';
 include 'string/string.php';
 include 'function/function.php';

 				$tenQC = "";
 				$noidungQC = "";
 				$hinhanh = "";
 				$check = "";
 				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 					$errors = array();
			 			$target_dir = "imagePage/";
			 			$target_file = $target_dir.basename($_FILES['hinhanh']['name']);
			 				//check size image
			 			if ($_FILES['hinhanh']['size'] > 226200) {
			 				$errors['hinhanh'] = "size ảnh vượt quá kích thước cho phép";
			 			}
			 				//check type file (png,jpg, jpeg, gif)
			 			$file_type = pathinfo($_FILES['hinhanh']['name'], PATHINFO_EXTENSION);
			 			$file_type_allow = array('png','jpg', 'jpeg', 'gif');
			 			if (!in_array(strtolower($file_type), $file_type_allow)) {
			 				$errors['hinhanh'] = "Chỉ cho phép upload file ảnh";
			 			}

			 		if (!empty($_POST['tenQC']) &&  empty($errors) && !empty($_POST['check'])) {		
			 			$check = $_POST['check'];
		 				$tenQC =$_POST['tenQC'];
		 				$noidungQC = $_POST['noidungQC'];
		 				$hinhanh = $_FILES['hinhanh']['name'];	

				 		$sql = "INSERT INTO `quangcao`( `Ten`, `NoiDung`, `HinhAnh`,`TrangThai`) VALUES ('$tenQC','$noidungQC','$hinhanh','$check')";
					  	$result = mysqli_query($conn,$sql);
					   move_uploaded_file($_FILES['hinhanh']['tmp_name'],$target_file);
					  if ($result) {
					  	$mess ='<p class="alert alert-success">Thêm thành công</p>';
					  	echo $mess;
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
	<div class="fomr">
		<?php if (isset($errors['hinhanh'])) {
					echo '<p class="alert alert-danger">'.$errors['hinhanh'].'</p>';
				} ?>
		<form action="" method="post" enctype= "multipart/form-data">
			<div class="form-group" >
				<label for="">Tên quảng cáo</label>
				<input type="text" name="tenQC" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<input type="text" name="noidungQC" class="form-control">
			</div>
			<div class="form-group">
				<input type="file" name="hinhanh" class="form-control-file">
			</div>
			<div class="form-group">
				<label for="">Trạng thái:</label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="check">
				  <label class="form-check-label" for="inlineCheckbox1">Banner</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="check">
				  <label class="form-check-label" for="inlineCheckbox2">Ảnh nhỏ</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="3" name="check">
				  <label class="form-check-label" for="inlineCheckbox2">Ẩn</label>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-info">
			</div>
		</form>
	</div>
</div>
<?php include 'incl/footer.php'; ?>