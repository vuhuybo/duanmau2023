<?php
    include '../modal/pdo.php';
    include '../modal/sanpham.php';
    if(isset($_GET['idpro']) && $_GET['idpro'] != ''){
        $idpro = $_GET['idpro'];
        $iduser = $_GET['iduser'];
        delesp_cart($idpro,$iduser);
        header('location: ../index.php');
    }