<?php 
    session_start();
    ob_start();
    if (!isset($_SESSION['s_user']['role']) || $_SESSION['s_user']['role'] != 1) {
        header('location: login.php');
        exit();
    }
    

    require_once('global.php');
    require_once('../dao/pdo.php');
    require_once('../dao/product.php');
    require_once('../dao/catalog.php');
    require_once('../dao/user.php');
    require_once('../dao/binhluan.php');
    require_once('../dao/bill.php');
    require_once('../dao/mail.php');
    require_once('public/head.php');
    require_once('public/nav.php');
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                require_once('public/home.php');
                break;
            case 'categories':
                $danhmuc_list=get_danhmuc();
                
                require_once('public/categories.php');
                break;
                case 'add_dm':
                    if (isset($_POST['btnadd'])) {
                        $hinhanh = $_POST['img'];
                        $tendm = $_POST['name'];
                        $noidung = $_POST['noidung'];
                        $phancap = $_POST['phancap'];
                        $hienthi = $_POST['hienthi'];
                
                        // Kiểm tra xem danh mục đã tồn tại hay chưa
                        $check_dm = check_dm($tendm);
                
                        if ($check_dm) {
                            // Thông báo lỗi hoặc xử lý theo nhu cầu
                            $tb= "Danh mục đã tồn tại. Vui lòng thêm danh mục khác.";
                        } else {
                            // Thêm danh mục mới vào cơ sở dữ liệu
                            add_danhmuc($hinhanh, $tendm, $noidung, $phancap, $hienthi);
                            $tb= "Danh mục đã được thêm thành công.";
                        }
                    }
                    $danhmuc_list = get_danhmuc();
                    require_once('public/categories.php');
                    break;
                
            case 'del':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=delete_danhmuc($id);
                    
                }
                $danhmuc_list=get_danhmuc();
                require_once('public/categories.php');
                
                break;
            case 'update':
                
                if(isset($_POST['btnupdate'])&&$_POST['btnupdate']){
                    if(isset($_POST['id'])&&$_POST['id']>0){
                        $id=$_POST['id'];
                        $hinhanh=$_POST['img'];
                        $tendm=$_POST['name'];
                        $noidung=$_POST['noidung'];
                        $phancap=$_POST['phancap'];
                        $hienthi=$_POST['hienthi'];
                        set_danhmuc($id,$hinhanh,$tendm, $noidung, $phancap, $hienthi);
                        $danhmuc_list=get_danhmuc();
                        require_once('public/categories.php');
                    }
                
                }
                
                break;
            case 'updateform':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $danhmucone=get_danhmuc_one($id);
                    require_once('public/updateform.php');
                }else{
                    require_once('public/404.php');
                }
                
                break;
            
            case 'updateform_sp':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $danhmuc_list=get_danhmuc();
                    $produclist=get_products();
                    $id=$_GET['id'];
                    $productgone=getproductdetail($id);
                    require_once('public/updateform_sp.php');
                }else{
                    require_once('public/404.php');
                }
                
                break;
            case 'delproduct':
                if(isset($_GET['id'])&&$_GET['id']>0){          
                    $id=$_GET['id'];
                    // kiem tra sp có hình thì xóa
                    $ten_file_hinh=IMG_PATH_ADMIN.get_ten_file_hinh($id);
                    if(file_exists($ten_file_hinh)){
                        unlink($ten_file_hinh);
                    }
                    // xoa sp trong database
                    $tb=delete_product($id);
                    
                }
                // load dssp
                $produclist=get_products();
                header('location: index.php?page=products');
                break;
            case 'updateproduct':
                // LAY DU LIEU TU FORM
                if(isset($_POST['btnupdate'])){
                    $id=$_POST['id'];
                    // $iddm=$_POST['iddm'];
                    $tensp=$_POST['name'];
                    $giasp=$_POST['giasp'];
                    $khuyenmai=$_POST['khuyenmai'];
                    $view=$_POST['view'];
                    $trangthai=$_POST['trangthai'];
                    $mota=$_POST['mota'];
                    $size=$_POST['size'];
                    $mausac=$_POST['mausac'];
                    $hinhanh=$_FILES['img']['name'];
                     
                    // lay img
                    // $ten_file_hinh=$_FILES['img']['name'];
                    if($hinhanh!=""){
                        //upload len host
                        $target_file=IMG_PATH_ADMIN.basename($_FILES['img']['name']);
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                        // xoa hinh cu tren host
                        $hinh_cu=IMG_PATH_ADMIN.$_POST['hinhcu'];
                        if(file_exists($hinh_cu)) unlink($hinh_cu);
                        
                    }
                    //update len database
                    update_product($hinhanh,$tensp,$giasp,$khuyenmai,$view,$trangthai,$mota,$size,$mausac,$id);
                   
                    
                }
                // load dssp
                $produclist=get_products();
                header('location: index.php?page=updateproduct');
                //require_once('public/product.php');
                
                break;
            case 'addproduct':
                // LAY DU LIEU TU FORM
                if(isset($_POST['btnadd'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['name'];
                    $giasp=$_POST['giasp'];
                    $khuyenmai=$_POST['khuyenmai'];
                    $view=$_POST['view'];
                    $trangthai=$_POST['trangthai'];
                    $mota=$_POST['mota'];
                    $size=$_POST['size'];
                    $mausac=$_POST['mausac'];
                    $hinhanh=$_FILES['img']['name'];

                    $check_sp = check_sp($tensp, $iddm);
                
                        if ($check_sp) {
                            // Thông báo lỗi hoặc xử lý theo nhu cầu
                            $tb= "Sản phẩm đã tồn tại. Vui lòng thêm sản phẩm khác.";
                        } else {
                            //them vao database
                            add_product($hinhanh,$tensp,$giasp,$khuyenmai,$view,$trangthai,$mota,$size,$mausac,$iddm);
                            $tb= "Sản phẩm đã được thêm thành công.";
                        }
                     //upload anh
                    $target_file=IMG_PATH_ADMIN.$hinhanh;
                    move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                    
                }
                // load dssp
                $produclist=get_products();
                header('location: index.php?page=updateproduct');
                //require_once('public/product.php');
                
                break;
                
            case 'products':
                // load pro
                $danhmuc_list=get_danhmuc();
                $produclist=get_products();
                
                require_once('public/product.php');
                break;
            case 'user':
                // load user
                $user_list=get_user();
                
                require_once('public/user.php');
                break;
            case 'updateform_user':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $userone=get_user_one($id);
                    require_once('public/updateuser.php');
                }else{
                    require_once('public/404.php');
                }
                
                break;
            case 'updateuser':
            
                if(isset($_POST['btn_update'])&&$_POST['btn_update']){
                    if(isset($_POST['id'])&&$_POST['id']>0){
                        $id=$_POST['id'];
                        $hoten=$_POST['name'];
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $email=$_POST['email'];
                        $diachi=$_POST['diachi'];
                        $dienthoai=$_POST['dienthoai'];
                        $role=$_POST['role'];
                        set_user($id,$hoten,$username, $password, $email, $diachi, $dienthoai, $role);
                        $user_list=get_user();
                        require_once('public/user.php');
                    }
                    
                }
                
                break;
            case 'deluser':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=delete_user($id);
                    
                }
                $user_list=get_user();
                require_once('public/user.php');
                
                break;
            case 'add_user':
                if(isset($_POST['btnadd_user'])){
                    $hoten=$_POST['name'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $email=$_POST['email'];
                    $diachi=$_POST['diachi'];
                    $dienthoai=$_POST['dienthoai'];
                    $role=$_POST['role'];

                    // Kiểm tra xem danh mục đã tồn tại hay chưa
                    $checkUser = checkUser($username);
                
                    if ($checkUser) {
                        // Thông báo lỗi hoặc xử lý theo nhu cầu
                        $tb= "Tài khoản đã tồn tại. Vui lòng thêm tài khoản khác.";
                    } else {
                        // Thêm user mới vào cơ sở dữ liệu
                        add_user($hoten,$username, $password, $email, $diachi, $dienthoai, $role);
                        $tb= "Tài khoản đã được thêm thành công.";
                    }
                    
                }
                $user_list=get_user();
                require_once('public/user.php');
                break;
            case 'comment':
                // load danh sach cmt
                $comment_list=get_cmt();                
                require_once('public/comment.php');
                break;
            case 'accept':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=up_trangthai($id);                   
                }
                $comment_list=get_cmt(); 
                require_once('public/comment.php');                
                break;
            case 'hidden':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=hid_trangthai($id);                   
                }
                $comment_list=get_cmt(); 
                require_once('public/comment.php');                
                break;
            case 'delete':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=delete_cmt($id);
                    
                }
                $comment_list=get_cmt(); 
                require_once('public/comment.php');         
                
                break;
            case 'bill':
                // load bill
                $bill_list=get_bill();               
                require_once('public/bill.php');
                break;
            case 'trangthai':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $id=$_GET['id'];
                    $tb=trangthai($id);                   
                }
                $bill_list=get_bill();   
                require_once('public/bill.php');                
                break;
            case 'mail':
                // load mail
                $mail_list=get_mail();               
                require_once('public/mail.php');
                break;
            case 'config':
                // load mail
                
                require_once('config.php');
                break;
            
            case 'thoat':
                if(isset($_SESSION['role'])) unset($_SESSION['role']);
                header('location: login.php');
                
                
                break;
            default:
                require_once('public/404.php');
        }
    }else{
        require_once('public/home.php');
    }
 
    require_once('public/footer.php');
    
?>