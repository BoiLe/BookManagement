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
    $ma = $_POST['tacgia_mtacgia'];
    $ten = $_POST['tacgia_tentacgia'];
    $namsinh = $_POST['tacgia_namsinh'];
    $nammat = $_POST['tacgia_nammat'];
    $quequan = $_POST['tacgia_quequan'];
   
   

    // Câu lệnh INSERT
    $sql = "INSERT INTO `tacgia` (MATACGIA, TENTACGIA, NAMSINH,NAMMAT,QUEQUAN) VALUES ('" . $ma . "', '". $ten ."', '". $namsinh ."', '". $nammat ."', '". $quequan ."');";

    // Thực thi INSERT
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/tacgia/create.html.twig`
echo $twig->render('backend/tacgia/create.html.twig');