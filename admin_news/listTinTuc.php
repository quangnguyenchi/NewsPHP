<?php session_start();

	  include 'incl/header.php';
	  include 'connect/conn.php';
	  include 'function/function.php';
 ?>
	<div class="row">
		<h3>Danh sách tin tức:	</h3>
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
			      <th scope="col">Tiêu đề</th>
			      <th scope="col">Chi tiết</th>
			      <th scope="col">Sửa</th>
			      <th scope="col">Xóa</th>
			    </tr>
			  </thead>
			  <tbody>
			  		<?php
			  			$sql = "SELECT * FROM tintuc";
			  			$result = mysqli_query($conn,$sql);
			  			if (mysqli_num_rows($result)>0) {
			  				while ($rows=mysqli_fetch_assoc($result)) {
			  				   ?>
			  				   <tr>
							      <th scope="row"><?php echo $rows['idTinTuc']; ?></th>
							      <td><?php echo $rows['TieuDe']; ?></td>
							      <td><a href="ChiTietTin.php?id=<?php echo $rows['idTinTuc']; ?>"><i class="fas fa-info-circle fa-lg"></i></a></td>
							      <td><a href="SuaTin.php?id=<?php echo $rows['idTinTuc']; ?>"><i class="fas fa-edit fa-lg"></i></a></td>
							      <td><a href="XoaTin.php?id=<?php echo $rows['idTinTuc']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a></td>
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