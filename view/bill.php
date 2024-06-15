<?php if (isset($get_bill)) { ?>
    <div id="vnt-content">
        <div class="paddAllPage">
            <div class="wrapperS">
                <div class="box_mid">
                    <div class="mid-title">
                        <div class="titleL">
                            <h1>ĐẶT HÀNG THÀNH CÔNG</h1>
                        </div>
                        <div class="titleR"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="mid-content">
                        <div class="block-tracking-order">
                            <div class="boxManagerTitle">
                                <div class="code"> <?= $madh ?> - <span>Vui lòng lưu trữ để xem thông tin đơn hàng</span></div>
                                <div class="txt">Ngày đặt hàng: <?= $date ?></div>
                            </div>

                            <div class="orderManager">
                                <div class="statusBar">
                                    <ul>
                                        <li class="active active-last">Đang chờ xử lý</li>
                                        <li>Đang Soạn Hàng</li>
                                        <li>Đã hoàn tất</li>
                                        <li>Hủy Đơn Hàng</li>
                                    </ul>
                                </div>
                                <div class="statusTable">
                                    <table>

                                        <tr>
                                            <th><?= $date ?></th>
                                            <td>Đang chờ xử lý</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="infoAcoount" id="info-order">

                                <div class="lstInfoSDP">
                                    <div class="itemCol">
                                        <div class="itemColInfo">
                                            <div class="title">THÔNG TIN NGƯỜI NHẬN </div>
                                            <div class="content">
                                                <p><strong>Tên người nhận</strong> <span><?= $hoten ?></span></p>
                                                <p><strong>Số điện thoại</strong> <span><?= $sdt ?></span></p>
                                                <p><strong>Email</strong> <span><?= $email ?></span></p>
                                                <p><strong>Địa chỉ nhận hàng</strong> <span><?= $ghichu ?> <?= $diachi ?></span></p>
                                                <p><strong>Ghi chú</strong> <span><?= $ghichu ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="itemCol">
                                        <div class="itemColInfo">
                                            <div class="title">VẬN CHUYỂN VÀ THANH TOÁN</div>
                                            <div class="content">
                                                <div class="info-shipping">
                                                    <p><b>Giao Hàng Tận Nơi </b></p>
                                                    <p>Phí vận chuyển: <?= number_format($ship, 0, ',', '.') ?> đ</p>
                                                </div>
                                                <div class="info-payment" style="margin-top: 10px;">
                                                    <p><b>Thanh toán khi nhận hàng (COD)</b></p>
                                                    <p>
                                                    <p>Cảm ơn quý khách đã mua sắm tại Oldsailor.com.vn</p>

                                                    <p>**Lưu ý: Mã giảm giá không áp dụng cho các sản phẩm đang khuyến mãi</p>

                                                    <p>Để ship nhanh trong ngày, vui lòng gọi (028) 36 222 000 để được hướng dẫn</p>
                                                    <p>&nbsp;</p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemCol" style="display:none">
                                        <div class="itemColInfo">
                                            <div class="title">Xuất hóa đơn công ty</div>
                                            <div class="content">
                                                <p><strong>Tên công ty:</strong> </p>
                                                <p><strong>Địa chỉ công ty:</strong> </p>
                                                <p><strong>Mã số thuế:</strong> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemCol" style="display:none">
                                        <div class="itemColInfo">
                                            <div class="title">Gửi quà tặng đến bạn bè, người thân</div>
                                            <div class="content">
                                                <p>Gửi từ : <strong>:</strong> - Đến : <b></b></p>
                                                <p>Lời nhắn: </p>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="boxAllPM boxAllPMBd">
                                    <div class="boxAllTil">
                                        <div class="title">THÔNG TIN GIỎ HÀNG</div>
                                    </div>
                                    <div class="boxAllConte">
                                        <?php
                                        $html_bill = '';
                                        foreach ($get_bill as $item) {
                                            extract($item);
                                            $html_bill .= '<div class="lstProtable">
                                                    <div class="productLeft">
                                                        <div class="img">
                                                            <a href="index.php?page=details&id=' . $id . '">
                                                                <img src="layout/img/product/' . $img . '" alt="" >
                                                            </a>
                                                        </div>
                                                        <div class="ifo">
                                                            <div class="i-title">' . $name . '</div>
                                                            <div class="i-options"> 
                                                                <div class="i-color"> <span>Màu:</span> </div>
                                                                <div class="i-size"> <span>Size: </span> 43</div>
                                                                <div class="i-quality"> <span>Số lượng: </span> ' . $soluong . '</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="priceRight">
                                                        <div class="i-price-sale">' . number_format($thanhtien, 0, ',', '.') . '  đ</div>
                                                    </div>
                                                </div>';
                                            echo $html_bill;
                                        }
                                        ?>
                                        <div class="boxPayment">
                                            <div class="boxPaymentL">
                                            </div>
                                            <div class="boxPaymentR">

                                                <div class="total_cart">
                                                    <div class="content_1">

                                                        <div class="row_info">
                                                            <div class="item_1">
                                                                <div class="row_left">Tổng giỏ hàng: </div>
                                                                <div class="total_price tt"><span id="ext_cart_total"><?= number_format($tongdonhang, 0, ',', '.') ?></span></div>
                                                            </div>
                                                            <div class="item_1">
                                                                <div class="row_left">Phí vận chuyển :</div>
                                                                <div class="total_price gg"><span id="ext_s_price"><?= number_format($ship, 0, ',', '.') ?> đ</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="row_total">
                                                            <div class="item_1">
                                                                <div class="row_left">Tổng cộng:</div>
                                                                <div class="total_price tt"><span id="ext_total_price"><?= number_format($tongthanhtoan, 0, ',', '.') ?> đ</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="boxbtnPage">
                                    <div class="btnCal"><button type="button">
                                            <span>Mua Thêm</span>
                                        </button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

    <section>
        <div id="cartnull">
            <div class="icon-cartnull"></div>
            <div class="info-cartnull">Không có đơn hàng , vui lòng chọn sản phẩm</div>

        </div>
        <a href="index.php?page=sanpham" id="buy-now">
            <button class="buy-now">Mua ngay</button>
        </a>
    </section>

<?php } ?>