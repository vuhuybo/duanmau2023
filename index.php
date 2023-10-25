<?php
    session_start();
    include "modal/pdo.php";
    include 'modal/sanpham.php';
    include 'modal/danhmuc.php';
    include 'modal/binhluan.php';
    include 'modal/user.php';
    if(empty($_SESSION['uid'])){
        header('location: view/login.php');
    }
    if(isset($_GET['id']) && $_GET['id']!= '' && $_GET['act']=='sp'){
        $id = $_GET['id']; 
        $sp = load_1sp($id);
        echo(json_encode($sp,true));
    }else{
        include "view/header.php";
        $listdt_popular = load_5sp_popular(2);
        $listlaptop_popular = load_5sp_popular(1);
        $listtablet_popular = load_5sp_popular(3);
        if(isset($_GET['act']) && ($_GET['act']!='')){
            $act =$_GET['act'];
            switch($act){
                case 'home':
                    include "view/home.php";
                    break;
                case "spct":
                    include "view/chitietsp.php";
                    break;
            }
    
        }else{
            include 'view/home.php';
        }
        include 'view/footer.php';
    }
    