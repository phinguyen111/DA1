<?php 
    $html_cart = view_cart()    
?>
<section class="shoping-cart spad">
    <?php if(isset($_SESSION['giohang']) && !empty( $_SESSION['giohang'] )): ?>
            <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="shoping__product">Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                                <th>Chức năng </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $html_cart; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    <a href="index.php?page=update_cart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>Cập Nhật </a>
                    <a href="index.php?page=delete&index" class="primary-btn cart-btn">Xóa tất cả </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <div id="new-letter" class="form">
                            <form action="index.php?page=cart" method="post">
                                <input type="text" name ="ma_voucher" class="discount" placeholder="Nhập mã giảm giá" required>
                                <button type="submit" name="appma" class="site-btn">ÁP MÃ</button>
                            </form>
                            <script src="layout/js/script.js"></script>
                            <?php 
                                echo $_SESSION['info_voucher'];
                                unset ($_SESSION['info_voucher']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng đơn hàng</h5>
                    <ul>
                        <li>Tạm tính: <span><?=  number_format($_Provisional, 0, ',', '.')?> ₫</span></li>
                        <li>Tổng thanh toán:  <span><?=  number_format($Total_all, 0, ',', '.')?> ₫</span></li>
                    </ul>
                    <a href="index.php?page=thanhtoan" class="primary-btn">Tiến hành thanh toán </a>
                </div>
            </div>
        </div>
            </div>
    <?php else: ?>
        <div id="cartnull">
                <div class="icon-cartnull"></div>
                <div class="info-cartnull">Giỏ hàng của bạn trống</div>
                
        </div>
        <a href="index.php?page=sanpham" id="buy-now">
                    <button class="buy-now">Mua ngay</button>
                </a>
    <?php endif; ?>
</section>