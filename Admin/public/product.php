<?php
// load danh sach catalog 
$select_html='';
foreach ($danhmuc_list as $item) {
    extract($item);
    
    $select_html.='<option value="'.$id.'" >'.$tendm.'</option>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">sản phẩm</li>
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
                    Thêm sản phẩm
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
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Khuyến mãi</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Màu sắc</th>                                      
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        $tt0='Sản phẩm thường';
                                        $tt1='Sản phẩm bán chạy';
                                        $tt2='Sản phẩm mới';

                                        foreach ($produclist as $item) {
                                            extract($item);
                                            if($trangthai==0){
                                                $trangthai=$tt0;
                                            }elseif($trangthai==1){
                                                $trangthai=$tt1;

                                            }else{
                                                $trangthai=$tt2;

                                            }
                                            // if($img!=""){
                                            //     $img='../'.PATH_IMG.$img;
                                            // }
                                            $edit="<a href='index.php?page=updateform_sp&id=".$id."'>Sửa</a>";
                                            $del="<a href='index.php?page=delproduct&id=".$id."'>Xóa</a>";
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td><img src="'.IMG_PATH_ADMIN.$hinhanh.'" alt="'.$tensp.'" width="80"></td>
                                                    <td>'.$tensp.'</td> 
                                                    <td>'.$giasp.'</td>  
                                                    <td>'.$khuyenmai.'</td>  
                                                    <td>'.$view.'</td>  
                                                    <td>'.$trangthai.'</td>  
                                                    <td>'.$mota.'</td>  
                                                    <td>'.$size.'</td>  
                                                    <td>'.$mausac.'</td>  
                                                    <td>'.$edit.' - '.$del.'</td>
                                                </tr>';
                                                $i++;
                                        }
                                        $_SESSION['pro'] = $i-1;   
                                    ?>
                               
                                
                                </tbody>
                                
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="index.php?page=addproduct" name="addProductForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Danh mục</label>
                    <select name="iddm" class="form-control">
                        <?=$select_html?>
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Hình sản phẩm</label>
                    <input type="file" name="img" id="imgInput" >  
                    <div id="imgError" style="color: red;"></div>
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Giá</label>
                    <input type="text" class="form-control" name="giasp"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Khuyến mãi</label>
                    <input type="text" class="form-control" name="khuyenmai"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">View</label>
                    <input type="text" class="form-control" name="view"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Trạng thái</label>
                    <input type="text" class="form-control" name="trangthai" value="Sản phẩm mới" readonly >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mota"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Size</label>
                    <!-- <input type="text" class="form-control" name="size"  >    -->
                    <select name="size" class="form-control">
                        <option  >S</option>
                        <option  >M</option>
                        <option  >XL</option>
                        <option  >XXL</option>
                    </select>
                    
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Màu sắc</label>
                    <input type="text" class="form-control" name="trangthai"   >
                    
                </div>
                

                
                
            </div>
            <div class="modal-footer justify-content-between">
                
                <input type="submit" class="btn btn-primary" name="btnadd" value="Thêm mới">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nhập lại</button>

            </div>
        </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- <script>
    function validateImage() {
        var fileInput = document.getElementById('imgInput');
        var imgError = document.getElementById('imgError');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            imgError.innerHTML = "Định dạng không hợp lệ. Chỉ chấp nhận định dạng JPG, JPEG, PNG.";
            fileInput.value = '';
            return false;
        } else {
            imgError.innerHTML = "";
            return true;
        }
    }

    function validateForm() {
        var fields = ["name", "img", "giasp", "mota", "size", "mausac"];

        for (var i = 0; i < fields.length; i++) {
            var fieldValue = document.forms["addProductForm"][fields[i]].value;
            if (fieldValue == "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return false;
            }
        }

        return validateImage();
    }
</script> -->

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




    // Hàm kiểm tra trạng thái trường input và hiển thị thông báo
    function validateForm() {
        // Lấy giá trị từ các trường input
        var name = document.forms["addProductForm"]["name"].value;
        var img = document.forms["addProductForm"]["img"].value;
        var giasp = document.forms["addProductForm"]["giasp"].value;
        var trangthai = document.forms["addProductForm"]["trangthai"].value;
        var mota = document.forms["addProductForm"]["mota"].value;
        var size = document.forms["addProductForm"]["size"].value;
        var mausac = document.forms["addProductForm"]["mausac"].value;

        // Kiểm tra nếu trường input trống, hiển thị thông báo
        
        if (img == "") {
            alert("Vui lòng chọn hình sản phẩm.");
            return false;
        }
        if (name == "") {
            alert("Vui lòng nhập tên sản phẩm.");
            return false;
        }
        if (giasp == "") {
            alert("Vui lòng nhập giá sản phẩm.");
            return false;
        }
        if (trangthai == "") {
            alert("Vui lòng nhập trạng thái sản phẩm.");
            return false;
        }
        if (mota == "") {
            alert("Vui lòng nhập mô tả sản phẩm.");
            return false;
        }
        if (size == "") {
            alert("Vui lòng chọn size phẩm.");
            return false;
        }
        if (mausac == "") {
            alert("Vui lòng nhập màu sắc phẩm.");
            return false;
        }

        // Nếu các trường input đều hợp lệ, cho phép submit
        return validateImage();
    }
    
</script>