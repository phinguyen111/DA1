
    <?php
       extract($productgone);
       $idupdate=$id;
       $hinhcu=$hinhanh;
       if($hinhanh!=""){
           $hinhanh=IMG_PATH_ADMIN.$hinhanh;
           if(file_exists($hinhanh)){
               $hinh="<br><img src='".$hinhanh."' width='160'>";
           }else{
               $hinh="";
           }
       }
        
        $productid=$id;
        $productimg=$hinhanh;
       

        // load danh sach catalog 
        $select_html='';
        foreach ($danhmuc_list as $item) {
            extract($item);
            if($id==$iddm){
                $slc="selected";
            }else{
                $slc="";
            }
            $select_html.='<option value="'.$id.'" '. $slc.'>'.$tendm.'</option>';
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <section class="content">    
        <form action="index.php?page=updateproduct" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Danh mục</label>
                    <select name="iddm" class="form-control">
                        <?=$select_html?>
                    </select>
                    
                </div>
                
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Hình Ảnh</label>
                    <?=$hinh?><br><br>
                    <input type="file" name="img" >
                    
                    
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?=$tensp?>"  >                   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Giá</label>
                    <input type="text" class="form-control" name="giasp" value="<?=$giasp?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Khuyến mãi</label>
                    <input type="text" class="form-control" name="khuyenmai" value="<?=$khuyenmai?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">View</label>
                    <input type="text" class="form-control" name="view" value="<?=$view?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Trạng thái (0:thường - 1:bán chạy - 2:mới)</label>
                    <input type="text" class="form-control" name="trangthai" value="<?=$trangthai?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Mô tả</label>
                    <input type="text" class="form-control" name="mota" value="<?=$mota?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Size (S,M,XL,XXL)</label>
                    <input type="text" class="form-control" name="size" value="<?=$size?>"  >   
                </div>
                <div class="mb-3">
                    <label for="topic-name" class="col-form-label">Màu sắc</label>
                    <input type="text" class="form-control" name="mausac" value="<?=$mausac?>"   >
                    
                </div>
                

                
                
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id" value="<?=$idupdate?>">
                <input type="hidden" name="hinhcu" value="<?=$hinhcu?>">
                <input type="submit" class="btn btn-primary" name="btnupdate" value="Cập nhật">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nhập lại</button>

            </div>
        </form>
    </section>
</div>

       