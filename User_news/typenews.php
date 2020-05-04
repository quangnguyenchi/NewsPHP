<?php session_start();
	 include 'inclu/header.php'; 
	  include 'connect/conn.php';
	  include_once '../admin_news/function/function.php';
	 
	  	$id = $_GET['id'];
	  	$idLT = $_GET['idLT'];


?>
 <section class="blog-post-area section-margin">
    <div class="container">
   	  <div class="row my-4">
   	  		<nav class="nav">
   	  			<?php $sql = "SELECT * FROM `loaitin` WHERE idTheLoai = $id";
   	  				  $menu = mysqli_query($conn,$sql);
   	  					if (mysqli_num_rows($menu)>0) {
   	  						
   	  						while($mn = mysqli_fetch_assoc($menu)) {
   	  						 ?>
	 <a class="nav-link text-dark active" href="typenews.php?idLT=<?php echo $mn['id']; ?>&id=<?php echo $id; ?>"><b><?php echo $mn['Ten']; ?></b></a>
			  <?php   
   	  						}
   	  					}
   	  			?>
			</nav>
   	  </div>
      <div class="row">
      	<?php
      		if (isset($_GET['page'])) {
                   $page = $_GET['page'];
                   settype($page, "int");
                }else {
                  $page = 1;
                }
      		$sotin = 6;
      		$from = ($page - 1)* $sotin;
      		 $query = "SELECT tintuc.`idTinTuc`,tintuc.`TieuDe`, tintuc.`TieuDeKhongDau`, tintuc.`TomTat`, tintuc.`NoiDung`, tintuc.`HinhAnh`, tintuc.`NoiBat`, tintuc.`idLoaiTin`, tintuc.`idTacGia`, tintuc.`NgayDang`, loaitin.`id`, loaitin.`Ten`, loaitin.`TenKhongDau`, loaitin.`idTheLoai` FROM tintuc,loaitin WHERE tintuc.`idLoaiTin` = loaitin.`id` AND tintuc.`idLoaiTin` = $idLT LIMIT $from,$sotin";
      		 $tintuc = mysqli_query($conn,$query);
      		 if (mysqli_num_rows($tintuc)>0) {
      		 	while ($tin = mysqli_fetch_assoc($tintuc)) {
      		 	    ?> 	  
            <div class="col-md-4">
              <div class="single-recent-blog-post card-view">
                <div class="thumb">
                  <img class="card-img rounded-0" src="../admin_news/imagePage/<?php echo $tin['HinhAnh'] ?>" alt="" width="250" height="250">
                  <ul class="thumb-info">
                    <li><a href="#"><i class="ti-user"></i><?php echo get_nameTG($conn, $tin['idTacGia']) ?></a></li>
                     <li><a href="#"><i class="ti-user"></i><?php echo get_LoaiTin($conn, $tin['idLoaiTin']) ?></a></li>	
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="blog-single.html">
                    <h3><?php echo $tin['TieuDe']; ?></h3>
                  </a>
                  <p><?php echo $tin['TieuDeKhongDau']; ?></p>
                  <a class="button" href="blogdetails.php?idtin=<?php echo $tin['idTinTuc'] ?>">Read More <i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
              <?php
      		 	}
      		 }
      	 ?>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Previous">
                                <span aria-hidden="true">
                                    <i class="ti-angle-left"></i>
                                </span>
                            </a>
                        </li>
                        <?php 
                        	$pagination = "SELECT tintuc.`idTinTuc`, tintuc.`idLoaiTin`, loaitin.`id`,loaitin.`idTheLoai`FROM tintuc,loaitin WHERE tintuc.`idLoaiTin` = loaitin.`id` AND loaitin.`idTheLoai` = $id";
                        	$resultpagi = mysqli_query($conn,$pagination);
                     		$count = mysqli_num_rows($resultpagi);
                        	$sotrang = ceil($count / $sotin);
                        	for ($i = 1; $i <= $sotrang; $i++) {
                        		?>

                        <li class="page-item active"><a href="typenews.php?page=<?php echo $i; ?>&id=<?php echo $id; ?>&idLT=<?php echo $idLT; ?>" class="page-link"><?php echo $i; ?></a></li>
                        <?php
                        	}
                         ?>
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="ti-angle-right"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
          </div>

      </div>
  </section>

<?php include 'inclu/footer.php'; ?>