
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chuyên mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
        extract($userone);
        $productid=$id;
    ?>
    <section class="content">    
        <form action="index.php?page=updateuser" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    
                    <label for="topic-name" class="col-form-label">Họ tên:</label>
                    <input type="text" class="form-control" name="name" value="<?=$hoten?>"  >
                    <label for="topic-name" class="col-form-label">Tài khoản:</label>
                    <input type="text" class="form-control" name="username" value="<?=$username?>"  >
                    <label for="topic-name" class="col-form-label">Mật khẩu:</label>
                    <input type="text" class="form-control" name="password" value="<?=$password?>"  >
                    <label for="topic-name" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?=$email?>"  >
                    <label for="topic-name" class="col-form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" name="diachi" value="<?=$diachi?>"  >
                    <label for="topic-name" class="col-form-label">Điện thoại:</label>
                    <input type="text" class="form-control" name="dienthoai" value="<?=$dienthoai?>"  >
                    <label for="topic-name" class="col-form-label">Role:</label>
                    <input type="text" class="form-control" name="role" value="<?=$role?>" >
                    
                </div>
                
                
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id"value="<?=$productid?>">
                <input type="submit" class="btn btn-primary" name="btn_update" value="Cập nhật">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nhập lại</button>

            </div>
        </form>
    </section>
</div>

       