<?php 
    if(isset($_GET['id_order'])){
        $idorder = $_GET['id_order'];
        delete_order($idorder);
        header('location: index.php?act=infouser');
    }