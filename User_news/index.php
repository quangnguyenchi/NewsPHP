<?php include 'inclu/header.php'; ?>
  
    <!--================ Blog slider start =================-->  
    <section>
      <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
         <?php 
              $sql= "SELECT * FROM `tintuc` WHERE noibat = 1";
              $result = mysqli_query($conn,$sql);
             if (mysqli_num_rows($result)) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    
          <div class="card blog__slide text-center">
            <div class="blog__slide__img">
              <img class="card-img rounded-0" src="../admin_news/imagePage/<?php echo $rows['HinhAnh'] ?>" alt="" height="250">
            </div>
            <div class="blog__slide__content">
              <a class="blog__slide__label" href="#"><?php echo get_LoaiTin($conn,$rows['idLoaiTin']) ?></a>
              <h3><a href="blogdetails.php?idtin=<?php echo $rows['idTinTuc'] ?>"><?php echo $rows['TieuDe']; ?></a></h3>
              <p><?php echo get_nameTG($conn, $rows['idTacGia']); ?></p>
            </div>
          </div>   
         <?php
                }
             }
          ?>
        </div>
      </div>
    </section>
    <!--================ Blog slider end =================-->  

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php 
                if (isset($_GET['page'])) {
                   $page = $_GET['page'];
                   settype($page, "int");
                }else {
                  $page = 1;
                }

              $sotin = 4;
             
              $from = ($page - 1) * $sotin;
                $sql = "SELECT * FROM `tintuc` LIMIT $from,$sotin";
                $query = mysqli_query($conn,$sql);
                  while ( $row = mysqli_fetch_assoc($query)) {
                      ?>
            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid" src="../admin_news/imagePage/<?php echo $row['HinhAnh']; ?>" alt="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i><?php echo get_nameTG($conn,$row['idTacGia']);?></a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php echo $row['NgayDang']; ?></a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h3><?php echo $row['TieuDe']; ?></h3>
                </a>
                <p class="tag-list-inline">Tag: <a href="#"><?php echo get_LoaiTin($conn, $row['idLoaiTin']); ?></a></p>
                <p><?php echo  $row['TomTat'] ?></p>
                <a class="button" href="blogdetails.php?idtin=<?php echo $row['idTinTuc'] ?>">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
                <?php 
                  }
                 
             ?>

             <!-- Phân trang -->
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
                          $x = "SELECT 'idTinTuc' FROM `tintuc`";
                          $resultx = mysqli_query($conn,$x);
                          $count = mysqli_num_rows($resultx);
                          $sotrang = ceil($count / $sotin);
                              for ($i = 1; $i <= $sotrang; $i++) {
                                ?>
                              <li class="page-item active"><a href="index.php?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a></li>
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

          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Newsletter</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'">
                    </div>
                  </div>
                  <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                </div>
                   
                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="single-sidebar-widget__title">Tin:</h4>
                 <div class="popular-post-list">
                    <div class="single-post-list">
                      <?php 
                
                      $sql = "SELECT * FROM `tintuc` WHERE `NoiBat` = 2 LIMIT $from,$sotin";
                      $ketquas = mysqli_query($conn,$sql);
                      while ( $rowss = mysqli_fetch_assoc($ketquas)) {
                        ?>
                        <div class="details mt-20">
                          <a href="blogdetails.php?idtin=<?php echo $rowss['idTinTuc'] ?>">
                            <h6><?php echo $rowss['TieuDe']; ?></h6>
                          </a>
                        </div>
                      <div class="thumb">
                        <img class="card-img rounded-0" src="../admin_news/imagePage/<?php echo $rowss['HinhAnh'] ?>" alt="">
                        <p><?php echo get_nameTG($conn, $rowss['idTacGia']); ?></p>
                      </div>
                     
                      <?php
                          
                      }
                   ?>
                    </div>
                  </div>
                </div>
                   
                  <div class="single-sidebar-widget tag_cloud_widget">
                   <?php 
                
                      $sql = "SELECT * FROM `quangcao` WHERE `TrangThai` = 1";
                      $ketquas = mysqli_query($conn,$sql);
                      while ( $rowss = mysqli_fetch_assoc($ketquas)) {
                        ?>
                        <div class="details mt-20">
                          <a href="blog-single.html">
                             <div class="thumb">
                                <img class="card-img rounded-0" src="../admin_news/imagePage/<?php echo $rowss['HinhAnh'] ?>" alt="">
                              </div>
                          </a>
                        </div>
                      <?php
                          
                      }
                   ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
  </main>

  <!--================ Start Footer Area =================-->
  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>About Us</h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
              magna aliqua.
            </p>
          </div>
        </div>
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Newsletter</h6>
            <p>Stay update with our latest</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="form-inline">

                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                    required="" type="email">


                  <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>

                  <!-- <div class="col-lg-4 col-md-4">
                        <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                      </div>  -->
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">Instragram Feed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="img/instagram/i1.jpg" alt=""></li>
              <li><img src="img/instagram/i2.jpg" alt=""></li>
              <li><img src="img/instagram/i3.jpg" alt=""></li>
              <li><img src="img/instagram/i4.jpg" alt=""></li>
              <li><img src="img/instagram/i5.jpg" alt=""></li>
              <li><img src="img/instagram/i6.jpg" alt=""></li>
              <li><img src="img/instagram/i7.jpg" alt=""></li>
              <li><img src="img/instagram/i8.jpg" alt=""></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-dribbble"></i>
              </a>
              <a href="#">
                <i class="fab fa-behance"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://Google.com" target="_blank">Quang</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </footer>
  <!--================ End Footer Area =================-->

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>