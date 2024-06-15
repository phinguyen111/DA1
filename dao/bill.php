<?php 
    function insert_bill($conn, $iduser, $hoten, $sdt, $madh, $date, $email, $diachi, $ghichu, $tongdonhang, $ship, $voucher, $tongthanhtoan, $pttt){
        try {
            // Chuẩn bị truy vấn INSERT
            $sql = "INSERT INTO bill(iduser, hoten, sdt, madh, date, email, diachi, ghichu, tongdonhang, ship, voucher, tongthanhtoan, pttt) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Chuẩn bị và thực thi truy vấn INSERT
            $stmt = $conn->prepare($sql);
            $stmt->execute([$iduser, $hoten, $sdt, $madh, $date, $email, $diachi, $ghichu, $tongdonhang, $ship, $voucher, $tongthanhtoan, $pttt]);
    
            // Trả về ID của bản ghi vừa được thêm vào (idbill)
            return $conn->lastInsertId();
        } catch(PDOException $e) {
            throw $e;
        }
    }
    
    
    function info_order($madh){
        $sql = "SELECT * FROM bill WHERE madh=?  ORDER BY id";
        return pdo_query($sql,$madh);
    }
    function insert_cart_order($idsp, $idbill, $hinhanh, $tensp, $giasp, $soluong, $thanhtien, $trangthai = 0) {
        $sql = "INSERT INTO chitietbill(idsp, idbill, img, name, price, soluong, thanhtien, trangthai) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return pdo_execute($sql, [$idsp, $idbill, $hinhanh, $tensp, $giasp, $soluong, $thanhtien, $trangthai]);
    }

    function show_orderproduct($idbill){
        $sql = "SELECT * FROM chitietbill WHERE idbill=? ORDER BY id DESC";
        return pdo_query($sql,$idbill);
    }

    // =================================ADMIN======================================
    function get_bill(){
        $sql = "SELECT b.id, b.madh, b.date, b.hoten, b.sdt,b.diachi,b.tongdonhang, b.ship, b.voucher, 
        b.tongthanhtoan, b.pttt, b.trangthai, u.hoten, u.dienthoai
        FROM bill b
        JOIN user u ON b.iduser = u.id  ";
        return pdo_query($sql);
    }
    function trangthai($id){
        $sql="UPDATE bill SET trangthai = CASE WHEN trangthai = 0 THEN 1 ELSE 0 END  WHERE id=".$id;  
        pdo_execute($sql);
         // Lấy giá trị mới của trangthaidh từ cơ sở dữ liệu
        $sql_sel = "SELECT trangthai FROM bill WHERE id=".$id;
        $trangthai = pdo_query_one($sql_sel)['trangthai'];
        if ($trangthai == 0) {
            $tb = "Xác nhận thành công!";
        } else{
            $tb = "Huỷ thành công!";
        }
        return $tb;

    }


    function check_bill($madh){
        $sql = "SELECT * FROM bill WHERE madh = ?"; // Sử dụng prepared statement với :madh
        return pdo_query_one($sql, $madh); // Truyền thêm tham số $madh vào hàm pdo_query_one()
    }

    function check_pd_idbill($idbill){
        $sql ="SELECT * FROM chitietbill WHERE idbill = ?";
        return pdo_query($sql,$idbill);
    }
    
     // =================================ADMIN======================================

?>