<?php
    include "modal/pdo.php";
    include 'modal/sanpham.php';
    
   
    if(isset($_GET['id']) && $_GET['id']!= '' && $_GET['act']=='sp'){
        $id = $_GET['id']; 
        $sp = load_1sp($id);
        echo(json_encode($sp,true));
    }else{
        include "view/header.php";
        $listdt_popular = load_5sp_popular(2);
        $listlaptop_popular = load_5sp_popular(1);
        if(isset($_GET['act']) && ($_GET['act']!='')){
            $act =$_GET['act'];
            switch($act){
                case 'all':
                    include "view/home.php";
                    break;
                case "spct":
                    include "view/allsp.php";
                    break;
            }
    
        }else{
            include 'view/home.php';
        }
        include 'view/footer.php';
    }
    