
<?php
// Load các thư viện (packages) do Composer quản lý vào chương trình
require_once __DIR__.'/vendor/autoload.php';

// Chỉ định thư mục `templates` (nơi Twig sẽ biên dịch cú pháp Twig thành các đoạn code PHP)
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');

// Khởi tạo Twig
$twig = new \Twig\Environment($loader);