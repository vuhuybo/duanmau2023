<?php 
    if(isset($_GET['id'])){
        $id_order = $_GET['id'];
        confirm_order($id_order);
        header('location: index.php?act=order');
    }