<?php
    function get_danhmuc(){
        $sql = "SELECT * FROM danhmuc  ORDER BY tendm ";
        return pdo_query($sql);
    }

    function get_danhmuc_one($id){
        $sql = "SELECT * FROM danhmuc WHERE id=".$id;
        return pdo_query_one($sql);
    }
    function set_danhmuc($id,$hinhanh,$tendm, $noidung, $phancap, $hienthi){
        $sql="UPDATE danhmuc SET hinhanh='$hinhanh',tendm='$tendm',noidung='$noidung',parent='$phancap',hienthi='$hienthi' WHERE id=".$id;
        pdo_execute($sql);
        
    }
    function delete_danhmuc($id){
        $sql="DELETE FROM danhmuc WHERE id=".$id;
        $dssp=get_products($id);
        if(count($dssp)>0){
            $tb="Danh mục hiện có ".count($dssp)." sản phẩm. Bạn không được phép xóa!";
        }else{
            pdo_execute($sql);
            $tb="Xóa thành công!";
        }
        return $tb;
    }
    function add_danhmuc($hinhanh,$tendm, $noidung, $phancap, $hienthi){
        $sql= "INSERT INTO danhmuc(hinhanh,tendm,noidung,parent,hienthi) VALUES ('$hinhanh','$tendm', '$noidung', '$phancap', '$hienthi')";
        pdo_execute($sql);
    }
    // Hàm kiểm tra xem danh mục đã tồn tại hay chưa
    function check_dm($name) {
        // Thực hiện truy vấn để kiểm tra xem danh mục đã tồn tại hay chưa
        $sql = "SELECT * FROM danhmuc WHERE tendm = ?";
        

        $result = pdo_query($sql, $name);

        // Nếu có kết quả trả về, tức là danh mục đã tồn tại
        if ($result && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    

?>