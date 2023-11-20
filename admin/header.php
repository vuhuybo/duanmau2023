<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/chuc.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <li><a href="<?php echo 'index.php?act=sanpham' ?>">Danh sách sản phẩm</a></li>
                <li><a href="<?php echo 'index.php?act=danhmuc' ?>">Danh sách danh mục</a></li>
                <li><a href="<?php echo 'index.php?act=binhluan' ?>">Danh sách bình luận</a></li>
                <li><a href="<?php echo 'index.php?act=user' ?>">Danh sách người dùng</a></li>
                <li><a href="<?php echo 'index.php?act=order' ?>">Danh sách đơn hàng</a></li>
            </nav>
            <div class="loginhome">
                <a href="../view/logout.php">Đăng xuất</a>
            </div>
        </header>