<?php
function show_bl($idsp) {
    $sql = "SELECT * FROM comment WHERE trangthai = 0 AND idsp = ? ORDER BY id DESC";
    return pdo_query_all($sql, array($idsp));
}



function get_namsp($idsp)
{
    $sql = "SELECT tensp FROM sanpham WHERE id = ?";
    return pdo_query_value($sql, $idsp);
}

function insert_bl($iduser, $name, $idsp, $noidung, $tensp)
{
    $currentDateTime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comment (iduser, name, idsp, noidung, tensp, ngaybl) VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute($sql, array($iduser, $name, $idsp, $noidung, $tensp, $currentDateTime));
}


function get_cmt()
{
    $sql = "SELECT comment.id, comment.noidung, comment.ngaybl, comment.trangthai, user.hoten AS hoten, sanpham.tensp AS tensp
            FROM comment
            JOIN user ON comment.iduser = user.id
            JOIN sanpham ON comment.idsp = sanpham.id";
    return pdo_query_all($sql);
}

function up_trangthai($id)
{
    $sql = "UPDATE comment SET trangthai = 1 WHERE id = ?";
    pdo_execute($sql, array($id));
    return "Duyệt thành công!";
}

function hid_trangthai($id)
{
    $sql = "UPDATE comment SET trangthai = CASE WHEN trangthai = 1 THEN 2 ELSE 1 END WHERE id = ?";
    pdo_execute($sql, array($id));

    // Lấy giá trị mới của duyet từ cơ sở dữ liệu
    $sql_select = "SELECT trangthai FROM comment WHERE id = ?";
    $duyet = pdo_query_one($sql_select, $id)['trangthai'];
    if ($duyet == 1) {
        return "Hiện thành công!";
    } else {
        return "Ẩn thành công!";
    }
}

function delete_cmt($id)
{
    $sql = "DELETE FROM comment WHERE id = ?";
    pdo_execute($sql, array($id));
    return "Xóa thành công!";
}
?>