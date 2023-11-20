<?php 
    include '../../modal/pdo.php';
    include '../../modal/bill.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        delete_address($id);
        header('location: ../../index.php?act=infouser');
    }