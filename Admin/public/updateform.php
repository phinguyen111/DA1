
<?php
        extract($danhmucone);
        if($hinhanh!=""){
            $hinhanh=IMG_PATH_ADMIN.$hinhanh;
            if(file_exists($hinhanh)){
                $hinh="<br><img src='".$hinhanh."' width='120'>";
            }else{
                $hinh="";
            }
        }
        $productname=$tendm;
        $productid=$id;
        $productimg=$hinhanh;

        // load danh sach catalog 
        // $select_html='';
        // foreach ($danhmuc_list as $item) {
        //     extract($item);
        //     if($id==$iddm){
        //         $slc="selected";
        //     }else{
        //         $slc="";
        //     }
        //     $select_html.='<option value="'.$id.'" '. $slc.'>'.$tendm.'</option>';
        // }
    ?>
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
        extract($danhmucone);
        
    ?>
    <section class="content">    
        <form action="index.php?page=update" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Hình Ảnh:</label>
                    <img src="../upload/<?=$hinhanh?>" width="160"><br>
                    <input type="file" name="img" >
                    <br>
                    <label for="topic-name" class="col-form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="<?=$tendm?>"  placeholder="Tên danh mục">
                    <label for="topic-name" class="col-form-label">Nội dung</label>
                    <input type="text" class="form-control" name="noidung" value="<?=$noidung?>"  placeholder="Nội dung">
                    <label for="topic-name" class="col-form-label">STT</label>
                    <input type="text" class="form-control" name="phancap" value="<?=$parent?>"  placeholder="STT">
                    <label for="topic-name" class="col-form-label">Hiển thị <i style="color: red;" >( 0: Trang chủ - 1: Không hiển thị)</i></label>
                    <input type="text" class="form-control" name="hienthi" value="<?=$hienthi?>"  placeholder="Hiển thị">
                </div>
                
                
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id"value="<?=$productid?>">
                <input type="hidden" name="hinhcu"value="<?=$productimg?>">
                <input type="submit" class="btn btn-primary" name="btnupdate" value="Cập nhật">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nhập lại</button>

            </div>
        </form>
    </section>
</div>

       