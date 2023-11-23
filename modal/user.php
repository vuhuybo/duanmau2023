<?php
    function load_user(){
        $sql= "SELECT* from taikhoan ";
        $result = pdo_query($sql);
        return $result;
    }
    function add_user($user , $pass , $email , $address , $tel, $role,$code_verify,$name = 'noname',$img = ''){
        $sql = "INSERT INTO `taikhoan`(`user`, `pass`, `email`, `address`, `tel`, `role`,`name`,`img`,`code_verify`)
        VALUES ('$user','$pass','$email','$address','$tel','$role','$name','$img','$code_verify')";
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
    function count_email($name){
        $sql = "SELECT COUNT(email) from taikhoan where email = "."'".$name."'";
        $result = pdo_query($sql);
        return $result;
    }
    function update_user($id,$sex,$birthday,$tel,$img,$name,$email){
        $sql = "UPDATE `taikhoan` SET `sex`='$sex',`tel`='$tel',`img`='$img',`name`='$name', `birthday`='$birthday',`email`='$email'
        WHERE id=".$id;
        pdo_execute($sql);
    }
    function confirmed_user($username){
        $sql = "UPDATE `taikhoan` SET `code_verify`='0' WHERE `user` = "."'".$username."'";
        pdo_execute($sql);
    }
    function forget_pass($email,$verify_code){
        $sql = "UPDATE `taikhoan` SET `code_verify`= $verify_code WHERE `email` = "."'".$email."'";
        pdo_execute($sql);
    }
    function load_one_user_email($email){
        $sql = "SELECT * from taikhoan where email = "."'".$email."'";
        $result = pdo_query_one($sql);
        return $result;
    }
    function repass($pass,$email){
        $sql = "UPDATE `taikhoan` SET `pass`= '$pass' WHERE `email` = "."'".$email."'";
        pdo_execute($sql);
    }