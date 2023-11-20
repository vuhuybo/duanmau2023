<?php
    include '../../modal/pdo.php';
    include '../../modal/bill.php';
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $address = load_1_address($id, $_SESSION['uid']);
        echo(json_encode($address,true));
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $tinh = $_POST['tinh'];
        $detail_location = $_POST['detail_address'];
        $id_address = $_GET['id_address'];
        if(isset($_POST['from'])){
            $from = $_POST['from'];
        }else{
            $from = '';
        }
        if(isset($_POST['check-default'])){
            $status = 'default';
            update_address_status();
            update_address($id_address,$name,$tel,$tinh,$detail_location,$_SESSION['uid'],$status);
            if($from == ''){
                header('location: ../../index.php?act=bill');
            }else{
                header('location: ../../index.php?act=infouser');
            }
        }else{
            $status = '';
            update_address($id_address,$name,$tel,$tinh,$detail_location,$_SESSION['uid'],$status);
            if($from == ''){
                header('location: ../../index.php?act=bill');
            }else{
                header('location: ../../index.php?act=infouser');
            }
        }
    }