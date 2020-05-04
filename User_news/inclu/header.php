<?php 
      include '../admin_news/connect/conn.php';
      include '../admin_news/function/function.php';  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quang</title>

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php"><h2><b>Quang <sup>News</sup></b></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
              <?php 
                  $sql = "SELECT * FROM `theloai`";
                   $results = mysqli_query($conn,$sql);
                   if (mysqli_num_rows($results)) {
                     while ($rows = mysqli_fetch_assoc($results)) {
                   ?>
              <li class="nav-item "><a class="nav-link" href="pageCategory.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['Ten']; ?></a></li>
                <?php
                     }
                   }

               ?>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-social">
              <li><a href="#"><i class="ti-facebook"></i></a></li>
              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li><a href="#"><i class="ti-instagram"></i></a></li>
              <li><a href="#"><i class="ti-skype"></i></a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
  
  <main class="site-main">
     <section class="mb-30px">
      <div class="container">
          <div class="">
           <?php 
             $sql = "SELECT * FROM `quangcao` WHERE `TrangThai` = 1";
             $ketquas = mysqli_query($conn,$sql);
                while ( $qc = mysqli_fetch_assoc($ketquas)) {
              ?>
          
            <img src="../admin_news/imagePage/<?php echo $qc['HinhAnh'] ?>" height="300">
        
          <?php  
            }
          ?>
          </div>
      </div>
    </section>