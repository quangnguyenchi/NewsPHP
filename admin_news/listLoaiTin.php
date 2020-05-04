<?php session_start();

	  include 'incl/header.php';
	  include 'connect/conn.php';
	  include 'function/function.php';
 ?>
	<div class="row">
		<h2>Danh sách loại tin:</h2>
		<?php 
			if (isset($_GET['mess'])) {
				echo $_GET['mess'];
			}

		 ?>
		<div class="table">
			<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tên loại tin</th>
	      <th scope="col">Thuộc thể loại</th>
	      <th scope="col">Sửa</th>
	      <th scope="col">Xóa</th>
	    </tr>
	  </thead>
	  <tbody>
	  		<?php
	  			$sql = "SELECT * FROM loaitin";
	  			$result = mysqli_query($conn,$sql);
	  			if (mysqli_num_rows($result)>0) {
	  				while ($rows=mysqli_fetch_assoc($result)) {
	  				   ?>
	  				   <tr>
					      <th scope="row"><?php echo $rows['id']; ?></th>
					      <td><?php echo $rows['Ten']; ?></td>
					      <td><?php echo get_idTheLoai($conn,$rows['idTheLoai']); ?></td>
					      <td><a href="SuaLoaiTin.php?id=<?php echo $rows['id']; ?>"><i class="fas fa-edit fa-lg"></i></a></td>
					      <td><a href="XoaLoaiTin.php?id=<?php echo $rows['id']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a></td>
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