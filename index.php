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
                case 'addcart':
                    include 'view/addcart.php';
                    break;
                case "shopall":
                    if( (isset($_POST['keyw'])) || (isset($_POST['iddm'])) ){
                        $keyw  = $_POST['keyw'];
                        $iddm = $_POST['iddm'];
                        $listsp = load_sp_dm($keyw,$iddm);
                    }else{
                        $listsp = loadall_sp();
                    }
                    include 'view/shopall.php';
                    break;
                    case "mobile":
                        if( (isset($_POST['keyw'])) ){
                            $keyw  = $_POST['keyw'];
                            $listmobile = load_sp_dm($keyw,2);
                        }else{
                            $listmobile = load_sp_dm('',2);
                        }
                        include 'view/mobile.php';
                        break;
                    case "laptop":
                        if( (isset($_POST['keyw'])) ){
                            $keyw  = $_POST['keyw'];
                            $listlaptop = load_sp_dm($keyw,1);
                        }else{
                            $listlaptop = load_sp_dm('',1);
                        }
                        include 'view/laptop.php';
                        break;
                        case "tablet":
                            if( (isset($_POST['keyw'])) ){
                                $keyw  = $_POST['keyw'];
                                $listtablet = load_sp_dm($keyw,3);
                            }else{
                                $listtablet= load_sp_dm('',3);
                            }
                            include 'view/tablet.php';
                            break;
            }
    
        }else{
            include 'view/home.php';
        }
        include 'view/footer.php';
    }
    