<?php 
    // update count pro in cart
    if(isset($_GET['count_cart'])){
        $iduser = $_SESSION['uid'];
        $count  = $_GET['count_cart'];
        $idpro = $_GET['idpro'];
        update_cart($idpro,$iduser,$count);
        exit();
    }
    // add pro to cart
    if (($_SERVER["REQUEST_METHOD"] === "POST" || $_SERVER["REQUEST_METHOD"] === "GET") && isset($_SESSION['uid'])){
        $action = $_POST["action"];
        $iduser = $_SESSION['uid'];
        $idpro = $_GET['idpro'];
        if($action == 'bill'){
            $count_add = $_POST['count_cart'];
            header("location: index.php?act=bill&id_one_pro=$idpro&count_add=$count_add ");
            exit();
        }else{
            if(isset($_POST['count_cart'])){
                $count = $_POST['count_cart'];
            }else{
                $count = 1;
            }
            $listchecks = check_cart($iduser);
            foreach($listchecks as $check){
                if($idpro == $check['id_pro']){
                    $count = $check['count'] + $count;
                    update_cart($idpro,$iduser,$count);
                    header('location: index.php ');
                    exit();
                }
            } 
            if(isset($_GET['from'])){
                $add = $_GET['from'];
            }else{
                $add = '';
            }
            
            var_dump($action);
            
            if($action == 'add' || $add == 'home'){
                add_cart($idpro,$iduser,$count);
                header('location: index.php ');
            }
        }
    }else{
        header('location: view/login.php');
    }