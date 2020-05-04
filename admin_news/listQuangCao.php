<?php session_start();

	  include 'incl/header.php';
	  include 'connect/conn.php';
	  include 'function/function.php';
 ?>
	<div class="row">
		<h3>Danh sách thể loại:	</h3>
		<?php 
			if (isset($_GET['mess'])) {
				echo $_GET['mess'];
			}elseif (isset($_GET['danger'])) {
				echo $_GET['danger'];
			}

		 ?>
		<div class="table">
			<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tên quảng cáo:</th>
	      <th scope="col">Hình ảnh:</th>
	      <th scope="col">Trạng thái:</th>
	      <th scope="col">Sửa</th>
	      <th scope="col">Xóa</th>
	    </tr>
	  </thead>
	  <tbody>
	  		<?php
	  			$sql = "SELECT * FROM quangcao";
	  			$result = mysqli_query($conn,$sql);
	  			if (mysqli_num_rows($result)>0) {
	  				while ($rows=mysqli_fetch_assoc($result)) {
	  				   ?>
	  				   <tr>
					      <th scope="row"><?php echo $rows['id']; ?></th>
					      <td><?php echo $rows['Ten']; ?></td>
					      <td class= "thumb"><img src="imagePage/<?php echo $rows['HinhAnh']; ?>" alt="" height="150px" width="150px"></td>
					      <td><?php echo $rows['TrangThai']; ?></td>
					      <td><a href="SuaQuangCao.php?id=<?php echo $rows['id']; ?>"><i class="fas fa-edit fa-lg"></i></a></td>
					      <td><a href="XoaQuangCao.php?id=<?php echo $rows['id']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a></td>
					    </tr>	
	  				   <?php 
	  				}
	  			}
  		 ?>
    
  </tbody>
</table>
	</div>
</div>
<?php include 'incl/footer.php'; ?>