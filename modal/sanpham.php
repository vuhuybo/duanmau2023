<?php 
    function loadall_sp(){
        $sql = 'SELECT * from sanmpham where 1 order by iddm desc';
        $result = pdo_query($sql);
        return $result;
    }
    function load_sp_dm($keyw='',$iddm = 0){
        $sql = 'SELECT * from sanpham where 1 and ';
        if(!empty($keyw)){
            $sql .= "name like '%".$keyw."'";
        }
        if($iddm!=0){
            $sql .= "iddm =".$iddm;
        }
        $sql .= "order by id desc";
        $result = pdo_query($sql);
        return $result;
    }
    function load_5sp_popular($iddm){
        $sql = "SELECT * from sanpham where 1 ";
        if($iddm != 0){
            $sql .= " and iddm = ". $iddm ; 
        }
        $sql .= "order by luotxem limit 0,5";
        $result = pdo_query($sql);
        return $result;
    }
    function load_1sp($id){
        $sql = 'SELECT * from sanpham where 1 and id= '. $id;
        $result = pdo_query($sql);
        return $result;
    }