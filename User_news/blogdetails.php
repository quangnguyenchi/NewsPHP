<?php include 'inclu/header.php';
		include 'connect/conn.php';
		include_once '../admin_news/function/function.php';
	if (isset($_GET['idtin'])) {
		$idTin = $_GET['idtin'];
		 settype($idTin, "int");
	}
 ?>
 <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
            	<?php 
        		$sql = "SELECT * FROM `tintuc` WHERE idTinTuc = $idTin";
        		$Tin = mysqli_query($conn,$sql);
        		while ($t = mysqli_fetch_assoc($Tin)) {
        			?>
                <img class="img-fluid" src="../admin_news/imagePage/<?php echo $t['HinhAnh'] ?>" alt="">
                <a href="#"><h4><?php echo $t['TieuDe']?></h4></a>
                <div class="user_details">
                </div>
                <p><?php echo $t['TomTat']; ?></p>
           <blockquote class="blockquote">
             <p class="mb-0">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p>
           </blockquote>
           <p><?php echo $t['NoiDung']; ?></p>
           		<div class="float-right">
           			<p><?php echo $t['NgayDang']; ?><br><b><?php echo get_nameTG($conn, $t['idTacGia']); ?></b></p>
           			
           		</div>
        	 <?php 
        		}
        	 ?>
        </div>
      </div>
  </section>
<?php include 'inclu/footer.php'; ?>

