<?php session_start();
 include 'incl/header.php';
 include 'connect/conn.php';
 include 'function/function.php';
 	$id = $_GET['id'];
 	$sql = "SELECT * FROM `tintuc` WHERE idTinTuc = $id";
 	$result = mysqli_query($conn,$sql);
 	$row = mysqli_fetch_assoc($result);	

  ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $row['TieuDe']; ?></h1>
          </div>

  
          <div class="row">

            <div class="col-lg-6">

              <!-- Tom tat -->

              <div class="card mb-4">
                <div class="card-header">
                 Phần tóm tắt:
                </div>
                <div class="card-body">
                 <?php echo $row['TomTat']; ?>
                </div>
              </div>

              <!-- Noi Dung -->
              <div class="card mb-4">
                <div class="card-header">
                 Nội dung:
                </div>
                <div class="card-body">
                 <?php echo $row['NoiDung']; ?>
                </div>
              </div>
              <!-- Hinh Anh -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Hình ảnh có trong bài viết: </h6>
                </div>
                <div class="card-body">
                  <img class="img-fluid" src="imagePage/<?php echo $row['HinhAnh']; ?>" alt="">
                </div>
              </div>

            </div>

            <div class="col-lg-6">


              <!-- Thong tin tin tuc -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Thông tin bài viết</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <p>Thuộc loại tin: <b><?php echo get_LoaiTin($conn, $row['idLoaiTin']); ?></b></p>
                    <p>Tên tác giả:	<b> <?php echo get_nameTG($conn, $row['idTacGia']); ?></b></p>
                    <p>Ngày đăng bài: <b> <?php echo $row['NgayDang']; ?></b></p>
                  </div>
                </div>
              </div>

            </div>

          </div>

<?php include 'incl/footer.php'; ?>