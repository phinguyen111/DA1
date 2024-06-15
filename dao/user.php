<?php 
    function insert_dangky($hoten, $username, $dienthoai, $email, $password, $diachi = '') {
        $sql = "INSERT INTO user (hoten, username, dienthoai, email, password, diachi, reset_token) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return pdo_execute($sql, $hoten, $username, $dienthoai, $email, $password, $diachi, '');
    }
    function check_user($username,$password){
        $sql = "SELECT * FROM user WHERE username=? AND password=? ";
        return pdo_query_one($sql, $username,$password);
    }
    function update_user_info($id, $hoten, $dienthoai, $email) {
        $sql = "UPDATE user SET hoten = ?, dienthoai = ?, email = ? WHERE id = ?";
        return pdo_execute($sql, array($hoten, $dienthoai, $email, $id));
    }

   
    // =================================ADMIN=========================================
    function get_user(){
        $sql = "SELECT * FROM user  ORDER BY hoten ";
        return pdo_query($sql);
    }
    function get_user_one($id){
        $sql = "SELECT * FROM user WHERE id=".$id;
        return pdo_query_one($sql);
    }
    function set_user($id,$hoten,$username, $password, $email, $diachi, $dienthoai, $role){
        $sql="UPDATE user SET hoten='$hoten',username='$username',password='$password',email='$email',diachi='$diachi',dienthoai='$dienthoai',role='$role' WHERE id=".$id;
        pdo_execute($sql);
        
    }
    function delete_user($id){
        $sql="DELETE FROM user WHERE id=".$id;      
        pdo_execute($sql);
        $tb="Xóa thành công!";       
        return $tb;
    }
    function add_user($hoten,$username, $password, $email, $diachi, $dienthoai, $role){
        $sql= "INSERT INTO user(hoten,username,password,email,diachi,dienthoai,role) VALUES ('$hoten','$username','$password','$email','$diachi', '$dienthoai','$role')";
        pdo_execute($sql);
    }
    function checkUser($username, $password = null) {
        if ($password) {
            // kiểm tra user khi login
            $sql = "SELECT * FROM user WHERE username = ? AND password = ?";   
            return pdo_query_one($sql, $username,$password);
        } else {
            //  kiểm tra user khi thêm mới
            $sql = "SELECT * FROM user WHERE username = ?";
            $result = pdo_query($sql, $username);   
            // Nếu có kết quả trả về, tức là user đã tồn tại
            if ($result && count($result) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
        // =================================ADMIN=========================================

?>