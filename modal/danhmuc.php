<?php
    function load_dm(){
        $sql= "SELECT* from danhmuc ";
        $result = pdo_query($sql);
        return $result;
    }
    function add_dm($name){
        $sql = "INSERT INTO `danhmuc`( `name`) VALUES ('$name')";
        pdo_execute($sql);
    }