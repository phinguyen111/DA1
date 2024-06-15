

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
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
                                        <th scope="col">Mã</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Tổng đh</th>
                                        <th scope="col">Ship</th>
                                        <th scope="col">Voucher</th>                                        
                                        <th scope="col">Tổng</th>
                                        <th scope="col">Pttt</th>
                                        <th scope="col">Trạng thái</th>                                   
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        $i=1;
                                        $t='Đã xác nhận';
                                        $t1='Đã huỷ';
                                        foreach ($bill_list as $item) {
                                            extract($item);
                                            if($trangthai==0){
                                                $trangthaidh=$t;
                                                $trangthai="<a href='index.php?page=trangthai&id=".$id."' onclick='toggleVisibility()' id='bill' '>Huỷ</a>";
                                            }else{
                                                $trangthaidh=$t1;
                                                $trangthai="<a href='index.php?page=trangthai&id=".$id."' onclick='toggleVisibility()' id='bill' '>Xác nhận</a>";
                                            }                                       
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$madh.'</td>
                                                    <td>'.$date.'</td>
                                                    <td>'.$hoten.'</td>
                                                    <td>'.$dienthoai.'</td>
                                                    <td>'.$diachi.'</td>
                                                    <td>'.$tongdonhang.'</td>
                                                    <td>'.$ship.'</td>
                                                    <td>'.$voucher.'</td>
                                                    <td>'.$tongthanhtoan.'</td>
                                                    <td>'.$pttt.'</td>                                                                                                
                                                    <td>'.$trangthaidh.'</td>
                                                    <td>'.$trangthai.'</td>
                                                </tr>
                                                ';
                                                $i++;
                                                
                                        }                                        
                                        $_SESSION['bill'] = $i-1;   
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
<script>
function toggleVisibility() {
    var link = document.getElementById('bill');

    if (link.innerHTML === 'Huỷ') {
        // Thực hiện các hành động khi click vào 'Xác nhận'
        link.innerHTML = 'Xác nhận';
    } else {
        // Thực hiện các hành động khi click vào 'Huỷ'
        link.innerHTML = 'Huỷ';
    }
}
</script>