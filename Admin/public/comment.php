

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bình luận</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Bình luận</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  
    <section class="content">
        <div class="container-fluid">
           
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
                                        <th scope="col">Họ tên khách hàng</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Ngày bình luận</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        $tt0='Chưa xét duyệt';
                                        $tt1='Đã xét duyệt';
                                        $tt2='Đã ẩn';
                                        $hidden='';
                                        foreach ($comment_list as $item) {
                                            extract($item);
                                            
                                            $accept="<a href='index.php?page=accept&id=".$id."' >Duyệt</a>";

                                            if($trangthai==0){
                                                $duyet=$tt0;
                                            }elseif($trangthai==1){
                                                $duyet=$tt1;
                                                $hidden="<a href='index.php?page=hidden&id=".$id."' onclick='toggleVisibility()' id='commentLink' >Ẩn</a>";

                                            }else{
                                                $duyet=$tt2;
                                                $hidden="<a href='index.php?page=hidden&id=".$id."' onclick='toggleVisibility()' id='commentLink' >Hiện</a>";

                                            }
                                            
                                            $del="<a href='index.php?page=delete&id=".$id."'>Xóa</a>";
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$hoten.'</td>
                                                    <td>'.$tensp.'</td>
                                                    <td>'.$noidung.'</td>
                                                    <td>'.$ngaybl.'</td>
                                                    <td>'.$duyet.'</td>
                                                    <td>'.$accept.' - '.$hidden.' - '.$del.'</td>
                                                </tr>
                                                ';
                                                $i++;
                                                
                                        }                                        
                                        $_SESSION['cmt'] = $i-1;   
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
<!-- JavaScript -->
<script>
function toggleVisibility() {
    var link = document.getElementById('commentLink');

    if (link.innerHTML === 'Ẩn') {
        // Thực hiện các hành động khi click vào 'Ẩn'
        link.innerHTML = 'Hiện';
    } else {
        // Thực hiện các hành động khi click vào 'Hiện'
        link.innerHTML = 'Ẩn';
    }
}

</script>