<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $_SESSION['date']=json_encode(date('Y-m-d H:i:s'));
    if(isset($_SESSION['giohang'])) {
        $thanhtoan="";
        foreach ($_SESSION['giohang'] as $sp) {
            extract($sp);
            $thanhtoan .= '<div class="info-shipping">
            <div class="name__product">
                <b>'.$tensp.' </b> 
            </div>
            <div class="total__broduct">
                <span>x'.$soluong.' </span>
            </div>
        </div>
            ';
        }
    }
?>
<!-- Checkout Section Begin -->
<form action="index.php?page=bill" method="post">
     <section class="checkout spad">
    <div id="thanhtoan">
        <div id="nhan-hang">
            <div class="nhan-hang"> 
                <div class="form-thanhtoan">
                    <span>Thông tin nhận hàng</span>
                    <?php if(isset($_SESSION['user'])) {?>
                        <div class="form-input">
                            <div class="input-name">
                                <div class="input-css01">
                                    <label for="" class="css-tieude">Tên</label>
                                    <input class="input" name="name" type="text"  value="<?php echo $_SESSION['user']['hoten']?>">
                                </div>
                            </div>
                            <div class="input-email-sdt">
                                <div class="input-css002">
                                    <label for="" class="css-tieude">Số điện thoại</label>
                                    <input class="input1" name="phone" type="number"value="<?php echo $_SESSION['user']['dienthoai']?>">
                                </div>
                                <div class="input-css002">
                                    <label for="" class="css-tieude">Email</label>
                                    <input class="input1" name="email" type="text" value="<?php echo $_SESSION['user']['email']?>">
                                </div>
                            </div>

                            <div class="input-email-sdt">
                                <div class="input-css002">
                                    <label for="provinceSelect" class="css-tieude">Tỉnh / Thành phố</label>
                                    <select class="input1" name="province" id="provinceSelect">
                                        <option value="">Chọn Tỉnh / Thành Phố</option>
                                        <option value="Ben Tre">Bến Tre</option>
                                        <option value="Ho Chi Minh">Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="input-css002">
                                    <label for="districtSelect" class="css-tieude">Quận / Huyện </label>
                                    <select class="input1" name="district" id="districtSelect">
                                        <option value="">Chọn Quận / Huyện</option>
                                    </select>
                                </div>
                                <div class="input-css002">
                                    <label for="wardSelect" class="css-tieude">Phường / Xã</label>
                                    <select class="input1" name="ward" id="wardSelect">
                                        <option value="">Chọn Phường / Xã</option>
                                    </select>
                                </div>
                            </div>


                            <div class="input-adress">
                                <div class="input-css01">
                                    <label for="" class="css-tieude">Ghi chú</label>
                                    <textarea class="input" name="note" type="text" placeholder="Thêm nội dung chú thích  "></textarea>
                                </div>
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="form-input">
                            <div class="input-name">
                                <div class="input-css01">
                                    <label for="" class="css-tieude">Tên</label>
                                    <input class="input" name="name" type="text" placeholder="Nhập tên">
                                </div>
                            </div>
                            <div class="input-email-sdt">
                                <div class="input-css002">
                                    <label for="" class="css-tieude">Số điện thoại</label>
                                    <input class="input1" name="phone" type="number" placeholder="Nhập số điện thoại của bạn ">
                                </div>
                                <div class="input-css002">
                                    <label for="" class="css-tieude">Email</label>
                                    <input class="input1" name="email" type="text" placeholder="Nhập email của bạn ">
                                </div>
                            </div>

                            <div class="input-email-sdt">
                                <div class="input-css002">
                                    <label for="provinceSelect" class="css-tieude">Tỉnh / Thành phố</label>
                                    <select class="input1" name="province" id="provinceSelect">
                                        <option value="">Chọn Tỉnh / Thành Phố</option>
                                        <option value="Ben Tre">Bến Tre</option>
                                        <option value="Ho Chi Minh">Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="input-css002">
                                    <label for="districtSelect" class="css-tieude">Quận / Huyện </label>
                                    <select class="input1" name="district" id="districtSelect">
                                        <option value="">Chọn Quận / Huyện</option>
                                    </select>
                                </div>
                                <div class="input-css002">
                                    <label for="wardSelect" class="css-tieude">Phường / Xã</label>
                                    <select class="input1" name="ward" id="wardSelect">
                                        <option value="">Chọn Phường / Xã</option>
                                    </select>
                                </div>
                            </div>


                            <div class="input-adress">
                                <div class="input-css01">
                                    <label for="" class="css-tieude">Ghi chú</label>
                                    <textarea class="input" name="note" type="text" placeholder="Thêm nội dung chú thích  "></textarea>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div id="donhang">
            <div class="don-hang">
                <div class="form-thanhtoan">
                    <span>Thông tin đơn hàng</span>
                    <div class="itemCol">
                        <div class="itemColInfo">
                        <div class="content">
                            <?=$thanhtoan?>
                        <div class=" tt_bill">
                            <div class="name__product">
                                <span>Tổng tiền hàng</span>
                                <p><?=  number_format($_Provisional, 0, ',', '.')?> ₫      </p>
                            </div>
                            <div class="name__product">
                                <span>Phí vận chuyển</span>
                                <p><span id="shippingFee"><?= number_format($ship, 0, ',', '.')?>₫    </span></p>
                            </div>
                        </div>
                        <div class="info-shipping">
                            <div class="name__product">
                                <b>Giảm giá</b>
                            </div>
                            <div class="total__broduct">
                                <b><?= number_format($voucher, 0, ',', '.')?>₫    </b>
                            </div>
                        </div>
                        <div class="total-item total mgt">
                            <span>Thành tiền</span>
                            <span id="showTotalMoney">
                                <?=  number_format($Total_all, 0, ',', '.')?> ₫                                  
                            </span>
                            <p>(Đã bao gồm VAT nếu có)</p>
                         </div>
                    </div>
                </div>
                    </div>
                         <div class="btn-dh " >
                             <button type="submit" name="dathang" class="addcart">Đặt Hàng</button>
                         </div>
                </div>
            </div>
            
        </div>
    </div>
    </section>
    
    <section>
        <div class="hinhthucthanhtoan">
                <div class="form-thanhtoan">
                    <span>Hình thức thanh toán</span>
                    <div class="form-thanhtoan">
                        <label id="label-thanhtoan">
                            <span class="tick">
                                <input class="css-1m9pwf3" name="pttt" type="radio" value="1" id="pttt1" checked>
                            </span>
                            <span class="info-httt">
                                <div class="img-infott">
                                    <img class="imgtt" src="layout/img/fixed/tienmat.jpg">
                                    <div class="info-tt">
                                        <p style="margin: 0px;">Cod</p>
                                        <p style="margin: 0px;">Thanh toán khi nhận hàng</p>
                                    </div>    
                                </div>
                            </span>
                        </label>

                        <label id="label-thanhtoan">
                            <span class="tick">
                                <input class="css-1m9pwf3" name="pttt" type="radio" value="2" id="pttt2" >
                            </span>
                            <span class="info-httt">
                                <div class="img-infott">
                                    <img class="imgtt" src="layout/img/fixed/momo.jpg">
                                    <div class="info-tt">
                                        <p style="margin: 0px;">Thanh toán bằng ví MOMO</p>
                                    </div>    
                                </div>
                            </span>
                        </label>

                        <label id="label-thanhtoan">
                            <span class="tick">
                                <input class="css-1m9pwf3" name="pttt" type="radio" value="3" id="pttt3" >
                            </span>
                            <span class="info-httt">
                                <div class="img-infott">
                                    <img class="imgtt" src="layout/img/fixed/vnpay.jpg">
                                    <div class="info-tt">
                                        <p style="margin: 0px;"> Qua VNPay Thẻ ATM / Tài khoản ngân hàng</p>
                                    </div>    
                                </div>
                            </span>
                        </label>
                    </div>
                </div>
        </div>    
    </section>
</form>
<script src="layout/js/address.js"></script>