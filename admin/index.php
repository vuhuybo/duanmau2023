<?php
include '../modal/pdo.php';
include '../modal/binhluan.php';
include '../modal/sanpham.php';
include '../modal/user.php';
include '../modal/danhmuc.php';
include 'header.php';
if(isset($_GET['act']) && $_GET['act']!= ''){
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            $listsp = loadall_sp();
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
        case 'editdm':
            include 'edit/editdm.php';
        }

}else{
    $listsp = loadall_sp();
    include 'sanpham.php';
}
include 'footer.php';
