<?php 
	function get_idTheLoai($conn,$id)
	{
		$sql = "SELECT * FROM `theloai` WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return  $row['Ten'];
	}

	function get_LoaiTin($conn,$id)
	{
		$sql = "SELECT * FROM `loaitin` WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return  $row['Ten'];
	}

	function get_nameTG($conn,$id)
	{
		$sql = "SELECT * FROM `user` WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return  $row['name'];
	}

	function delete($conn,$id,$table,$link)
	{
		$sql ="DELETE FROM `$table` WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$mess = "<p class='alert alert-success'>Xóa thành công</p>";	
		if (!$result) {
			$danger = '<p class="alert alert-danger">Danh mục bạn xóa có sự ràng buộc, vui lòng kiểm tra lại!</p>';
			header('location:'.$link.'?danger='.$danger);
			
			exit();
		}else {
			header('location:'.$link.'?mess='.$mess);
		}

	}

 ?>
