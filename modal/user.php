<?php
    function load_user(){
        $sql= "SELECT* from taikhoan ";
        $result = pdo_query($sql);
        return $result;
    }
    function add_user($user , $pass , $email , $address , $tel, $role,$name = 'noname',$img = ''){
        $sql = "INSERT INTO `taikhoan`(`user`, `pass`, `email`, `address`, `tel`, `role`,`name`,`img`)
        VALUES ('$user','$pass','$email','$address','$tel','$role','$name','$img')";
        pdo_execute($sql);
    }
    function load_one_user($name){
        $sql = "SELECT * from taikhoan where user = "."'".$name."'";
        $result = pdo_query_one($sql);
        return $result;
    }
    function load_user_id($id){
        $sql = "SELECT * from taikhoan where id = "."'".$id."'";
        $result = pdo_query_one($sql);
        return $result;
    }
    function count_user($name){
        $sql = "SELECT COUNT(user) from taikhoan where user = "."'".$name."'";
        $result = pdo_query($sql);
        return $result;
    }
    function update_user($id,$sex,$birthday,$tel,$img,$name,$email){
        $sql = "UPDATE `taikhoan` SET `sex`='$sex',`tel`='$tel',`img`='$img',`name`='$name', `birthday`='$birthday',`email`='$email'
        WHERE id=".$id;
        pdo_execute($sql);
    }