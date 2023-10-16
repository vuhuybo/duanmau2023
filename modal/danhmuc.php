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
    function load_dm_id($id){
        $sql = 'SELECT * from `danhmuc` where id ='.$id;
        $result = pdo_query_one($sql);
        return $result;
    }
    function edit_dm($id,$name){
        $sql = "UPDATE `danhmuc` SET `name`='$name' WHERE id= $id ";
        pdo_execute($sql);
    }