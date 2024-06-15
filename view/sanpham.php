<?php 
  $html_dm= "";
    foreach ( $showdm  as $dm) {
      extract($dm);
      $html_dm .= '
      <li><a href="index.php?page=sanpham&iddm='.$id.'">'.$tendm.'</a></li>';
    }
  $html_danhmuc =dm_all($showdm);
  if($titlepage!= "") $title = $titlepage;
  else
        $title="#Siêu ưu đãi";
    
  $html_spbest = "";
  foreach ( $dssp_bestseler as $sp) {
    extract($sp);
    $sell_vnd = number_format($khuyenmai , 0, ',', '.');
    $giagoc_vnd = number_format($giasp , 0, ',', '.');
    $html_spbest .= '
                    <li>
                <img src="layout/img/product/'.$hinhanh.'" alt="">
                  <div class="info-bestseler">
                    <span>'.$tensp.'</span>
                    <div class="star">
                      <i class="bx bxs-star" ></i>
                      <i class="bx bxs-star" ></i>
                      <i class="bx bxs-star" ></i>
                      <i class="bx bxs-star" ></i>
                      <i class="bx bxs-star" ></i>
                    </div>
                    <span class="price">
                      <p class="sell">'.$giagoc_vnd.'₫</p>
                       <p>'.$sell_vnd.' ₫</p>
                    </span>
                    <a href="index.php?page=details&id='.$id.'">
                      <h2>Xem ngay </h2>
                    </a>
                  </div>
              </li>
    ';
  }

  $html_dssp= showsp($dssp);
  
?>

<section class="banner-prd" id="banner">
      <div class="bannersell">
        <h1><?=$title?></h1>
        <h2>Khuyến mãi lên đến <span>70% </span>các mặt hàng T-Shirt & Phụ kiện đi kèm</h2>
      </div>
    </section>

    <section class="section-product-flex" id="product1">
      <div id="ast-filter-wrap">
        <div class="ast-filter-box">
          <form action="index.php?page=sanpham" method="post">
            <div class="search-feild">
                <input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
                <button type="submit" name="sub">
                  <i class='bx bxs-chevron-right'></i>
                </button>  
            </div>
          </from>
          <div id="block9">
            <h2>Danh Mục</h2>
            <ul>
              <?=$html_dm?>
            </ul>
          </div>

          <div id="block9">
            <h2>Lọc theo giá</h2>
            <ul>
              <li><a href="#">Giá cao nhất</a></li>
              <li><a href="#">Giá thấp nhất</a></li>
            </ul>
          </div>
  
          <div id="block9">
            <h2>Product Best Selers</h2>
            <ul class="pro-bestseler">
              <?=$html_spbest?>
            </ul>
          </div>
          
        </div>
      </div>

      <div class="form-pro" id="product-flex">
        <div class="pro-container gap-pro">
          <?=$html_dssp?>
        </div>
        <div id="pagination">
           <a href="">1</a>
           <a href="">2</a>
        </div>
      </div>
    </section>

    
