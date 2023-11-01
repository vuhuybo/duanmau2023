<?php
    function load_address(){
        $sql = 'SELECT * FROM `address`';
        $result = pdo_query($sql);
        return $result;
    }
    function update_address($id,$name, $tel , $tinh , $detail_location, $id_user){
        $sql = "UPDATE `address` SET 
        `name`='$name',`tel`='$tel',`tinh`='$tinh',`detail_location`='$detail_location',`id_user`='$id_user' WHERE id=".$id;
        pdo_execute($sql);
    }
    function add_address($name, $tel , $tinh , $detail_location, $id_user){
        $sql = "INSERT INTO `address`( `name`, `tel`, `tinh`, `detail_location`, `id_user`) 
        VALUES ('$name','$tel','$tinh','$detail_location','$id_user')";
        pdo_execute($sql);
    }
    function add_bill($total, $id_address, $id_user, $product){
        // $sql = "INSERT INTO `bill`( `name`, `tel`, `tinh`, `detail_location`, `id_user`) 
        // VALUES ('$name','$tel','$tinh','$detail_location','$id_user')";
    }
