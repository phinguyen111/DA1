<?php

function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=daaa;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function pdo_execute($sql, $params = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return true; // Thêm dòng này để trả về true nếu thực thi thành công
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage(); // Hiển thị thông báo lỗi
        return false; // Thêm dòng này để trả về false nếu có lỗi
    } finally {
        unset($conn);
    }
}



function pdo_execute_id($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: []; // Trả về mảng rỗng nếu không có kết quả
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_query_all($sql, $sql_args = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        foreach ($sql_args as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $value = $stmt->fetchColumn();
        return $value !== false ? $value : null; // Return null if no value is found
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

