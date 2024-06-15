<?php
    function showdm($limi){
        $sql ="SELECT * FROM danhmuc WHERE hienthi=6 limit ".$limi;
        return pdo_query($sql);
    }
    
    function get_iddm($id){
        $sql = "SELECT iddm FROM sanpham WHERE id=?";
        return pdo_query_value($sql,$id);
    }

    function get_namedm($id){
        $sql = "SELECT tendm FROM danhmuc WHERE id=? ";
        return pdo_query_value($sql,$id);
    }

    function showparent(){
        $sql ="SELECT * FROM danhmuc WHERE hienthi=6 AND id<>6 ";
        return pdo_query($sql);
    }

    function dm_all($showdm){
        $html_dm="";
        foreach ($showdm as $dm) {
            extract($dm);
            $html_dm.= '
            <a href="index.php?page=sanpham&iddm='.$id.'">
            <div class="img">
                <div class="list-shop">
                    <div class="icon-shop">
                        <img src="layout/img/fixed/'.$hinhanh.' "  alt="">
                        <p>'.$tendm.'</p>
                    </div>
                    <div class="name-sp">
                        <p>'.$noidung.'</p>
                    </div>
                </div>
            </div>
            </a>
            ';
          }
          return $html_dm;
    }
?>