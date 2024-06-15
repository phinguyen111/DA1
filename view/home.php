  <?php 
    $html_danhmuc =dm_all($showdm);
    $html_dmparent = "";
    foreach ($parentdm as $dm) {
      extract($dm);
      $html_dmparent .= '
      <button class="btn-category" type="submit" name="danhmuc">'.$tendm.'</button>';
    }

    $html_dsspnew=showsp($dssp_new);
    $html_dsspbest=showsp($dssp_bestseler);
    $html_dsspview = showsp($dssp_view);
    $hmtl_dsspdexuat = showsp($dssp_dexuat);
  ?>
  
  <!-- Swiper -->
   <section class="slideshow">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="layout/img/fixed/slide1.jpeg" alt="" width="1415px" height="auto">
              </div>
              <div class="swiper-slide">
                <img src="layout/img/fixed/slide2.jpeg" alt="" width="1415px" height="auto">
              </div>
              <div class="swiper-slide">
                <img src="layout/img/fixed/slide3.jpeg" alt="" width="1415px" height="auto">
              </div>
              <div class="swiper-slide">
                <img src="layout/img/fixed/slide4.jpeg" alt="" width="1415px" height="auto">
              </div>
              <div class="swiper-slide">
                <img src="layout/img/fixed/slide5.webp" alt="" width="1415px" height="auto">
              </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section> 
    
    <section class="option">
      <div class="title line">
          <h3>BẠN ĐANG TÌM KIẾM ?</h3>
      </div>
      <div class="container">
        <div class="box2">
          <div class="list-img">
                <?=$html_danhmuc ?>
          </div>
      </div>
      </div>
    </section>
    
    <section class="section-p1" id="product1">
      <div class="title-info">
        <h4>Đề xuất cho bạn</h4>
        <div class="btn-category">
          <?=$html_dmparent?>   
        </div>
      </div>

      <div class="pro-container">
      
        <?= $hmtl_dsspdexuat ?>
        <?= $html_dsspbest?>
      </div>

    </section>

    <section class="banner" id="banner">
      <div class="bannersell">
        <h1>Siêu ưu đãi</h1>
        <h2>Khuyến mãi lên đến <span>70% </span>Các mặt hàng T-Shirt & Phụ kiện đi kèm</h2>
        <form action="index.php?page=sanpham" method="post">
          <button class="btn-view">XEM NGAY</button>
        </form>
      </div>
    </section>

    <section class="section-p1" id="product1">
      <div class="title">
        <span class="new-arival" >SẢN PHẨM MỚI</span>
      </div>

      <div class="pro-container">
        <?=$html_dsspnew?>
      </div>
    </section>

    <section class="section-p1" id="product1">
      <div class="title">
        <span class="new-arival" >SẢN PHẨM NHIỀU NGƯỜI XEM </span>
      </div>

      <div class="pro-container">
        <?=$html_dsspview?>
      </div>
    </section>

    <section id="sm-banner">
      <div class="banner-box">
        <h4>Crazy deals</h4>
        <h1>Buy 1 get 1 free</h1>
        <p>The best classic dress is on sale at cara</p>
        <button class="btn-view bn">View more</button>
      </div>
      <div class="banner-box banner-box2">
        <h4>Spring/Summer</h4>
        <h1>Upcomming season</h1>
        <p>The best classic dress is on sale at cara</p>
        <button class="btn-view bn">Colection</button>
      </div>
    </section>
 