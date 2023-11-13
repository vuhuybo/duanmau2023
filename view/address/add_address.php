<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $tinh = $_POST['tinh'];
        $detail_location = $_POST['detail_address'];
        if(isset($_POST['check-default'])){
            $status = 'default';
            update_address_status();
            add_address($name,$tel,$tinh,$detail_location,$_SESSION['uid'],$status);
            header('location: index.php?act=bill');
        }else{
            $status ='';
            add_address($name,$tel,$tinh,$detail_location,$_SESSION['uid'],$status);
            header('location: index.php?act=bill');
        }
    }