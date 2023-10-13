<?php
    function load_bl($idpro){
        $sql= "SELECT* from binhluan where idpro =".$idpro;
        $result = pdo_query($sql);
        return $result;
    }
    function loadall_bl(){
        $sql= "SELECT* from binhluan";
        $result = pdo_query($sql);
        return $result;
    }
    function add_bl($noidung , $iduser , $idpro , $ngaybinhluan){
        $sql = "INSERT INTO 'binhluan'('noidung','iduser','idpro','ngaybinhluan')
        VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }