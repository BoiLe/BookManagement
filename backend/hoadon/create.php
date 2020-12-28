<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if(isset($_POST['btnSave'])) 
{
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST    
    $mhd = $_POST['hd_mhd'];
    $tenkhachhang = $_POST['hd_tenkhachhang'];
    $ngaylap = $_POST['hd_ngaylap'];
    $tongtien = $_POST['hd_tongtien'];
    

    // Câu lệnh INSERT
    $sql = "INSERT INTO `hoadon` (MAHOADON, TENKHACHHANG, NGAYLAP, TONGTIEN) VALUES ('" . $mhd . "', '". $tenkhachhang ."', '". $ngaylap ."', '". $tongtien ."');";

    // Thực thi INSERT
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/hoadon/create.html.twig`
echo $twig->render('backend/hoadon/create.html.twig');