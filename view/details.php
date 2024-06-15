<?php
$html_splienquan = showsp($sp_lienquan);

extract($sp_chitiet);
if ($mota == "") {
    $mota_sp = "Không có thông tin giới thiệu cho sản phẩm này";
} else {
    $mota_sp = $mota;
}
if (isset($variantData)) {
    extract($variantData);
} else {
    $variantData = [""];
}
$html_bl = "";
foreach ($dsbl as $bl) {
    extract($bl);
    $html_bl .= '<div class="list-comment">
                            <div class="img-user">
                                <img src="layout/img/fixed/user-icon.png" alt="">
                            </div>
                            <div class="info">
                                <span>' . $name . ':</span>
                                <p>' . $noidung . '</p>
                            </div>
            </div>';
};
?>
<section id="product-details" class="product-details">

    <div class="single-pro-image">
        <img src="layout/img/product/<?= $hinhanh ?>" alt="" width="100%" id="MainImg">
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="layout/img/product/<?= $hinhanh ?>" width="100%" class="smallimg" alt="">
            </div>
            <div class="small-img-col">
                <img src="layout/img/product/<?= $variantData[0] ?>" width="100%" class="smallimg" alt="">
            </div>
            <div class="small-img-col">
                <img src="layout/img/product/<?= $variantData[1] ?>" width="100%" class="smallimg" alt="">
            </div>
            <div class="small-img-col">
                <img src="layout/img/product/<?= $variantData[2] ?>" width="100%" class="smallimg" alt="">
            </div>

        </div>
    </div>
    <div class="single-pro-details">
        <div class="BOX-hot pd-detail__price">
            <h1 class="title-details">Chi tiết sản phẩm:</h1>
            <div class="box-hot1">
                <span style="background-color:#F8E4D2 ; color: #F2994A;border-radius: 10px;">#Bán chạy</span>
                <span style="background-color: #b1ddf2; color: hsl(199, 90%, 62%);border-radius: 10px;">Đã bán: 1.5k</span>
            </div>
            <h1><?= $tensp ?></h1>
            <div class="product-rate-sku">
                <div class="rate">
                    <i class='bx bxs-star'></i>
                    <span>5/5</span>
                </div>
                <div class="sku">
                    <?= $titlepage ?>
                </div>
                <div class="status">
                    <span class="available">Còn Hàng</span>
                </div>
            </div>
            <?php
            $sell_vnd = number_format($khuyenmai, 0, ',', '.');
            $giagoc_vnd = number_format($giasp, 0, ',', '.');
            if ($giasp > 0 && $khuyenmai > 0) {

                echo '
                            <div style=" display: flex; align-item: center; gap: 10px "> 
                                <h1 style="margin:0px" class="price">
                                <span class="sell ">' . $giagoc_vnd . '₫ </span>
                                </h1>
                                <h1 style="margin:0px">Giá chỉ: <span>' . $sell_vnd . '₫ </span></h1>
                            </div>
                            ';
            } else {
                echo '<h1 style="margin:0px">Giá: <span>' . $giagoc_vnd . '₫ </span></h1>';
            }
            ?>

        </div>
        <div class="sizePicker clearfix py-3 mt-3">
            <label class="control-label">Kích cỡ</label>
            <p class="size req d-flex flex-wrap" data-column="i5">
                <span>
                    <a data-value="276820" href="javascript:void(0)" class="">L</a>
                </span>
                <span>
                    <a data-value="276821" href="javascript:void(0)" class="">XL</a>
                </span>
                <span>
                    <a data-value="276822" href="javascript:void(0)" class="">2XL</a>
                </span>
            </p>
        </div>

        <form action="index.php?page=addcart" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="tensp" value="<?= $tensp ?>">
            <input type="hidden" name="hinhanh" value="<?= $hinhanh ?>">
            <input type="hidden" name="sell" value="<?= $sell_vnd ?>">
            <input type="hidden" name="giagoc" value="<?= $giagoc_vnd ?>">
            <input type="number" name="soluong" value="1" min="1" max="10">
            <button type="submit" name="addcart" class="addcart">Add to cart</button>
        </form>

        <div class="info-product-">
            <h1>Giới thiệu sản phẩm</h1>
            <span>
                <?= $mota_sp ?>
            </span>
        </div>
    </div>
</section>
<section id="product-tab-details">
    <ul id="pill-tab" class="pill-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="navlink active pills-home-tab" id="pills-home-tab">Mô tả sản phẩm</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="navlink pills-profile-tab" id="pills-profile-tab">Đánh giá</button>
        </li>
    </ul>

    <div class="tab-content" id="tabContent">
        <div class="tab-home fade active show" id="tab-home">
            <p class="tt_spchitiet">
                <span><?= $tensp ?> - <?= $titlepage ?></span>
                <br><br>
                <span>
                    <?= $mota_sp ?>
                </span>
                <br><br>
                <span>- Chất liệu 100% cotton nhập khẩu cao cấp</span>
                <br><span>- Form Oversize thời thượng cùng kiểu chữ in trend nổi bật</span>
                <br><span>- Điểm nhấn của chiếc áo chính là hiệu ứng in dập nổi vô cùng đặc biệt</span>
                <br><span>- Đường may tỉ mỉ, chi tiết là yếu tố quan trọng để đảm bảo sản phẩm được ra mắt với phiên bản hoàn hảo và chất lượng nhất.</span>
                <br><br>
                <span>Thông số sản phẩm:</span>
                <br><span>- Chất liệu: Cotton</span>
                <br><span>- Size:&nbsp;</span>
                <br><span>+ L: 1m61 - 1m70 - 56kg - 65kg&nbsp;</span>
                <br><span>+ XL: 1m71 - 1m75, 66kg - 75kg&nbsp;</span>
                <br><span>+ 2XL: trên 1m75, 76kg - 85kg&nbsp;</span>
                <br><span>- Màu sắc: Trắng - Đen - Kem</span>
                <br><span>- Thương hiệu: PS31110_TOAN</span>
                <br><span>- Xuất xứ: Việt Nam</span>
                <br><br><span>Chính sách sản phẩm:</span>
                <br><span>- Hỗ trợ đổi trả sản phẩm trong 30 ngày&nbsp;</span>
                <br><span>- Bảo hành lên đến 90 ngày.</span>
                <br><span>- Được kiểm tra hàng trước khi thanh toán (đối với đơn online)</span>
                <br><br><span>Lưu ý:&nbsp;</span>
                <br><span>- Hình ảnh sản phẩm được chụp thực tế bởi TOTODAY.&nbsp;</span>
                <br><span>- Tỉ lệ và màu sắc thực tế sẽ có sự chênh lệch nhưng không quá lớn do bố cục và ánh sáng khi chụp.&nbsp;</span>
                <br><span>- TOTODAY có chính sách đổi trả &amp; bảo hành để đảm bảo quyền lợi cho khách hàng. Vì thế khi nhận hàng nếu có vấn đề phát sinh hay chưa hài lòng xin đừng vội đánh giá hãy liên hệ ngay với chúng tớ để được hỗ trợ giải quyết một cách nhanh nhất.&nbsp;</span>
                <br><span>- Đừng quên thêm mã giảm giá hay miễn phí vận chuyển trước khi thanh toán nhé!</span>
            </p>
        </div>
        <div class="tab-home fade active show" id="tab-conment">

            <h2 class="plcmt">Hãy để lại nhận xét của bạn:</h2>
            <iframe src="binhluan.php?idsp=<?= $_GET['id'] ?>" width="100%" frameborder="0"></iframe>
            <?php
            $idsp = $_GET['id']; // Lấy id sản phẩm từ URL
            $dsbl = show_bl($idsp);
            $html_bl = "";
            foreach ($dsbl as $bl) {
                extract($bl);
                $html_bl .= '<div class="list-comment">
                    <div class="img-user">
                        <img src="layout/img/fixed/user-icon.png" alt="">
                    </div>
                    <div class="info">
                        <span>' . $hoten . ':</span>
                        <p>' . $noidung . '</p>
                    </div>
                 </div>';
            }
            echo $html_bl;
            ?>
        </div>
    </div>


</section>

<section id="product1">
    <h1 class="title-details dssplq">Danh sách sản phẩm liên quan</h1>
    <div class="pro-container">
        <?= $html_splienquan ?>
    </div>
</section>