<?php 
        function view_cart(){
            $html_cart="";
            $i=0;
            $stt=1;
        foreach ($_SESSION['giohang'] as $sp) {
            extract($sp);
            if($khuyenmai==0){
                $hienthi_gia = $giasp;
                $thanhtien= number_format((int)$giasp *(int)$soluong * 1000, 0, ',', '.');
            }else{
                $hienthi_gia = $khuyenmai;
                $thanhtien= number_format((int)$khuyenmai * (int)$soluong * 1000, 0, ',', '.');
            }
            $html_cart.= '
                <tr>
                    <td> '.$stt.' </td>
                    <td class="shoping__cart__item">
                        <img src="layout/img/product/'.$hinhanh.'" alt="">
                        '.$tensp.'
                    </td>
                    <td class="shoping__cart__price">
                        '.$hienthi_gia.' ₫
                    </td>
                    <td class="shoping__cart__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="number" value="'.$soluong.'" min="1" max="10">
                            </div>
                        </div>
                    </td>
                    <td class="shoping__cart__total">
                        '.$thanhtien.' ₫
                    </td>
                    <td class="shoping__cart__item__close">
                        <a href="index.php?page=delete&index='.$i.'">
                            <span class="icon_close">Xóa </span>
                        </a>
                    </td>
                    
                </tr> ';
           
            $stt++;$i++;
        } 
        return $html_cart;
        }

    function get_total_all() {
    $total_amount = 0;

    if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
        foreach ($_SESSION['giohang'] as $sp) {
            extract($sp);

            if($khuyenmai == 0){
                $total_amount += (int)$giasp * (int)$soluong * 1000;
            } else {
                $total_amount += (int)$khuyenmai * (int)$soluong * 1000;
            }
        }
    }
    return $total_amount;
    }

    function count_cart(){
        $count_cart=0;
        foreach ($_SESSION['giohang'] as $sp) {
            // Tính tổng số lượng sản phẩm trong giỏ hàng
            $count_cart += $sp['soluong'];
        }
        return $count_cart;
    }

?>
