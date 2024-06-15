<?php
  $cata = isset($_SESSION['cata']) ? $_SESSION['cata'] : 0;
  $pro = isset($_SESSION['pro']) ? $_SESSION['pro'] : 0;
  $user = isset($_SESSION['user']) ? $_SESSION['user'] : 0;
  $name = isset($_SESSION['name']) ? $_SESSION['name'] : 0;
  $cmt = isset($_SESSION['cmt']) ? $_SESSION['cmt'] : 0;
  $bill = isset($_SESSION['bill']) ? $_SESSION['bill'] : 0;
  $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : 0;
  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $cata; ?></h3>
                  <p>Danh mục</p>
                </div>
                
                <a href="index.php?page=categories" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $pro; ?></h3>

                  <p>Sản phẩm</p>
                </div>
                
                <a href="index.php?page=products" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $user; ?></h3>

                  <p>Tài khoản</p>
                </div>
                
                <a href="index.php?page=user" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo $bill; ?></h3>

                  <p>Đơn hàng</p>
                </div>
                
                <a href="index.php?page=bill" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $mail; ?></h3>
                  <p>Mail</p>
                </div>
                
                <a href="index.php?page=mail" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo $cmt; ?></h3>

                    <p>Bình luận</p>
                  </div>
                  
                  <a href="index.php?page=comment" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->