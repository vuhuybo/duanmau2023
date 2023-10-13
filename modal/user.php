<?php
    function load_user(){
        $sql= "SELECT* from taikhoan ";
        $result = pdo_query($sql);
        return $result;
    }
    function add_user($user , $pass , $email , $address , $tel, $role){
        $sql = "INSERT INTO 'taikhoan'('user','pass','email','address','tel','role')
        VALUES ('$user','$pass','$email','$address','$tel','$role')";
        pdo_execute($sql);
    }