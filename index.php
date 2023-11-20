<?php
    session_start();
    include "modal/pdo.php";
    include 'modal/sanpham.php';
    include 'modal/danhmuc.php';
    include 'modal/binhluan.php';
    include 'modal/user.php';
    include 'modal/bill.php';
    if(empty($_SESSION['uid'])){
        $islogin = 'Đăng nhập';
    }else{
        $islogin = 'Đăng xuất';
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
                    if( $_SERVER['REQUEST_METHOD'] == "POST" ){
                        $keyw  = $_POST['keyw'];
                        $iddm = $_POST['iddm'];
                        $from_price = $_POST['from_price'];
                        if(!empty($_POST['to_price'])){
                            $to_price = $_POST['to_price'];
                        }else{
                            $to_price = 0;
                        }
                        $listsp = load_sp_dm($keyw,$iddm,$from_price,$to_price);
                    }else{
                        if(isset($_GET['page'])){
                            $index = $_GET['page'];
                            $page_index = $_GET['page'];
                        }else{
                            $index = 1;
                            $page_index = 1;
                        }
                        $index = ($index - 1 )*15;
                        $listsp = loadall_sp($index,15);
                    }
                    include 'view/shopall.php';
                    break;
                case "mobile":
                    if( (isset($_POST['keyw'])) ){
                        $keyw  = $_POST['keyw'];
                        $from_price = $_POST['from_price'];
                        if(!empty($_POST['to_price'])){
                            $to_price = $_POST['to_price'];
                        }else{
                            $to_price = 0;
                        }
                        $listmobile = load_sp_dm($keyw,2,$from_price,$to_price);
                    }else{
                        if(isset($_GET['page'])){
                            $index = $_GET['page'];
                            $page_index = $_GET['page'];
                        }else{
                            $index = 1;
                            $page_index = 1;
                        }
                        $index = ($index - 1 )*15;
                        $listmobile = loadall_sp_dm(2,$index,15);
                    }
                    include 'view/mobile.php';
                    break;
                case "laptop":
                    if( (isset($_POST['keyw'])) ){
                        $keyw  = $_POST['keyw'];
                        $from_price = $_POST['from_price'];
                        if(!empty($_POST['to_price'])){
                            $to_price = $_POST['to_price'];
                        }else{
                            $to_price = 0;
                        }
                        $listlaptop = load_sp_dm($keyw,1,$from_price,$to_price);
                    }else{
                        if(isset($_GET['page'])){
                            $index = $_GET['page'];
                            $page_index = $_GET['page'];
                        }else{
                            $index = 1;
                            $page_index = 1;
                        }
                        $index = ($index - 1 )*15;
                        $listlaptop = loadall_sp_dm(1,$index,15);
                    }
                    include 'view/laptop.php';
                    break;
                case "tablet":
                    if( (isset($_POST['keyw'])) ){
                        $keyw  = $_POST['keyw'];
                        $from_price = $_POST['from_price'];
                        $to_price = $_POST['to_price']; 
                        $listtablet = load_sp_dm($keyw,3,$from_price,$to_price);
                    }else{
                        if(isset($_GET['page'])){
                            $index = $_GET['page'];
                            $page_index = $_GET['page'];
                        }else{
                            $index = 1;
                            $page_index = 1;
                        }
                        $index = ($index - 1 )*15;
                        $listtablet = loadall_sp_dm(3,$index,15);
                    }
                    include 'view/tablet.php';
                    break;
                case 'bill':
                    include 'view/bill.php';
                    break;
                case 'add_address':
                    include 'view/address/add_address.php';
                    break;
                case 'order_status':
                    include 'view/order_status.php';
                    break;
                case 'infouser':
                    include 'view/infouser.php';
                    break;
                case 'delete_order':
                    include 'view/delete_order.php';
                    break;
            }
    
        }else{
            include 'view/home.php';
        }
        include 'view/footer.php';
    }
    