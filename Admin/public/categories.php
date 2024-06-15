


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
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
                    Thêm danh mục
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
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Tên Danh mục</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">STT</th>
                                        <th scope="col">Hiển thị</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;

                                        foreach ($danhmuc_list as $item) {
                                            extract($item);
                                            $edit="<a href='index.php?page=updateform&id=".$id."'>Sửa</a>";
                                            $del="<a href='index.php?page=del&id=".$id."'>Xóa</a>";
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td><img src="'.IMG_PATH_ADMIN.$hinhanh.'" width="80"></td>
                                                    <td>'.$tendm.'</td>  
                                                    <td>'.$noidung.'</td>
                                                    <td>'.$parent.'</td>
                                                    <td>'.$hienthi.'</td>
                                                    <td>'.$edit.' - '.$del.'</td>
                                                </tr>
                                                ';
                                                $i++;

                                                
                                        }                                        
                                        $_SESSION['cata'] = $i-1;   
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
        extract($danhmuc_list);
        if($hinhanh!=""){
            $hinhanh='../'.IMG_PATH_ADMIN.$hinhanh;
            if(file_exists($hinhanh)){
                $hinh="<br><img src='fixed/".$hinhanh."' width='120'>";
            }else{
                $hinh="";
            }
        }
    ?>
    

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm danh mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=add_dm" name="addCatalogForm" method="POST" onsubmit="return validateForm()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Hình Ảnh</label>
                        <input type="file" name="img" id="imgInput" >
                        <?=$hinh?><br>
                        <div id="imgError" style="color: red;"></div>
                        <label for="topic-name" class="col-form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name"   placeholder="Tên danh mục">
                        <label for="topic-name" class="col-form-label">Nội dung</label>
                        <input type="text" class="form-control" name="noidung"   placeholder="Nội dung">
                        <label for="topic-name" class="col-form-label">STT</label>
                        <input type="text" class="form-control" name="phancap"   placeholder="STT">
                        <label for="topic-name" class="col-form-label">Hiển thị <i style="color: red;" >( 0: Trang chủ - 1: Không hiển thị)</i> </label>
                        <input type="text" class="form-control" name="hienthi"   placeholder="Hiển thị">
                    </div>
                   
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="btnadd" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function validateImage() {
        var fileInput = document.getElementById('imgInput');
        var imgError = document.getElementById('imgError');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            imgError.innerHTML = "Định dạng không hợp lệ. Chỉ chấp nhận định dạng JPG, JPEG, PNG.";
            fileInput.value = ''; // Xóa giá trị của input file nếu định dạng không hợp lệ
            return false;
        } else {
            imgError.innerHTML = ""; // Reset thông báo lỗi nếu định dạng hợp lệ
            return true;
        }
    }

    // Hàm kiểm tra toàn bộ form trước khi submit
    function validateForm() {
        // Thêm các kiểm tra khác nếu cần
        // Lấy giá trị từ các trường input
        var name = document.forms["addCatalogForm"]["name"].value;
        var img = document.forms["addCatalogForm"]["img"].value;
        var noidung = document.forms["addCatalogForm"]["noidung"].value;
        var phancap = document.forms["addCatalogForm"]["phancap"].value;
        var hienthi = document.forms["addCatalogForm"]["hienthi"].value;

        // Kiểm tra nếu trường input trống, hiển thị thông báo
        
        if (img == "") {
            alert("Vui lòng chọn hình danh mục.");
            return false;
        }
        if (name == "") {
            alert("Vui lòng nhập tên danh mục.");
            return false;
        }
        if (noidung == "") {
            alert("Vui lòng nhập nội dung.");
            return false;
        }
        if (phancap == "") {
            alert("Vui lòng chọn thứ tự hiển thị.");
            return false;
        } 

        if (hienthi == "") {
            alert("Vui lòng chọn hiển thị ở trang chủ.");
            return false;
        } 

        // Nếu các trường input đều hợp lệ, cho phép submit
       
        return validateImage();
    }
    
    
    
</script>