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
    $ma = $_POST['s_ms'];
    $ten = $_POST['s_ten'];
    $hinhanh = $_POST['s_hinhanh'];
    $mota = $_POST['s_mota'];
    $mtacgia = $_POST['s_mtacgia'];
    $mloaisach = $_POST['s_mloaisach'];
    $mlinhvuc = $_POST['s_mlinhvuc'];
    $giamua = $_POST['s_giamua'];
   
    

    // Câu lệnh INSERT
    $sql = "INSERT INTO `sach` (MASACH, TENSACH,HINHANHSACH,MOTA,MATACGIA,MALOAISACH,MALINHVUC,GIAMUA) VALUES ('" . $ma . "', '". $ten ."', '". $hinhanh ."', '". $mota ."', '". $mtacgia ."', '". $mloaisach ."', '". $mlinhvuc ."', '". $giamua ."');";

    // Thực thi INSERT
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// Yêu cầu `Twig` vẽ giao diện được viết trong file `backend/sach/create.html.twig`
echo $twig->render('backend/sach/create.html.twig');