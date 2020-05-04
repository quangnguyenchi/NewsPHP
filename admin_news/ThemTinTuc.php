<?php session_start();
 include 'incl/header.php';
 include 'function/function.php';
 include 'connect/conn.php';
 include 'string/string.php';

 	$tieude = "";
 	$tieudeSlug = "";
 	$noidung = "";
 	$hinhanh = "";
 	$noibat ="";
 	$idLoaiTin ="";
 	$idTacGia ="";
 	$date = "";
 	$tomtat = "";

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
 				//check image unique
 			
			if (!empty($_POST['tieude']) && !empty($_POST['noidung']) && !empty($_POST['noibat']) && !empty($_POST['idLoaiTin']) && !empty($_POST['idTacGia']) && empty($errors) && !empty($_POST['date']) && !empty($_POST['tomtat']) ) {		
					 $tieude =  addslashes($_POST['tieude']);
					 $tieudeSlug = convert_vi_to_en( $_POST['tieude']);
					 $noidung = addslashes($_POST['noidung']);														
					 $hinhanh = $_FILES['hinhanh']['name'];
					 $noibat =$_POST['noibat'];
					 $idLoaiTin =$_POST['idLoaiTin'];
					 $idTacGia =$_POST['idTacGia'];
					 $date = $_POST['date'];
					 $tomtat = $_POST['tomtat'];
					
				 $sql = "INSERT INTO `tintuc`( `TieuDe`, `TieuDeKhongDau`, `NoiDung`, `TomTat`, `HinhAnh`, `NoiBat`, `idLoaiTin`, `idTacGia`, `NgayDang`) VALUES ('$tieude','$tieudeSlug','$tomtat','$noidung','$hinhanh',$noibat,$idLoaiTin,$idTacGia,'$date')";
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
	<div class="">
		<div class="form">
			<?php if (isset($errors['hinhanh'])) {
					echo '<p class="alert alert-danger">'.$errors['hinhanh'].'</p>';
				} ?>
				
			<form action="" method="post" enctype= "multipart/form-data">
				<div class="form-group col-5">
					<label for="">Tiêu đề: </label>
					<input type="text" name="tieude" class="form-control" placeholder="Tiêu đề bài viết...">
				</div>
				<div class="form-group col-8">
					<label for="">Nội dung:</label>
					<textarea name="noidung" class="form-control form-control-lg"></textarea>
				</div>
				<div class="form-group col-8">
					<label for="">Phần tóm tắt:</label>
					<textarea name="tomtat" class="form-control form-control-lg"></textarea>
				</div>
				<div class="form-group col-4">
					<label for="">Chon hình ảnh:</label>
					<input type="file" name="hinhanh" class="form-control-file">
				</div>
				<div class="form-group">
					<label for="">Chọn danh mục hiển thị: </label>
					<select name="noibat" id="">
						<option value="#">choose:... </option>
						<option value="1">Nỗi bật</option>
						<option value="2">Không nổi bật</option>
					</select>
				</div>
				<div class="row col">
						<div class="form-group col-3">
								<label >Thuộc lại tin:...</label>
								<select name="idLoaiTin" class="form-control col">
									<?php
										 $sql ="SELECT * FROM `loaitin`";
										 $result = mysqli_query($conn,$sql);
										 if (mysqli_num_rows($result)>0) {
										 	while ($rows = mysqli_fetch_assoc($result)) {
										 	    ?>
										 	    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['Ten']; ?></option>
										 	<?php
										 	}
										 }
									 ?>
								</select>
						</div>
						<div class="form-group col-3">
								<label >Tác giả:...</label>
								<select name="idTacGia" class="form-control col">
									<?php
										 $sql ="SELECT * FROM `user`";
										 $result = mysqli_query($conn,$sql);
										 if (mysqli_num_rows($result)>0) {
										 	while ($rows = mysqli_fetch_assoc($result)) {
										 	    ?>
										 	    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name']; ?></option>
										 	<?php
										 	}
										 }
									 ?>
								</select>
						</div>
				</div>
				<div class="form-group col-5">
					<label for="">Ngày đăng: </label>
					<input type="date" name="date" class="form-control">
				</div>
				<div class="form-group col">
					<input type="submit" name="submit" value="Thêm" class="btn btn-info col-2">
				</div>
			</form>
		</div>
	</div>
<?php include 'incl/footer.php'; ?>