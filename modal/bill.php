<?php
    function load_address($id){
        $sql = 'SELECT * FROM `address` where id_user ='.$id;
        $result = pdo_query($sql);
        return $result;
    }
    function load_1_address($id_address,$id_user){
        $sql = "SELECT * FROM `address` where id=$id_address AND id_user = $id_user";
        $result = pdo_query_one($sql);
        return $result;
    }
    function update_address($id,$name, $tel , $tinh , $detail_location, $id_user,$status){
        $sql = "UPDATE `address` SET 
        `name`='$name',`tel`='$tel',`tinh`='$tinh',`detail_location`='$detail_location',`status` = '$status' WHERE id_user = $id_user AND id=".$id ;
        pdo_execute($sql);
    }
    function update_address_status(){
        $sql = "UPDATE `address` SET `status`='' WHERE `status`='default'";
        pdo_execute($sql);
    }
    function delete_address($id){
        $sql = "DELETE FROM `address` WHERE id=".$id;
        pdo_execute($sql);
    }
    function add_address($name, $tel , $tinh , $detail_location, $id_user,$status){
        $sql = "INSERT INTO `address`( `name`, `tel`, `tinh`, `detail_location`, `id_user`,`status`) 
        VALUES ('$name','$tel','$tinh','$detail_location','$id_user','$status')";
        pdo_execute($sql);
    }
    function add_orders($total, $id_address, $id_user, $product){
        $sql = "INSERT INTO `order`( `product`, `id_user`, `ngay_dat`, `total_price`, `id_address`) 
        VALUES ('$product','$id_user',NOW(),'$total','$id_address')";
        pdo_execute($sql);
        $sql_delete_cart  = "DELETE FROM `cart` WHERE id_user=$id_user";
        pdo_execute($sql_delete_cart); 
    }
    function load_pro_order($id_order){
        $sql = "SELECT * from `order` where id=$id_order";
        $result = pdo_query($sql);
        return $result;
    }
    function load_order($id){
        $sql = "SELECT * from `order` as a 
        left join `address` as b  on a.id_address = b.id
        left join `status_order` as c on a.id = c.id_order where a.id = $id order by c.date desc ";
        $result = pdo_query_one($sql);
        return $result;
    }
    function load_all_order($index,$soluong){
        $sql = "SELECT a.id,product,ngay_dat,total_price,detail_location,tinh,a.id_user from `order` as a 
        inner join `address` as b  on a.id_address = b.id limit $index,$soluong";
        $result = pdo_query($sql);
        return $result;
    }
    function load_list_orders($id){
        $sql = "SELECT * from `order` where id_user = $id ";
        $result = pdo_query($sql);
        return $result;
    }
    // function load_status_order($id_order){
    //     $sql = "SELECT * FROM `status_order` where id_order=$id_order";
    //     $result = pdo_query($sql);
    //     return $result;
    // }
    function delete_order($id_order ){
        $sql = "DELETE FROM `order` where id=$id_order";
        pdo_execute($sql);
        $sql1 = "DELETE FROM `order_status` where id=$id_order";
        pdo_query($sql1);
    }
    function count_order(){
        $sql = "SELECT COUNT(id) from `order`";
        $result = pdo_query($sql);
        return $result;
    }
    function load_order_filter($id_order='',$id_user=''){
        $sql = "SELECT * from `order` as a 
        left join `address` as b  on a.id_address = b.id
        left join `status_order` as c on a.id = c.id_order where 1";
        if(!empty($id_order)){
            $sql .= " AND a.id = $id_order";
        }
        if(!empty($id_user)){
            $sql .= " AND a.id_user = $id_user";
        }
        $result = pdo_query($sql);
        return $result;
    }
    function load_status_order($id){
        $sql = "SELECT * FROM `status_order` WHERE id_order= $id order by date desc LIMIT 0,1";
        $result = pdo_query_one($sql);
        return $result;
    }
    function confirm_order($id_order){
        $sql = "INSERT INTO `status_order`( `status`, `date`, `id_order`) VALUES ('ordered',NOW(),'$id_order')";
        pdo_execute($sql);
    }
