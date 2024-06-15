<?php
  $cata = isset($_SESSION['cata']) ? $_SESSION['cata'] : 0;
  $pro = isset($_SESSION['pro']) ? $_SESSION['pro'] : 0;
  $user = isset($_SESSION['user']) ? $_SESSION['user'] : 0;
  $name = isset($_SESSION['name']) ? $_SESSION['name'] : 0;
  $cmt = isset($_SESSION['cmt']) ? $_SESSION['cmt'] : 0;
  $bill = isset($_SESSION['bill']) ? $_SESSION['bill'] : 0;
  $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : 0;
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Liên hệ</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Xin chào, <?=$name?>  </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?page=thoat" class="nav-link">Thoát</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <!-- <h5 style="color: white; text-align: center; margin-left: 20px;">LOGO</h5> -->
       <!-- <img src="../upload/logo.jpg" alt="" width="80px" height="80px"> -->
      <div class="info">
        <a href="#" class="d-block"></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="index.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
          
        </li>
        <li class="nav-item">
          <a href="index.php?page=categories" class="nav-link">
          <i class="nav-icon fa-solid fa-folder-open"></i>            <p>
              Quản lí danh mục              
              <span class="badge badge-info right"> <?php echo $cata; ?> </span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=products" class="nav-link">
          <i class="nav-icon fa-solid fa-folder-open"></i>            <p>
              Quản lí sản phẩm
              <!-- <span class="right badge badge-danger">New</span> -->
              <span class="badge badge-info right"> <?php echo $pro; ?> </span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=user" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-open"></i>
            <p>
              Quản lí tài khoản
              <span class="badge badge-info right"> <?php echo $user; ?> </span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=bill" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-open"></i>
            <p>
              Quản lí đơn hàng
              <span class="badge badge-info right"> <?php echo $bill; ?> </span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=comment" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-open"></i>
            <p>
              Quản lí bình luận
              <span class="badge badge-info right"> <?php echo $cmt; ?> </span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="index.php?page=mail" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-open"></i>
            <p>
              Mail
              <span class="badge badge-info right"> <?php echo $mail; ?> </span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
