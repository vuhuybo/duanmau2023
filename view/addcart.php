<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST" || $_SERVER["REQUEST_METHOD"] === "GET"){
        $iduser = $_SESSION['uid'];
        $idpro = $_GET['idpro'];
        if(isset($_POST['count'])){
            $count = $_POST['count'];
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
        $add = $_GET['from'];
        $action = $_POST["action"];
        if($action == 'add' || $add == 'home'){
            add_cart($idpro,$iduser,$count);
            header('location: index.php ');
        }
        if($action == 'bill'){

        }
    }