<?php
     function get_dssp($search,$iddm){
      $sql = "SELECT * FROM sanpham WHERE 1";
      if($iddm>0){
          $sql .=" AND iddm=".$iddm ;
      }
      if($search !=""){
          $sql .=" AND tensp like '%".$search."%'";
      }
      $sql .= " ORDER BY view DESC limit 12";
      return pdo_query($sql);
    }
    function get_dssp_lienquan($iddm,$id){
      $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY id DESC limit 4";
      return pdo_query($sql,$iddm,$id);
  }  
  function sp_dexuat($limi){
    $sql= "SELECT * FROM sanpham WHERE trangthai=3 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
    function sp_new($limi){
        $sql= "SELECT * FROM sanpham WHERE trangthai=2 ORDER BY id DESC limit ".$limi;
        return pdo_query($sql);
    }

    function sp_view($limi){
        $sql= "SELECT * FROM sanpham WHERE view>1000 ORDER BY id DESC limit ".$limi;
        return pdo_query($sql);
    }

    function sp_bestseler($limi){
        $sql= "SELECT * FROM sanpham WHERE trangthai=1 AND view>1000 ORDER BY id DESC limit ".$limi;
        return pdo_query($sql);
    }
    function get_details($id){
      $sql = "SELECT * FROM sanpham WHERE id=?";
      return  pdo_query_one($sql,$id);
  }  
  
  function showsp($dssp){
    $html_dssp = "";
    foreach ($dssp as $sp) {
        extract($sp);
        $sell_vnd = number_format($khuyenmai , 0, ',', '.');
        $giagoc_vnd = number_format($giasp , 0, ',', '.');

        if($trangthai == 1){
            $best = '<img class="new" src="layout/img/product/iconbest.png" alt="">';
            // sp bestseller
        } else if ($trangthai == 2 || $trangthai == 3) {
            $best = '<img class="new" src="layout/img/product/iconnew.png" alt="">';
            // sp new
        } else {
            // sp thường 
            $best = '';
        }

        if($khuyenmai > 0 && $giasp > 0){
            $sell = '<span>'.number_format($khuyenmai , 0, ',', '.').'</span>';
            $giagoc = '<h4 class="sell">'.$giagoc_vnd.' ₫</h4>';
            // gia sell
        } else {
            // gia thường 
            $sell = "";
            $giagoc = '<h4>'.$giagoc_vnd.' ₫</h4>';
        }

        $html_dssp .= '
        <div class="pro">
            <a href="index.php?page=details&id='.$id.'">
                '.$best.'
                <img class="img" src="layout/img/product/'.$hinhanh.'" alt="">
                <div class="des">
                    <span><i class="bx bxs-show"></i> '.$view.'</span>
                    <h5>'.$tensp.'</h5>
                    <div class="star">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <span class="price">
                        '.$giagoc.'
                        '.$sell.'
                    </span>
                </div>
            </a>
            <form action="index.php?page=addcart" method="post"">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="tensp" value="'.$tensp.'">
                <input type="hidden" name="hinhanh" value="'.$hinhanh.'">
                <input type="hidden" name="sell" value="'.$sell_vnd.'">
                <input type="hidden" name="giagoc" value="'.$giagoc_vnd.'">
                <input type="hidden" name="soluong" value="1">
                <button type="submit"  name="addcart"> 
                    <i class="bx bx-cart-add cart"></i> 
                </button>
                
            </form>
            
        </div>';
    }
    return $html_dssp;
}

        // ================================ADMIN=======================================
        function get_products($iddm=0)
    {
        $sql = "SELECT * FROM sanpham WHERE 1";
        if($iddm>0){
            $sql.="  AND iddm=".$iddm;
        }
        $sql.="  ORDER BY id DESC";
        return pdo_query($sql);
    }
    
    function getproductdetail($id){
        $sql = "SELECT * FROM sanpham WHERE id=".$id;
        return pdo_query_one($sql);
    }
    function getiddm($idproduct){
        $sql = "SELECT iddm FROM sanpham WHERE id=".$idproduct;
        return pdo_query_value($sql);
    }

    //admin
    function update_product($hinhanh,$tensp,$giasp,$khuyenmai,$view,$trangthai,$mota,$size,$mausac,$id){
        if($hinhanh!=""){
            $sql="UPDATE sanpham SET hinhanh='$hinhanh', tensp='$tensp', giasp='$giasp', khuyenmai='$khuyenmai', view='$view', trangthai='$trangthai', mota='$mota', size='$size', mausac='$mausac' WHERE id=".$id;
        }else{
            $sql="UPDATE sanpham SET  tensp='$tensp', giasp='$giasp', khuyenmai='$khuyenmai', view='$view', trangthai='$trangthai', mota='$mota', size='$size', mausac='$mausac'
             WHERE id=".$id;
        }
        
        pdo_execute($sql);
        
    }
    

    function get_ten_file_hinh($id){
        $sql = "SELECT hinhanh FROM sanpham WHERE id=".$id;
        $ten_file_hinh=pdo_query_one($sql);
        extract($ten_file_hinh);
        return $img;
    }
    function delete_product($id){
        $sql="DELETE FROM sanpham WHERE id=".$id;
        pdo_execute($sql);
            $tb="Xóa thành công!";
        return $tb;
    }
    function add_product($hinhanh,$tensp,$giasp,$khuyenmai,$view,$trangthai,$mota,$size,$mausac,$iddm){
        $sql= "INSERT INTO sanpham(hinhanh,tensp,giasp,khuyenmai,view,trangthai,mota,size,mausac,iddm) 
        VALUES ('$hinhanh','$tensp','$giasp','$khuyenmai','$view','$trangthai','$mota','$size','$mausac','$iddm')";
        pdo_execute($sql);
    }
    function check_sp($name, $danhmuc_id) {
        // Thực hiện truy vấn để kiểm tra xem danh mục đã tồn tại hay chưa
        $sql = "SELECT * FROM sanpham WHERE tensp = ? AND iddm = ? ";
        

        $result = pdo_query($sql, $name, $danhmuc_id);

        // Nếu có kết quả trả về, tức là danh mục đã tồn tại
        if ($result && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
     // ================================ADMIN=======================================
?>
