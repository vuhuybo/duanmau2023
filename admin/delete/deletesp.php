<?php 
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $id = $_GET['id'];
        delete_sp($id);
        echo 'xoa thanh cong';
        header('location: index.php?act=sanpham');
    }