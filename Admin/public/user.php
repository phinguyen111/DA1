
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                    Thêm tài khoản
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <?php
                            if(isset($tb)){
                                echo "<h3 style='color:red; text-align:center; margin-top:20px' >".$tb."</h3>";
                            }
                        ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Họ tên</th>
                                        <th scope="col">Tài khoản</th>
                                        <th scope="col">Mật khẩu</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        
                                        foreach ($user_list as $item) {
                                            extract($item);
                                            $edit="<a href='index.php?page=updateform_user&id=".$id."'>Sửa</a>";
                                            $del="<a href='index.php?page=deluser&id=".$id."'>Xóa</a>";
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$hoten.'</td>  
                                                    <td>'.$username.'</td>
                                                    <td>'.$password.'</td>
                                                    <td>'.$email.'</td>
                                                    <td>'.$diachi.'</td>
                                                    <td>'.$dienthoai.'</td>
                                                    <td>'.$role.'</td>
                                                    <td>'.$edit.' - '.$del.'</td>
                                                </tr>
                                                ';
                                                $i++;                                               
                                        }   
                                        $_SESSION['user'] = $i-1;   
                                    ?>
                               
                                
                                </tbody>
                                <!-- <tfoot>

                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên chủ đề</th>
                                        <th scope="col">Chế độ</th>
                                        <th scope="col">Số lượng câu hỏi</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
        extract($user_list);
        
    ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=add_user" name="addUserForm" method="POST" onsubmit="return validateForm()">
                <div class="modal-body">
                    <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Họ tên</label>
                    <input type="text" class="form-control" name="name"  placeholder="Họ tên">
                    <label for="topic-name" class="col-form-label">Tài khoản</label>
                    <input type="text" class="form-control" name="username"   placeholder="Tài khoản">
                    <label for="topic-name" class="col-form-label">Mật khẩu</label>
                    <input type="text" class="form-control" name="password"   placeholder="Mật khẩu">
                    <label for="topic-name" class="col-form-label">Email</label>
                    <input type="text" class="form-control" name="email"   placeholder="Email">
                    <label for="topic-name" class="col-form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi"   placeholder="Địa chỉ">
                    <label for="topic-name" class="col-form-label">Điện thoại <i style="color: red;" >( 10 số)</i> </label> 
                    <input type="text" class="form-control" name="dienthoai"  placeholder="Điện thoại">
                    <label for="topic-name" class="col-form-label">Role <i style="color: red;" >( 0: user - 1: admin)</i> </label>
                    <input type="text" class="form-control" name="role"   placeholder="Vai trò">
                    </div>
                   
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="btnadd_user" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    // Hàm kiểm tra trạng thái trường input và hiển thị thông báo
    function validateForm() {
        // Lấy giá trị từ các trường input
        var name = document.forms["addUserForm"]["name"].value;
        var username = document.forms["addUserForm"]["username"].value;
        var password = document.forms["addUserForm"]["password"].value;
        var email = document.forms["addUserForm"]["email"].value;
        var diachi = document.forms["addUserForm"]["diachi"].value;
        var dienthoai = document.forms["addUserForm"]["dienthoai"].value;
        var role = document.forms["addUserForm"]["role"].value;

    function isEmailValid(email) {
        // Biểu thức chính quy để kiểm tra định dạng email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isPhoneNumberValid(phoneNumber) {
        // Biểu thức chính quy để kiểm tra số điện thoại
        var phoneRegex = /^\d{10}$/; // 10 chữ số
        return phoneRegex.test(phoneNumber);
    }

        // Kiểm tra nếu trường input trống, hiển thị thông báo
        if (name == "") {
            alert("Vui lòng nhập tên.");
            return false;
        }
        if (username == "") {
            alert("Vui lòng nhập tài khoản.");
            return false;
        }
        if (password == "") {
            alert("Vui lòng nhập mật khẩu.");
            return false;
        }
        if (email == "") {
            alert("Vui lòng nhập email.");
            return false;
        } else if (!isEmailValid(email)) {
            alert("Email không hợp lệ.");
            return false;
        }
        if (diachi == "") {
            alert("Vui lòng nhập địa chỉ.");
            return false;
        }
        if (dienthoai == "") {
            alert("Vui lòng nhập số điện thoại.");
            return false;
        } else if (!isPhoneNumberValid(dienthoai)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        if (role == "") {
            alert("Vui lòng chọn vai trò.");
            return false;
        } else if(role != 0 && role != 1) {
            alert("Vai trò không hợp lệ.");
            return false;
        }

        // Nếu các trường input đều hợp lệ, cho phép submit
        return true;
    }
</script>