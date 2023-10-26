<?php
session_start();
include '../modal/pdo.php';
include '../modal/binhluan.php';
include '../modal/sanpham.php';
include '../modal/user.php';
include '../modal/danhmuc.php';
include 'header.php';
if($_SESSION['role'] != 1){
    header('location: ../view/login.php');
}
if(isset($_GET['act']) && $_GET['act']!= ''){
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            if( (isset($_POST['keyw'])) || (isset($_POST['iddm'])) ){
                $keyw  = $_POST['keyw'];
                $iddm = $_POST['iddm'];
                $listsp = load_sp_dm($keyw,$iddm);
            }else{
                $listsp = loadall_sp();
            }
            include 'sanpham.php';
            break;
        case 'binhluan':
                $listbl = loadall_bl();
                include 'binhluan.php';
                break;    
        case 'danhmuc':
            $listdm = load_dm();
            include 'danhmuc.php';
            break;
        case 'user':
            $listuser = load_user();
            include 'user.php';
            break;
        case 'themdm':
            include 'add/themdm.php';
            if(isset($_POST['name_dm']) && $_POST['name_dm'] != ''){
                $name_dm = $_POST['name_dm'];
                add_dm($name_dm);
            }
            break;
        case 'themsp':
            $listdm = load_dm();                       
            include 'add/themsp.php';
            break;
        case 'editsp':
            $listdm = load_dm();
            include 'edit/editsp.php';
            break;
        case 'editdm':
            include 'edit/editdm.php';
            break;
        case 'xoasp':
            include 'delete/deletesp.php';
            break;
        case 'xoadm':
            include 'delete/xoadm.php';
            break;
        case 'xoacmt':
            include 'delete/deletecmt.php';
            break;
        }
        
        

}else{
    $listsp = loadall_sp();
    include 'sanpham.php';
}
include 'footer.php';
